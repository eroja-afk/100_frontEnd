<?php header('Access-Control-Allow-Origin: *'); ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="login.css">
	<link rel="stylesheet" type="text/css" href="bootstrap-5.1.2-dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="bootstrap-5.1.2-dist/css/bootstrap.min.css">
   	<script type="text/javascript" charset="utf8" src="bootstrap-5.1.2-dist/js/bootstrap.js"></script>
    <script type="text/javascript" charset="utf8" src="bootstrap-5.1.2-dist/js/bootstrap.min.js"></script>
    <script src="./resources/jquery-3.6.0.min.js"></script>
</head>
<body>
	<div class="wrapper fadeInDown">
 		 <div id="formContent">
        <h1>RECAS-Login</h1>

    <form id="loginForm">
      <input type="text" id="user" class="fadeIn second" name="username" placeholder="Enter User">
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="Enter Password">
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form>
    <a href="units.php" class="nav-link">Login - Testing</a>

    <!-- Forget Password -->
    <!-- <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div> -->

  </div>
</div>
</body>
</html>
<script>
$( document ).ready(function() {

  $('#loginForm').on('submit', function(e){
    e.preventDefault();
    const data = new FormData(e.target);
    console.log("Datas - " + data.get('username'));

    $.ajax({
      url: 'https://recas-api.vercel.app/login',
      type: 'post',
      data: {
        username: data.get('username'),
        password: data.get('password')
      },
      headers: {
        'Access-Control-Allow-Origin': '*'
      },
      dataType: 'json',
        success: function(res){
        console.log(res);
        alert("Login");
        $(location).attr('href','units.php');
      }
    });
  });

});
</script>