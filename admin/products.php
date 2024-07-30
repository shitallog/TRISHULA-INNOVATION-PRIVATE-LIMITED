<?php
  include("header.php");
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
        <div class="card-header">Add Products</div>
        <div class="card-body">
          <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label for="exampleInputLastName">Product Name</label>
              <input class="form-control" type="text" name="p_name" required="">
            </div>
            <div class="form-group">
              <label for="exampleInputLastName">Product Short Description</label>
              <textarea name="p_desc" class="form-control js--trumbowyg" rows="5" required=""></textarea>
            </div>
            <div class="form-group">
              <label for="exampleInputLastName">Product Additional Information</label>
              <textarea name="p_addinfo" class="form-control js--trumbowyg" rows="5" required=""></textarea>
            </div>
			<div class="form-group">
              <label for="exampleInputLastName">Product Image</label>
              <input class="form-control" type="file" multiple name="p_img[]" accept=".png, .jpg, .jpeg" required="">
              <span style="color: red;">Note: You can select multiple images.</span>
            </div>            
            <div class="form-group">
              <label for="exampleInputLastName">Product Status</label>
              <select class="form-control" name="p_status" required="">
                <option selected disabled>Select Status</option>
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
                <option value="Coming Soon">Coming Soon</option>
              </select>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <button class="btn btn-primary col-md btn-block" type="submit" name="add_p">Add</button>
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
        <i class="fa fa-table"></i> Products Details</div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Sr. No.</th>
                <th>Product Name</th>
                <th>Product Description</th>
                <th>Product Add. Info.</th>
                <th>Product Image</th>
                <th>Product Status</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
              <?php
              $sel_p = "SELECT * FROM products";
              $res_p = mysqli_query($con, $sel_p);
              if(mysqli_num_rows($res_p) > 0)
              {
                $sr_no = 1;
                while($row_p = mysqli_fetch_array($res_p))
                {
                  $p_id = $row_p["p_id"];
                  $p_name = $row_p["p_name"];
                  $p_desc = $row_p["p_desc"];
                  $p_addinfo = $row_p["p_addinfo"];
                  $p_img = explode(",", $row_p["p_img"]);
                  $p_status = $row_p["p_status"];
              ?>
              <tr>
                <td><?php echo $sr_no; ?></td>
                <td><?php echo $p_name; ?></td>
                <td><?php echo $p_desc; ?></td>
                <td><?php echo $p_addinfo; ?></td>
                <td>
                  <?php
                    foreach ($p_img as $key => $pimg)
                    {
                  ?>
                  		<img src="../images/products/<?php echo $pimg; ?>" width="300px" class="img-fluid">
                  <?php
                  	}
                  ?>
                </td>
                <td><?php echo $p_status; ?></td>
                <td>
                  <button class="btn btn-primary" data-toggle="modal" data-target="#UpdateModal<?php echo $p_id; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                  <!-- Logout Modal-->
                  <div class="modal fade" id="UpdateModal<?php echo $p_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Update Product</h5>
                          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p>Are you sure you want to update?</p>
                        </div>
                        <div class="modal-footer">
                          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                          <a class="btn btn-primary" href="upd_prod.php?pid=<?php echo $p_id; ?>">OK</a>
                        </div>
                      </div>
                    </div>
                  </div>

                  <button class="btn btn-danger" data-toggle="modal" data-target="#DeleteModal<?php echo $p_id; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                  <!-- Logout Modal-->
                  <div class="modal fade" id="DeleteModal<?php echo $p_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
                          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p>Are you sure you want to delete?</p>
                        </div>
                        <div class="modal-footer">
                          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                          <form method="POST">
                            <input type="hidden" name="pid" value="<?php echo $p_id; ?>" required="">
                            <button type="submit" class="btn btn-primary" name="delete_p">OK</button>
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
  if (isset($_POST["add_p"]))
  {
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
    $insert_p = "INSERT INTO `products`(`p_name`,`p_desc`,`p_addinfo`,`p_img`,`p_status`) VALUES ('$p_name','$p_desc','$p_addinfo','$p_img','$p_status')";
    //echo $insert_p;exit;
    $res_insert = mysqli_query($con, $insert_p);
    if ($res_insert)
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

	if(isset($_POST["delete_p"]))
    {
      $pid = mysqli_real_escape_string($con, $_POST["pid"]);

      $del_p = "DELETE FROM products WHERE p_id = '$pid'";
      //echo $del_p;exit;
      $rp = mysqli_query($con, $del_p);
      if($rp)
      {
        echo ("<script LANGUAGE='JavaScript'>
              window.alert('Product deleted successfully');
              window.location.href=''; 
        </script>");
      }
    }
?>