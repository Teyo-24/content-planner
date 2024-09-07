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
                            <li><a class="dropdown-item" onclick="changeData('instagram')">Instagram</a></li>
                            <li><a class="dropdown-item" onclick="changeData('tiktok')">Tiktok</a></li>
                            <li><a class="dropdown-item" onclick="changeData('youtube')">Youtube</a></li>
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
            <div class="table-responsive" id="data-table">
                <!-- Tabel akan di-update secara dinamis di sini -->
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
                    <tbody id="data-body">
                        <!-- Data akan diisi di sini -->
                    </tbody>
                </table>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="new-trend" placeholder="Nama Trend">
                    <button class="btn btn-primary" type="button" id="add-data-btn">Add Data</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        document.getElementById('add-data-btn').addEventListener('click', function() {
            const trendName = document.getElementById('new-trend').value;

            if (trendName) {
                fetch('<?= base_url('trend/add') ?>', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        body: new URLSearchParams({
                            trend_name: trendName,
                            media: currentMedia,
                            year: currentYear
                        })
                    }).then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            // Cari dan hapus baris "No data available for this year." jika ada
                            const noDataRow = document.querySelector('#data-body tr td[colspan="14"]');
                            if (noDataRow) {
                                noDataRow.parentElement.remove();
                            }

                            // Tambahkan baris baru ke tabel tanpa refresh seluruh halaman
                            const newRow = document.createElement('tr');
                            newRow.innerHTML = `
                    <td class="fw-bold" contenteditable="true">${data.data.nama_trend}</td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td class="text-center">
                        <button class="btn btn-danger btn-sm delete-content-type" style="width: 100%; min-width: 80px;">Delete</button>
                    </td>
                `;
                            document.getElementById('data-body').appendChild(newRow);

                            // Kosongkan input setelah menambah data
                            document.getElementById('new-trend').value = '';
                        } else {
                            alert('Failed to add trend. Please try again.');
                        }
                    });
            } else {
                alert('Please enter a trend name.');
            }
        });

        document.addEventListener('click', function(event) {
            if (event.target.classList.contains('delete-content-type')) {
                const row = event.target.closest('tr');
                const trendName = row.querySelector('td').textContent.trim();

                if (confirm(`Are you sure you want to delete the trend "${trendName}"?`)) {
                    deleteTrend(trendName, row);
                }
            }
        });

        document.querySelector('#data-body').addEventListener('blur', function(event) {
            if (event.target.hasAttribute('contenteditable')) {
                const row = event.target.closest('tr');
                const trendName = row.querySelector('td').textContent.trim();
                const monthData = Array.from(row.querySelectorAll('td[contenteditable]'))
                    .map(cell => cell.textContent.trim());

                updateTrend(trendName, monthData);
            }
        }, true);

        function updateTrend(trendName, monthData) {
            fetch('<?= base_url('trend/update') ?>', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: new URLSearchParams({
                        trend_name: trendName,
                        media: currentMedia,
                        year: currentYear,
                        januari: monthData[1] || null,
                        februari: monthData[2] || null,
                        maret: monthData[3] || null,
                        april: monthData[4] || null,
                        mei: monthData[5] || null,
                        juni: monthData[6] || null,
                        juli: monthData[7] || null,
                        agustus: monthData[8] || null,
                        september: monthData[9] || null,
                        oktober: monthData[10] || null,
                        november: monthData[11] || null,
                        desember: monthData[12] || null
                    })
                }).then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        // alert('Trend updated successfully!');
                    } else {
                        alert('Failed to update trend. Please try again.');
                    }
                });
        }

        function deleteTrend(trendName, row) {
            fetch('<?= base_url('trend/delete') ?>', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: new URLSearchParams({
                        trend_name: trendName,
                        media: currentMedia,
                        year: currentYear
                    })
                }).then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        row.remove();
                    } else {
                        alert('Failed to delete trend. Please try again.');
                    }
                });
        }

        // Menyimpan tahun saat ini
        let currentYear = new Date().getFullYear();
        let currentMedia = 'instagram'; // Menyimpan media sosial saat ini

        const dataSources = {
            instagram: <?php echo json_encode($igMetrics); ?>,
            tiktok: <?php echo json_encode($ttMetrics); ?>,
            youtube: <?php echo json_encode($ytMetrics); ?>
        };

        function changeData(media, year = currentYear) {
            const dataBody = document.getElementById('data-body');
            dataBody.innerHTML = '';

            // Simpan media yang dipilih
            currentMedia = media;

            // Update teks h5 sesuai dengan pilihan pengguna
            document.querySelector('.textcontent h5').innerText = capitalizeFirstLetter(media);

            // Filter data berdasarkan tahun yang dipilih
            const selectedData = dataSources[media].filter(item => item.created_at == year);

            if (selectedData.length === 0) {
                dataBody.innerHTML = '<tr><td colspan="14" class="text-center">No data available for this year.</td></tr>';
            } else {
                selectedData.forEach(item => {
                    const row = document.createElement('tr');

                    row.innerHTML = `
                    <td class="fw-bold" contenteditable="true">${item.nama_trend || ''}</td>
                    <td contenteditable="true">${item.januari || ''}</td>
                    <td contenteditable="true">${item.februari || ''}</td>
                    <td contenteditable="true">${item.maret || ''}</td>
                    <td contenteditable="true">${item.april || ''}</td>
                    <td contenteditable="true">${item.mei || ''}</td>
                    <td contenteditable="true">${item.juni || ''}</td>
                    <td contenteditable="true">${item.juli || ''}</td>
                    <td contenteditable="true">${item.agustus || ''}</td>
                    <td contenteditable="true">${item.september || ''}</td>
                    <td contenteditable="true">${item.oktober || ''}</td>
                    <td contenteditable="true">${item.november || ''}</td>
                    <td contenteditable="true">${item.desember || ''}</td>
                    <td class="text-center">
                        <button class="btn btn-danger btn-sm delete-content-type" style="width: 100%; min-width: 80px;">Delete</button>
                    </td>
                `;

                    dataBody.appendChild(row);
                });
            }
        }

        function updateYear(increment) {
            currentYear += increment;
            document.querySelector('h4').innerText = currentYear; // Update tampilan tahun
            changeData(currentMedia, currentYear); // Refresh data untuk tahun baru
        }

        // Capitalize first letter of media name
        function capitalizeFirstLetter(string) {
            return string.charAt(0).toUpperCase() + string.slice(1);
        }

        // Event listener untuk tombol chevron
        document.getElementById('prevMonth').addEventListener('click', function() {
            updateYear(-1);
        });

        document.getElementById('nextMonth').addEventListener('click', function() {
            updateYear(1);
        });

        // Event listener untuk yearPicker
        document.getElementById('yearPicker').addEventListener('change', function() {
            const selectedYear = parseInt(this.value);
            if (selectedYear >= 1900 && selectedYear <= 2100) {
                currentYear = selectedYear;
                document.querySelector('h4').innerText = currentYear; // Update tampilan tahun
                changeData(currentMedia, currentYear); // Refresh data untuk tahun baru
            } else {
                alert('Please enter a valid year between 1900 and 2100.');
            }
        });

        // Load default data (Instagram)
        window.onload = function() {
            changeData('instagram');
        };
    </script>

</body>

</html>