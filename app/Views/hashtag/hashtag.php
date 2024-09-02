<!doctype html>
<html lang="en">

<head>
    <title>Hashtag Generator</title>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous" />
</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>
    <main>
        <h3 class="py-5 text-center">Hashtag Generator</h3>
        <div class="container">
            <div class="mb-3">
                <label for="" class="form-label">Input Hashtag</label>
                <input
                    type="text"
                    class="form-control"
                    id="hashtag-input"
                    aria-describedby="helpId"
                    placeholder="Input Kategori Hashtag tanpa spasi" />
            </div>
            <button class="btn btn-primary" id="generate-btn">Generate</button>
            <button class="btn btn-success" id="copy-btn">Copy Hashtags</button>
            <div id="hasil"></div>
        </div>

    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>

    <script>
        const generateBtn = document.getElementById('generate-btn');
        const hashtagInput = document.getElementById('hashtag-input');
        const hasilDiv = document.getElementById('hasil');
        const copyBtn = document.getElementById('copy-btn');

        generateBtn.addEventListener('click', async () => {
            const query = hashtagInput.value.trim();
            if (query === '') {
                alert('Silakan masukkan hashtag');
                return;
            }

            const url = `https://hash-tag-generator.p.rapidapi.com/get_has_tags?query=${query}&language=en`;
            const options = {
                method: 'GET',
                headers: {
                    'x-rapidapi-key': '6ead1a6d3dmshde21c2edcfce718p195bd9jsnb549113a5236',
                    'x-rapidapi-host': 'hash-tag-generator.p.rapidapi.com'
                }
            };

            try {
                const response = await fetch(url, options);
                const result = await response.json();
                const hasil = result.data.results.map((item, index) => {
                    return `<input type="checkbox" id="hashtag-${index}" value="${item}"> <label for="hashtag-${index}">${item}</label><br>`;
                }).join('');
                hasilDiv.innerHTML = hasil;
            } catch (error) {
                console.error(error);
                alert('Gagal mengambil data');
            }
        });

        copyBtn.addEventListener('click', () => {
            const selectedHashtags = Array.from(hasilDiv.querySelectorAll('input[type="checkbox"]:checked')).map((checkbox) => checkbox.value);
            const copyText = selectedHashtags.join(', ');
            navigator.clipboard.writeText(copyText);
            alert(`Hashtags telah dicopy: ${copyText}`);
        });
    </script>
</body>

</html>