<?php

header('Cache-Control: no cache'); //no cache
session_cache_limiter('private_no_expire'); // works
session_start();

			date_default_timezone_set("Europe/Stockholm");
			$dt = date("Y-m-d H:i:s");





			
// variable declaration

$username = "";
$email    = "";
$ownerlastname = "";
$ownerfirstname = "";
$address = "";
$postcode = "";
$phone = "";
$horsename = "";
$gender = "";
$description = "";
$id_journal = "";
$selected_procedure = "";
$errors = array();
$_SESSION['success'] = "";

// connect to database
$db = mysqli_connect('localhost', 'salsbrod_admin', '997213217', 'salsbrod_salsbrodb');

		if (!$db)
			{
			echo 'Not Connected to the Server';
			}
		if (!mysqli_select_db($db,'salsbrod_salsbrodb'))
			{
			echo 'Database Not Selected';
			}







// REGISTER ARRIBA
if(isset($_POST['mare_selectedId']) && isset($_POST['mare_idSelectVets']) && isset($_POST['mare_idSelectBStallion'])&& isset($_POST['mare_state_Of_Mare'])&& isset($_POST['mare_expectedTerm']) && isset($_POST['mare_expectedTermTime']) && isset($_POST['mare_foalingDate']) && isset($_POST['mare_foalingDateTime']) && isset($_POST['mare_foalGender']) && isset($_POST['mare_idRHMessage']))

{  
  $selectedId=$_POST['mare_selectedId'];  
  $idSelectVets=$_POST['mare_idSelectVets'];
  $idSelectBStallion=$_POST['mare_idSelectBStallion'];
  $state_Of_Mare=$_POST['mare_state_Of_Mare'];
  $expectedTerm=$_POST['mare_expectedTerm'];
  $expectedTermTime=$_POST['mare_expectedTermTime'];
  $foalingDate=$_POST['mare_foalingDate'];
  $foalingDateTime=$_POST['mare_foalingDateTime'];
  $foalGender=$_POST['mare_foalGender'];
  $idRHMessage=$_POST['mare_idRHMessage'];
  
  
    
  $saveJournal = "UPDATE Journals SET   IdVetFk          ='$idSelectVets', 
  					IdStallionFk     ='$idSelectBStallion', 
  					MareStatus       ='$state_Of_Mare', 
  					ExpectedTerm     ='$expectedTerm',
  					ExpectedTermTime ='$expectedTermTime',
  					FoalingDate      ='$foalingDate',
  					FoalingDateTime  ='$foalingDateTime',
                                        FoalSex          ='$foalGender',
                                        RHComments       ='$idRHMessage'
  
                  WHERE IdHorseFk = '$selectedId'";
		
		mysqli_query($db, $saveJournal);
  
}

// REGISTER IZQ
if(isset($_POST['mare_selectedId']) && isset($_POST['mare_caslickIndexLength']) && isset($_POST['mare_caslickIndexAngulation']) && isset($_POST['mare_postFoalingTrauma']) && isset($_POST['mare_vulvarStich']) && isset($_POST['mare_windSuckerTest']) && isset($_POST['mare_idWSTComments']))
				 
{  
  $selectedId=$_POST['mare_selectedId'];  
  
  $caslickIndexLength=$_POST['mare_caslickIndexLength'];
  $caslickIndexAngulation=$_POST['mare_caslickIndexAngulation'];
  $postFoalingTrauma=$_POST['mare_postFoalingTrauma'];  
  $vulvarStich=$_POST['mare_vulvarStich'];
  $windSuckerTest=$_POST['mare_windSuckerTest'];
  $idWSTComments=$_POST['mare_idWSTComments'];

  
    
  $saveJournal = "UPDATE Journals SET   Length            ='$caslickIndexLength', 
  					Angulation        ='$caslickIndexAngulation', 
  					PostFoalingTrauma ='$postFoalingTrauma',
  					VulvarStich       ='$vulvarStich',
  					WindSuckerTest    ='$windSuckerTest',
  					WSTComments       ='$idWSTComments'
  			
                  WHERE IdHorseFk = '$selectedId'";
		
		mysqli_query($db, $saveJournal);
  
}


