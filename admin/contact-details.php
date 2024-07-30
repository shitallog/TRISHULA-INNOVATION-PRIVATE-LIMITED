<?php
  include("header.php");
?>
<?php
  $select = "SELECT * FROM contact_details WHERE c_id = '1'";
  $result = mysqli_query($con, $select);
  $row = mysqli_fetch_array($result);
?>
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Contact Details</li>
    </ol>
    <!-- Icon Cards-->
    <div class="container">
      <div class="card card-register mx-auto mt-5 mb-5">
        <div class="card-header">Add Contact Details</div>
        <div class="card-body">
          <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label for="exampleInputLastName">Contact Number</label>
              <input class="form-control" type="tel" aria-describedby="" pattern="[789][0-9]{9}" maxlength="10" name="contact_no" value="<?php echo $row["contact_no"]; ?>" required>
            </div>
            <div class="form-group">
              <label for="exampleInputLastName">Email</label>
              <input class="form-control" type="email" aria-describedby="" name="email" value="<?php echo $row["email"]; ?>" required>
            </div>
            <div class="form-group">
              <label for="exampleInputLastName">Address</label>
              <textarea class="form-control" rows="5" name="address" required><?php echo $row["address"]; ?></textarea>
            </div>
            <div class="form-group">
              <label for="exampleInputLastName">Facebook URL</label>
              <input class="form-control" type="url" aria-describedby="" name="facebook_url" value="<?php echo $row["facebook_url"]; ?>" required>
            </div>
            <div class="form-group">
              <label for="exampleInputLastName">Twitter URL</label>
              <input class="form-control" type="url" aria-describedby="" name="twitter_url" value="<?php echo $row["twitter_url"]; ?>" required>
            </div>
            <div class="form-group">
              <label for="exampleInputLastName">Instagram URL</label>
              <input class="form-control" type="url" aria-describedby="" name="insta_url" value="<?php echo $row["insta_url"]; ?>" required>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <button class="btn btn-primary col-md btn-block" type="submit" name="upd_contact">Update</button>
                </div>
                <div class="col-md-6">
                  <button class="btn btn-danger col-md btn-block" type="reset">Clear</button>
                </div>
              </div>
            </div>

          </form>    
        </div>
      </div>
    </div>
  </div>
<?php
  include("footer.php");
  if(isset($_POST["upd_contact"]))
  {
    $contact_no = mysqli_real_escape_string($con, $_POST["contact_no"]);
    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $address = mysqli_real_escape_string($con, $_POST["address"]);
    $facebook_url = mysqli_real_escape_string($con, $_POST["facebook_url"]);
    $twitter_url = mysqli_real_escape_string($con, $_POST["twitter_url"]);
    $insta_url = mysqli_real_escape_string($con, $_POST["insta_url"]);
	
    $update = "UPDATE `contact_details` SET `contact_no`='$contact_no',`email`='$email',`address`='$address',`facebook_url`='$facebook_url',`twitter_url`='$twitter_url',`insta_url`='$insta_url' WHERE c_id = '1'";
    //echo $update;exit;
    $update_result = mysqli_query($con, $update);
    if($update_result)
    {
      echo "<script language='javascript'>
            window.alert('Contact Details Updated successfully');
            window.location.href=''; 
      </script>";
    }
    else
    {
      echo "<script language='javascript'>
            window.alert('There may be a technical problem, please try again later!');
            window.location.href=''; 
      </script>";
    }  
            
  }
?>