<?php
  include("header.php");
?>
  <div class="container">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Vendors</li>
    </ol>
    
    <!-- Example DataTables Card-->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-table"></i> Vendor Registration Details</div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Sr. No.</th>
                <th>Vendor Name</th>
                <th>Address</th>
                <th>State</th>
                <th>City</th>
                <th>District</th>
                <th>Pincode</th>
                <th>Contact Person</th>
                <th>Contact Number</th>
                <th>Email</th>
                <th>Bank Name</th>
                <th>Branch Name</th>
                <th>Account Number</th>
                <th>IFSC Code</th>
                <th>GST Reg. No.</th>
                <th>PAN Reg. No.</th>
                <th>MSME</th>
              </tr>
            </thead>

            <tbody>
              <?php
              $sel_v = "SELECT * FROM vendor_reg";
              $res_v = mysqli_query($con, $sel_v);
              if(mysqli_num_rows($res_v) > 0)
              {
                $sr_no = 1;
                while($row_v = mysqli_fetch_array($res_v))
                {
                  $vendor_id = $row_v["vendor_id"];
                  $vendor_name = $row_v["vendor_name"];
                  $address = $row_v["address"];
                  $state = $row_v["state"];
                  $city = $row_v["city"];
                  $district = $row_v["district"];
                  $pincode = $row_v["pincode"];
                  $contact_person = $row_v["contact_person"];
                  $contact_number = $row_v["contact_number"];
                  $email = $row_v["email"];
                  $bank_name = $row_v["bank_name"];
                  $branch_name = $row_v["branch_name"];
                  $account_no = $row_v["account_no"];
                  $ifsc_code = $row_v["ifsc_code"];
                  $gst_reg_no = $row_v["gst_reg_no"];
                  $pan_reg_no = $row_v["pan_reg_no"];
                  $msme = $row_v["msme"];
              ?>
              <tr>
                <td><?php echo $sr_no; ?></td>
                <td><?php echo $vendor_name; ?></td>
                <td><?php echo $address; ?></td>
                <td>
                  <?php
                  	$sel_state = "SELECT * FROM state_list WHERE state_id = '$state'";
                  	$res_state = mysqli_query($con, $sel_state);
                  	$row_state = mysqli_fetch_array($res_state);
                  	echo $row_state["state"];
                  ?>
                </td>
                <td>
                  <?php
                  	$sel_city = "SELECT * FROM city_list WHERE city_id = '$city'";
                  	$res_city = mysqli_query($con, $sel_city);
                  	$row_city = mysqli_fetch_array($res_city);
                  	echo $row_city["city"];
                  ?>
                </td>
                <td>
                  <?php
                  	$sel_district = "SELECT * FROM district_list WHERE district_id = '$district'";
                  	$res_district = mysqli_query($con, $sel_district);
                  	$row_district = mysqli_fetch_array($res_district);
                  	echo $row_district["district"];
                  ?>
                </td>
                <td><?php echo $pincode; ?></td>
                <td><?php echo $contact_person; ?></td>
                <td><?php echo $contact_number; ?></td>
                <td><?php echo $email; ?></td>
                <td><?php echo $bank_name; ?></td>
                <td><?php echo $branch_name; ?></td>
                <td><?php echo $account_no; ?></td>
                <td><?php echo $ifsc_code; ?></td>
                <td><?php echo $gst_reg_no; ?></td>
                <td><?php echo $pan_reg_no; ?></td>
                <td><?php echo $msme; ?></td>
                <!-- <td>
                  <button class="btn btn-danger" data-toggle="modal" data-target="#DeleteModal<?php echo $vendor_id; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                  <!-- Logout Modal-->
                  <!-- <div class="modal fade" id="DeleteModal<?php echo $vendor_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <input type="hidden" name="imgid" value="<?php echo $vendor_id; ?>" required="">
                            <button type="submit" class="btn btn-primary" name="delete_simg">OK</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </td> -->
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
?>