// REGISTER DER
if(isset($_POST['mare_idJournal']) && isset($_POST['tbCysts']) && isset($_POST['mare_idUOAComments']) && isset($_POST['mare_selectedId']))
		
{  
 
  $idJournal=$_POST['mare_idJournal'];  
  $tbCysts=$_POST['tbCysts'];
  $idUOAComments=$_POST['mare_idUOAComments'];
  $selectedId=$_POST['mare_selectedId'];
  
  $recordsToDelete = "DELETE FROM EndoCyst where IdJournalFk = '$idJournal'";
  mysqli_query($db, $recordsToDelete);
  
  $tbCystsJSON = $tbCysts;
  $tbCystsDecoded = json_decode($tbCystsJSON, true);



   foreach ($tbCystsDecoded as $fieldName => $value) {  

      $newRow = "INSERT INTO EndoCyst (IdJournalFk, Size, Location) VALUES ('$idJournal','$value[size]', '$value[location]')";
 
 
             mysqli_query($db, $newRow);
    
   }
 
  $saveJournal = "UPDATE Journals SET UOAComments='$idUOAComments' 
                  WHERE IdHorseFk = '$selectedId'";
		
		mysqli_query($db, $saveJournal);
}



// REGISTER PROCEDURE
if(isset($_POST['mare_idJournal']) && isset($_POST['mare_idSelected_procedure']))
		
