<?php
  include("header.php");
?>
<?php
  $select = "SELECT * FROM about WHERE about_id = '1'";
  $result = mysqli_query($con, $select);
  $row = mysqli_fetch_array($result);
?>
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">About Us</li>
    </ol>
    <!-- Icon Cards-->
    <div class="container">
      <div class="card card-register mx-auto mt-5 mb-5">
        <div class="card-header">Add About</div>
        <div class="card-body">
          <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <textarea name="about_text" class="form-control js--trumbowyg" rows="10"><?php echo $row["about_text"]; ?></textarea>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <button class="btn btn-primary col-md btn-block" type="submit" name="upd_about">Update</button>
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
  if(isset($_POST["upd_about"]))
  {
    $about_text = mysqli_real_escape_string($con, $_POST["about_text"]);
	
    $update = "UPDATE about SET about_text = '$about_text' WHERE about_id = '1'";
    //echo $update;exit;
    $update_result = mysqli_query($con, $update);
    if($update_result)
    {
      echo "<script language='javascript'>
            window.alert('About Us Updated successfully');
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