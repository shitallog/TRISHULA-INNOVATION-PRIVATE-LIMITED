<?php
  include("header.php");
?>
<?php
	if(isset($_GET["imgid"]))
    {
      $imgid = $_GET["imgid"];
      $select = "SELECT * FROM slider_imgs WHERE img_id = '$imgid'";
      $result = mysqli_query($con, $select);
      $row = mysqli_fetch_array($result);
?>
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Home Slider</li>
    </ol>
    <!-- Icon Cards-->
    <div class="container">
      <div class="card card-register mx-auto mt-5 mb-5">
        <div class="card-header">Add Home Slider Images</div>
        <div class="card-body">
          <form method="POST" enctype="multipart/form-data">

            <div class="form-group">
              <label for="exampleInputLastName">Slider Image</label>
              <input class="form-control" type="file" name="slider_img" accept=".png, .jpg, .jpeg" required="">
              <img class="img-fluid" width="" src="../images/slider-main/<?php echo $row["img"]; ?>">
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <button class="btn btn-primary col-md btn-block" type="submit" name="upd_slider">Update</button>
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
  if(isset($_POST["upd_slider"]))
  {
    $target_dir = "../images/slider-main/";
    $slider_img = $_FILES["slider_img"]["name"];
    $target_file = $target_dir . basename($slider_img);
	if(file_exists($target_file))
    {
      	$slider_img1 = time()."_".$slider_img;
        $target_file1 = $target_dir.$slider_img1;
        // echo $filepath1;exit;
        if( move_uploaded_file($_FILES["slider_img"]["tmp_name"], $target_file1))
        {
            if(isset($_GET["imgid"]))
            {
              $imgid = $_GET["imgid"];
              $update = "UPDATE slider_imgs SET img = '$slider_img1' WHERE img_id = '$imgid'";
              //echo $update;exit;
              $update_result = mysqli_query($con, $update);
              if($update_result)
              {
                echo "<script language='javascript'>
                        window.alert('Slider Image Updated successfully');
                         window.location.href='home-slider.php'; 
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
            // echo "Error uploading {$file_name} <br />"; 
        }
    }
    else
    {
      if (move_uploaded_file($_FILES["slider_img"]["tmp_name"], $target_file))
      {
        if(isset($_GET["imgid"]))
        {
          $imgid = $_GET["imgid"];
          $update = "UPDATE slider_imgs SET img = '$slider_img' WHERE img_id = '$imgid'";
          //echo $update;exit;
          $update_result = mysqli_query($con, $update);
          if($update_result)
          {
            echo "<script language='javascript'>
                    window.alert('Slider Image Updated successfully');
                     window.location.href='home-slider.php'; 
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
  }
?>