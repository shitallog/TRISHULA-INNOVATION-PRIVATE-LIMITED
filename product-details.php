<?php 
  include("header.php");
?>
<section id="ts-features" class="ts-features">
  <div class="container">
    
    <?php
      if(isset($_GET["id"]))
      {
        $id = $_GET["id"];
      	$sel_products = "SELECT * FROM products WHERE p_id = '$id'";
      	$res_products = mysqli_query($con, $sel_products);
      	if(mysqli_num_rows($res_products) > 0)
        {
          while($row_prod = mysqli_fetch_array($res_products))
          {
            $p_id = $row_prod["p_id"];
            $p_name = $row_prod["p_name"];
            $p_desc = $row_prod["p_desc"];
            $p_addinfo = $row_prod["p_addinfo"];
            $p_img = explode(",", $row_prod["p_img"]);
            $p_status = $row_prod["p_status"];
      ?>
    <div class="row">
        <div class="col-lg-4">
        <div id="page-slider" class="page-slider small-bg">
          <?php
          	foreach($p_img as $p_i)
            {
          ?>
            <div class="item">
              <img loading="lazy" class="w-100 img-fluid" src="images/products/<?php echo $p_i; ?>" alt="<?php echo $p_i; ?>" />
            </div>
          <?php
            }
          ?>
        </div><!-- Page slider end -->
      </div><!-- Slider col end -->
      
      <div class="col-lg-6 mt-5 mt-lg-0">

        <h3 class="column-title mrt-0"><?php echo $p_name; ?></h3>
        <span style="color: red;">
        <?php
        	if($p_status == 'Coming Soon')
        	{
              echo $p_status;
            }
        ?>
        </span>
       	<?php echo $p_desc; ?>

      </div><!-- Content col end -->
      
      <div class="col-lg-2 mt-5 mt-lg-0">
        <h4>Other Products</h4>
		<?php
        	$prod = "SELECT * FROM products WHERE p_id != '$id'";
            $res = mysqli_query($con, $prod);
            if(mysqli_num_rows($res) > 0)
            {
              while($row = mysqli_fetch_array($res))
              {
                $p_id = $row["p_id"];
                $p_name = $row["p_name"];
         ?>
        <p><a href="product-details.php?id=<?php echo $p_id; ?>&name=<?php echo str_replace(" ", "-", strtolower($p_name)); ?>"><?php echo $p_name; ?></a></p>
         <?php
              }
            }
        ?>
      </div><!-- Content col end -->
	         
    </div><!-- Content row end -->
    <?php
    	if(!empty($p_addinfo))
        {
    ?>
    <div class="row">
      <div class="col-md-12">
        <h2 class="pb-3">ADDITIONAL INFORMATION</h2>
        <?php echo $p_addinfo; ?>
      </div>
    </div>
     <?php	
        	}
          }
        }
      }
      ?>
  </div><!-- Container end -->
</section><!-- Feature are end -->
<?php 
  include("footer.php");
?>