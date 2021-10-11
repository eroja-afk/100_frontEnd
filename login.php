<?php 
  session_start();
  header('Access-Control-Allow-Origin: *'); 

  if(isset($_POST['submit'])){
    $ch = curl_init();

    $data = array(
      'username' => $_POST['username'],
      'password' => $_POST['password']
    );

    // curl_setopt($ch, CURLOPT_URL,"https://recas-api.vercel.app/login");
    curl_setopt($ch, CURLOPT_URL,"http://localhost:3000/login");
    curl_setopt($ch, CURLOPT_FAILONERROR, true);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

    // In real life you should use something like:
    // curl_setopt($ch, CURLOPT_POSTFIELDS, 
    //          http_build_query(array('postvar1' => 'value1')));

    // Receive server response ...
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $server_output = curl_exec($ch);

    // Further processing ...
    // var_dump($server_output);


    if(curl_exec($ch) === false){
      $error_msg = curl_error($ch);
    } else {
      $data = json_decode($server_output, true);
      $_SESSION['userId'] = $data['data'][0]['id'];
      $_SESSION['user'] = $data['data'][0]['unit_no'];
      $type = $data['data'][0]['type'];
      if(strcasecmp($type, 'dispatcher') == 0){
        header('Location: reporter.php');
      } else if(strcasecmp($type, 'unit') == 0){
        header('Location: units.php');
      }
    }
    curl_close ($ch);
  }
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="login.css">
	<link rel="stylesheet" type="text/css" href="bootstrap-5.1.2-dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="bootstrap-5.1.2-dist/css/bootstrap.min.css">
   	<script type="text/javascript" charset="utf8" src="bootstrap-5.1.2-dist/js/bootstrap.js"></script>
    <script type="text/javascript" charset="utf8" src="bootstrap-5.1.2-dist/js/bootstrap.min.js"></script>
    <script src="./resources/jquery-3.6.0.min.js"></script>
    <title>RECAS - Login</title>
</head>
<body>
	<div class="wrapper fadeInDown">
 		 <div id="formContent">
        <h1>RECAS-Login</h1>

    <form action="" method="post">
      <!-- <form id="loginForm"> -->
      <input type="text" id="user" class="fadeIn second" name="username" placeholder="Enter User">
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="Enter Password">
      <input type="submit" class="fadeIn fourth" name="submit" value="Login">
    </form>

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
        // $(location).attr('href','units.php');
      }
    });
  });

});
</script>