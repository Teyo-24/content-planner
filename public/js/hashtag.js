const generateBtn = document.getElementById("generate-btn");
const hashtagInput = document.getElementById("hashtag-input");
const hasilDiv = document.getElementById("hasil");
const copyBtn = document.getElementById("copy-btn");
const alertPlaceholder = document.getElementById("alert-placeholder");

const showAlert = (message, type = "warning") => {
  alertPlaceholder.innerHTML = `
                <div class="alert alert-${type} alert-dismissible fade show" role="alert">
                    ${message}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            `;
};

generateBtn.addEventListener("click", async () => {
  const query = hashtagInput.value.trim();
  if (query === "") {
    showAlert("Silakan masukkan hashtag");
    return;
  }

  try {
    const response = await fetch(`/generate-hashtags?query=${encodeURIComponent(query)}`);
    const result = await response.json();
    if (response.ok) {
      const hashtags = result.data.results;

      // Generate HTML with hashtag-item class
      const hasil = hashtags
        .map((item, index) => {
          return `
                    <div class="hashtag-item">
                        <input type="checkbox" id="hashtag-${index}" value="${item}">
                        <label for="hashtag-${index}">${item}</label>
                    </div>
                `;
        })
        .join("");

      hasilDiv.innerHTML = hasil;

      // Ensure hashtags container is scrollable if content overflows
      hasilDiv.style.maxHeight = "200px"; // Adjust based on your needs
      hasilDiv.style.overflowY = "auto";
    } else {
      showAlert(result.error || "Gagal mengambil data");
    }
  } catch (error) {
    console.error(error);
    showAlert("Gagal mengambil data");
  }
});

copyBtn.addEventListener("click", () => {
  const selectedHashtags = Array.from(hasilDiv.querySelectorAll('input[type="checkbox"]:checked')).map((checkbox) => checkbox.value);
  const copyText = selectedHashtags.join(" ");
  navigator.clipboard.writeText(copyText);
  // showAlert(`Hashtags telah dicopy: ${copyText}`, 'success');
});