{  
 
  $idJournal=$_POST['mare_idJournal'];  
  $idSelected_procedure=$_POST['mare_idSelected_procedure'];
 
  $saveJournalProcedure = "INSERT INTO JournalProcedures (IdJournalFk, IdProcedureFk) 
				  VALUES('$idJournal', '$idSelected_procedure')";
		
		mysqli_query($db, $saveJournalProcedure);

  $idJournalProcedure = mysqli_insert_id($db);
  
  
  switch ($idSelected_procedure) {
    
    case '1':
             $saveBacteriologicalCultureP = "INSERT INTO BacteriologicalCultureP (IdJournalProcedureFk) VALUES('$idJournalProcedure')";
	     mysqli_query($db, $saveBacteriologicalCultureP);
        break;
    case '2':
             $saveBlacksmithP = "INSERT INTO BlacksmithP (IdJournalProcedureFk) VALUES('$idJournalProcedure')";
	     mysqli_query($db, $saveBlacksmithP);
        break;
    case '3':
             $saveDewormingP = "INSERT INTO DewormingP (IdJournalProcedureFk) VALUES('$idJournalProcedure')";
             mysqli_query($db, $saveDewormingP);
        break;
    case '4':
             $saveFoalingsP = "INSERT INTO FoalingsP (IdJournalProcedureFk) VALUES('$idJournalProcedure')";
	     mysqli_query($db, $saveFoalingsP);
        break;
    case '5':
             $saveInseminationP = "INSERT INTO InseminationP (IdJournalProcedureFk) VALUES('$idJournalProcedure')";
             mysqli_query($db, $saveInseminationP);
        break;
    case '6':
             $saveIntraUterineInfusionP = "INSERT INTO IntraUterineInfusionP (IdJournalProcedureFk) VALUES('$idJournalProcedure')";
	     mysqli_query($db, $saveIntraUterineInfusionP);
        break;
    case '7':
             $saveUltrasonographiesP = "INSERT INTO UltrasonographiesP (IdJournalProcedureFk) VALUES('$idJournalProcedure')";
             mysqli_query($db, $saveUltrasonographiesP);
        break;
    case '8':
             $saveUterineBiopsyP = "INSERT INTO UterineBiopsyP (IdJournalProcedureFk) VALUES('$idJournalProcedure')";
	     mysqli_query($db, $saveUterineBiopsyP);
        break;
    case '9':
             $saveUterineCytologyP = "INSERT INTO UterineCytologyP (IdJournalProcedureFk) VALUES('$idJournalProcedure')";
             mysqli_query($db, $saveUterineCytologyP);
        break;
   case '10':
             $saveUterineLavageP = "INSERT INTO UterineLavageP (IdJournalProcedureFk) VALUES('$idJournalProcedure')";
	     mysqli_query($db, $saveUterineLavageP);
        break;
    case '11':
             $saveVaccinationP = "INSERT INTO VaccinationP (IdJournalProcedureFk) VALUES('$idJournalProcedure')";
             mysqli_query($db, $saveVaccinationP);
        break;    
    }  

                           
                           
                            
                         
         
         
                       
        
        echo "<table id='idProcedureDatatable-responsive' class='table table-striped table-bordered dt-responsive nowrap' cellspacing='0' width='100%'>                  
        
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
						
						<tbody id='bodyTbProcedure'>";
                           
                           
                           
                           
                           $queryProcedure = "SELECT BacteriologicalCultureP.IdBacteriologicalCulture, Procedures.Name, JournalProcedures.IdJournalFk, 					 
                                                     BacteriologicalCultureP.Date, BacteriologicalCultureP.Ok, BacteriologicalCultureP.Summary  FROM 
                                                     BacteriologicalCultureP, Procedures, JournalProcedures

                                                     WHERE
                                                     JournalProcedures.IdJournalFk=$idJournal AND
                                                     JournalProcedures.IdJournalProcedure=BacteriologicalCultureP.IdJournalProcedureFk AND
                                                     JournalProcedures.IdProcedureFk=Procedures.IdProcedure

                                                     UNION

                                                     SELECT BlacksmithP.IdBlacksmith, Procedures.Name, JournalProcedures.IdJournalFk, BlacksmithP.Date, 
                                                     BlacksmithP.Ok, BlacksmithP.Summary  FROM BlacksmithP, Procedures, JournalProcedures
                                                     
                                                     WHERE
                                                     JournalProcedures.IdJournalFk=$idJournal AND
                                                     JournalProcedures.IdJournalProcedure=BlacksmithP.IdJournalProcedureFk AND
                                                     JournalProcedures.IdProcedureFk=Procedures.IdProcedure
                                                     
                                                     UNION

                                                     SELECT DewormingP.IdDeworming, Procedures.Name, JournalProcedures.IdJournalFk, DewormingP.Date, 
                                                     DewormingP.Ok, DewormingP.Summary  FROM DewormingP, Procedures, JournalProcedures
                                                     
                                                     WHERE
                                                     JournalProcedures.IdJournalFk=$idJournal AND
                                                     JournalProcedures.IdJournalProcedure=DewormingP.IdJournalProcedureFk AND
                                                     JournalProcedures.IdProcedureFk=Procedures.IdProcedure
                                                     
                                                     UNION

                                                     SELECT FoalingsP.IdFoaling, Procedures.Name, JournalProcedures.IdJournalFk, FoalingsP.Date, FoalingsP.Ok, 
                                                     FoalingsP.Summary  FROM FoalingsP, Procedures, JournalProcedures
                                                     
                                                     WHERE
                                                     JournalProcedures.IdJournalFk=$idJournal AND
                                                     JournalProcedures.IdJournalProcedure=FoalingsP.IdJournalProcedureFk AND
                                                     JournalProcedures.IdProcedureFk=Procedures.IdProcedure
                                                     
                                                     UNION

                                                     SELECT InseminationP.IdInsemination, Procedures.Name, JournalProcedures.IdJournalFk, InseminationP.Date, 
                                                     InseminationP.Ok, InseminationP.Summary  FROM InseminationP, Procedures, JournalProcedures
                                                     
                                                     WHERE
                                                     JournalProcedures.IdJournalFk=$idJournal AND
                                                     JournalProcedures.IdJournalProcedure=InseminationP.IdJournalProcedureFk AND
                                                     JournalProcedures.IdProcedureFk=Procedures.IdProcedure
                                                     
                                                     UNION

                                                     SELECT IntraUterineInfusionP.IdIntraUterineInfusion, Procedures.Name, JournalProcedures.IdJournalFk, 
                                                     IntraUterineInfusionP.Date,IntraUterineInfusionP.Ok, IntraUterineInfusionP.Summary  FROM IntraUterineInfusionP, 
                                                     Procedures, JournalProcedures
                                                     
                                                     WHERE
                                                     JournalProcedures.IdJournalFk=$idJournal AND
                                                     JournalProcedures.IdJournalProcedure=IntraUterineInfusionP.IdJournalProcedureFk AND
                                                     JournalProcedures.IdProcedureFk=Procedures.IdProcedure
                                                     
                                                     UNION

                                                     SELECT UltrasonographiesP.IdUltrasonography, Procedures.Name, JournalProcedures.IdJournalFk, UltrasonographiesP.Date, 
                                                     UltrasonographiesP.Ok, UltrasonographiesP.Summary  FROM UltrasonographiesP, Procedures, JournalProcedures
                                                     
                                                     WHERE
                                                     JournalProcedures.IdJournalFk=$idJournal AND
                                                     JournalProcedures.IdJournalProcedure=UltrasonographiesP.IdJournalProcedureFk AND
                                                     JournalProcedures.IdProcedureFk=Procedures.IdProcedure
                                                     
                                                     UNION

                                                     SELECT UterineBiopsyP.IdUterineBiopsy, Procedures.Name, JournalProcedures.IdJournalFk, UterineBiopsyP.Date, 
                                                     UterineBiopsyP.Ok, UterineBiopsyP.Summary  FROM UterineBiopsyP, Procedures, JournalProcedures
                                                     
                                                     WHERE
                                                     JournalProcedures.IdJournalFk=$idJournal AND
                                                     JournalProcedures.IdJournalProcedure=UterineBiopsyP.IdJournalProcedureFk AND
                                                     JournalProcedures.IdProcedureFk=Procedures.IdProcedure
                                                     
                                                     UNION

                                                     SELECT UterineCytologyP.IdUterineCytology, Procedures.Name, JournalProcedures.IdJournalFk, UterineCytologyP.Date, 
                                                     UterineCytologyP.Ok, UterineCytologyP.Summary  FROM UterineCytologyP, Procedures, JournalProcedures
                                                     
                                                     WHERE
                                                     JournalProcedures.IdJournalFk=$idJournal AND
                                                     JournalProcedures.IdJournalProcedure=UterineCytologyP.IdJournalProcedureFk AND
                                                     JournalProcedures.IdProcedureFk=Procedures.IdProcedure
                                                     
                                                     UNION

                                                     SELECT UterineLavageP.IdUterineLavage, Procedures.Name, JournalProcedures.IdJournalFk, UterineLavageP.Date, 
                                                     UterineLavageP.Ok, UterineLavageP.Summary  FROM UterineLavageP, Procedures, JournalProcedures
                                                     
                                                     WHERE
                                                     JournalProcedures.IdJournalFk=$idJournal AND
                                                     JournalProcedures.IdJournalProcedure=UterineLavageP.IdJournalProcedureFk AND
                                                     JournalProcedures.IdProcedureFk=Procedures.IdProcedure
                                                     
                                                     UNION

                                                     SELECT VaccinationP.IdVaccination, Procedures.Name, JournalProcedures.IdJournalFk, VaccinationP.Date, 
                                                     VaccinationP.Ok, VaccinationP.Summary  FROM VaccinationP, Procedures, JournalProcedures
                                                     
                                                     WHERE
                                                     JournalProcedures.IdJournalFk=$idJournal AND
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

                                        echo "</tbody>
                                        </table>";

}



