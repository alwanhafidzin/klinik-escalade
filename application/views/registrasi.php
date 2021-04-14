<!DOCTYPE html>
<html>

<head>
  <!-- <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Escalade</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="short icon" href="<?php echo base_url() ?>assets/images/logo.png" type="image/png" />
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <style>
    h1 {
      text-align: center;
    }

    h5 {
      font-family: Arial, Helvetica, sans-serif;
    }

    .container {
      width: 700px;
      margin: auto;
      padding-top: 0px;
    }

    @media (min-width: 992px) {
      .container {
        padding-top: 60px;
      }
    }

    .te {
      text-align: center;
    }

    body {
      /*      background: url(<?php echo base_url() ?>assets/baru/images/bg.jpg);
      background-repeat: no-repeat;
      background-size: cover;*/
    }

    .wow {
      background: #E6E6E6;
      text-align: center;
      border: 1px solid #fff;
      border-radius: 0px;
      padding: 30px;
      color: black;
      border-radius: 1.5em;
    }

    .sandi {
      height: 5px;
    }
  </style>

  <script>
    $(function() {
      $("#date").datepicker();
    });
  </script>

<body>

  <div class="container">

    <div id="login-form">
      <?php echo form_open('Login/registrasi') ?>
      <div class="col-md-12">
        <br><br>
        <div class="wow">
          <div class="te">
            <div class="form-group">
              <img style="" id="shaniku" src="<?php echo base_url() ?>assets/images/logo.png" width="80" height="80" alt="..." position="center">
              <h5><b>Halo, Salam Kenal</b></h5>
            </div>
          </div>

          <div class="form-group">
            <hr />
          </div>

          <div class="col-lg-6">
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                <input type="text" name="nama_depan" class="form-control" placeholder="Nama Depan" maxlength="50" required="required" />
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                <input type="text" name="nama_belakang" class="form-control" placeholder="Nama Belakang" maxlength="50" required="required" />
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                <input type="text" name="tanggal_lahir" id="date" class="form-control" placeholder="Tanggal Lahir" maxlength="50" required="required" />
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><span class="fa fa-venus-mars"></span></span>
                <select class="form-control" name="jenis_kelamin" required data-required-msg="Address is required">
                  <option value="" disabled selected style="display: none;">Jenis Kelamin</option>
                  <option value="Laki-Laki" id="Laki-Laki">Laki-Laki</option>
                  <option value="Perempuan" id="Perempuan">Perempuan</option>
                </select>
                <span data-for="status" class="k-invalid-msg"></span>
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span>
                <input type="text" name="alamat" class="form-control" placeholder="Alamat" maxlength="50" required="required" />
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                <input type="email" name="email" class="form-control" placeholder="Email" maxlength="40" required="required" />
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
                <input type="text" name="no_hp" class="form-control" placeholder="No. Handphone" maxlength="40" required="required" />
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                <input type="password" name="password" class="form-control" placeholder="Password" maxlength="15" required="required" />
              </div>
            </div>
          </div>

          <div class="form-group">
            <input type="hidden" name="level" class="form-control" value="Pasien" />
            <input type="hidden" name="hubungan" class="form-control" value="Anda" />
          </div>

          <button type="submit" class="btn btn-block btn-primary" name="signup">Register</button>


        </div>


      </div>
      <?php echo form_close() ?>
    </div>

  </div>

</body>

</html>