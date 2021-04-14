<!DOCTYPE html>
<html>
<head>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="short icon" href="<?php echo base_url()?>assets/images/logo.jpg" type="image/png" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Escalade</title>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
  <link rel="stylesheet" href="style.css" type="text/css" />
  <script>
    $(document).ready(function(){
      $('.place-holder').placeHolder();
    });
  </script>
</head>

<style>
  h1{
    text-align: center;
  }

  h5{
    font-family: Arial, Helvetica, sans-serif; 
  }
  .container{
    width: 400px;
    margin: auto;
    padding-top: 25px; 
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
     <?php echo form_open('Login/verifikasi');?>
     <br>
     <br>
     <div class="wow"> 
      <div class="te">
        <div class="form-group">
          <img style="" src="<?php echo base_url()?>assets/images/logo.jpg" width="80" height="80" position="center">
          <h5><b>Verifikasi Akun</b></h5>
        </div>
      </div>
      <div class="form-group">
        <input type="hidden" value="<?php echo $no->no_hp ?>" name="no_hp">
        <hr />
      </div>
      <div class="form-group">
        <div class="input-group">
          <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
          <input type="text" name="kode_verif" value="<?php echo set_value('kode_verif'); ?>" class="form-control" placeholder="Masukkan Kode Verifikasi" maxlength="40" required="required"/>
        </div>
      </div>

      <br>
      
      <div class="form-group">
        <hr />
      </div>
      
      <div class="form-group">
        <button type="submit" class="btn btn-block btn-primary">Konfirmasi</button>
      </div>
      
      <br>

    </div>
    
    
  </div>
  
  <?php echo form_close() ?>
</div>  


</body>
</html>
<?php ob_end_flush(); ?>
