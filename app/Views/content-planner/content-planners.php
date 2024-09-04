<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Content Planner</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <!-- Font Awesome for Icons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
  <!-- Bootstrap CSS via CDN -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />

  <style>
    body {
      background-color: #e0e0e0;
    }

    .card {
      background-color: #ffff;
      padding: 20px;
      border-radius: 30px;
      margin-bottom: 20px;
    }

    .card-content {
      padding: 15px;
      background-color: #87d5c8;
    }

    .container {
      margin-top: 20px;
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

    #upload {
      opacity: 0;
    }

    #upload-label {
      position: absolute;
      top: 50%;
      left: 1rem;
      transform: translateY(-50%);
    }

    .image-area {
      border: 2px dashed #87D5C8;
      padding: 1rem;
      position: relative;
    }

    .image-area::before {
      content: 'Uploaded image result';
      color: #87D5C8;
      font-weight: bold;
      text-transform: uppercase;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      font-size: 0.8rem;
      z-index: 1;
    }

    .image-area img {
      z-index: 2;
      position: relative;
      color: #87D5C8;
    }


    .date {
      font-weight: bold;
      margin-bottom: 20px;
    }

    .calendar-icons {
      display: flex;
      justify-content: flex-end;
    }

    .calendar-icons i {
      margin-left: 10px;
      cursor: pointer;
    }

    .form-control,
    .btn {
      border-radius: 0.25rem;
      /* Bootstrap default border-radius */
    }
  </style>
</head>

<body class="card-content">
  <!-- start text header and line -->
  <div class="container">
    <div class="header">
      <h2>Content Planner</h2>
      <hr class="line-separator" />
    </div>
    <!-- end text header and line -->

    <div class="card">
      <!-- Info Date -->
      <div class="mb-4 left-3">
        <div class="d-flex justify-content-between align-items-center">
          <h5 id="dateDisplay" class="m-0">10 September 2024</h5>
          <!-- Icon Input Date -->
          <div class="calendar-controls d-flex align-items-center">
            <input id="dateInput" type="date" class="ms-3">
          </div>
        </div>
      </div>


      <form action="<?= base_url('/content-planner/add'); ?>" method="post" enctype="multipart/form-data">
        <div class="row">
          <!-- Upload Image -->
          <div class="col-md-5 mb-4">
            <!-- Upload image input-->
            <label for="">Upload Image</label>
            <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
              <input id="upload" type="file" onchange="readURL(this);" class="form-control border-0">
              <label id="upload-label" for="upload" class="font-weight-light text-muted">Choose file</label>
              <div class="input-group-append">
                <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i
                    class="fa fa-cloud-upload mr-2 text-muted"></i><small
                    class="text-uppercase font-weight-bold text-muted">Choose file</small></label>
              </div>
            </div>

            <!-- Uploaded image area-->
            <p class="text-center mt-4">The image uploaded will be rendered inside the box below.</p>
            <div class="image-area mt-4"><img id="imageResult" src="#" alt=""
                class="img-fluid rounded shadow-sm mx-auto d-block"></div>

          </div>

          <!-- Form -->
          <div class="col-md-7">
            <div class="row">
              <!-- Social Media -->
              <div class="form-group">
                <label for="caption">Social Media</label>
                <select class="form-control" name="sosial_media" required>
                  <?php foreach ($sosmeds as $sosmed): ?>
                    <option value="<?= $sosmed['nama_sosial_media'] ?>"><?= $sosmed['nama_sosial_media'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>

              <!-- Content Type -->
              <div class="col-md-4 mb-2">
                <div class="form-group">
                  <label for="content-type">Content Type</label>
                  <select class="form-control" name="content_type" required>
                    <?php foreach ($c_types as $c_type): ?>
                      <option value="<?= $c_type['nama_content_type'] ?>"><?= $c_type['nama_content_type'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>

              <!-- Content Pillar -->
              <div class="col-md-4 mb-2">
                <div class="form-group">
                  <label for="content-pillar">Content Pillar</label>
                  <select class="form-control" name="content_pillar" required>
                    <?php foreach ($c_pillars as $c_pillar): ?>
                      <option value="<?= $c_pillar['nama_content_pillar'] ?>"><?= $c_pillar['nama_content_pillar'] ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>

              <!-- Status -->
              <div class="col-md-4 mb-2">
                <div class="form-group">
                  <label for="status">Status</label>
                  <select class="form-control" name="status" required>
                    <?php foreach ($statuses as $status): ?>
                      <option value="<?= $status['nama_status'] ?>"><?= $status['nama_status'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
            </div>

            <!-- Caption -->
            <div class="form-group">
              <label for="caption">Caption</label>
              <textarea class="form-control" rows="5" placeholder="Caption" name="caption"></textarea>
            </div>

            <!-- CTA Link -->
            <div class="form-group">
              <label for="CTA">CTA / Link</label>
              <textarea type="text" class="form-control" placeholder="Cta / Link" name="cta_link"></textarea>
            </div>

            <!-- Hashtag -->
            <div class="form-group">
              <label for="Hashtag">Hashtag</label>
              <textarea type="text" class="form-control" placeholder="Hashtag" name="hashtag"></textarea>
            </div>

            <!-- Button Add Content -->
            <div class="d-flex justify-content-center mt-4">
              <button type="submit" class="btn btn-success" style="background-color: #87D5C8; border-color: #87D5C8;">
                Add Content
              </button>
            </div>

      </form>
    </div>
  </div>
  </div>
  </div>

  <!-- jQuery via CDN -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <!-- Bootstrap Bundle with Popper via CDN -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

  <!-- Upload Image with Preview -->
  <script>
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
          $('#imageResult').attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
      }
    }

    $(function () {
      $('#upload').on('change', function () {
        readURL(this);
      });
    });

    var input = document.getElementById('upload');
    var infoArea = document.getElementById('upload-label');

    input.addEventListener('change', showFileName);
    function showFileName(event) {
      var input = event.srcElement;
      var fileName = input.files[0].name;
      infoArea.textContent = 'File name: ' + fileName;
    }
  </script>

  <!-- Set Date -->
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      var dateInput = document.getElementById('dateInput');
      var dateDisplay = document.getElementById('dateDisplay');

      dateInput.addEventListener('change', function () {
        var selectedDate = new Date(dateInput.value);
        var options = { day: '2-digit', month: 'long', year: 'numeric' };
        var formattedDate = selectedDate.toLocaleDateString('id-ID', options); // Format tanggal sesuai lokal ID

        dateDisplay.textContent = formattedDate;
      });
    });
  </script>


</body>

</html>