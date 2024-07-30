<?php 
  include("header.php");
?>
<?php
	$sel_slider = "SELECT * FROM slider_imgs";
	$res_slider = mysqli_query($con, $sel_slider);
?>
<div class="banner-carousel banner-carousel-2 mb-0" data-interval="2000">
  <?php
  	if(mysqli_num_rows($res_slider) > 0)
    {
      while($slider_row = mysqli_fetch_array($res_slider))
      {
  ?>
  <div class="banner-carousel-item" style="background-image:url(images/slider-main/<?php echo $slider_row["img"]; ?>)"></div>
  <?php
      }
    }
  ?>
</div>

<section id="main-container" class="main-container pb-0">
  <div class="container">
    <h3>ABOUT US</h3>
    
    <p class="text-justify"><b>TRISHULA INNOVATION PRIVATE LIMITED</b> specializes in the design, manufacture, installation, and service of both custom and standard non-destructive testing (NDT) systems for a variety of industries including aerospace, energy, automotive, defence, and petroleum. Our systems meet the unique and demanding requirements of highly technical applications utilizing ultrasonic, and eddy current technology.</p>
    <p class="text-justify">Our ultrasonic systems are capable of inspecting complex shapes of varying sizes offering a range of options including large-scale gantry scanners with multiple axes of motion and immersion tanks in a wide range of sizes.</p>
  </div>
  
  
</section>

<section id="ts-features" class="ts-features pb-2">
  <div class="container">
    <h3>Latest Products</h3>
    <div class="row">
      
      <?php
      	$sel_products = "SELECT * FROM products GROUP BY timestamp";
      	$res_products = mysqli_query($con, $sel_products);
      	if(mysqli_num_rows($res_products) > 0)
        {
          while($row_prod = mysqli_fetch_array($res_products))
          {
            $p_name = $row_prod["p_name"];
            $p_img = explode(",", $row_prod["p_img"]);
      ?>
        <div class="col-lg-4 col-md-6 mb-5">          
          <div class="ts-service-box">
              <div class="ts-service-image-wrapper">
                <img loading="lazy" class="img-fluid" src="images/products/<?php echo $p_img[0]; ?>" alt="<?php echo $p_img[0]; ?>">
              </div>
            <h4 class="text-center"><?php echo $p_name; ?></h4>
          </div><!-- Service1 end -->
        </div><!-- Col 1 end -->
	  <?php
          }
        }
      ?>
        
    </div><!-- Content row end -->
  </div><!-- Container end -->
</section><!-- Feature are end -->

<section class="content testimonial-content">
  <div class="container">
    <div class="row">
      	<div class="col-lg-2"></div>
        <div class="col-lg-8">
          <h3 class="column-title text-center">Testimonials</h3>

          <div id="testimonial-slide" class="testimonial-slide">
            <?php
            	$sel_testimonials = "SELECT * FROM testimonials";
                $res_test = mysqli_query($con, $sel_testimonials);
                if(mysqli_num_rows($res_test) > 0)
                {
                  while($row_test = mysqli_fetch_array($res_test))
                  {
                    $client_name = $row_test["client_name"];
                    $client_img = $row_test["client_img"];
                    $client_review = $row_test["client_review"];
            ?>
              <div class="item">
                <div class="quote-item">
                    <span class="quote-text">
                      <?php echo $client_review; ?>
                    </span>

                    <div class="quote-item-footer">
                      <img loading="lazy" class="testimonial-thumb" src="images/clients/<?php echo $client_img; ?>" alt="<?php echo $client_img; ?>">
                      <div class="quote-item-info">
                          <h3 class="quote-author"><?php echo $client_name; ?></h3>
                      </div>
                    </div>
                </div><!-- Quote item end -->
              </div>
              <!--/ Item 1 end -->
			<?php
                  }
                }
            ?>

          </div>
          <!--/ Testimonial carousel end-->
        </div><!-- Col end -->
      	<div class="col-lg-2"></div>
    </div>
    <!--/ Content row end -->
  </div>
  <!--/ Container end -->
</section><!-- Content end -->

<?php 
  include("footer.php");
?>
