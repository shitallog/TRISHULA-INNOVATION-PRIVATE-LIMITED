<?php
  include("header.php");
?>
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">My Dashboard</li>
    </ol>
    <?php
    	$home_sliders = "SELECT * FROM slider_imgs";
    	$res_hs = mysqli_query($con, $home_sliders);
    	$count_hs = mysqli_num_rows($res_hs);
    
    	$products = "SELECT * FROM products";
    	$res_p = mysqli_query($con, $products);
    	$count_p = mysqli_num_rows($res_p);
    
    	$vendor = "SELECT * FROM vendor_reg";
    	$res_v = mysqli_query($con, $vendor);
    	$count_v = mysqli_num_rows($res_v);
    
    	/*$customer_support = "SELECT * FROM customer_support";
    	$res_cs = mysqli_query($con, $customer_support);
    	$count_cs = mysqli_num_rows($res_cs);*/
    
    	$testimonials = "SELECT * FROM testimonials";
    	$res_t = mysqli_query($con, $testimonials);
    	$count_t = mysqli_num_rows($res_t);
    ?>
    <!-- Icon Cards-->
    <div class="row">
      <div class="col-xl-4 col-sm-6 mb-3">
        <div class="card text-white bg-primary o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
              <i class="fa fa-fw fa-sliders"></i>
            </div>
            <div class="mr-5"><?php echo $count_hs;?> Home Sliders</div>
          </div>
          <a class="card-footer text-white clearfix small z-1" href="home-sliders.php">
            <span class="float-left">View Details</span>
            <span class="float-right">
              <i class="fa fa-angle-right"></i>
            </span>
          </a>
        </div>
      </div>
      <div class="col-xl-4 col-sm-6 mb-3">
        <div class="card text-white bg-warning o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
              <i class="fa fa-fw fa-product-hunt"></i>
            </div>
            <div class="mr-5"><?php echo $count_p;?> Products</div>
          </div>
          <a class="card-footer text-white clearfix small z-1" href="products.php">
            <span class="float-left">View Details</span>
            <span class="float-right">
              <i class="fa fa-angle-right"></i>
            </span>
          </a>
        </div>
      </div>
      <div class="col-xl-4 col-sm-6 mb-3">
        <div class="card text-white bg-success o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
              <i class="fa fa-fw fa-money"></i>
            </div>
            <div class="mr-5"><?php echo $count_v;?> Vendors Registered</div>
          </div>
          <a class="card-footer text-white clearfix small z-1" href="vendor.php">
            <span class="float-left">View Details</span>
            <span class="float-right">
              <i class="fa fa-angle-right"></i>
            </span>
          </a>
        </div>
      </div>
      <div class="col-xl-4 col-sm-6 mb-3">
        <div class="card text-white bg-danger o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
              <i class="fa fa-fw fa-users"></i>
            </div>
            <div class="mr-5">0 Customer Support</div>
          </div>
          <a class="card-footer text-white clearfix small z-1" href="customer-support.php">
            <span class="float-left">View Details</span>
            <span class="float-right">
              <i class="fa fa-angle-right"></i>
            </span>
          </a>
        </div>
      </div>
      <div class="col-xl-4 col-sm-6 mb-3">
        <div class="card text-white bg-info o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
              <i class="fa fa-fw fa-comments-o"></i>
            </div>
            <div class="mr-5"><?php echo $count_t;?> Customer Reviews</div>
          </div>
          <a class="card-footer text-white clearfix small z-1" href="testimonials.php">
            <span class="float-left">View Details</span>
            <span class="float-right">
              <i class="fa fa-angle-right"></i>
            </span>
          </a>
        </div>
      </div>
    </div>
    
  </div>
<?php
  include("footer.php");
?>