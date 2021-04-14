<!DOCTYPE html>
<html>
<head>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="short icon" href="<?php echo base_url()?>assets/images/logo.png" type="image/png" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <!-- <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Escalade</title>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style.css" type="text/css" />
  <script>
    $(document).ready(function(){
      $('.place-holder').placeHolder();
    });
  </script>
</head>

<style>
  .white{
    background-color: white;
    border-radius: 10px;
    color: black;
    border: 1px solid black;
    padding: 16px;
  }
  h1{
    text-align: center;
  }

  h5{
    font-family: Arial, Helvetica, sans-serif; 
  }
  .container{
    width: 400px;
    margin: auto;
  }
  .te{
    text-align: center;
  }
  body{
/*    background: url(<?php echo base_url() ?>assets/baru/images/bg.jpg);
    background-repeat: no-repeat;
    background-size: cover;*/
  }

  .wow{
    background: #E6E6E6;
    text-align: center;
    border: 1px solid #fff;
    border-radius: 0px;
    padding: 30px;
    color: black;
    border-radius: 1.5em;
    box-shadow: 0px 11px 35px 2px rgba(0,0,0,0.20);
  }
  .sandi{
    height: 5px;
  }

</style>

<script type="text/javascript">
 function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

function myFunction_2() {
  var x = document.getElementById("myInput_2");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

<body>
  <div class="container">

    <div id="login-form">
      <br>
      <br>
      <div class="wow"> 
        <div class="te">
          <div class="form-group">
            <img style="" src="<?php echo base_url()?>assets/images/logo.png" width="80" height="80" position="center">
            <h5><b>Ubah Kata Sandi</b></h5>
          </div>
        </div>
        <p style=" color: grey;">Jangan khawatir, silahkan pilih salah satu detail kontak dibawah untuk melakukan reset Kata Sandi.</p>
        <br>

        <button class="btn btn-block white" onclick="location.href ='<?php echo base_url('Login/lupa_pass_hp');?>'">
          <table>
            <tr>
              <td width="100"><i class="fa fa-mobile-phone" style="font-size:50px"></i></td>
              <td></td>
              <td>Via Telepon Genggam</td>
            </tr>
          </table>
        </button>
        <button class="btn btn-block white" onclick="location.href ='<?php echo base_url('Login/lupa_pass_email');?>'">
          <table>
            <tr>
              <td width="100"><i class="fa fa-envelope-o" style="font-size:40px"></i></td>
              <td></td>
              <td>Via Email</td>
            </tr>
          </table>
        </button>
        
        <br>
        <div class="form-group">
          <a href="<?php echo base_url() ?>">Kembali</a>
        </div>
        
      </div>

    </div>  

  </div>

</body>
</html>
<?php ob_end_flush(); ?>
