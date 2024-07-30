<?php
	include("header.php");
?>
<section id="main-container" class="main-container" style="background: #eeeeee;">
	<div class="container">
		<div class="row">
			<div class="col">				
				<form id="contact-form" method="post" role="form">
		         <div class="service-box">
		          <h2 class="pb-4">VENDOR DETAILS</h2>
		          <div class="row pb-4">
		            <div class="col-md-12">
		              <div class="form-group">	
		              <label>*Vendor Name:</label>	                
		                <input type="text" class="form-control" name="vendor_name" placeholder="" required>
		              </div>
		            </div>
		        </div>
		        <h6 class="pb-2">ADDRESS COMMUNICATION</h6>
		        <div class="row pb-4">		        	
		            <div class="col-md-12">		            	
		              <div class="form-group">	
		              <label>Address:</label>	                
		                <input type="text" class="form-control" name="address" placeholder="" required>
		              </div>
		            </div>
		            <div class="col-md-3">
		              <div class="form-group">	
		              <label>State:</label>
		                <select class="form-control" name="state" required onChange="getState(this.value);">
		                	<option disabled selected>Select State</option>
                          	<?php              
                              $state = "SELECT * FROM state_list";
                              //echo $stype;
                              $rstate = mysqli_query($con, $state);
                              $cstate = mysqli_num_rows($rstate);
                              if($cstate > 0)
                              {
                                while($row_state = mysqli_fetch_array($rstate))
                                {
                                  $state_id = $row_state["state_id"];
                                  $state_nm = $row_state["state"];
                                 
                            ?>
                            <option value="<?php echo $state_id; ?>"><?php echo $state_nm; ?></option>
                            <?php
                                  
                                }
                              }
                            ?>
		                </select>
		              </div>
		            </div>
		            <div class="col-md-3">
		              <div class="form-group">	
		              <label>City:</label>	                
		                <select class="form-control" name="city" required id="state-list" disabled>
		                	<option disabled selected>Select City</option>
		                </select>
		              </div>
		            </div>
		            <div class="col-md-3">
		              <div class="form-group">	
		              <label>District:</label>	                
		                <select class="form-control" name="district" required id="city-list" disabled>
		                	<option disabled selected>Select District</option>
		                </select>
		              </div>
		            </div>
		            <div class="col-md-3">
		              <div class="form-group">	
		              <label>Pincode:</label>	                
		                <input type="text" class="form-control" name="pincode" placeholder="" required>
		              </div>
		            </div>
		        </div>
		        <h6 class="pb-2">CONTACT INFORMATION</h6>
		        <div class="row pb-4">
		            <div class="col-md-4">
		              <div class="form-group">	
		              <label>Contact Person:</label>
		                <input type="text" class="form-control" name="contact_person" placeholder="" required>
		              </div>
		            </div>
		            <div class="col-md-4">
		              <div class="form-group">	
		              <label>Contact Number:</label>
		                <input type="text" class="form-control" name="contact_number" placeholder="" required>
		              </div>
		            </div>
		            <div class="col-md-4">
		              <div class="form-group">	
		              <label>Email:</label>
		                <input type="email" class="form-control" name="email" placeholder="" required>
		              </div>
		            </div>
		         </div>
		         <h6 class="pb-2">BANK DETAILS</h6>
		        <div class="row pb-4">		        	
		            <div class="col-md-12">		            	
		              <div class="form-group">	
		              <label>Name of Bank:</label>	                
		                <input type="text" class="form-control" name="bank_name" placeholder="" required>
		              </div>
		            </div>
		            <div class="col-md-4">
		              <div class="form-group">	
		              <label>Name of Branch:</label>	                
		                <input type="text" class="form-control" name="branch_name" placeholder="" required>
		              </div>
		            </div>
		            <div class="col-md-4">
		              <div class="form-group">	
		              <label>Account No.:</label>	                
		                <input type="text" class="form-control" name="account_no" placeholder="" required>
		              </div>
		            </div>
		            <div class="col-md-4">
		              <div class="form-group">	
		              <label>IFSC Code:</label>	                
		                <input type="text" class="form-control" name="ifsc_code" placeholder="" required>
		              </div>
		            </div>
		        </div>
		        <h6 class="pb-2">OTHER DETAILS</h6>
		        <div class="row pb-4">	
		            <div class="col-md-4">
		              <div class="form-group">	
		              <label>GST Registration No.:</label>	                
		                <input type="text" class="form-control" name="gst_reg_no" placeholder="" required>
		              </div>
		            </div>
		            <div class="col-md-4">
		              <div class="form-group">	
		              <label>PAN Registration No.:</label>	                
		                <input type="text" class="form-control" name="pan_reg_no" placeholder="" required>
		              </div>
		            </div>
		            <div class="col-md-4">
		              <div class="form-group">	
		              <label>MSME:</label>	                
		                <input type="text" class="form-control" name="msme" placeholder="" required>
		              </div>
		            </div>
		        </div>

		          <div class="text-right"><br>
		            <button class="btn btn-primary solid blank" type="submit" name="add_vendor">Submit</button>
		          </div>
		         </div>

		        </form>
			</div>
		</div>
	</div>
</section>
<?php
	include("footer.php");
