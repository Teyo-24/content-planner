<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Konten</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        table {
            width: 100%;
            margin-bottom: 20px;
        }

        td[contenteditable="true"]:focus {
            background-color: #e9ecef;
        }
    </style>
</head>

<body>

    <div class="container mt-4">
        <h1>Kelola Konten</h1>

        <!-- Tabel Sosial Media -->
        <h3>Sosial Media</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Sosial Media</th>
                    <th>Warna Sosial Media</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sosmeds as $item): ?>
                    <tr>
                        <td contenteditable="true" data-id="<?= $item['id_sosial_media'] ?>" data-column="nama_sosial_media"><?= esc($item['nama_sosial_media']) ?></td>
                        <td contenteditable="true" data-id="<?= $item['id_sosial_media'] ?>" data-column="warna_sosial_media"><?= esc($item['warna_sosial_media']) ?>
                            <div style="display: flex; align-items: center;">
                                <div style="width: 20px; height: 20px; background-color: <?= esc($item['warna_sosial_media']) ?>; border: 1px solid #000; margin-right: 5px;"></div>
                            </div>
                        </td>
                        <td><button class="btn btn-danger btn-sm delete-sosial-media" data-id="<?= $item['id_sosial_media'] ?>">Delete</button></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td><input type="text" id="newNamaSosialMedia" class="form-control" placeholder="Nama Sosial Media"></td>
                    <td><input type="color" id="newWarnaSosialMedia" class="form-control" value="#000000"></td>
                    <td><button class="btn btn-primary btn-sm" id="addSosialMedia">Add Sosial Media</button></td>
                </tr>
            </tbody>
        </table>

        <!-- Tabel Content Type -->
        <h3>Content Type</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Content Type</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($c_types as $item): ?>
                    <tr>
                        <td contenteditable="true" data-id="<?= $item['id_content_type'] ?>" data-column="nama_content_type"><?= esc($item['nama_content_type']) ?></td>
                        <td><button class="btn btn-danger btn-sm delete-content-type" data-id="<?= $item['id_content_type'] ?>">Delete</button></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td><input type="text" id="newNamaContentType" class="form-control" placeholder="Nama Content Type"></td>
                    <td><button class="btn btn-primary btn-sm" id="addContentType">Add Content Type</button></td>
                </tr>
            </tbody>
        </table>

        <!-- Tabel Content Pillar -->
        <h3>Content Pillar</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Content Pillar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($c_pillars as $item): ?>
                    <tr>
                        <td contenteditable="true" data-id="<?= $item['id_content_pillar'] ?>" data-column="nama_content_pillar"><?= esc($item['nama_content_pillar']) ?></td>
                        <td><button class="btn btn-danger btn-sm delete-content-pillar" data-id="<?= $item['id_content_pillar'] ?>">Delete</button></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td><input type="text" id="newNamaContentPillar" class="form-control" placeholder="Nama Content Pillar"></td>
                    <td><button class="btn btn-primary btn-sm" id="addContentPillar">Add Content Pillar</button></td>
                </tr>
            </tbody>
        </table>

        <!-- Tabel Status -->
        <h3>Status</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($statuses as $item): ?>
                    <tr>
                        <td contenteditable="true" data-id="<?= $item['id_status'] ?>" data-column="nama_status"><?= esc($item['nama_status']) ?></td>
                        <td><button class="btn btn-danger btn-sm delete-status" data-id="<?= $item['id_status'] ?>">Delete</button></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td><input type="text" id="newNamaStatus" class="form-control" placeholder="Nama Status"></td>
                    <td><button class="btn btn-primary btn-sm" id="addStatus">Add Status</button></td>
                </tr>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Fungsi untuk mengirim permintaan update
            function updateData(id, column, value, url) {
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: {
                        id: id,
                        column: column,
                        value: value
                    },
                    success: function(response) {
                        // Optional: Tampilkan notifikasi sukses
                        // alert('Data berhasil diperbarui');
                    },
                    error: function() {
                        alert('Gagal memperbarui data');
                    }
                });
            }

            // Handle edit langsung pada tabel
            $('td[contenteditable="true"]').on('blur', function() {
                var id = $(this).data('id');
                var column = $(this).data('column');
                var value = $(this).text().trim();
                var table = $(this).closest('table').attr('id');

                var url = '';
                if ($(this).closest('table').find('th').first().text().includes('Sosial Media')) {
                    url = '<?= base_url('/update_sosial_media') ?>';
                } else if ($(this).closest('table').find('th').first().text().includes('Content Type')) {
                    url = '<?= base_url('/update_content_type') ?>';
                } else if ($(this).closest('table').find('th').first().text().includes('Content Pillar')) {
                    url = '<?= base_url('/update_content_pillar') ?>';
                } else if ($(this).closest('table').find('th').first().text().includes('Status')) {
                    url = '<?= base_url('/update_status') ?>';
                }

                updateData(id, column, value, url);
            });

            // Fungsi untuk menghapus data
            function deleteData(id, url) {
                if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                    $.ajax({
                        url: url,
                        method: 'POST',
                        data: {
                            id: id
                        },
                        success: function(response) {
                            location.reload();
                        },
                        error: function() {
                            alert('Gagal menghapus data');
                        }
                    });
                }
            }

            // Handle delete Sosial Media
            $('.delete-sosial-media').click(function() {
                var id = $(this).data('id');
                var url = '<?= base_url('/delete_sosial_media') ?>';
                deleteData(id, url);
            });

            // Handle delete Content Type
            $('.delete-content-type').click(function() {
                var id = $(this).data('id');
                var url = '<?= base_url('/delete_content_type') ?>';
                deleteData(id, url);
            });

            // Handle delete Content Pillar
            $('.delete-content-pillar').click(function() {
                var id = $(this).data('id');
                var url = '<?= base_url('/delete_content_pillar') ?>';
                deleteData(id, url);
            });

            // Handle delete Status
            $('.delete-status').click(function() {
                var id = $(this).data('id');
                var url = '<?= base_url('/delete_status') ?>';
                deleteData(id, url);
            });

            // Fungsi untuk menambah data baru
            function addData(data, url) {
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: data,
                    success: function(response) {
                        location.reload();
                    },
                    error: function() {
                        alert('Gagal menambah data');
                    }
                });
            }

            // Handle add Sosial Media
            $('#addSosialMedia').click(function() {
                var namaSosialMedia = $('#newNamaSosialMedia').val().trim();
                var warnaSosialMedia = $('#newWarnaSosialMedia').val();

                if (namaSosialMedia === '') {
                    alert('Nama Sosial Media tidak boleh kosong');
                    return;
                }

                addData({
                    nama_sosial_media: namaSosialMedia,
                    warna_sosial_media: warnaSosialMedia
                }, '<?= base_url('/add_sosial_media') ?>');
            });

            // Handle add Content Type
            $('#addContentType').click(function() {
                var namaContentType = $('#newNamaContentType').val().trim();

                if (namaContentType === '') {
                    alert('Nama Content Type tidak boleh kosong');
                    return;
                }

                addData({
                    nama_content_type: namaContentType
                }, '<?= base_url('/add_content_type') ?>');
            });

            // Handle add Content Pillar
            $('#addContentPillar').click(function() {
                var namaContentPillar = $('#newNamaContentPillar').val().trim();

                if (namaContentPillar === '') {
                    alert('Nama Content Pillar tidak boleh kosong');
                    return;
                }

                addData({
                    nama_content_pillar: namaContentPillar
                }, '<?= base_url('/add_content_pillar') ?>');
            });

            // Handle add Status
            $('#addStatus').click(function() {
                var namaStatus = $('#newNamaStatus').val().trim();

                if (namaStatus === '') {
                    alert('Nama Status tidak boleh kosong');
                    return;
                }

                addData({
                    nama_status: namaStatus
                }, '<?= base_url('/add_status') ?>');
            });
        });
    </script>

</body>

</html>