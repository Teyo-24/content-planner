<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Metrics</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">

    <style>
        .card {
            background-color: #e9ecef;
            padding: 20px;
            border-radius: 30px;
            margin-bottom: 20px;
        }

        .card-content {
            padding: 15px;
            background-color: #ffff;
        }

        .header {
            margin-top: 30px;
            position: relative;
            padding-bottom: 20px;
        }

        .line-separator {
            width: 100%;
            height: 2px;
            background-color: #000;
            border: none;
            margin-top: 20px;
        }

        .textcontent {
            margin-top: 20px;
            position: relative;
            padding-bottom: 10px;
        }

        .line-separatorkecil {
            width: 8%;
            height: 2px;
            background-color: #000;
            margin: 10px 0;
        }

        .input-smaller {
            width: 65%;
        }
    </style>
</head>

<body class="card-content">
    <!-- start text header and line -->
    <div class="container">
        <div class="header">
            <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-md-between">
                <h2 class="mb-3 mb-md-0">Key Performance Indicator</h2>
                <div class="d-flex flex-wrap gap-2">
                    <a href="/"><button type="button" class="btn btn-primary">Content Calendar</button></a>
                    <a href="/content-planner"><button type="button" class="btn btn-success">Content Planner</button></a>
                    <a href="/input-data-content"><button type="button" class="btn btn-secondary">Set Up</button></a>
                </div>
            </div>
        </div>
        <hr class="line-separator">

        <!-- end text header and line -->

        <div class="card">

            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <h4>2024</h4>
                <div class="calendar-controls d-flex align-items-center flex-wrap">
                    <!-- start dropdown button -->
                    <div class="btn-group me-3 mb-2 mb-md-0">
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Media Sosial
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Tiktok</a></li>
                            <li><a class="dropdown-item" href="#">Facebook</a></li>
                            <li><a class="dropdown-item" href="#">Youtube</a></li>
                        </ul>
                    </div>
                    <!-- end dropdown button -->
                    <button class="btn btn-light me-3 mb-2 mb-md-0" id="prevMonth">
                        <i class="bi bi-chevron-left"></i>
                    </button>
                    <button class="btn btn-light mb-2 mb-md-0" id="nextMonth">
                        <i class="bi bi-chevron-right"></i>
                    </button>
                    <input type="number" id="yearPicker" class="ms-3 mb-2 mb-md-0" min="1900" max="2100" placeholder="Year">

                </div>
            </div>

            <!-- start nama data -->
            <div class="textcontent">
                <h5>Instagram</h5>
                <hr class="line-separatorkecil">
            </div>
            <!-- end nama data -->
            <div class="table-responsive">
                <table class="table table-striped" style="border-collapse: separate; border-radius: 20px; overflow: hidden;">
                    <thead class="table-dark">
                        <tr style="text-align: center;">
                            <th scope="col">Trend</th>
                            <td scope="col">Jan</td>
                            <td scope="col">Feb</td>
                            <td scope="col">Mar</td>
                            <td scope="col">Apr</td>
                            <td scope="col">Mei</td>
                            <td scope="col">Jun</td>
                            <td scope="col">Jul</td>
                            <td scope="col">Aug</td>
                            <td scope="col">Sep</td>
                            <td scope="col">Okt</td>
                            <td scope="col">Nov</td>
                            <td scope="col">Des</td>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="fw-bold">Followers Goal</td>
                            <td contenteditable="true">250</td>
                            <td contenteditable="true">500</td>
                            <td contenteditable="true">750</td>
                            <td contenteditable="true">1000</td>
                            <td contenteditable="true">1500</td>
                            <td contenteditable="true">2000</td>
                            <td contenteditable="true">2500</td>
                            <td contenteditable="true">3000</td>
                            <td contenteditable="true">3500</td>
                            <td contenteditable="true">4000</td>
                            <td contenteditable="true">4500</td>
                            <td contenteditable="true">5000</td>
                            <td class="text-center">
                                <button class="btn btn-danger btn-sm delete-content-type" style="width: 100%; min-width: 80px;">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Followers Real</td>
                            <td contenteditable="true">100</td>
                            <td contenteditable="true">300</td>
                            <td contenteditable="true">700</td>
                            <td contenteditable="true">900</td>
                            <td contenteditable="true">1300</td>
                            <td contenteditable="true">2000</td>
                            <td contenteditable="true">2100</td>
                            <td contenteditable="true">2500</td>
                            <td contenteditable="true">3000</td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td class="text-center">
                                <button class="btn btn-danger btn-sm delete-content-type" style="width: 100%; min-width: 80px;">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Reach Goal</td>
                            <td contenteditable="true">100</td>
                            <td contenteditable="true">300</td>
                            <td contenteditable="true">700</td>
                            <td contenteditable="true">900</td>
                            <td contenteditable="true">1300</td>
                            <td contenteditable="true">2000</td>
                            <td contenteditable="true">2100</td>
                            <td contenteditable="true">2500</td>
                            <td contenteditable="true">3000</td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td class="text-center">
                                <button class="btn btn-danger btn-sm delete-content-type" style="width: 100%; min-width: 80px;">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Reach Real</td>
                            <td contenteditable="true">100</td>
                            <td contenteditable="true">300</td>
                            <td contenteditable="true">700</td>
                            <td contenteditable="true">900</td>
                            <td contenteditable="true">1300</td>
                            <td contenteditable="true">2000</td>
                            <td contenteditable="true">2100</td>
                            <td contenteditable="true">2500</td>
                            <td contenteditable="true">3000</td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td class="text-center">
                                <button class="btn btn-danger btn-sm delete-content-type" style="width: 100%; min-width: 80px;">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Like/Post Goal</td>
                            <td contenteditable="true">100</td>
                            <td contenteditable="true">300</td>
                            <td contenteditable="true">700</td>
                            <td contenteditable="true">900</td>
                            <td contenteditable="true">1300</td>
                            <td contenteditable="true">2000</td>
                            <td contenteditable="true">2100</td>
                            <td contenteditable="true">2500</td>
                            <td contenteditable="true">3000</td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td class="text-center">
                                <button class="btn btn-danger btn-sm delete-content-type" style="width: 100%; min-width: 80px;">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Like/Post Real</td>
                            <td contenteditable="true">100</td>
                            <td contenteditable="true">300</td>
                            <td contenteditable="true">700</td>
                            <td contenteditable="true">900</td>
                            <td contenteditable="true">1300</td>
                            <td contenteditable="true">2000</td>
                            <td contenteditable="true">2100</td>
                            <td contenteditable="true">2500</td>
                            <td contenteditable="true">3000</td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td class="text-center">
                                <button class="btn btn-danger btn-sm delete-content-type" style="width: 100%; min-width: 80px;">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Comment/Post Goal</td>
                            <td contenteditable="true">100</td>
                            <td contenteditable="true">300</td>
                            <td contenteditable="true">700</td>
                            <td contenteditable="true">900</td>
                            <td contenteditable="true">1300</td>
                            <td contenteditable="true">2000</td>
                            <td contenteditable="true">2100</td>
                            <td contenteditable="true">2500</td>
                            <td contenteditable="true">3000</td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td class="text-center">
                                <button class="btn btn-danger btn-sm delete-content-type" style="width: 100%; min-width: 80px;">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Comment/Post Real</td>
                            <td contenteditable="true">100</td>
                            <td contenteditable="true">300</td>
                            <td contenteditable="true">700</td>
                            <td contenteditable="true">900</td>
                            <td contenteditable="true">1300</td>
                            <td contenteditable="true">2000</td>
                            <td contenteditable="true">2100</td>
                            <td contenteditable="true">2500</td>
                            <td contenteditable="true">3000</td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td class="text-center">
                                <button class="btn btn-danger btn-sm delete-content-type" style="width: 100%; min-width: 80px;">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="new-trend" placeholder="Nama Content Type">
                    <button class="btn btn-primary" type="button" id="add-data-btn">Add Data</button>
                </div>
            </div>





        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>