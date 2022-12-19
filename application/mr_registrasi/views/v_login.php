<html >
<head>
  <meta charset="UTF-8">
  <title>SIMRS V.2</title>

<link rel="stylesheet" href="assets/login/css/style.css">

  
</head>

<body>
	<img src="assets/images/Login.jpg" class="bg" />
    <div class='form'>
	<h2 align="center">LOGIN FORM</h2>
    <form action="<?php echo base_url('login/aksi_login'); ?>" method="post">
        <input placeholder='Username' name="username" id="username" type='text' style='color:#333333;'>
        <input placeholder='Password' name="password" id="password" type='password' style='color:#333333;'>
        <button class='animated infinite pulse' type="submit">LOGIN</button>
    </form>
    </div>
    
    <script src="assets/login/js/index.js"></script>
</body>
</html>