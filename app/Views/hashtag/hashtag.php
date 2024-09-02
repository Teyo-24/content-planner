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

        <div class="container py-5">
            <div class="mb-3">
                <label for="" class="form-label">Input Hashtag (supports Indonesian language)</label>
                <input
                    type="text"
                    class="form-control"
                    id="hashtag-input"
                    aria-describedby="helpId"
                    placeholder="Input Hashtag (e.g. #selamatpagi, #indonesia, #jakarta)" />
            </div>
            <button class="btn btn-primary" id="generate-btn">Generate</button>
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
        // Fungsi untuk menghasilkan hashtag
        function generateHashtags(kataKata) {
            // API endpoint untuk menghasilkan hashtag
            const apiEndpoint = "https://api.datamuse.com/words";

            // Fungsi untuk mengirimkan permintaan ke API
            async function getHashtags(kata) {
                const response = await fetch(`${apiEndpoint}?rel_trg=${encodeURIComponent(kata)}`);
                const data = await response.json();
                return data;
            }

            // Mengirimkan permintaan ke API untuk setiap kata
            async function getHashtagsForAllWords() {
                let hasil = [];
                for (const kata of kataKata) {
                    const hashtags = await getHashtags(kata);
                    hasil = [...hasil, ...hashtags];
                }
                return hasil;
            }

            // Mengubah hasil menjadi hashtag
            async function generateHashtags() {
                const hasil = await getHashtagsForAllWords();
                const hashtags = hasil.map((item) => `#${item.word}`);
                return hashtags;
            }

            return generateHashtags();
        }

        // Event listener untuk tombol generate
        document.getElementById("generate-btn").addEventListener("click", async (e) => {
            e.preventDefault();
            const kata = document.getElementById("hashtag-input").value;
            const kataKata = kata.split(",");
            const hasil = await generateHashtags(kataKata);
            const hasilElement = document.getElementById("hasil");
            hasilElement.innerHTML = "";
            hasil.forEach((hashtag) => {
                const p = document.createElement("p");
                p.textContent = hashtag;
                hasilElement.appendChild(p);
            });
        });
    </script>
</body>

</html>