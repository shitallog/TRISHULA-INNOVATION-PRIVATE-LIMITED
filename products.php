<?php 
  include("header.php");
?>
<div id="banner-area" class="banner-area" style="background-image:url(images/banner/about-banner.jpg)">
</div><!-- Banner area end --> 
<section id="ts-features" class="ts-features">
  <div class="container">
    <h3>Products</h3>
    <div class="row">
      
      <?php
      	$sel_products = "SELECT * FROM products GROUP BY timestamp";
      	$res_products = mysqli_query($con, $sel_products);
      	if(mysqli_num_rows($res_products) > 0)
        {
          while($row_prod = mysqli_fetch_array($res_products))
          {
            $p_id = $row_prod["p_id"];
            $p_name = $row_prod["p_name"];
            $p_img = explode(",", $row_prod["p_img"]);
      ?>
        <div class="col-lg-4 col-md-6 mb-5">          
          <div class="ts-service-box">
              <div class="ts-service-image-wrapper">
                <img loading="lazy" class="img-fluid" src="images/products/<?php echo $p_img[0]; ?>" alt="<?php echo $p_img[0]; ?>">
              </div>
            <h4 class="text-center"><a href="product-details.php?id=<?php echo $p_id; ?>&name=<?php echo str_replace(" ", "-", strtolower($p_name)); ?>"><?php echo $p_name; ?></a></h4>
          </div><!-- Service1 end -->
        </div><!-- Col 1 end -->
	  <?php
          }
        }
      ?>
        
    </div><!-- Content row end -->
  </div><!-- Container end -->
</section><!-- Feature are end -->
<?php 
  include("footer.php");
?>