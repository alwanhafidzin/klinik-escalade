<!DOCTYPE html>
<html>
<head>
  <!-- <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Escalade</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="short icon" href="<?php echo base_url()?>assets/images/logo.png" type="image/png" />
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
      padding-top: 0px; 
    }
    .te{
      text-align: center;
    }
    body{
/*      background: url(<?php echo base_url() ?>assets/baru/images/bg.jpg);
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
     <?php echo form_open('Login/changePassword_hp'); ?>  
     <div class="col-md-12">
      <br><br>
      <div class="wow">
        <div class="te">
          <div class="form-group">
            <img style="" id="shaniku" src="<?php echo base_url()?>assets/images/logo.png" width="80" height="80" alt="..." position="center">
            <h5><b>Ubah Kata Sandi</b></h5>
          </div>
        </div>

        <div class="form-group">
          <hr />
        </div>
        
        <input type="hidden" value="<?php echo $verif->no_hp ?>" name="no_hp">
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            <input id="myInput" type="password" name="password" class="form-control" placeholder="Password" maxlength="15" required="required"/>
          </div>

          <div style="padding-left: 200px; position: absolute;">
            <input type="checkbox" onclick="myFunction()"><span style="color: blue; font-size: 12px;"> Perlihatkan</span>
          </div>
        </div>
        <br>

        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            <input id="myInput_2" type="password" name="passconf" class="form-control" placeholder="Password" maxlength="15" required="required"/>
          </div>

          <div style="padding-left: 200px; position: absolute;">
            <input type="checkbox" onclick="myFunction_2()"><span style="color: blue; font-size: 12px;"> Perlihatkan</span>
          </div>
        </div>
        <br><br>

        <div class="form-group">
          <button type="submit" class="btn btn-block btn-primary ">Reset Kata Sandi</button>
        </div>
      </div>


    </div>
    <?php echo form_close() ?>
  </div>  

</div>

</body>
</html>
