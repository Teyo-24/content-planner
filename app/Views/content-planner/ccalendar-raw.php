<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Content Calendar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
    <style>
        .calendar-container {
            background-color: #d1d1d6;
            border-radius: 0.5rem;
            padding: 1rem;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .calendar-header {
            border-bottom: 1px solid #000;
            padding-bottom: 0.5rem;
        }

        .calendar-controls button {
            border: none;
        }

        .table-bordered {
            border: none;
        }

        .table-bordered th,
        .table-bordered td {
            width: 14.285714%;
            height: 100px;
            border: 1px solid #dee2e6;
            position: relative;
        }

        .table-bordered th {
            height: 70px;
            border-top: 1px solid #dee2e6 !important;
            border-bottom: 1px solid #dee2e6 !important;
            border-left: none !important;
            border-right: none !important;
        }

        .event-rect,
        .event-rect-small,
        .event-rect-medium {
            color: white;
            padding: 5px;
            border-radius: 5px;
            text-align: center;
            position: absolute;
            width: 70%;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            cursor: pointer;
        }

        .event-rect {
            background-color: #007bff;
        }

        .event-rect-small {
            background-color: #28a745;
        }

        .event-rect-medium {
            background-color: #dc3545;
        }

        .event-detail strong {
            display: inline-block;
            width: 100px;
        }

        .event-detail p {
            margin: 0.5em 0;
        }

        .dropdown-menu .dropdown-item i {
            margin-right: 10px;
        }

        .dropdown-item[data-social="tiktok"] i,
        .dropdown-item[data-social="tiktok"] {
            color: #000000;
        }

        .dropdown-item[data-social="facebook"] i,
        .dropdown-item[data-social="facebook"] {
            color: #4267B2;
        }

        .dropdown-item[data-social="youtube"] i,
        .dropdown-item[data-social="youtube"] {
            color: #FF0000;
        }

        .dropdown-item:hover {
            background-color: #f8f9fa;
        }

        @media (max-width: 768px) {
            .calendar-container {
                padding: 0.75rem;
            }

            .calendar-controls button {
                font-size: 0.75rem;
            }

            .event-rect,
            .event-rect-small,
            .event-rect-medium {
                font-size: 9px;
                width: 90%;
                top: 50px;
            }

            .table-bordered td {
                height: 80px;
            }
        }

        @media (max-width: 576px) {
            .calendar-container {
                padding: 0.5rem;
            }

            .calendar-controls button {
                font-size: 0.65rem;
            }

            .head h5 {
                font-size: 15px;
            }

            .head .btn-success {
                font-size: 7px;
            }

            .head input {
                font-size: 10px;
            }

            .head .btn-light {
                font-size: 8px;
            }

            .head i {
                font-size: 9px;
            }

            .table-responsive {
                font-size: 13px;
            }

            .event-rect,
            .event-rect-small,
            .event-rect-medium {
                font-size: 0.35rem;
                width: 60px;
                top: 40px;
            }

            .table-bordered td {
                height: 60px;
            }
        }

        @media (max-width: 320px) {
            .calendar-controls button {
                font-size: 0.5rem;
            }

            .head h5 {
                font-size: 7px;
            }

            .head .add {
                width: 35px;
                height: 17px;
                font-size: 2.5px;
                position: relative;
                right: 10px;
            }

            .head .add2 {
                width: 35px;
                height: 17px;
                font-size: 5px;
            }

            .head input {
                font-size: 5px;
                position: relative;
                left: 10px;
            }

            .head .btn-light {
                font-size: 7px;
                width: 7px;
                height: 20px;
                position: relative;
                left: 20px;
            }

            .head i {
                font-size: 10px;
                position: relative;
                right: 5px;
                bottom: 3px;
            }

            .table-responsive {
                font-size: 10px;
            }

            .event-rect,
            .event-rect-small,
            .event-rect-medium {
                font-size: 0.25rem;
                width: 80%;
                top: 35px;
            }

            .table-bordered td {
                height: 50px;
            }

            .modal {
                width: 300px;
                left: 10px;
            }
        }
    </style>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
                <div class="pe-3">
                    <div class="dropdown">
                        <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle"></i> User Profile
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- calendar -->
    <div class="container mt-4">
        <h3>Content Calendar</h3>
        <hr>
        <div class="calendar-container mt-4">
            <div class="head d-flex justify-content-between align-items-center">
                <h5 class="m-0">September 2024</h5>
                <div class="calendar-controls d-flex align-items-center">
                    <button class="btn btn-light me-2">
                        <i class="bi bi-chevron-left"></i>
                    </button>
                    <button class="btn btn-light">
                        <i class="bi bi-chevron-right"></i>
                    </button>
                    <input type="date" class="ms-3 form-control-sm">
                    <button type="button" class="add2 btn btn-primary ms-3">Cari</button>
                    <button type="button" class="add btn btn-success ms-3">Add Data +</button>
                </div>
            </div>
            <div class="calendar-header mt-2"></div>
            <div class="table-responsive">
                <table class="table table-bordered text-center mt-4">
                    <thead>
                        <tr>
                            <th>Sunday</th>
                            <th>Monday</th>
                            <th>Tuesday</th>
                            <th>Wednesday</th>
                            <th>Thursday</th>
                            <th>Friday</th>
                            <th>Saturday</th>
                        </tr>
                    </thead>
                    <tbody class="text-end">
                        <tr>
                            <td>1</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                            <td>5</td>
                            <td>6</td>
                            <td>7</td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>9</td>
                            <td>10</td>
                            <td>11</td>
                            <td>12
                                <div class="event-rect" data-bs-toggle="modal" data-bs-target="#eventModal1">Detail
                                    Kegiatan</div>
                            </td>
                            <td>13</td>
                            <td>14</td>
                        </tr>
                        <tr>
                            <td>15</td>
                            <td>16</td>
                            <td>17</td>
                            <td>18</td>
                            <td>19</td>
                            <td>20</td>
                            <td>21
                                <div class="event-rect-small" data-bs-toggle="modal" data-bs-target="#eventModal2">
                                    Detail Kegiatan</div>
                            </td>
                        </tr>
                        <tr>
                            <td>22</td>
                            <td>23</td>
                            <td>24</td>
                            <td>25</td>
                            <td>26
                                <div class="event-rect-medium" data-bs-toggle="modal" data-bs-target="#eventModal3">
                                    Detail Kegiatan</div>
                            </td>
                            <td>27</td>
                            <td>28</td>
                        </tr>
                        <tr>
                            <td>29</td>
                            <td>30</td>
                            <td>1</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                            <td>5</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Event 1 -->
    <div class="modal fade" id="eventModal1" tabindex="-1" aria-labelledby="eventModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="eventModalLabel1">
                        <i class="bi bi-camera"></i> Detail Kegiatan: Pengambilan Foto
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="mb-3">
                            <a href=""><button type="button" class="btn" style="background-color: #010101; color: white;">Tiktok</button></a>
                            <a href=""><button type="button" class="btn" style="background-color: #E4405F; color: white;">Instagram</button></a>
                            <a href=""><button type="button" class="btn" style="background-color: #1877F2; color: white;">Facebook</button></a>
                            <a href=""><button type="button" class="btn" style="background-color: #FF0000; color: white;">Youtube</button></a>
                            <a href=""><button type="button" class="btn" style="background-color: #0077B5; color: white;">LinkedIn</button></a>
                            <a href=""><button type="button" class="btn" style="background-color: #E60023; color: white;">Pinterest</button></a>
                            <a href=""><button type="button" class="btn" style="background-color: #FF0000; color: white;">Youtube</button></a>
                            <a href=""><button type="button" class="btn" style="background-color: #0077B5; color: white;">LinkedIn</button></a>
                            <a href=""><button type="button" class="btn mt-2" style="background-color: #E60023; color: white;">Pinterest</button></a>
                        </div>
                    </div>
                    <p class="mb-3">Detail kegiatan pada tanggal <strong>1 September 2024</strong>:</p>
                    <ol class="event-detail list-group list-group">
                        <li class="list-group-item">
                            <strong>Kegiatan:</strong> Pengambilan Foto<br>
                            <strong>Waktu:</strong> 10:00 AM - 12:00 PM<br>
                            <strong>Tempat:</strong> Studio Fotografi<br>
                            <strong>Catatan:</strong> Siapkan peralatan fotografi (kamera, tripod, dan lensa tambahan).
                        </li>
                    </ol>
                    <div class="text-center mt-3">
                        <img src="https://via.placeholder.com/300" alt="Foto Kegiatan"
                            class="img-fluid rounded shadow-sm">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-success">Edit Data</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Event 2 -->
    <div class="modal fade" id="eventModal2" tabindex="-1" aria-labelledby="eventModalLabel2" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="eventModalLabel2">
                        <i class="bi bi-film"></i> Detail Kegiatan: Pengambilan Video
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="mb-3">
                            <a href=""><button type="button" class="btn" style="background-color: #010101; color: white;">Tiktok</button></a>
                            <a href=""><button type="button" class="btn" style="background-color: #E4405F; color: white;">Instagram</button></a>
                            <a href=""><button type="button" class="btn" style="background-color: #1877F2; color: white;">Facebook</button></a>
                            <a href=""><button type="button" class="btn" style="background-color: #FF0000; color: white;">Youtube</button></a>
                            <a href=""><button type="button" class="btn" style="background-color: #0077B5; color: white;">LinkedIn</button></a>
                            <a href=""><button type="button" class="btn" style="background-color: #E60023; color: white;">Pinterest</button></a>
                            <a href=""><button type="button" class="btn" style="background-color: #FF0000; color: white;">Youtube</button></a>
                            <a href=""><button type="button" class="btn" style="background-color: #0077B5; color: white;">LinkedIn</button></a>
                            <a href=""><button type="button" class="btn mt-2" style="background-color: #E60023; color: white;">Pinterest</button></a>
                        </div>
                    </div>
                    <p class="mb-3">Detail kegiatan pada tanggal <strong>15 September 2024</strong>:</p>
                    <ol class="event-detail list-group list-group">
                        <li class="list-group-item">
                            <strong>Kegiatan:</strong> Pengambilan Video (Interview)<br>
                            <strong>Waktu:</strong> 09:00 AM - 11:00 AM<br>
                            <strong>Tempat:</strong> Studio 1<br>
                            <strong>Catatan:</strong> Siapkan peralatan videografi dan mikrofon untuk suara.
                        </li>
                        <div class="text-center mt-3">
                            <img src="https://via.placeholder.com/300" alt="Foto Kegiatan"
                                class="img-fluid rounded shadow-sm">
                        </div>
                        <li class="list-group-item mt-3">
                            <strong>Kegiatan:</strong> Pengambilan Video (B-roll)<br>
                            <strong>Waktu:</strong> 13:00 PM - 16:00 PM<br>
                            <strong>Tempat:</strong> Studio 2<br>
                            <strong>Catatan:</strong> Gunakan stabilizer untuk pengambilan gambar lebih halus.
                        </li>
                    </ol>
                    <div class="text-center mt-3">
                        <img src="https://via.placeholder.com/300" alt="Foto Kegiatan"
                            class="img-fluid rounded shadow-sm">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-success">Edit Data</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Event 3 -->
    <div class="modal fade" id="eventModal3" tabindex="-1" aria-labelledby="eventModalLabel3" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="eventModalLabel3">
                        <i class="bi bi-info-circle"></i> Detail Kegiatan: Pengambilan Informasi
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="mb-3">
                            <a href=""><button type="button" class="btn" style="background-color: #010101; color: white;">Tiktok</button></a>
                            <a href=""><button type="button" class="btn" style="background-color: #E4405F; color: white;">Instagram</button></a>
                            <a href=""><button type="button" class="btn" style="background-color: #1877F2; color: white;">Facebook</button></a>
                            <a href=""><button type="button" class="btn" style="background-color: #FF0000; color: white;">Youtube</button></a>
                            <a href=""><button type="button" class="btn" style="background-color: #0077B5; color: white;">LinkedIn</button></a>
                            <a href=""><button type="button" class="btn" style="background-color: #E60023; color: white;">Pinterest</button></a>
                            <a href=""><button type="button" class="btn" style="background-color: #FF0000; color: white;">Youtube</button></a>
                            <a href=""><button type="button" class="btn" style="background-color: #0077B5; color: white;">LinkedIn</button></a>
                            <a href=""><button type="button" class="btn mt-2" style="background-color: #E60023; color: white;">Pinterest</button></a>
                        </div>
                    </div>
                    <p class="mb-3">Detail kegiatan pada tanggal <strong>21 September 2024</strong>:</p>
                    <ol class="event-detail list-group list-group">
                        <li class="list-group-item">
                            <strong>Kegiatan:</strong> Pengambilan Foto<br>
                            <strong>Waktu:</strong> 08:00 AM - 10:00 AM<br>
                            <strong>Tempat:</strong> Studio 3<br>
                            <strong>Catatan:</strong> Siapkan peralatan fotografi.
                        </li>
                        <div class="text-center mt-3">
                            <img src="https://via.placeholder.com/300" alt="Foto Kegiatan"
                                class="img-fluid rounded shadow-sm">
                        </div>
                        <li class="list-group-item mt-3">
                            <strong>Kegiatan:</strong> Pengambilan Video<br>
                            <strong>Waktu:</strong> 11:00 AM - 14:00 PM<br>
                            <strong>Tempat:</strong> Studio 4<br>
                            <strong>Catatan:</strong> Periksa kualitas suara dan pencahayaan.
                        </li>
                        <div class="text-center mt-3">
                            <img src="https://via.placeholder.com/300" alt="Foto Kegiatan"
                                class="img-fluid rounded shadow-sm">
                        </div>
                        <li class="list-group-item mt-3">
                            <strong>Kegiatan:</strong> Pengambilan Informasi<br>
                            <strong>Waktu:</strong> 15:00 PM - 18:00 PM<br>
                            <strong>Tempat:</strong> Ruang Konferensi<br>
                            <strong>Catatan:</strong> Pastikan semua data pendukung siap.
                        </li>
                    </ol>
                    <div class="text-center mt-3">
                        <img src="https://via.placeholder.com/300" alt="Foto Kegiatan"
                            class="img-fluid rounded shadow-sm">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-success">Edit Data</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
</body>

</html>