// REGISTER HORSE
if (isset($_POST['reg_horse'])) {
	 ;
	$username = $_SESSION['username'];
	$horsename = mysqli_real_escape_string($db, $_POST['horsename']);
	$gender = mysqli_real_escape_string($db, $_POST['gender']);
	$description = mysqli_real_escape_string($db, $_POST['description']);
	
		
	
		
		$query1 = "INSERT INTO Horses (HorseName, Gender, Description) 
				  VALUES('$horsename', '$gender', '$description')";
			
			mysqli_query($db, $query1);
		
			

		
		
		$query2 = "SELECT IdHorse FROM Horses WHERE HorseName='$horsename'";
		$result2 = mysqli_query($db, $query2);
		$idhorse = mysqli_fetch_row($result2);
		
		$query3 = "SELECT IdOwner FROM Owners WHERE Username='$username'";
		$result3 = mysqli_query($db, $query3);
		$idowner = mysqli_fetch_row($result3);
		
		
		$intidhorse = intval($idhorse[0]);
		$intidowner = intval($idowner[0]);
    
    				
    			$query4 = "INSERT INTO OwnerManagement (IdHorse, IdOwnerFk) 
				  VALUES('$intidhorse', '$intidowner')";
				  
				
			mysqli_query($db, $query4);
			
    
		
		
		
		
		
		//header('location: horse_management.php');

}



