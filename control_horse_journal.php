<?php include('server.php') ?>

<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
  
  <!-- Meta, title, CSS, favicons, etc. -->
  
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


<body onload="document.refresh();" class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
             <a href="control.php" class="site_title"><span>Salsbro Data</span></a>
          </div>
          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile">
            <div class="profile_pic">
              <img src="images/img.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h2><?php echo $_SESSION['username']; ?></h2>
            </div>
          </div>
          <!-- /menu profile quick info -->

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

          <!-- sidebar menu footer buttons -->
          <div class="sidebar-footer hidden-small">
            <a href="control.php?logout='1'" data-toggle="tooltip" data-placement="top" title="Log out">
              <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
          </div>
          <!-- /sidebar menu footer buttons -->
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
          
          <div class="page-title">
            <div class="title_left">
              <h3>Salsbro Stuteri</h3>
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
          
          <!-- ARRIBA -->
           <div class="row"> 

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                                       
                    <h2></br> Horse Journal <small></small></h2>
                    
                     
                     <? 
                     
                    //SE TRAE DE control_mares.php LA YEGUA SELECIONADA
                   if(isset($_POST["keep_mare"]))
                        {
                
                            
                              $selectedId = $_POST["keep_mare"];
                    
                    
                              //echo $selectedId;
                            
                            
                            $query = "SELECT * FROM Horses, OwnerManagement, Owners, Journals, Vets
                                WHERE Horses.IdHorse = '$selectedId'
                                AND OwnerManagement.IdHorse = Horses.IdHorse
                                AND OwnerManagement.IdOwnerFK = Owners.IdOwner
                                AND OwnerManagement.IdHorse = Journals.IdHorseFk
                                AND Journals.IdVetFk = Vets.IdVet
                                
                                ";
                                     
                            $results =mysqli_query($db, $query);
                                                                                                                                                                                          
                                        $row = mysqli_fetch_assoc($results);
                                  
                          //echo $row[HorseName]; 
        
                       }
                        
                     ?> 
                     
                                    
                    </div>
                    
                    <div class="clearfix"></div>
                    
                          <!-- FOTO DE CABALLO-->
                          <div class="avatar-view" title="Change the avatar">
                            <img src="images/viking-ss-vinter220x220.png" alt="Avatar">
                          </div>

                  
                      <div class="x_content">
                        <br />
                        
		<!-- DATOS DE LA YEGUA-->
                    
                 <form id="demo-form2" class="form-horizontal form-label-left"  method="post" action="" onsubmit="return postArriba();">
                       
                        
                   <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Mare&#39;s Name <span class="required"></span></label>
                          
                       <div class="col-md-6 col-sm-6 col-xs-12">
                       <input type="text" value="<?php echo $row[HorseName]; ?>" name="maresName" required="required" class="form-control col-md-7 col-xs-12" disabled>
                       </div>
                   </div>
                        
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="owner">Owner <span class="required"></span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" value="<?php echo $row[OwnerLastName]; ?>" name="owner" id="owner" required="required" class="form-control col-md-7 col-xs-12"disabled>
                    </div>
                 </div>
                <div class="form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">Telephone <span class="required"></span></label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                     <input type="text" value="<?php echo $row[Phone]; ?>" name="phone" id="phone" required="required" class="form-control col-md-7 col-xs-12"disabled>
                  </div>
                 </div>
                        
                        
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Vet</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            
                              
                                                        
                              <?  $qVet = "SELECT * FROM Vets";
                              
                                $resultsVet = mysqli_query($db, $qVet);
                                
                                echo "<select id='idSelectVets' class='form-control' name='vet'>";
                                while ($rowVet = mysqli_fetch_assoc($resultsVet)) {
                                
                                if ($rowVet[IdVet] == $row[IdVetFk]){echo"<option selected='true' value ='{$rowVet['IdVet']}'>{$rowVet['VetName']}</option>";}
                                else{echo"<option value ='{$rowVet['IdVet']}'>{$rowVet['VetName']}</option>";};
                                                                
                                }                                                                 
                                echo "</select>";
                             ?>
                             
                             
                            </div>
                          </div>
                          
                          <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Booked Stallion</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            
                              <?  $qStallion = "SELECT * FROM Stallions";
                              
                                $resultsStallion = mysqli_query($db, $qStallion);
                                
                                echo "<select id='idSelectBStallion' class='form-control' name='bookedStallion'>";
                                
                                  while ($rowStallion = mysqli_fetch_assoc($resultsStallion)) {
                                
                   if ($rowStallion[IdStallion] == $row[IdStallionFk]){echo"<option selected='true' value ='{$rowStallion['IdStallion']}'>{$rowStallion['Name']}</option>";}
                         else{echo"<option value ='{$rowStallion['IdStallion']}'>{$rowStallion['Name']}</option>";};
                                    
                                     }
                                echo "</select>";
                                                                                                
                              ?>
                            </div>
                        </div>
                          
                                                                                                  
                      <div class="form-group">
                      <label for="previusStallion" class="control-label col-md-3 col-sm-3 col-xs-12">Previous Stallion</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
            <input  value="<?php echo $row[PreviousStallion]; ?>" id="previusStallion" class="form-control col-md-7 col-xs-12" type="text" name="previusSatallion" disabled>
                          </div>    
                        </div>
                                                                                                
 <div class="form-group">
   <label class="col-md-3 col-sm-3 col-xs-12 control-label">State of the Mare<br></label>

   <div class="radio">
                                
   <label>       
       <input type="radio" onclick="callEnableDatesGender(this.id)" <?php if($row["MareStatus"]=="Maiden") {echo "checked";}?> value="Maiden" 					 
       id="foalOptionsRadios1"  name="state_Of_Mare"> Maiden      &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
    
       <input type="radio" onclick="callEnableDatesGender(this.id)" <?php if($row["MareStatus"]=="Pregnant") {echo "checked";}?> value="Pregnant" 
       id="foalOptionsRadios2"  name="state_Of_Mare"> Pregnant &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                                  
       <input type="radio" onclick="callEnableDatesGender(this.id)" <?php if($row["MareStatus"]=="Barren") {echo "checked";}?> value="Barren" 
       id="foalOptionsRadios3"  name="state_Of_Mare"> Barren &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
    
       <input type="radio" onclick="callEnableDatesGender(this.id)" <?php if($row["MareStatus"]=="With Foal") {echo "checked";}?> value="With Foal" 
       id="foalOptionsRadios4"  name="state_Of_Mare"> With Foal &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
    </label>
                                                                                                  
     </div>                                                                   
   </div>
  
                          
                           
                              

           <? if(($row["MareStatus"]=="Maiden") or ($row["MareStatus"]=="Barren")) {
                                  
            echo "
                                  
             <div class='form-group'>
                                  
              <label class='control-label col-md-3 col-sm-3 col-xs-12'>Expected Term <span class='required'></span></label>
                                  
              <div class='col-md-3 col-sm-6 col-xs-12' id='retornaExpectedTerm'>
               <input class='form-control col-md-3 col-xs-12' id='idExpectedTerm' name='expectedTerm' required='required' type='text' value='00-00-0000' disabled>
              </div>
      				   
              <div class='col-md-3 col-sm-6 col-xs-12' id='retornaExpectedTermTime'>
               <input class='form-control col-md-3 col-xs-12' id='idExpectedTermTime' name='expectedTermTime' required='required' type='text' value='00:00' disabled>
              </div>
      				   
             </div>
                                  
                                  
             <div class='form-group'>
                                  
              <label class='control-label col-md-3 col-sm-3 col-xs-12'>Foaling Date <span class='required'></span></label>
                                   
              <div class='col-md-3 col-sm-6 col-xs-12' id='retornaFoalingDate'>
               <input class='form-control col-md-3 col-xs-12' id='idFoalingDate' name='foalingDate' required='required' type='text' value='00-00-0000' disabled>
      	      </div>
      
     	      <div class='col-md-3 col-sm-6 col-xs-12' id='retornaFoalingDateTime'>
               <input class='form-control col-md-3 col-xs-12' id='idFoalingDateTime' name='foalingDateTime' required='required' type='text' value='00:00' disabled>
      	      </div>
      				  
      	     </div>
                                 
                                 
            ";
                $valorExpectedTerm='dd-mm-yyyy';
                $valorExpectedTermTime='00:00';
                $valorFoalingDate='dd-mm-yyyy';
                $valorFoalingDateTime='00:00';
                                	
                                	
                                
            }
                                      

                              else {
                                
                               //ExpectedTerm
                               
                               if ($row[ExpectedTerm]=='00-00-0000') {$valorExpectedTerm='dd-mm-yyyy';}//si date vacia mostrar dd-mm-yyyy
                                                              
                               else {                               
                                    //$newExpectedTerm = date("d-m-Y", strtotime($row[ExpectedTerm]));                             
                                    $valorExpectedTerm = $row[ExpectedTerm];                                                                        
                                    }
                               
                               if ($row[ExpectedTermTime]=='00:00:00') {$valorExpectedTermTime='00:00';}//si time vacia mostrar 00:00
                               
                               else {
                                    $newExpectedTermTime = date("H:i", strtotime($row[ExpectedTermTime]));//si time existe cambiar formato de 00:00:00 a 00:00                                                                      
                                    $valorExpectedTermTime = $newExpectedTermTime;
                                    } 
                               
                               //FoalingDate
                               
                               if ($row[FoalingDate]=='00-00-0000') {$valorFoalingDate='dd-mm-yyyy';}//si date vacia mostrar dd-mm-yyyy
                                                              
                               else {                               
                                    //$newFoalingDate = date("d-m-Y", strtotime($row[FoalingDate]));                            
                                    $valorFoalingDate = $row[FoalingDate];                                                                        
                                    }
                               
                               if ($row[FoalingDateTime]=='00:00:00') {$valorFoalingDateTime='00:00';}//si time vacia mostrar 00:00
                               
                               else {
                                    $newFoalingDateTime = date("H:i", strtotime($row[FoalingDateTime]));//si time existe cambiar formato de 00:00:00 a 00:00                                                                      
                                    $valorFoalingDateTime = $newFoalingDateTime;
                                    } 
                               
                               echo "
                                <div class='form-group'>
                                 
                                 <label class='control-label col-md-3 col-sm-3 col-xs-12'>Expected Term </span></label>            			
            			 
            			 <div class='col-md-3 col-sm-6 col-xs-12' id='retornaExpectedTerm'>
                                  <input type='text' id='idExpectedTerm' name='expectedTerm' class='form-control col-md-3 col-xs-12' value='$valorExpectedTerm'>                                 
                                 </div>
           			        			
            			 <div class='col-md-3 col-sm-6 col-xs-12' id='retornaExpectedTermTime'>                                   
                                 <input type='text' id='idExpectedTermTime' name='expectedTermTime' class='form-control col-md-3 col-xs-12' value=$valorExpectedTermTime>                                                                  
                                 </div>
                                
                                </div>
                                
                                <div class='form-group'>  
                                
                                 <label class='control-label col-md-3 col-sm-3 col-xs-12'>Foaling Date <span class='required'></span></label>
            			
            			 <div class='col-md-3 col-sm-6 col-xs-12' id='retornaFoalingDate'>
                                  <input type='text' id='idFoalingDate' name='foalingDate' class='form-control col-md-3 col-xs-12' value='$valorFoalingDate'>                                 
                                 </div>
            			            			
            			 <div class='col-md-3 col-sm-6 col-xs-12' id='retornaFoalingDateTime'>                                   
                                  <input type='text' id='idFoalingDateTime' name='foalingDateTime' class='form-control col-md-3 col-xs-12' value=$valorFoalingDateTime>                                                                  
                                 </div>                                 
                                 </div>            			            			                                  
                                ";                                                                 
                            
                               }
                                                                     
                              ?>                                                                                                                                                                                        
                            
                            
                          
                         
                                                          

        
                         <div class='form-group'>
                                
  
                                    <label class='col-md-3 col-sm-3 col-xs-12 control-label'>Foal Gender<br></label>  
            
                                    <div class='radio' id='retornaFoalGender'>
    
                                  
                        <? if($row["MareStatus"]=="With Foal")  {echo "
                                    
                                 
          
                                      <label>
                                        <input type='radio' "; 
                                        if($row["FoalSex"]=="1") {echo " checked ";};
                                        echo"value='1' id='foalGenderRadios1' name='foalGender'> Male &nbsp &nbsp &nbsp &nbsp &nbsp
          
                                        <input type='radio' ";
                                        if($row["FoalSex"]=="0") {echo " checked ";};
                                        echo"value='0' id='foalGenderRadios2' name='foalGender'> Female
                                      </label>
                                   
                                      ";} ?>                
                                       
            
                                  </div>
                                  </div>                                                                                                                                                                                              
                      


                        <div class="x_title">
    
                            <h2>1 Reproductive History<small></small></h2>
                            
                            
                            
                            <div class="clearfix"></div>
                          
                            
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                      
                                       <br /><br /><br />
                                      <textarea id="idRHMessage" required="required" class="form-control" name="reproductiveHistory" 
                                      data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" placeholder="Comments..."
                                    data-parsley-validation-threshold="10"><?php echo $row[RHComments]; ?></textarea>
                            </div>    
                        </div>                                                          		                                  
                      </div>                      		
              
              <button name="saveArriba" type="submit" id="saveArribaBtn" class="btn btn-round btn-primary" style="float: right;">Save</button>                      		
                      
                      		
 </form> 
        
                        
                      
                      
                      
                      </div>
                  </div> <!-- Close class="col-md-12 col-sm-12 col-xs-12 -->
          
          <!-- /ARRIBA -->
          
          <!-- IZQ -->

                          
                  <div class="col-md-6 col-xs-12">
                  <div class="x_panel">
                    
                    <div class="x_title">
                     <h2>2 External Reproductive Anatomy <small></small></h2>
                        <div class="clearfix"></div>
                    </div>

                   <div class="x_content">
                    <br />
                    
                    
                       
                  <form id="idIZQ" class="form-horizontal form-label-left input_mask" method="post" action="" onsubmit="return postIzq();">
                                                    
                    <div class="form-group">
                      <h2>Perineal Conformation</h2>
                    </div>
                    <br />

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"><span class="required">Caslick Index:</span></label>
                    </div>

                    <div class="form-group">                                                              
                    
                    <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="last-name">Length <span class="required"></span></label>
                     <input type="text" id="IdCaslickIndexLength" value="<?php echo $row[Length]; ?>" placeholder="in cm." class="form-control" onkeypress="return 
                      event.keyCode != 13;">
                    </div>

                    <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="last-name">Angulation <span class="required"></span></label>
                     <input type="text" id="IdCaslickIndexAngulation" value="<?php echo $row[Angulation]; ?>" placeholder="in degrees" class="form-control" 
                      onkeypress="return event.keyCode != 13;">
                    </div>

                    <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                    <label class="control-label col-md-9 col-sm-3 col-xs-12" for="last-name">Caslick Index <span class="required"></span></label>
                    <input type="text" Id="IdCaslickIndexTotal" value="<?php echo( $row[Length] * $row[Angulation]); ?>" placeholder="Total" class="form-control" 
                     disabled>
                    </div>
                                                        
                    <div class="form-group">
                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Post-Foaling Trauma <span class="required"></span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="radio">
                      <? echo "
                                                <label>
                                                  <input type='radio' "; 
                                                  if($row["PostFoalingTrauma"]=="1") {echo " checked ";};
                                                  echo"value='1' id='pFtraumaRadios1' name='postFoalingTrauma'> Positive &nbsp &nbsp  &nbsp &nbsp &nbsp
                    
                                                  <input type='radio' ";
                                                  if($row["PostFoalingTrauma"]=="0") {echo " checked ";};
                                                  echo "value='0' id='pFtraumaRadios2' name='postFoalingTrauma'> Negative
                                                </label>"; 
                      ?> 
                    </div>
                    </div>
                    </div>


                    <div class="form-group">
                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Vulvar Stitches <span class="required"></span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="radio">
                      <? echo "
                                                <label>
                                                  <input type='radio' "; 
                                                  if($row["VulvarStich"]=="1") {echo " checked ";};
                                                  echo"value='1' id='vulvarStichRadios1' name='vulvarStitch'> Positive &nbsp &nbsp &nbsp &nbsp &nbsp
                    
                                                  <input type='radio' ";
                                                  if($row["VulvarStich"]=="0") {echo " checked ";};
                                                  echo "value='0' id='vulvarStichRadios2' name='vulvarStitch'> Negative
                                                </label>"; 
                      ?> 
                                                                      
                     </div>
                     </div>
                     </div>
                    </div>

                     
                                                          
                      <div class="form-group">
                      <br />
                      <h2>Wind Sucker Test</h2>
                      </div>

                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Result <span class="required"></span></label>
                      <div class="col-md-5 col-sm-6 col-xs-12">
                      <div class="radio">
                                                                          
                                                                          
                       <? echo "
                                                <label>
                                                  <input type='radio' "; 
                                                  if($row["WindSuckerTest"]=="1") {echo " checked ";};
                                                  echo"value='1' id='wStestRadios1' name='windSucketTest'> Positive &nbsp &nbsp &nbsp &nbsp &nbsp
                    
                                                  <input type='radio' ";
                                                  if($row["WindSuckerTest"]=="0") {echo " checked ";};
                                                  echo "value='0' id='wStestRadios2' name='windSucketTest'> Negative
                                                </label>"; 
                       ?>        
                                                                          
                      </div>
                      </div>
                      </div>
                      
                      <div class="col-md-12 col-sm-6 col-xs-12">
                      <textarea id="idWSTComments" required="required" class="form-control" name="WSTComments" data-parsley-trigger="keyup" 
                       data-parsley-minlength="20" data-parsley-maxlength="100" placeholder="Comments..." 
                       data-parsley-validation-threshold="10"><?php echo $row[WSTComments]; ?></textarea>
                      
                      
                      </div>
                      
			<div class="col-md-12 col-sm-6 col-xs-12">
                            <br />
                           <button name="saveIzq" type="submit" id="saveIzqBtn" class="btn btn-round btn-primary" style="float: right;">Save</button>  
                          </div>                 
                          
                      </form> 
                                                 
                      </div>			
                      </div>                            
                      </div>
           <!-- /IZQ -->
        
        
           <!-- DER -->
                      
                      
                      <div class="col-md-6 col-xs-12">
                      <div class="x_panel">
                                
                          <!-- 3 Endometrical Cyst -->
                           <div class="x_title">
                            <h2>3 Endometrical Cyst <small></small></h2>
                            <div class="clearfix"></div>
                           </div>
                           
                       
                       
                        <?
                                                            
                               $queryCyst = "SELECT * FROM EndoCyst WHERE EndoCyst.IdJournalFk =$row[IdJournal]"; //Consulta a la base de datos
                                                    
                               $resultsCyst = mysqli_query($db, $queryCyst);
                                                                                                                                                                                                    
                      ?>     
                      <!-- Add Cyst -->
                      <div class="form-group">
                      <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                                                                                         
                      
                      <div class="container">
                      <div id="cystTable" class="table-editable">
                      
                                            
                    <!--Bttn Add Cyst -->
                      
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Cysts: <span class="required"></span></label>
                      <button name='AddCyst' type='submit' id='addCystBtn' class='table-add btn btn-round btn-primary'>Add Cyst</button><br /><br /> 
                      
                      <div class="x_content">
                      <br />
                       
                                 
                      
                     
                      
                      
                         
                      <!-- Tabla Endometrical Cyst-->
                      
                          
                         
                          
                          
                          
                          <table table id="idTbCysts" class="table table-striped table-bordered">
                            <tr>
                              <th>Size</th>
                              <th>Location</th>
                              <th>Remove</th>
                             
                            </tr>
                            <tr>
                            
                          
			    
                              
                          <?
                              
                               while ($rowCyst = mysqli_fetch_assoc($resultsCyst)){                                                                                                                                
     
                                 echo "<td contenteditable='true'>{$rowCyst['Size']}</td><td contenteditable='true'>{$rowCyst['Location']}</td>
                                          
                                 <td><span id='tableEndoCyst' class='table-remove glyphicon glyphicon-remove'></span></td></tr>";   
                               
                               
                               };       
                             
                          ?>  
                              
                               <!-- This is our clonable table line for add one more row, it is hidden -->  
                               <tr class="hide">
                                 <td contenteditable="true"></td>
                                <td contenteditable="true"></td>
                                <td>
                                  <span id='tableEndoCyst' class="table-remove glyphicon glyphicon-remove"></span>
                                </td>     
                             </tr>
                           </table>
                          </div>  
                        </div>                                                                                                                                  
                       </div>
                      </div> 
                            
                            <div class="form-group">                
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group" id="addmsg">
                            </div>  
                            </div>                 

                      <!-- 4 Other Uterine or Ovarian Abnormalities -->
                       <div class="x_title">
                       <h2>4 Other Uterine or Ovarian Abnormalities<small></small></h2>
                       <div class="clearfix"></div>
                       <div class="col-md-12 col-sm-6 col-xs-12">
                       <br /><br /><br />
                       <textarea id="idUOAComments" required="required" class="form-control" name="UOAComments" data-parsley-trigger="keyup" 
                       data-parsley-minlength="20" data-parsley-maxlength="100" placeholder="Comments..."
                       data-parsley-validation-threshold="10"><?php echo $row[UOAComments]; ?></textarea>
                       
                       
                       
                       </div>
                       </div>                   
                       </div>                  
                       
                       <div class="col-md-12 col-sm-6 col-xs-12">
                            <br />
                       <button name="saveDer" type="submit" id="saveDerBtn" class="btn-save btn btn-round btn-primary" style="float: right;">Save</button>
                       
                      
                       </div>
                       
                       <!-- </form> -->
                       
                       </div>                                              
                       </div>    
            
            
            
            
            <!-- /DER -->
         
        
        <!-- PROCEDURE TABLE-->
        <div id=idProcedimientos class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
        		<div class="x_title">
                            <h2>Procedures <small></small></h2>
                                  <div class="clearfix"></div>
                        </div>
                        
        <div class="x_content">
        <div class="row">
        <div class="col-sm-12">
        <div class="card-box table-responsive">                
        	    
        	    <div class="form-group">
	                      	
	                      		<div class="col-md-3 col-sm-6 col-xs-12">
	                        	
			                        <?  $qProcedure = "SELECT * FROM Procedures";
			                        
			                        	$resultsProcedure = mysqli_query($db, $qProcedure);
			                        	
			                        	echo "<select id='idSelected_procedure' name='selected_procedure' class='form-control'>";
			                        	
			                          	while ($rowProcedure = mysqli_fetch_assoc($resultsProcedure)) {
			                          
			                          	     		
			                          	     		echo"<option value ='{$rowProcedure['IdProcedure']}'>{$rowProcedure['Name']}</option>";
			                         			
			                        	     };
			                        	echo "</select><br />";
			                        	
			                        	
			                        	
			                        ?>
	                      		</div>
	                        <button type="submit" id="idBttnProcedure-add" class="bttnProcedure-add btn btn-round btn-primary">Add Procedure</button><br /><br />
       
	                       </div>
        
        								
        
        
       
        
        <div id="idProcedureTable" class="table-editable">
                         
         
         
                       
        
        <table id="idProcedureDatatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">                  
        
        <thead>
						  <tr>
												        
						   <th>Procedure</th>
	                                           <th>Date</th>
	                                           <th>Ok</th>
	                                           <th>Summary</th>
	                                           <th>Edit</th>
	                                           <th>Remove</th>
					         </tr>
											      
						</thead>
						
						<tbody id='bodyTbProcedure'>
						
						
											      
					<?	
						                              		              
			          $queryProcedure = "SELECT BacteriologicalCultureP.IdBacteriologicalCulture, Procedures.Name, JournalProcedures.IdJournalFk, 					 
                                                     BacteriologicalCultureP.Date, BacteriologicalCultureP.Ok, BacteriologicalCultureP.Summary  FROM 
                                                     BacteriologicalCultureP, Procedures, JournalProcedures

                                                     WHERE
                                                     JournalProcedures.IdJournalFk=$row[IdJournal] AND
                                                     JournalProcedures.IdJournalProcedure=BacteriologicalCultureP.IdJournalProcedureFk AND
                                                     JournalProcedures.IdProcedureFk=Procedures.IdProcedure

                                                     UNION

                                                     SELECT BlacksmithP.IdBlacksmith, Procedures.Name, JournalProcedures.IdJournalFk, BlacksmithP.Date, 
                                                     BlacksmithP.Ok, BlacksmithP.Summary  FROM BlacksmithP, Procedures, JournalProcedures
                                                     
                                                     WHERE
                                                     JournalProcedures.IdJournalFk=$row[IdJournal] AND
                                                     JournalProcedures.IdJournalProcedure=BlacksmithP.IdJournalProcedureFk AND
                                                     JournalProcedures.IdProcedureFk=Procedures.IdProcedure
                                                     
                                                     UNION

                                                     SELECT DewormingP.IdDeworming, Procedures.Name, JournalProcedures.IdJournalFk, DewormingP.Date, 
                                                     DewormingP.Ok, DewormingP.Summary  FROM DewormingP, Procedures, JournalProcedures
                                                     
                                                     WHERE
                                                     JournalProcedures.IdJournalFk=$row[IdJournal] AND
                                                     JournalProcedures.IdJournalProcedure=DewormingP.IdJournalProcedureFk AND
                                                     JournalProcedures.IdProcedureFk=Procedures.IdProcedure
                                                     
                                                     UNION

                                                     SELECT FoalingsP.IdFoaling, Procedures.Name, JournalProcedures.IdJournalFk, FoalingsP.Date, FoalingsP.Ok, 
                                                     FoalingsP.Summary  FROM FoalingsP, Procedures, JournalProcedures
                                                     
                                                     WHERE
                                                     JournalProcedures.IdJournalFk=$row[IdJournal] AND
                                                     JournalProcedures.IdJournalProcedure=FoalingsP.IdJournalProcedureFk AND
                                                     JournalProcedures.IdProcedureFk=Procedures.IdProcedure
                                                     
                                                     UNION

                                                     SELECT InseminationP.IdInsemination, Procedures.Name, JournalProcedures.IdJournalFk, InseminationP.Date, 
                                                     InseminationP.Ok, InseminationP.Summary  FROM InseminationP, Procedures, JournalProcedures
                                                     
                                                     WHERE
                                                     JournalProcedures.IdJournalFk=$row[IdJournal] AND
                                                     JournalProcedures.IdJournalProcedure=InseminationP.IdJournalProcedureFk AND
                                                     JournalProcedures.IdProcedureFk=Procedures.IdProcedure
                                                     
                                                     UNION

                                                     SELECT IntraUterineInfusionP.IdIntraUterineInfusion, Procedures.Name, JournalProcedures.IdJournalFk, 
                                                     IntraUterineInfusionP.Date,IntraUterineInfusionP.Ok, IntraUterineInfusionP.Summary  FROM IntraUterineInfusionP, 
                                                     Procedures, JournalProcedures
                                                     
                                                     WHERE
                                                     JournalProcedures.IdJournalFk=$row[IdJournal] AND
                                                     JournalProcedures.IdJournalProcedure=IntraUterineInfusionP.IdJournalProcedureFk AND
                                                     JournalProcedures.IdProcedureFk=Procedures.IdProcedure
                                                     
                                                     UNION

                                                     SELECT UltrasonographiesP.IdUltrasonography, Procedures.Name, JournalProcedures.IdJournalFk, UltrasonographiesP.Date, 
                                                     UltrasonographiesP.Ok, UltrasonographiesP.Summary  FROM UltrasonographiesP, Procedures, JournalProcedures
                                                     
                                                     WHERE
                                                     JournalProcedures.IdJournalFk=$row[IdJournal] AND
                                                     JournalProcedures.IdJournalProcedure=UltrasonographiesP.IdJournalProcedureFk AND
                                                     JournalProcedures.IdProcedureFk=Procedures.IdProcedure
                                                     
                                                     UNION

                                                     SELECT UterineBiopsyP.IdUterineBiopsy, Procedures.Name, JournalProcedures.IdJournalFk, UterineBiopsyP.Date, 
                                                     UterineBiopsyP.Ok, UterineBiopsyP.Summary  FROM UterineBiopsyP, Procedures, JournalProcedures
                                                     
                                                     WHERE
                                                     JournalProcedures.IdJournalFk=$row[IdJournal] AND
                                                     JournalProcedures.IdJournalProcedure=UterineBiopsyP.IdJournalProcedureFk AND
                                                     JournalProcedures.IdProcedureFk=Procedures.IdProcedure
                                                     
                                                     UNION

                                                     SELECT UterineCytologyP.IdUterineCytology, Procedures.Name, JournalProcedures.IdJournalFk, UterineCytologyP.Date, 
                                                     UterineCytologyP.Ok, UterineCytologyP.Summary  FROM UterineCytologyP, Procedures, JournalProcedures
                                                     
                                                     WHERE
                                                     JournalProcedures.IdJournalFk=$row[IdJournal] AND
                                                     JournalProcedures.IdJournalProcedure=UterineCytologyP.IdJournalProcedureFk AND
                                                     JournalProcedures.IdProcedureFk=Procedures.IdProcedure
                                                     
                                                     UNION

                                                     SELECT UterineLavageP.IdUterineLavage, Procedures.Name, JournalProcedures.IdJournalFk, UterineLavageP.Date, 
                                                     UterineLavageP.Ok, UterineLavageP.Summary  FROM UterineLavageP, Procedures, JournalProcedures
                                                     
                                                     WHERE
                                                     JournalProcedures.IdJournalFk=$row[IdJournal] AND
                                                     JournalProcedures.IdJournalProcedure=UterineLavageP.IdJournalProcedureFk AND
                                                     JournalProcedures.IdProcedureFk=Procedures.IdProcedure
                                                     
                                                     UNION

                                                     SELECT VaccinationP.IdVaccination, Procedures.Name, JournalProcedures.IdJournalFk, VaccinationP.Date, 
                                                     VaccinationP.Ok, VaccinationP.Summary  FROM VaccinationP, Procedures, JournalProcedures
                                                     
                                                     WHERE
                                                     JournalProcedures.IdJournalFk=$row[IdJournal] AND
                                                     JournalProcedures.IdJournalProcedure=VaccinationP.IdJournalProcedureFk AND
                                                     JournalProcedures.IdProcedureFk=Procedures.IdProcedure";
											    	        
												                       
						            $resultsProcedure = mysqli_query($db, $queryProcedure);
													          	                            	    	                           		                            	                            		                            	
						          while ($rowProcedure = mysqli_fetch_assoc($resultsProcedure)){            	                              					      					               		                              
											                  
											                
				 							              
				 		          echo " <tr><td>{$rowProcedure['Name']}</td>
				 		          <td>{$rowProcedure['Date']}</td>";
				 							      	    
				 	if($rowProcedure["Ok"]=="1") {echo "<td contenteditable='true'><label><input type='checkbox' checked></label></td>";};    
				 	if($rowProcedure["Ok"]=="0") {echo " <td contenteditable='true'><label><input type='checkbox'></label></td>";};
				 							      	    
				 		          echo "<td>{$rowProcedure['Summary']}</td>
				 	
				 	
				 	<td><button  name='keepProcedure' type='submit' id='idBttnProcedure_edit' class='bttnProcedure-edit btn btn-round btn-primary' value='{$rowProcedure['Name']}'>Edit</button></td>				 	
				 	
				 	
				 	<td><span id='tableProcedure-remove' class='tableProcedure-remove table-remove glyphicon glyphicon-remove'></span></td></tr>";};       
												     
					       ?>  
												     
					
					  </tbody>
        
        
        </table>
       
                        
        </div>         
        </div>        
        </div>        
        </div>        
        </div>                        
        </div>
         <!-- /Tabla de Procedimientos Abajo-->
         
         <!-- footer content -->
          <footer>
          <div class="copyright-info">
          <p class="pull-right">Lobo Studios</a></p>
          </div>
          <div class="clearfix"></div>
          </footer>
         <!-- /footer content -->
        
        </div>
        </div>  <!-- close  class='row'-->

     <!-- /page content -->
     
     </div><!-- close main_container -->
     </div><!-- close container body -->

  <!-- js files-->
  
  
  <script src="js/bootstrap.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
  <script src="js/nicescroll/jquery.nicescroll.min.js"></script>
  <script type="text/javascript" src="js/moment/moment.min.js"></script>
  <script type="text/javascript" src="js/datepicker/daterangepicker.js"></script>
  <script type="text/javascript" src="js/timepicker/jquery-ui-timepicker-addon-i18n.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
  
  
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script type="text/javascript" src="http://code.jquery.com/ui/1.11.0/jquery-ui.min.js"></script>
  <script type="text/javascript" src="js/timepicker/jquery-ui-timepicker-addon.js"></script>
  <script type="text/javascript" src="js/timepicker/jquery-ui-timepicker-addon-i18n.min.js"></script>
  <script type="text/javascript" src="js/timepicker/jquery-ui-sliderAccess.js"></script>

  <link rel="stylesheet" media="all" type="text/css" href="http://code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css" />
  <link rel="stylesheet" media="all" type="text/css" href="js/timepicker/jquery-ui-timepicker-addon.css" />
  <script type="text/javascript" src="https://sellfy.com/js/api_buttons.js"></script>


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
	<link href="js/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
  	<link href="js/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
  	<link href="js/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
  	<link href="js/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
  	<link href="js/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />
  	
  <!-- /js files -->
    
  <!-- js code -->
  
  


<script type="text/javascript"> 
$('#idExpectedTerm').datepicker({
dateFormat: 'dd-mm-yy',
    changeMonth: true,
    changeDay: true
});

$('#idFoalingDate').datepicker({
dateFormat: 'dd-mm-yy',
    changeMonth: true,
    changeDay: true
});
</script> 

<script type="text/javascript"> 
$('#idExpectedTermTime').timepicker();
$('#idFoalingDateTime').timepicker();
</script> 







<!-- ENVIA LOS DATOS DEL FORMULARIO ARRIBA A server.php  -->       

<script>        
        function postArriba ()
		{
		  
		  var state_Of_Mare   ="<?php echo $row['MareStatus']?>";

	   	  var foalGender      ="<?php echo $row['FoalSex']?>";
 
		  var selectedId = "<?php echo $selectedId; ?>"; //1
		 		  
		  var idSelectVets = document.getElementById("idSelectVets").value; //2
		 
		  var idSelectBStallion = document.getElementById("idSelectBStallion").value; //3
		 	  
		  state_Of_Mare = document.querySelector('input[name="state_Of_Mare"]:checked').value; //4
		  	  
                  var expectedTerm = document.getElementById('idExpectedTerm').value; //5; 
		  
		  var expectedTermTime = document.getElementById('idExpectedTermTime').value; //6;		  		  
                  
                  var foalingDate = document.getElementById('idFoalingDate').value; //7
                  
                  var foalingDateTime = document.getElementById('idFoalingDateTime').value; //8
                                    
                  if (state_Of_Mare=="With Foal"){foalGender = document.querySelector('input[name="foalGender"]:checked').value;} //9
		  
		  var idRHMessage = document.getElementById("idRHMessage").value; //10
		  

		   		 		  
		  if(selectedId && idSelectVets && idSelectBStallion && state_Of_Mare && expectedTerm && expectedTermTime && foalingDate && foalingDateTime && foalGender 
                     && idRHMessage)
		  {
		   
		   $.ajax
		    ({
		      type: 'post',
		      url: 'server.php',
		      data: 
		      {
		         	 mare_selectedId:selectedId,
		         	 mare_idSelectVets:idSelectVets,
				 mare_idSelectBStallion:idSelectBStallion,
				 mare_state_Of_Mare:state_Of_Mare,
				 mare_expectedTerm:expectedTerm,
				 mare_expectedTermTime:expectedTermTime,
				 mare_foalingDate:foalingDate,
				 mare_foalingDateTime:foalingDateTime,
				 mare_foalGender:foalGender,
				 mare_idRHMessage:idRHMessage
		      },
		      success: function (response) 
		      {
			    alert("Everything saved correctly");
		  
		      }
		    });
		  }
		  
		  return false;
		  
		}
</script>

<!-- ENVIA LOS DATOS DEL FORMULARIO IZQ A server.php  -->       

<script>        
        function postIzq () 
		{
		 
		  var postFoalingTrauma = "<?php echo $row['PostFoalingTrauma']; ?>"; 
		  
		  var vulvarStich = "<?php echo $row['VulvarStich']; ?>"; 
		  
		  var windSuckerTest = "<?php echo $row['WindSuckerTest']; ?>";
		   
		  var selectedId = "<?php echo $selectedId; ?>"; //1
			  
		  var caslickIndexLength = document.getElementById("IdCaslickIndexLength").value; //2
		
		  var caslickIndexAngulation = document.getElementById("IdCaslickIndexAngulation").value; //3
		  		 	 	  
		  postFoalingTrauma = document.querySelector('input[name="postFoalingTrauma"]:checked').value; //4
		  
		  vulvarStich = document.querySelector('input[name="vulvarStitch"]:checked').value; //5	  
                 		  		  
                  windSuckerTest = document.querySelector('input[name="windSucketTest"]:checked').value; //6	
                  
                  var idWSTComments = document.getElementById("idWSTComments").value; //7                 
                  
		  
		  
		  

		   		 		  
		  if(selectedId && caslickIndexLength && caslickIndexAngulation && postFoalingTrauma && vulvarStich && windSuckerTest && idWSTComments)
		  {
		   
		   $.ajax
		    ({
		      type: 'post',
		      url: 'server.php',
		      data: 
		      {
		         	 mare_selectedId:selectedId,
		         	 mare_caslickIndexLength:caslickIndexLength,
				 mare_caslickIndexAngulation:caslickIndexAngulation,
				 mare_postFoalingTrauma:postFoalingTrauma,
		         	 mare_vulvarStich:vulvarStich,
				 mare_windSuckerTest:windSuckerTest,
				 mare_idWSTComments:idWSTComments
		      },
		      success: function (response) 
		      {
			    alert("Everything saved correctly");
		  
		      }
		    });
		  }
		  
		  return false;
		  
		}
</script>
  

  
  <!-- Show Entries, Search, Showing Entries, Previous Next in html datatable Procedures Tabla de Procedimientos -->
       <script type="text/javascript">
          $(document).ready(function() {
            $('#datatable').dataTable();
            $('#datatable-keytable').DataTable({
              keys: true
            });
            $('#idProcedureDatatable-responsive').DataTable();
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
 
 
 <!-- habilita los campos de fechas de Term Expected y Foaling Date y Radiobuttons de Foal Gender-->
 
 
 <script type="text/javascript">
        
  function callEnableDatesGender(clicked_id)

  {
          
    $("#retornaExpectedTerm").text('');
    $("#retornaExpectedTermTime").text('');
    $("#retornaFoalingDate").text('');    
    $("#retornaFoalingDateTime").text('');
    $("#retornaFoalGender").text('');

    
    if ((clicked_id=="foalOptionsRadios2") || (clicked_id=="foalOptionsRadios4")) {
              
    $("#retornaExpectedTerm").append("<input type='text' id='idExpectedTerm' name='expectedTerm' class='form-control col-md-3 col-xs-12' value='<?php echo 
       $valorExpectedTerm; ?>'>");
          				             				
    $("#retornaExpectedTermTime").append("<input type='text' id='idExpectedTermTime' name='expectedTermTime' class='form-control col-md-3 col-xs-12' value='<?php echo 
       $valorExpectedTermTime; ?>'>");
    
    $("#retornaFoalingDate").append("<input type='text' id='idFoalingDate' name='foalingDate' class='form-control col-md-3 col-xs-12' value='<?php echo 
       $valorFoalingDate; ?>'>");
                  
    $("#retornaFoalingDateTime").append("<input type='text' id='idFoalingDateTime' name='foalingDateTime' class='form-control col-md-3 col-xs-12' value='<?php echo 
       $valorFoalingDateTime; ?>'>");
       
       
    }
    
    
    
    if ((clicked_id=="foalOptionsRadios1") || (clicked_id=="foalOptionsRadios3")) {
    
    $("#retornaExpectedTerm").append(" <input class='form-control col-md-3 col-xs-12' id='idExpectedTerm' name='expectedTerm' required='required' type='text' value='00-00-0000' disabled> ");
          
    $("#retornaExpectedTermTime").append(" <input class='form-control col-md-3 col-xs-12' id='idExpectedTermTime' name='expectedTermTime' required='required' type='text' value='00:00' disabled> ");
    
    $("#retornaFoalingDate").append(" <input class='form-control col-md-3 col-xs-12' id='idFoalingDate' name='foalingDate' required='required' type='text' value='00-00-0000' disabled> ");
                  
    $("#retornaFoalingDateTime").append(" <input class='form-control col-md-3 col-xs-12' id='idFoalingDateTime' name='foalingDateTime' required='required' type='text' value='00:00' disabled> ");
    
    
    }
 
    if (clicked_id=="foalOptionsRadios4") {
    
    
    
    $("#retornaFoalGender").append("<label>",
          
          "<input type='radio'<?php if($row['FoalSex']=='1') {echo 'checked';}?> value='1' id='foalGenderRadios1' name='foalGender'> Male &nbsp &nbsp &nbsp &nbsp &nbsp",
          "<input type='radio'<?php if($row['FoalSex']=='0') {echo 'checked';}?> value='0' id='foalGenderRadios2' name='foalGender'> Female",
          
          "</label>");
    
    
    }
    
    <!-- Calendarios para ser mostrados despues de eleccion de State of Mare -->
    
     $('#idExpectedTerm').datepicker({
       dateFormat: 'dd-mm-yy',
        changeMonth: true,
        changeDay: true
      });

     $('#idFoalingDate').datepicker({
       dateFormat: 'dd-mm-yy',
       changeMonth: true,
       changeDay: true
     });

     $('#idExpectedTermTime').timepicker();
     $('#idFoalingDateTime').timepicker();
 
     
    
  };          
</script>
 
<!-- calcula el Caslick Index -->
<script type="text/javascript">   
                    
       $("#IdCaslickIndexAngulation").keyup(
        function() {				  				   
	 var l = $("#IdCaslickIndexLength").val();
	 var a = $(this).val();				   
	 var t= l * a;					 
	 $("#IdCaslickIndexTotal").val(t);						   
                          
                  
         });  
  </script>
  
  <script type="text/javascript">   
                    
       $("#IdCaslickIndexLength").keyup(
        function() {				  				   
	 var l = $("#IdCaslickIndexAngulation").val();
	 var a = $(this).val();				   
	 var t= l * a;					 
	 $("#IdCaslickIndexTotal").val(t);						   
                          
                  
         });  
  </script>
  
  <!-- aniade o elimina un registro en la zona tabla html cystTable -->
  
  <script type="text/javascript">          
		
		var $TABLE = $('#cystTable');
		
		
		$('.table-add').click(function () {
		
		  var $clone = $TABLE.find('tr.hide').clone(true);
		  
		  $TABLE.find('table').append($clone);
		  $TABLE.find('tbody tr:last').prev().removeClass('hide table-line');
		});
		
		
		$('.table-remove').click(function () {
		 
		 $(this).parents('tr').detach();
		});
		

		$('.btn-save').click(function () {
		
		   
		   var idJournal = "<?php echo $row[IdJournal]; ?>";
          	   var TableData;
          	   var idUOAComments= document.getElementById("idUOAComments").value;                   
          	   var selectedId = "<?php echo $selectedId; ?>";	
	            
	            
	            TableData = storeTblValues();
              	  
	             TableData = JSON.stringify(TableData);
	      
	             //alert(TableData);
                       	
	
	             $.ajax({
                         type: "POST",
                          url: "server.php",
                          data: {mare_idJournal:idJournal,
                                 tbCysts:TableData,
                                 mare_idUOAComments:idUOAComments,
                                 mare_selectedId:selectedId
                              },  
         	
    
                          success: function(msg){
                            alert("Everything saved correctly");
                               }
                       });
	
	             function storeTblValues()
                        {
          		
                        var TableData = new Array();

                          $('#idTbCysts tr').each(function(row, tr){
                           TableData[row]={
                             "size" : $(tr).find('td:eq(0)').text(),
                             "location" :$(tr).find('td:eq(1)').text()              
                           }    
                          }); 
    
                         TableData.shift();  // first row will be empty - so remove
                         TableData.splice(-1,1);
                         return TableData;
                        }	

		
         
                         return false;		
                    });


	
 
 </script>
 
 
<script type="text/javascript"> 

 $('.bttnProcedure-add').click(function () {
   var idJournal = "<?php echo $row[IdJournal]; ?>";
   
   var idSelected_procedure = document.getElementById("idSelected_procedure").value;
   //alert(idJournal);
   //alert(idSelected_procedure);
   //var $TABLE_PROCEDURES = $('#idProcedureTable');   
   
   //var name = selectedProcedure.options[selectedProcedure.selectedIndex].text;
   
   
 
                       
  
  //$('#bodyTbProcedure tr:last').after(rowP);
      
   $.ajax({
                         type: "POST",
                         url: "server.php",
                         data: {mare_idJournal:idJournal,                          
                                 mare_idSelected_procedure:idSelected_procedure
                              },  
			 success: function(data){
                           
                           alert("Procedure saved correctly");
                           $('#idProcedureTable').html(data)
					$('.bttnProcedure-edit').click(function () {
   
     					alert($(this).val());                    
    					});
                         
                            $(document).ready(function() {
                            $('#datatable').dataTable();
                            $('#datatable-keytable').DataTable({
                                keys: true
                             });
                            $('#idProcedureDatatable-responsive').DataTable();
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
                         
                         }
                    
          });
    
    return false;
     
    
 
});
</script>
 


<script>
   
$('.bttnProcedure-edit').click(function () {
   
alert($(this).val());
 
});
</script>

 <!-- /js code -->
</body>
</html>