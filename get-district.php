<?php
include("config.php");
if (! empty($_POST["state_id"]))
{
    
    $state_id = $_POST["state_id"];
    
      $district = "SELECT * FROM district_list WHERE state_id = '$state_id'";
      //echo $district;exit;
      $r_dist = mysqli_query($con, $district);
      if(mysqli_num_rows($r_dist) > 0)
      {
    ?>
    <option value="" selected disabled>Select District:</option>
    <?php
        while ($row_dist = mysqli_fetch_array($r_dist))
        {
            $dist_id = $row_dist["district_id"];
            $distnm = $row_dist["district"];
    ?>
    <option value="<?php echo $dist_id; ?>"><?php echo $distnm; ?></option>
    <?php
          
        }
      }
  	  else
      {
    ?>
    	<option value="" selected disabled>No Data Available.</option>
    <?php
      }
    
  	
}
?>