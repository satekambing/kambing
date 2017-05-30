<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Halaman Login | Admin</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../resources/css/font-awesome.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">


  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition bg-primary">
<div class="login-box">
  <div class="login-logo">
    <p><b>SIMPEG</b> ONLINE</p>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <div class="pesan">
      <!-- Isi pesan  -->
    </div>

    <form action="" method="post">
      <div class="form-group has-feedback">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        <input type="email" class="form-control" autofocus="" placeholder="Email / Nip">
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
    </form>
      <div class="row">
        <div class="col-xs-8">
          <a href="#">Lupa Password ?</a>
        </div>
        <div class="col-xs-4">
          <button class="btn btn-primary btn-block btn-flat btn-login">Masuk</button>
        </div>
      </div>
  </div>
</div>

<script src="../resources/js/jquery-3.2.1.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
<script>
  $(".btn-login").click(function(){
    $.ajax({
      type :'POST',
      url  : 'logincek.php',
      data : $("form").serialize(),
      success: function(data){
        if(data == 1 ){
          // kalau login berhasil
          $(".pesan").addClass("alert alert-success");
          $(".pesan").html("Selamat - Login Berhasil");
          setTimeout(function() {
            location.replace("index.php");
          }, 1000);
        }else{
          $(".pesan").addClass("alert alert-danger");
          $(".pesan").html("Login Gagal");
          // return false;
        }
      }
    })
  })
</script>