// REGISTER USER
if (isset($_POST['reg_user'])) {
	
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
	$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
	$ownerlastname = mysqli_real_escape_string($db, $_POST['ownerlastname']);
	$ownerfirstname = mysqli_real_escape_string($db, $_POST['ownerfirstname']);
	$address = mysqli_real_escape_string($db, $_POST['address']);
	$postcode = mysqli_real_escape_string($db, $_POST['postcode']);
	$phone = mysqli_real_escape_string($db, $_POST['phone']);
	
	// form validation: ensure that the form is correctly filled
	if (empty($username)) { array_push($errors, "Username is required"); }
	if (empty($email)) { array_push($errors, "Email is required"); }
	if (empty($password_1)) { array_push($errors, "Password is required"); }
        if (empty($ownerlastname)) { array_push($errors, "Last Name is required"); }
	if (empty($ownerfirstname)) { array_push($errors, "First Name is required"); }
	if (empty($address)) { array_push($errors, "Address is required"); }
	if (empty($postcode)) { array_push($errors, "Post Code is required"); }
	if (empty($phone)) { array_push($errors, "Phone is required"); }

	if ($password_1 != $password_2) {
	 	array_push($errors, "The two passwords do not match");
	}
	
	$hash = md5( rand(0,1000) );    // Generate random 32 character hash and assign it to a local variable.
					// Example output: f4552671f8909587cf485ea990207f3b
	
	// register user if there are no errors in the form
		if (count($errors) == 0) {
	
			
		$password = md5($password_1);//encrypt the password before saving in the database
		
		
		$query = "INSERT INTO Owners (Username, Email, Password, OwnerLastName, OwnerFirstName, Address, Postcode, Phone, Hash) 
				  VALUES('$username', '$email', '$password', '$ownerlastname', '$ownerfirstname', '$address', '$postcode', '$phone', '$hash')";
			
			mysqli_query($db, $query);
	
			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in";
			header('location: registered.php');
		
		
		
		
				$to      = $email; // Send email to our user
				$subject = 'Salsbro Data Signup | Verification'; // Give the email a subject 
				$message = '
				 
				Thanks for signing up!
				Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
				 
				------------------------
				Username: '.$username.'
				Password: '.$password_2.'
				------------------------
				 
				Please click this link to activate your account:
				http://www.salsbrodata.com/verify.php?email='.$email.'&hash='.$hash.'
				 
				'; // Our message above including the link
				                     
				$headers = 'From:noreply@salsbrodata.com' . "\r\n"; // Set from headers
				mail($to, $subject, $message, $headers); // Send our email
		
		
		
		
		}
		
		

}

 // LOGIN USER
if (isset($_POST['login_user'])) {
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$password = mysqli_real_escape_string($db, $_POST['password']);

	if (empty($username)) {
		array_push($errors, "Username is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	if (count($errors) == 0) {
		$password = md5($password);
		$query = "SELECT * FROM Owners WHERE Username='$username' AND Password='$password' AND Active='1'";
		$results = mysqli_query($db, $query);
		$typeuser = mysqli_fetch_row($results);
		
		if (mysqli_num_rows($results) == 1) {
			
			if ($typeuser[9] == 'normal'){
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: index.php');
			
			}else {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: control.php');
			}
			
			
		}else {
			array_push($errors, "Wrong Credentials or Account not activated");
		}
	}
}

?>

