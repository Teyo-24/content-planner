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
            padding: 1.5rem;
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
            width: 100px;
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

        .table-bordered th:first-child {
            border-left: none !important;
        }

        .table-bordered th:last-child {
            border-right: none !important;
        }

        .event-rect {
            background-color: #007bff;
            color: white;
            padding: 5px;
            border-radius: 5px;
            text-align: center;
            position: absolute;
            width: 40%;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            cursor: pointer;
        }

        @media (max-width: 768px) {

            .table-bordered th,
            .table-bordered td {
                width: 50px;
                height: 50px;
            }

            .event-rect {
                width: 80%;
            }
        }

        @media (max-width: 576px) {
            .calendar-controls {
                flex-direction: column;
            }

            .calendar-controls input,
            .calendar-controls button {
                margin-top: 0.5rem;
            }
        }
    </style>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Content Calendar</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="ms-auto pe-3">
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

    <!-- callender -->
    <div class="container mt-4">
        <h3>Content Calendar</h3>
        <hr>
        <div class="calendar-container mt-4">
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <h5 class="m-0" id="dataDisplay"></h5>
                <div class="calendar-controls d-flex align-items-center flex-wrap">
                    <button class="btn btn-light me-3 mb-2 mb-md-0" id="prevMonth">
                        <i class="bi bi-chevron-left"></i>
                    </button>
                    <button class="btn btn-light mb-2 mb-md-0" id="nextMonth">
                        <i class="bi bi-chevron-right"></i>
                    </button>
                    <input type="datetime-local" class="ms-3 mb-2 mb-md-0">
                    <a href="/content-planner">
                        <button type="button" class="btn btn-success ms-3 mt-2 mt-md-0">Add Data +</button>
                    </a>
                </div>
            </div>

            <div class="calendar-header mt-2"></div>
            <div class="table-responsive">
                <table class="table table-bordered text-center mt-4">
                    <thead>
                        <tr id="daysRow">
                            <!-- Hari (Minggu-Sabtu) -->
                        </tr>
                    </thead>
                    <tbody class="text-end" id="datesBody">
                        <!-- Tanggal (Sesuai Bulan) -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Pop Up -->
    <div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eventModalLabel">Detail Content Plan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Detail kegiatan pada tanggal [Tanggal]:</p>
                    <ul>
                        <li>Sosial Media: [Data]</li>
                        <li>Content Type: [Data]</li>
                        <li>Content Pillar: [Data]</li>
                        <li>Status: [Data]</li>
                        <li>Caption: [Data]</li>
                        <li>CTA/Link: [Data]</li>
                        <li>Hashtag: [Data]</li>
                    </ul>
                    <div class="text-center">
                        <img src="https://via.placeholder.com/150" alt="Foto Kegiatan" class="img-fluid">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>

    <script>
        // Mendapatkan data dari PHP (eventsByDate dan socialMediaColors) sebagai objek JavaScript
        var eventsByDate = <?= json_encode($eventsByDate) ?>;
        var socialMediaColors = <?= json_encode($socialMediaColors) ?>;

        // Mendapatkan elemen untuk baris hari, tubuh tabel, dan tampilan bulan
        var daysRow = document.getElementById('daysRow');
        var datesBody = document.getElementById('datesBody');

        // Array nama hari dalam Bahasa Indonesia
        var dayNames = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

        // Menampilkan hari dari Minggu hingga Sabtu di baris pertama
        dayNames.forEach(function(day) {
            var th = document.createElement('th');
            th.textContent = day;
            daysRow.appendChild(th);
        });

        // Mendapatkan bulan dan tahun saat ini
        var currentDate = new Date();
        var options = {
            year: 'numeric',
            month: 'long'
        };

        // Mendapatkan tanggal hari ini
        var today = new Date();

        // Fungsi untuk memperbarui tampilan bulan dan tahun
        function updateDateDisplay(date) {
            document.getElementById('dataDisplay').textContent = date.toLocaleDateString('id-ID', options);
        }

        // Fungsi untuk memperbarui tampilan tanggal sesuai bulan
        function updateCalendar(date) {
            // Kosongkan isi datesBody
            datesBody.innerHTML = '';

            // Mendapatkan jumlah hari dalam bulan yang sedang ditampilkan
            var year = date.getFullYear();
            var month = date.getMonth();
            var daysInMonth = new Date(year, month + 1, 0).getDate();

            // Mendapatkan hari pertama dalam bulan ini (0 = Minggu, 1 = Senin, ..., 6 = Sabtu)
            var firstDay = new Date(year, month, 1).getDay();

            // Mengisi tanggal-tanggal sesuai dengan minggunya
            var currentDay = 1;
            var tr = document.createElement('tr'); // Buat baris baru untuk minggu pertama

            // Isi baris pertama dengan tanggal yang tepat
            for (var i = 0; i < 7; i++) {
                var td = document.createElement('td');

                if (i >= firstDay && currentDay <= daysInMonth) {
                    var span = document.createElement('span');
                    span.textContent = currentDay;
                    span.style.display = 'inline-block';
                    span.style.padding = '5px';
                    span.style.width = '33px';
                    span.style.height = '33px';
                    span.style.lineHeight = '20px';
                    span.style.textAlign = 'center';
                    span.style.borderRadius = '50%';

                    // Tanggal dalam format YYYY-MM-DD
                    var currentDateStr = year + '-' + String(month + 1).padStart(2, '0') + '-' + String(currentDay).padStart(2, '0');

                    // Cek apakah ada event pada tanggal ini
                    if (eventsByDate[currentDateStr]) {
                        eventsByDate[currentDateStr].forEach(function(event) {
                            var eventDiv = document.createElement('div');
                            eventDiv.className = 'event-rect';
                            eventDiv.setAttribute('data-bs-toggle', 'modal');
                            eventDiv.setAttribute('data-bs-target', '#eventModal');
                            eventDiv.textContent = event.content_pillar;

                            // Set background color berdasarkan sosial media
                            var color = socialMediaColors[event.sosial_media];
                            if (color) {
                                eventDiv.style.backgroundColor = color;
                            }

                            // Menambahkan event listener untuk mengisi data modal ketika diklik
                            eventDiv.addEventListener('click', function() {
                                fillEventModal(currentDateStr, event);
                            });

                            td.appendChild(eventDiv);
                        });
                    }

                    // Cek apakah tanggal ini adalah hari ini
                    if (year === today.getFullYear() && month === today.getMonth() && currentDay === today.getDate()) {
                        span.style.backgroundColor = '#87D5C8';
                    }

                    td.appendChild(span);
                    currentDay++;
                }

                tr.appendChild(td);
            }

            datesBody.appendChild(tr);

            // Isi baris berikutnya hingga semua tanggal habis
            while (currentDay <= daysInMonth) {
                tr = document.createElement('tr');
                for (var i = 0; i < 7; i++) {
                    var td = document.createElement('td');
                    if (currentDay <= daysInMonth) {
                        var span = document.createElement('span');
                        span.textContent = currentDay;
                        span.style.display = 'inline-block';
                        span.style.padding = '5px';
                        span.style.width = '33px';
                        span.style.height = '33px';
                        span.style.lineHeight = '20px';
                        span.style.textAlign = 'center';
                        span.style.borderRadius = '50%';

                        // Tanggal dalam format YYYY-MM-DD
                        var currentDateStr = year + '-' + String(month + 1).padStart(2, '0') + '-' + String(currentDay).padStart(2, '0');

                        // Cek apakah ada event pada tanggal ini
                        if (eventsByDate[currentDateStr]) {
                            eventsByDate[currentDateStr].forEach(function(event) {
                                var eventDiv = document.createElement('div');
                                eventDiv.className = 'event-rect';
                                eventDiv.setAttribute('data-bs-toggle', 'modal');
                                eventDiv.setAttribute('data-bs-target', '#eventModal');
                                eventDiv.textContent = event.content_pillar;

                                // Set background color berdasarkan sosial media
                                var color = socialMediaColors[event.sosial_media];
                                if (color) {
                                    eventDiv.style.backgroundColor = color;
                                }

                                // Menambahkan event listener untuk mengisi data modal ketika diklik
                                eventDiv.addEventListener('click', function() {
                                    fillEventModal(currentDateStr, event);
                                });

                                td.appendChild(eventDiv);
                            });
                        }

                        // Cek apakah tanggal ini adalah hari ini
                        if (year === today.getFullYear() && month === today.getMonth() && currentDay === today.getDate()) {
                            span.style.backgroundColor = '#87D5C8';
                        }

                        td.appendChild(span);
                        currentDay++;
                    }
                    tr.appendChild(td);
                }
                datesBody.appendChild(tr);
            }
        }

        function fillEventModal(dateStr, event) {
            // Ubah format dateStr menjadi [Nama Hari], [Angka Tanggal] [Nama Bulan] [Angka Tahun]
            var date = new Date(dateStr);
            var options = {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            var formattedDateStr = date.toLocaleDateString('id-ID', options);

            // Mengisi elemen modal dengan data
            document.querySelector('#eventModal .modal-body p').textContent = 'Detail Content Plan pada ' + formattedDateStr + ':';
            document.querySelector('#eventModal .modal-body ul').innerHTML = `
        <li>Sosial Media: ${event.sosial_media}</li>
        <li>Content Pillar: ${event.content_pillar}</li>
        <!-- Tambahkan data lainnya sesuai kebutuhan -->
    `;
            // Misalnya, jika Anda memiliki gambar terkait event
            document.querySelector('#eventModal .modal-body img').src = event.image_url || 'https://via.placeholder.com/150';
        }

        // Menampilkan bulan dan kalender saat ini pada tampilan pertama
        updateDateDisplay(currentDate);
        updateCalendar(currentDate);

        // Event listener untuk tombol "chevron-left"
        document.getElementById('prevMonth').addEventListener('click', function() {
            currentDate.setMonth(currentDate.getMonth() - 1);
            updateDateDisplay(currentDate);
            updateCalendar(currentDate);
        });

        // Event listener untuk tombol "chevron-right"
        document.getElementById('nextMonth').addEventListener('click', function() {
            currentDate.setMonth(currentDate.getMonth() + 1);
            updateDateDisplay(currentDate);
            updateCalendar(currentDate);
        });
    </script>
</body>

</html>