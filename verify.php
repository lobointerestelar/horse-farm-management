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
		<!-- start PHP code -->
		        <?php
		         
		            		$db = mysqli_connect('localhost', 'salsbrod_admin', '997213217', 'salsbrod_salsbrodb'); // Connect to database server(localhost) with username and password.
					mysqli_select_db($db, 'salsbrod_salsbrodb'); // Select registration database.
					             
					if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
					    // Verify data
					    $email = mysqli_real_escape_string($db, $_GET['email']); // Set email variable
					    $hash = mysqli_real_escape_string($db, $_GET['hash']); // Set hash variable
					                 
					    $search = mysqli_query($db, "SELECT Email, Hash, Active FROM Owners WHERE Email='".$email."' AND Hash='".$hash."' AND Active='0'"); 
					    $match  = mysqli_num_rows($search);
					                 
					    if($match > 0){
					        // We have a match, activate the account
					        mysqli_query($db, "UPDATE Owners SET Active='1' WHERE Email='".$email."' AND Hash='".$hash."' AND Active='0'");
					        
					        //header('location: registered.php');
					        //echo '<div class="statusmsg">Your account has been activated, you can now login</div>';
					    }else{
					        // No match -> invalid url or account has already been activated.
					        //echo '<div class="statusmsg">The url is either invalid or you already have activated your account.</div>';
					    }
					                 
					}else{
					    // Invalid approach
					    //echo '<div class="statusmsg">Invalid approach, please use the link that has been send to your email.</div>';
					}
							        
		        ?>
		        <!-- stop PHP Code -->
<body style="background:#F7F7F7;">

  <div class="">
    <a class="hiddenanchor" id="toregister"></a>
    <a class="hiddenanchor" id="tologin"></a>

    <div id="wrapper">
      <div id="login" class="animate form">
        <section class="login_content">
          
          <form method="post" action="login.php">
          

            <h1>Welcome!</h1>

              
              <div>
                <h1>Your account is verified. <a href="login.php"><h2>Please login here.</h2></a></h1>

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
