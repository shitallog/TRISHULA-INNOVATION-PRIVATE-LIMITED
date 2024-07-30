<?php
  include("header.php");
?>
<?php
	if(isset($_GET["pid"]))
    {
      $pid = $_GET["pid"];
      $sel_p = "SELECT * FROM products WHERE p_id = '$pid'";
      $res_p = mysqli_query($con, $sel_p);
      $row_p = mysqli_fetch_array($res_p);
?>
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Products</li>
    </ol>
    <!-- Icon Cards-->
    <div class="container">
      <div class="card card-register mx-auto mt-5 mb-5">
        <div class="card-header">Update Products</div>
        <div class="card-body">
          <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label for="exampleInputLastName">Product Name</label>
              <input class="form-control" type="text" name="p_name" value="<?php echo $row_p["p_name"]; ?>" required="">
            </div>
            <div class="form-group">
              <label for="exampleInputLastName">Product Short Description</label>
              <textarea name="p_desc" class="form-control js--trumbowyg" rows="5" required=""><?php echo $row_p["p_desc"]; ?></textarea>
            </div>
            <div class="form-group">
              <label for="exampleInputLastName">Product Additional Information</label>
              <textarea name="p_addinfo" class="form-control js--trumbowyg" rows="5"><?php echo $row_p["p_addinfo"]; ?></textarea>
            </div>
      <div class="form-group">
              <label for="exampleInputLastName">Product Image</label>
              <input class="form-control" type="file" multiple name="p_img[]" accept=".png, .jpg, .jpeg">
              <span style="color: red;">Note: You can select multiple images to upload.</span>
        	<div class="row">
            <?php 
              $p_img = explode(",", $row_p["p_img"]);
              foreach ($p_img as $key => $pi)
              {
            ?>

              <div class="col-md-6 col p-0">
                <img src="../images/products/<?php echo $pi; ?>" class="img-fluid upd-img" style="width: 100%; height: 100%;">
                <button type="button" class="btn btn-danger del-img" data-toggle="modal" data-target="#DeleteImg<?php echo $key; ?>"><i class="fa fa-trash-o" aria-hidden="true" id="<?php //echo $prod_id; ?>"></i></button>
              </div>


            <?php 
              }
            ?>
            </div>
            </div>            
            <div class="form-group">
              <label for="exampleInputLastName">Product Status</label>
              <select class="form-control" name="p_status" required="">
                <option selected disabled>Select Status</option>
                <?php
                	if($row_p["p_status"] == 'Active')
                    {
                ?>
                <option value="Active" selected>Active</option>
                <option value="Inactive">Inactive</option>
                <option value="Coming Soon">Coming Soon</option>
                <?php
                    }
      				else if($row_p["p_status"] == 'Inactive')
                    {
                ?>
                <option value="Inactive" selected>Inactive</option>
                <option value="Active">Active</option>                
                <option value="Coming Soon">Coming Soon</option>
                <?php
                    }
      				else
                    {
                ?>
                <option value="Coming Soon" selected>Coming Soon</option>
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>                
                <?php
                    }
                ?>
              </select>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <button class="btn btn-primary col-md btn-block" type="submit" name="upd_p">Add</button>
                </div>
                <div class="col-md-6">
                  <button class="btn btn-danger col-md btn-block" type="reset">Clear</button>
                </div>
              </div>
            </div>

          </form>    
          <?php
              foreach ($p_img as $key => $pi)
              {
          ?>
              <div class="modal fade" id="DeleteImg<?php echo $key; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Delete Image</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>

                    <div class="modal-body">
                      <p>Are you sure you want to delete this image?</p>
                      <img src="../images/products/<?php echo $pi; ?>" class="img-fluid" style="width: 100%;">
                    </div>

                    <div class="modal-footer">
                      <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                      <form method="POST">
                        <input type="hidden" name="img_id" value="<?php echo $pi; ?>" required>
                        <button type="submit" class="btn btn-primary" name="delete_img">OK</button>
                      </form>
                    </div>
                    
                  </div>
                </div>
              </div>
          <?php 
              }
          ?> 
        </div>
      </div>
    </div>
    
  </div>
<?php
    }
?>
<?php
  include("footer.php");
  if (isset($_POST["upd_p"]))
  {
    $pid = $_GET["pid"];
    $p_name = mysqli_real_escape_string($con, $_POST['p_name']);
    $p_desc = mysqli_real_escape_string($con, $_POST['p_desc']);
    $p_addinfo = mysqli_real_escape_string($con, $_POST['p_addinfo']);
    $p_status = mysqli_real_escape_string($con, $_POST['p_status']);
    
    $p_img = implode(",", $_FILES['p_img']["name"]);
    $p_img_tmp = implode(",", $_FILES["p_img"]["tmp_name"]);
    $p_img_tmp = explode(",", $p_img_tmp);

    foreach ($p_img_tmp as $key => $value)
    {
      $target_dir = '../images/products/';
      $file_tmpname = $_FILES["p_img"]["tmp_name"][$key];
      $file_name = $_FILES['p_img']["name"][$key];    

      // Set upload file path
      $filepath = $target_dir . basename($file_name);
      
      if (move_uploaded_file($file_tmpname, $filepath))
      {

      }
      else
      {
        // echo "<script language='javascript'>
        //     window.alert('Not Executed');
        // </script>
        // ";
      }
      
    }
    if (!empty($p_img))
    {
      $update_p = "UPDATE `products` SET `p_name`='$p_name',`p_desc`='$p_desc',`p_addinfo`='$p_addinfo',`p_img`='$p_img',`p_status`='$p_status' WHERE p_id = '$pid'";
      //echo $update_p;exit;
      $res_update = mysqli_query($con, $update_p);
      if ($res_update)
      {
        echo "<script language='javascript'>
          window.alert('Product added successfully');
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
    else
    {
      $update_p = "UPDATE `products` SET `p_name`='$p_name',`p_desc`='$p_desc',`p_addinfo`='$p_addinfo',`p_status`='$p_status' WHERE p_id = '$pid'";
      //echo $update_p;exit;
      $res_update = mysqli_query($con, $update_p);
      if ($res_update)
      {
        echo "<script language='javascript'>
          window.alert('Product added successfully');
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
  }

if (isset($_POST["delete_img"]))
{
  $img_id = mysqli_real_escape_string($con, $_POST["img_id"]);
  $del_img = "UPDATE products SET `p_img` = REPLACE(`p_img`,'$img_id,',''), `p_img` = REPLACE(`p_img`,',$img_id','') WHERE `p_img` LIKE '%$img_id,%' OR `p_img` LIKE '%,$img_id%' OR `p_img` LIKE '%,$img_id,%'";
  //echo $del_img; 
  //echo "rows = ".mysqli_affected_rows($con);
  //exit;
  $rs_img = mysqli_query($con, $del_img);
  if (mysqli_affected_rows($con) > 0)
  {
    echo "<script language='javascript'>
        window.alert('Image deleted successfully');
         window.location.href='products.php'; 
    </script>
    ";
  }
  else
  {
    echo "<script language='javascript'>
        window.alert('You should have atleast one image!');
         window.location.href=''; 
    </script>
    ";
  }
}
?>