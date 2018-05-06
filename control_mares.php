<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Salsbro Data </title>

  <!-- Bootstrap core CSS -->

  <link href="css/bootstrap.min.css" rel="stylesheet">

  <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="css/custom.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/maps/jquery-jvectormap-2.0.3.css" />
  <link href="css/icheck/flat/green.css" rel="stylesheet" />
  <link href="css/floatexamples.css" rel="stylesheet" type="text/css" />

  <script src="js/jquery.min.js"></script>
  <script src="js/nprogress.js"></script>

</head>


<body class="nav-md">

  <div class="container body">


    <div class="main_container">

      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">

          <div class="navbar nav_title" style="border: 0;">
            <a href="control.php" class="site_title"></i> <span>Salsbro Data</span></a>
          </div>
          <div class="clearfix"></div>

          <!-- menu prile quick info -->
          <div class="profile">
            <div class="profile_pic">
              <img src="images/img.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h2><?php echo $_SESSION['username']; ?></h2>
            </div>
          </div>
          <!-- /menu prile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">
                <li><a><i class="fa fa-home"></i> Horses <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="control_horse_management.php">Add Horses</a>
                    </li>
                    <li><a href="index2.html">Horses Reports</a>
                    </li>
                    <li><a href="index3.html">Invoices</a>
                    </li>
                  </ul>
                </li>
                <li><a><i class="fa fa-edit"></i> Journals <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="control_mares.php">Mare&#39;s Journals</a>
                    </li>
                    <li><a href="form_advanced.html">Journal&#39;s Services</a>
                    </li>
                  </ul>
                </li>
                <li><a><i class="fa fa-desktop"></i> Semen Provider <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="general_elements.html">Studs</a>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>

          </div>
          <!-- /sidebar menu -->

          <!-- menu footer buttons -->
          <div class="sidebar-footer hidden-small">
            <a href="control.php?logout='1'" data-toggle="tooltip" data-placement="top" title="Log out">
              <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
          </div>
          <!-- /menu footer buttons -->
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">

        <div class="nav_menu">
          <nav class="" role="navigation">
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="images/img.jpg" alt=""><?php echo $_SESSION['username']; ?>
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">                  
                  <li><a href="control.php?logout='1'"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </li>
                </ul>
              </li>

              

            </ul>
          </nav>
        </div>

      </div>
      <!-- /top navigation -->


      <!-- page content -->
      
       <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Salsbro Stuteri Main Control</h3>
            </div>
			<?php
			date_default_timezone_set("Europe/Stockholm");
			echo " " . date("Y-m-d");
			?>
            <div class="title_right">
              <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">
                  <!--<input type="text" class="form-control" placeholder="Search for...">-->
                  <span class="input-group-btn">
                            <!--<button class="btn btn-default" type="button">Go!</button>-->
                        </span>
                </div>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>

          <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Mares<small></small></h2>
                        
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        
                     
                        
                       
                       

                       
                                <form novalidate method='post' action='control_horse_journal.php'>      
                   
                        
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                          <thead>
                            <tr>
                              <th>Name</th>
                              <th>Breed</th>
                              <th>Description</th>
                              <th>Owner</th>
                              <th>Selection</th>  
                            </tr>
                          </thead>
                          
                          
                          <tbody>
                            	    
                            
	                            <?php
	                            
					    
					
					
					
					
					    	      	      	
					    $query = "SELECT * FROM Horses, OwnerManagement, Owners
					    	      	      WHERE Horses.Gender = 'Female'
					    	      	      AND OwnerManagement.IdHorse = Horses.IdHorse
					    	      	      AND OwnerManagement.IdOwnerFK = Owners.IdOwner";
						                       
				            $results =mysqli_query($db, $query);
				          	                            	    	                           		                            	                            		                            	
		                            while ($row = mysqli_fetch_assoc($results)){
		                              
		                              
		                              $idfield=$row[IdHorse];	
		                              
		                             
		                             		                              		                              	                              					      					                        		                              
		                              echo "
		                              <tr>
		                              	   <td>{$row['HorseName']}</td>
		                              	   <td>{$row['Breed']}</td>
		                                   <td>{$row['Description']}</td>
		                                   <td>{$row['OwnerLastName']}</td>		                                   
		                                   <td><button name='keep_mare' type='submit' value='{$row['IdHorse']}' class='btn btn-round btn-primary'>Select</button>{$idfield}</td></tr>";
		                                                                  		                                   		   			  			   			    	  		   			    	  
		   			    }
	                             
	                            	
	                            		
	                            	   
	                             	
	                             	
	                             	
	                                 
	                             	
	                             	
	                            ?>
                            
                                                        
                            
                          </tbody>
                        </table>
			 
                      </div>
                    </div>
                  </div>

          </div>
        </div>

        <!-- footer content -->
        <footer>
          <div class="copyright-info">
            <p class="pull-right">Lobo Studios</a>
            </p>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->

      </div>      
      
      <!-- /page content -->

    </div>

  </div>

  <div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
  </div>

  

  <!-- js files -->

  <script src="js/bootstrap.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
  <script src="js/nicescroll/jquery.nicescroll.min.js"></script>
  
  <!-- Datatables-->
        <script src="js/datatables/jquery.dataTables.min.js"></script>
        <script src="js/datatables/dataTables.bootstrap.js"></script>
        <script src="js/datatables/dataTables.buttons.min.js"></script>
        <script src="js/datatables/buttons.bootstrap.min.js"></script>
        <script src="js/datatables/jszip.min.js"></script>
        <script src="js/datatables/pdfmake.min.js"></script>
        <script src="js/datatables/vfs_fonts.js"></script>
        <script src="js/datatables/buttons.html5.min.js"></script>
        <script src="js/datatables/buttons.print.min.js"></script>
        <script src="js/datatables/dataTables.fixedHeader.min.js"></script>
        <script src="js/datatables/dataTables.keyTable.min.js"></script>
        <script src="js/datatables/dataTables.responsive.min.js"></script>
        <script src="js/datatables/responsive.bootstrap.min.js"></script>
        <script src="js/datatables/dataTables.scroller.min.js"></script>

  <!-- /js files -->
  
  
  <!-- js code -->
  
  <!-- Show Entries, Search, Showing Entries, Previous Next -->
       <script type="text/javascript">
          $(document).ready(function() {
            $('#datatable').dataTable();
            $('#datatable-keytable').DataTable({
              keys: true
            });
            $('#datatable-responsive').DataTable();
            $('#datatable-scroller').DataTable({
              ajax: "js/datatables/json/scroller-demo.json",
              deferRender: true,
              scrollY: 380,
              scrollCollapse: true,
              scroller: true
            });
            var table = $('#datatable-fixed-header').DataTable({
              fixedHeader: true
            });
          });
          TableManageButtons.init();
         </script>
 
 <!-- /js code -->
 
</body>

</html>
