<!doctype html>
<html lang="en">

<head>
    <title>Hashtag Generator</title>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link rel="stylesheet" href="<?= base_url('css/hashtag.css'); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400..700&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>
    <div class="container">
        <div class="left-panel">
            <h2 class="text-center mb-4">Hashtag Generator</h2>
            <label for="topic">Topik atau caption <span style="color: red;">*</span></label>
            <div id="alert-placeholder" class="mt-3"></div>
            <input type="text" id="hashtag-input" placeholder="Masukan Kata kunci">
            <button id="generate-btn" class="generate-button"><i class="fas fa-cogs"></i> Generate</button>


            <div class="card">
                <div class="card-body">
                    <div id="hasil" class="hashtag-container"></div>
                </div>
            </div>
            <button id="select-all-btn" class="btn btn-secondary mt-3">Select All</button>
            <button id="copy-btn" class="btn btn-success mt-3"><i class="fas fa-copy"></i> Copy</button>
        </div>
        <div class="right-panel">
            <h4 class="text-center">Cara Penggunaan</h4>
            <p class="paragraf">Tingkatkan jangkauan media sosial Anda dengan Pembuat Tagar kami yang canggih. Buat tagar yang relevan dan sedang tren untuk meningkatkan visibilitas konten Anda dan menarik minat audiens target Anda di berbagai platform.</p>
            <ul class="mt-4">
                <li><i class="fas fa-check-circle"></i>
                    <p class="paragraf">Masukan kata atau topik yang terkait dengan konten</p>
                </li>
                <li><i class="fas fa-check-circle"></i>
                    <p class="paragraf">Tekan Generate dan Pilih Hashtag yang ingin dipakai</p>
                </li>
                <li><i class="fas fa-check-circle"></i>
                    <p class="paragraf">Pilih Copy untuk menyalin hashtag</p>
                </li>
            </ul>
        </div>
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="<?= base_url('js/hashtag.js'); ?> ">
    </script>
</body>

</html>