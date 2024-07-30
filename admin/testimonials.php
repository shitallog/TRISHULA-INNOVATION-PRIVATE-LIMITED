<?php
  include("header.php");
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
        <div class="card-header">Add Testimonials</div>
        <div class="card-body">
          <form method="POST" enctype="multipart/form-data">
			<div class="form-group">
              <label for="exampleInputLastName">Client Image</label>
              <input class="form-control" type="file" name="client_img" accept=".png, .jpg, .jpeg" required="">
            </div>
            <div class="form-group">
              <label for="exampleInputLastName">Client Name</label>
              <input class="form-control" type="text" name="client_name" required="">
            </div>
            <div class="form-group">
              <label for="exampleInputLastName">Client Review</label>
              <textarea class="form-control" rows="5" name="client_review" required=""></textarea>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <button class="btn btn-primary col-md btn-block" type="submit" name="add_test">Add</button>
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
        <i class="fa fa-table"></i> Testimonials Details</div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Sr. No.</th>
                <th>Client Image</th>
                <th>Client Name</th>
                <th>Client Review</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
              <?php
              $sel_test = "SELECT * FROM testimonials";
              $res_test = mysqli_query($con, $sel_test);
              if(mysqli_num_rows($res_test) > 0)
              {
                $sr_no = 1;
                while($row_t = mysqli_fetch_array($res_test))
                {
                  $client_id = $row_t["t_id"];
                  $client_img = $row_t["client_img"];
                  $client_name = $row_t["client_name"];
                  $client_review = $row_t["client_review"];
              ?>
              <tr>
                <td><?php echo $sr_no; ?></td>
                <td><img class="img-fluid" width="300px" src="../images/clients/<?php echo $client_img; ?>"></td>
                <td><?php echo $client_name; ?></td>
                <td><?php echo $client_review; ?></td>
                <td>
                  <button class="btn btn-primary" data-toggle="modal" data-target="#UpdateModal<?php echo $client_id; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                  <!-- Logout Modal-->
                  <div class="modal fade" id="UpdateModal<?php echo $client_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Update Client Testimonial</h5>
                          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p>Are you sure you want to update?</p>
                        </div>
                        <div class="modal-footer">
                          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                          <a class="btn btn-primary" href="upd_test.php?tid=<?php echo $client_id; ?>">OK</a>
                        </div>
                      </div>
                    </div>
                  </div>

                  <button class="btn btn-danger" data-toggle="modal" data-target="#DeleteModal<?php echo $client_id; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                  <!-- Logout Modal-->
                  <div class="modal fade" id="DeleteModal<?php echo $client_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Delete Client Testimonial</h5>
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
                            <input type="hidden" name="tid" value="<?php echo $client_id; ?>" required="">
                            <button type="submit" class="btn btn-primary" name="delete_test">OK</button>
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
  if (isset($_POST["add_test"]))
  {
      $client_name = mysqli_real_escape_string($con, $_POST["client_name"]);
      $client_review = mysqli_real_escape_string($con, $_POST["client_review"]);
      $target_dir = "../images/clients/";
      $client_img = $_FILES["client_img"]["name"];
      $target_file = $target_dir . basename($client_img);
      
      if (move_uploaded_file($_FILES["client_img"]["tmp_name"], $target_file))
      {
        $insert = "INSERT INTO testimonials (client_img, client_name, client_review) VALUES ('$client_img', '$client_name', '$client_review')";
        //echo $insert;exit;
        $insert_result = mysqli_query($con, $insert);
        if($insert_result)
        {
            echo "<script language='javascript'>
                window.alert('Testimonial added successfully');
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

	if(isset($_POST["delete_test"]))
    {
      $tid = mysqli_real_escape_string($con, $_POST["tid"]);

      $del_test = "DELETE FROM testimonials WHERE t_id = '$tid'";
      echo $del_test;exit;

      $rt = mysqli_query($con, $del_test);
      if($rt)
      {
        echo ("<script LANGUAGE='JavaScript'>
                  window.alert('Testimonial deleted successfully');
                  window.location.href=''; 
               </script>");
      }
    }
?>