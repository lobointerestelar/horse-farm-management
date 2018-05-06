<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Salsbro Data</title>

  <!-- Bootstrap core CSS -->

  <link href="css/bootstrap.min.css" rel="stylesheet">

  <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="css/custom.css" rel="stylesheet">
  <link href="css/icheck/flat/green.css" rel="stylesheet">


  <script src="js/jquery.min.js"></script>

  <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>

<body style="background:#F7F7F7;">

  <div class="">
    <a class="hiddenanchor" id="toregister"></a>
    <a class="hiddenanchor" id="tologin"></a>

    <div id="wrapper">
      <div id="login" class="animate form">
        <section class="login_content">
          
          <form method="post" action="login.php">
          <?php include('errors.php'); ?>

            <h1>Login</h1>
            
            
            
            <div>
			<input type="text" name="username" class="form-control" placeholder="Username" required="" />
            </div>
            
            <div>
			<input type="password" name="password" class="form-control" placeholder="Password" required="" />
            </div>
            
            <div>
              		<button type="submit" class="btn btn-default submit" name="login_user">Login</button>
              
		
              <a class="reset_pass" href="#">Lost your password?</a>
            </div>
            <div class="clearfix"></div>
            <div class="separator">

              <p class="change_link">New to site?
                <a href="#toregister" class="to_register"> Create Account </a>
              </p>
              <div class="clearfix"></div>
              <br />
              <div>
                <h1>Salsbro Data </h1>

                <p>©2017 Lobo Studios</p>
              </div>
            </div>
          </form>
          <!-- form -->
        </section>
        <!-- content -->
      </div>
      <div id="register" class="animate form">
        <section class="login_content">
          
          <form method="post" action="login.php">
          <?php include('errors.php'); ?>
          
            <h1>Create Account</h1>
            <div>
              <input type="text" name="username" value="<?php echo $username; ?>" class="form-control" placeholder="Username" required="" />
            </div>
            <div>
              <input type="email" name="email" value="<?php echo $email; ?>" class="form-control" placeholder="Email" required="" />
            </div>
            <div>
              <input type="password" name="password_1" class="form-control" placeholder="Password" required="" />
            </div>
            <div>
              <input type="password" name="password_2" class="form-control" placeholder="Confirm password" required="" />
            </div>
            <div>
              <input type="text" name="ownerlastname" value="<?php echo $ownerlastname; ?>" class="form-control" placeholder="Last Name" required="" />
            </div>
            <div>
              <input type="text" name="ownerfirstname" value="<?php echo $ownerfirstname; ?>" class="form-control" placeholder="First Name" required="" />
            </div>
            <div>
              <input type="text" name="address" value="<?php echo $address; ?>" class="form-control" placeholder="Address" required="" />
            </div>
            <div>
              <input type="text" name="postcode" value="<?php echo $postcode; ?>" class="form-control" placeholder="Post Code" required="" />
            </div>
            <div>
              <input type="text" name="phone" value="<?php echo $phone; ?>" class="form-control" placeholder="Phone" required="" />
            </div>
            <div>
              
              <button type="submit" class="btn btn-default submit" name="reg_user">Submit</button>
              
            </div>
            <div class="clearfix"></div>
            <div class="separator">

              <p class="change_link">Already a member ?
                <a href="#tologin" class="to_register"> Log in </a>
              </p>
              <div class="clearfix"></div>
              <br />
              <div>
                <h1> Salsbro Data </h1>

                <p>©2017 Lobo Studios</p>
              </div>
            </div>
          </form>
          <!-- form -->
        </section>
        <!-- content -->
      </div>
    </div>
  </div>

</body>

</html>
