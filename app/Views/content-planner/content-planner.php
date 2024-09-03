<!-- views/content_form.php -->
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Content Planner</title>
    <!-- Tambahkan link CSS jika diperlukan -->
</head>

<body>
    <h1>Input Data Content Planner</h1>

    <!-- Form Input -->
    <form action="<?= base_url('/content-planner/add'); ?>" method="post" enctype="multipart/form-data">
        <!-- File Content -->
        <div>
            <label for="file_content">File Content:</label>
            <input type="file" name="file_content" id="file_content" required>
        </div>

        <!-- Sosial Media -->
        <div>
            <label for="sosial_media">Sosial Media:</label>
            <select name="sosial_media" id="sosial_media" required>
                <?php foreach ($sosmeds as $sosmed) : ?>
                    <option value="<?= $sosmed['nama_sosial_media'] ?>"><?= $sosmed['nama_sosial_media'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Content Type -->
        <div>
            <label for="content_type">Content Type:</label>
            <select name="content_type" id="content_type" required>
                <?php foreach ($c_types as $c_type) : ?>
                    <option value="<?= $c_type['nama_content_type'] ?>"><?= $c_type['nama_content_type'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Content Pillar -->
        <div>
            <label for="content_pillar">Content Pillar:</label>
            <select name="content_pillar" id="content_pillar" required>
                <?php foreach ($c_pillars as $c_pillar) : ?>
                    <option value="<?= $c_pillar['nama_content_pillar'] ?>"><?= $c_pillar['nama_content_pillar'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Status -->
        <div>
            <label for="status">Status:</label>
            <select name="status" id="status" required>
                <?php foreach ($statuses as $status) : ?>
                    <option value="<?= $status['nama_status'] ?>"><?= $status['nama_status'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Caption -->
        <div>
            <label for="caption">Caption:</label>
            <input type="text" name="caption" id="caption" required>
        </div>

        <!-- CTA/Link -->
        <div>
            <label for="cta">CTA/Link:</label>
            <input type="text" name="cta_link" id="cta_link" required>
        </div>

        <!-- Hashtag -->
        <div>
            <label for="hashtag">Hashtag:</label>
            <input type="text" name="hashtag" id="hashtag" required>
        </div>

        <!-- Tanggal -->
        <div>
            <label for="created_at">Tanggal:</label>
            <input type="date" name="created_at" id="created_at" required>
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
</body>

</html>