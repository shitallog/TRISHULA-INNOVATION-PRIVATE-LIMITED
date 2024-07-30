<?php
include("config.php");
if (! empty($_POST["state_id"]))
{
    
    $state_id = $_POST["state_id"];
    
      $state = "SELECT * FROM city_list WHERE state_id = '$state_id'";
      //echo $state;exit;
      $r_state = mysqli_query($con, $state);
      if(mysqli_num_rows($r_state) > 0)
      {
    ?>
    <option value="" selected disabled>Select City:</option>
    <?php
        while ($row_state = mysqli_fetch_array($r_state))
        {
            $cityid = $row_state["city_id"];
            $citynm = $row_state["city"];
    ?>
    <option value="<?php echo $cityid; ?>"><?php echo $citynm; ?></option>
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