?>
<?php
	if(isset($_POST["add_vendor"]))
    {
      $vendor_name = mysqli_real_escape_string($con, $_POST["vendor_name"]);
      $address = mysqli_real_escape_string($con, $_POST["address"]);
      $state = mysqli_real_escape_string($con, $_POST["state"]);
      $city = mysqli_real_escape_string($con, $_POST["city"]);
      $district = mysqli_real_escape_string($con, $_POST["district"]);
      $pincode = mysqli_real_escape_string($con, $_POST["pincode"]);
      $contact_person = mysqli_real_escape_string($con, $_POST["contact_person"]);
      $contact_number = mysqli_real_escape_string($con, $_POST["contact_number"]);
      $email = mysqli_real_escape_string($con, $_POST["email"]);
      $bank_name = mysqli_real_escape_string($con, $_POST["bank_name"]);
      $branch_name = mysqli_real_escape_string($con, $_POST["branch_name"]);
      $account_no = mysqli_real_escape_string($con, $_POST["account_no"]);
      $ifsc_code = mysqli_real_escape_string($con, $_POST["ifsc_code"]);
      $gst_reg_no = mysqli_real_escape_string($con, $_POST["gst_reg_no"]);
      $pan_reg_no = mysqli_real_escape_string($con, $_POST["pan_reg_no"]);
      $msme = mysqli_real_escape_string($con, $_POST["msme"]);
      
      $insert = "INSERT INTO `vendor_reg`(`vendor_name`, `address`, `state`, `city`, `district`, `pincode`, `contact_person`, `contact_number`, `email`, `bank_name`, `branch_name`, `account_no`, `ifsc_code`, `gst_reg_no`, `pan_reg_no`, `msme`) VALUES ('$vendor_name', '$address','$state' ,'$city' ,'$district' ,'$pincode' ,'$contact_person' ,'$contact_number' ,'$email' ,'$bank_name' ,'$branch_name' ,'$account_no' ,'$ifsc_code' ,'$gst_reg_no' ,'$pan_reg_no' ,'$msme')";
      //echo $insert;
      
      $sel_state = "SELECT * FROM state_list WHERE state_id = '$state'";
      $r_state = mysqli_query($con, $sel_state);
      $row_state = mysqli_fetch_array($r_state);
      $state_nm = $row_state["state"];
      
      $sel_city = "SELECT * FROM city_list WHERE city_id = '$city'";
      $r_city = mysqli_query($con, $sel_city);
      $row_city = mysqli_fetch_array($r_city);
      $city_nm = $row_city["city"];
      
      $sel_district = "SELECT * FROM district_list WHERE district_id = '$district'";
      $r_district = mysqli_query($con, $sel_district);
      $row_district = mysqli_fetch_array($r_district);
      $district_nm = $row_district["district"];
      
      $to = "trishulainnovation2021@gmail.com";
      $subject = "Vendor Registration | Trishula Innovation PVT LTD";

      $message = "<p>Dear Trishula Innovation,</p>";
      $message .= "<br>";
      $message .= "<p>".$contact_person." has registered for vendor from your website</p>";
      $message .= "<br>";
      $message .= "<h3>Vendor Details:</h3>";
      $message .= "<p><b>Vendor Name:</b> ".$vendor_name."</p>";
      $message .= "<p><b>Address:</b> ".$address."</p>";
      $message .= "<p><b>State:</b> ".$state_nm."</p>";        
      $message .= "<p><b>City:</b> ".$city_nm."</p>";
      $message .= "<p><b>District:</b> ".$district_nm."</p>";
      $message .= "<p><b>Pincode:</b> ".$pincode."</p>";
      $message .= "<p><b>Contact Person:</b> ".$contact_person."</p>";        
      $message .= "<p><b>Contact Number:</b> ".$contact_number."</p>";
      $message .= "<p><b>Email:</b> ".$email."</p>";
      $message .= "<p><b>Bank Name:</b> ".$bank_name."</p>";
      $message .= "<p><b>Branch Name:</b> ".$branch_name."</p>";        
      $message .= "<p><b>Account No.:</b> ".$account_no."</p>";
      $message .= "<p><b>IFSC Code:</b> ".$ifsc_code."</p>";
      $message .= "<p><b>GST Registration No.:</b> ".$gst_reg_no."</p>";
      $message .= "<p><b>PAN Registration No.:</b> ".$pan_reg_no."</p>";        
      $message .= "<p><b>MSME:</b> ".$msme."</p>";

      $header = "From: ".$email." \r\n";
      //$returnpath = "-f ".$email."\r\n";
      $header .= "MIME-Version: 1.0\n" ;
      $header .= "Content-Type: text/html; charset=\"iso-8859-1\"\n";
      $header .= "X-Priority: 1 (Highest)\n";
      $header .= "X-MSMail-Priority: High\n";
      $header .= "Importance: High\n";
      //$header .= "reply-to: ".$email."\r\n". //creating headers
      //$header .= "X-Priority: 1\n". //headers for priority
      //$header .= "Priority: Urgent\n". //headers for priority
      
      //$header .= "MIME-Version: 1.0\r\n";
      $header .= "Content-type: text/html\r\n";
      //$header .= "Importance: high"; //set importance

      $retval = mail($to,$subject,$message,$header);
      
      
      if($retval)
      {
        $result = mysqli_query($con, $insert);
        echo "<script language='javascript'>
          window.alert('Vendor registration successful');
           window.location.href=''; 
        </script>
        ";
      }
      else
      {
        echo "<script language='javascript'>
          window.alert('There may be a technical problem, please try again later!');
           window.location.href=''; 
        </script>
        ";
      }
    }
?>