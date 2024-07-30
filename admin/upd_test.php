<?php
  include("header.php");
?>
<?php
	if (isset($_GET["tid"]))
    {
      $tid = $_GET["tid"];
      $sel_test = "SELECT * FROM testimonials WHERE t_id = '$tid'";
      $res_test = mysqli_query($con, $sel_test);
      $row_test = mysqli_fetch_array($res_test);
?>
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Testimonials</li>
    </ol>
    <!-- Icon Cards-->
    <div class="container">
      <div class="card card-register mx-auto mt-5 mb-5">
        <div class="card-header">Update Testimonials</div>
        <div class="card-body">
          <form method="POST" enctype="multipart/form-data">
			<div class="form-group">
              <label for="exampleInputLastName">Client Image</label>
              <input class="form-control" type="file" name="client_img" accept=".png, .jpg, .jpeg">
              <img class="img-fluid" width="" src="../images/clients/<?php echo $row_test["client_img"]; ?>">
            </div>
            <div class="form-group">
              <label for="exampleInputLastName">Client Name</label>
              <input class="form-control" type="text" name="client_name" value="<?php echo $row_test["client_name"]; ?>" required="">
            </div>
            <div class="form-group">
              <label for="exampleInputLastName">Client Review</label>
              <textarea class="form-control" rows="5" name="client_review" required=""><?php echo $row_test["client_review"]; ?></textarea>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <button class="btn btn-primary col-md btn-block" type="submit" name="upd_test">Update</button>
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
	}
?>
<?php
  include("footer.php");
  if (isset($_POST["upd_test"]))
  {
    $client_name = mysqli_real_escape_string($con, $_POST["client_name"]);
    $client_review = mysqli_real_escape_string($con, $_POST["client_review"]);
    $target_dir = "../images/clients/";
    $client_img = $_FILES["client_img"]["name"];
    $target_file = $target_dir . basename($client_img);

    if (move_uploaded_file($_FILES["client_img"]["tmp_name"], $target_file))
    {
      
    }
    
    if (!empty($client_img))
  	{
      if (isset($_GET["tid"]))
      {
      	$tid = $_GET["tid"];
        $update = "UPDATE `testimonials` SET `client_name`='$client_name',`client_review`='$client_review',`client_img`='$client_img' WHERE t_id = '$tid'";
        //echo $update;exit;
        $update_result = mysqli_query($con, $update);
        if($update_result)
        {
          echo "<script language='javascript'>
                  window.alert('Testimonial updated successfully');
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
    }
    else
    {
      if (isset($_GET["tid"]))
      {
      	$tid = $_GET["tid"];
        $update = "UPDATE `testimonials` SET `client_name`='$client_name',`client_review`='$client_review' WHERE t_id = '$tid'";
        //echo $update;exit;
        $update_result = mysqli_query($con, $update);
        if($update_result)
        {
          echo "<script language='javascript'>
                  window.alert('Testimonial updated successfully');
                   window.location.href='testimonials.php'; 
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
    }
  }
?>