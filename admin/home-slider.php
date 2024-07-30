<?php
  include("header.php");
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
              <input class="form-control" type="file" multiple name="slider_img[]" accept=".png, .jpg, .jpeg" required="">
              <span style="color: red;">Note: You can select multiple images.</span>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <button class="btn btn-primary col-md btn-block" type="submit" name="add_slider">Add</button>
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
    
    <!-- Example DataTables Card-->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-table"></i> Home Slider Details</div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Sr. No.</th>
                <th>Slider Image</th>
                <th>Image Name</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
              <?php
              $sel_slider = "SELECT * FROM slider_imgs";
              $res_slider = mysqli_query($con, $sel_slider);
              if(mysqli_num_rows($res_slider) > 0)
              {
                $sr_no = 1;
                while($row_hs = mysqli_fetch_array($res_slider))
                {
                  $img_id = $row_hs["img_id"];
                  $img = $row_hs["img"];
              ?>
              <tr>
                <td><?php echo $sr_no; ?></td>
                <td><img class="img-fluid" width="300px" src="../images/slider-main/<?php echo $img; ?>"></td>
                <td><?php echo $img; ?></td>
                <td>
                  <button class="btn btn-primary" data-toggle="modal" data-target="#UpdateModal<?php echo $img_id; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                  <!-- Logout Modal-->
                  <div class="modal fade" id="UpdateModal<?php echo $img_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Update Slider Image</h5>
                          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p>Are you sure you want to update this image?</p>
                          <img class="img-fluid" width="" src="../images/slider-main/<?php echo $img; ?>">
                        </div>
                        <div class="modal-footer">
                          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                          <a class="btn btn-primary" href="upd_slider_img.php?imgid=<?php echo $img_id; ?>">OK</a>
                        </div>
                      </div>
                    </div>
                  </div>

                  <button class="btn btn-danger" data-toggle="modal" data-target="#DeleteModal<?php echo $img_id; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                  <!-- Logout Modal-->
                  <div class="modal fade" id="DeleteModal<?php echo $img_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Delete Slider Image</h5>
                          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p>Are you sure you want to delete this image?</p>
                          <img class="img-fluid" width="" src="../images/slider-main/<?php echo $img; ?>">
                        </div>
                        <div class="modal-footer">
                          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                          <form method="POST">
                            <input type="hidden" name="imgid" value="<?php echo $img_id; ?>" required="">
                            <button type="submit" class="btn btn-primary" name="delete_simg">OK</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
              <?php
					$sr_no++;
                }
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>        
    </div>
    
  </div>
<?php
  include("footer.php");
  if (isset($_POST["add_slider"]))
  {
    $slider_img = implode(",", $_FILES['slider_img']["name"]);
    $slider_img_tmp = implode(",", $_FILES["slider_img"]["tmp_name"]);
    $s_img_tmp = explode(",", $slider_img_tmp);

    foreach ($s_img_tmp as $key => $value)
    {
      $target_dir = '../images/slider-main/';
      $file_tmpname = $_FILES["slider_img"]["tmp_name"][$key];
      $file_name = $_FILES['slider_img']["name"][$key];    

      // Set upload file path
      $filepath = $target_dir . basename($file_name);
      if(file_exists($filepath))
      {
        $file_new_name = time()."_".$file_name;
        $file_new_path = $target_dir.$file_new_name;
        // echo $filepath1;exit;
        if( move_uploaded_file($file_tmpname, $file_new_path))
        {
          // echo "{$file_name} successfully uploaded <br />";
          $insert_slider = "INSERT INTO `slider_imgs`(`img`) VALUES ('$file_new_name')";
          //echo $insert_slider;
          $res_insert = mysqli_query($con, $insert_slider);
          if ($res_insert)
          {
            echo "<script language='javascript'>
                        window.alert('Slider Image(s) added successfully');
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
        else
        {                     
          // echo "Error uploading {$file_name} <br />"; 
        }
      }
      else
      {
        if (move_uploaded_file($file_tmpname, $filepath))
        {
          $insert_slider = "INSERT INTO `slider_imgs`(`img`) VALUES ('$file_name')";
          //echo $insert_slider;
          $res_insert = mysqli_query($con, $insert_slider);
          if ($res_insert)
          {
            echo "<script language='javascript'>
                    window.alert('Slider Image(s) added successfully');
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
        else
        {
          // echo "<script language='javascript'>
          //     window.alert('Not Executed');
          // </script>
          // ";
        }
      }
    }
  }

	if(isset($_POST["delete_simg"]))
    {
      $imgid = mysqli_real_escape_string($con, $_POST["imgid"]);

      $del_img = "DELETE FROM slider_imgs WHERE img_id = '$imgid'";
      //echo $del_bd;exit;

      $rimg = mysqli_query($con, $del_img);
      if($rimg)
      {
        echo ("<script LANGUAGE='JavaScript'>
                  window.alert('Slider Image deleted successfully');
                  window.location.href=''; 
               </script>");
      }
    }
?>