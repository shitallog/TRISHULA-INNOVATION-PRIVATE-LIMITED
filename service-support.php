<?php
	include("header.php");
?>
<section id="main-container" class="main-container" style="background: #eeeeee;">
	<div class="container">
		<div class="row">
			<div class="col">				
				<form id="contact-form" action="#" method="post" role="form">
					<div class="service-box">
			          <h2 class="pb-4">SUBMIT YOUR DETAIL</h2>
			          <div class="row">

			            <div class="col-md-6">
			              <div class="form-group">
			                <label>*Requested By:</label>
			                <select class="form-control" name="" required>
			                	<option selected disabled>*Requested By:</option>
			                	<option value="Customer">Customer</option>
			                	<option value="Dealer">Dealer</option>
			                </select>
			              </div>
			            </div>
			            <div class="col-md-6">
			              <div class="form-group">
			                <label>*Type of Call:</label>
			                <select class="form-control" name="" required>
			                	<option selected disabled>*Type of Call:</option>
			                	<option value="After Use">After Use</option>
			                	<option value="Before Use">Before Use</option>
			                	<option value="Installation">Installation</option>
			                </select>
			              </div>
			            </div>
			            <div class="col-md-4">
			              <div class="form-group">		                
			                <input type="radio" class="" name="subject" placeholder="" required checked="">
			                <label>Complaint Regsistration</label>
			              </div>
			            </div>
			          </div>
		         </div>

		         <div class="service-box">
			          <h2 class="pb-4">CUSTOMER INFORMATION</h2>
			          <div class="row">

			            <div class="col-md-6">
			              <div class="form-group">
			                <label>*Salutation:</label>
			                <select class="form-control" name="" required>
			                	<option selected disabled>*Salutation:</option>
			                	<option value="Ms">Ms</option>
			                	<option value="Mr">Mr</option>
			                	<option value="Mrs">Mrs</option>
			                	<option value="Dr">Dr</option>
			                	<option value="M/S">M/S</option>
			                </select>
			              </div>
			            </div>
			            <div class="col-md-6">
			              <div class="form-group">
			                <label>Name:</label>
			                <input type="text" class="form-control" name="" required>		                	
			              </div>
			            </div>
			            <div class="col-md-6">
			              <div class="form-group">	
			              <label>*Address 1:</label>	                
			                <input type="text" class="form-control" name="subject" placeholder="" required>
			              </div>
			            </div>
			            <div class="col-md-6">
			              <div class="form-group">	
			              <label>*Address 2:</label>	                
			                <input type="text" class="form-control" name="subject" placeholder="" required>
			              </div>
			            </div>
			            <div class="col-md-6">
			              <div class="form-group">
			                <label>State:</label>
			                <select class="form-control" name="" required>
			                	<option selected disabled>Select State:</option>
			                	<!-- <option value="Customer">Customer</option>
			                	<option value="Dealer">Dealer</option> -->
			                </select>
			              </div>
			            </div>
			            <div class="col-md-3">
			              <div class="form-group">
			                <label>City:</label>
			                <select class="form-control" name="" required>
			                	<option selected disabled>Select City:</option>
			                	<!-- <option value="After Use">After Use</option>
			                	<option value="Before Use">Before Use</option>
			                	<option value="Installation">Installation</option> -->
			                </select>
			              </div>
			            </div>
			            <div class="col-md-3">
			              <div class="form-group">
			                <label>Area:</label>
			                <select class="form-control" name="" required>
			                	<option selected disabled>Select Area:</option>
			                	<!-- <option value="After Use">After Use</option>
			                	<option value="Before Use">Before Use</option>
			                	<option value="Installation">Installation</option> -->
			                </select>
			              </div>
			            </div>

			            <div class="col-md-6">
			              <div class="form-group">
			                <label>Product Group:</label>
			                <select class="form-control" name="" required>
			                	<option selected disabled>Select Product Group:</option>
			                	<!-- <option value="Customer">Customer</option>
			                	<option value="Dealer">Dealer</option> -->
			                </select>
			              </div>
			            </div>
			            <div class="col-md-3">
			              <div class="form-group">
			                <label>Product Type:</label>
			                <select class="form-control" name="" required>
			                	<option selected disabled>Select Product Type:</option>
			                	<!-- <option value="After Use">After Use</option>
			                	<option value="Before Use">Before Use</option>
			                	<option value="Installation">Installation</option> -->
			                </select>
			              </div>
			            </div>
			            <div class="col-md-3">
			              <div class="form-group">
			                <label>Model:</label>
			                <select class="form-control" name="" required>
			                	<option selected disabled>Select Model:</option>
			                	<!-- <option value="After Use">After Use</option>
			                	<option value="Before Use">Before Use</option>
			                	<option value="Installation">Installation</option> -->
			                </select>
			              </div>
			            </div>
			          </div>
		         </div>

		         <div class="service-box">
			          <h2 class="pb-4">CONTACT INFORMATION</h2>
			          <div class="row">

			            <div class="col-md-6">
			              <div class="form-group">	
			              <label>*Mobile:</label>	                
			                <input type="text" class="form-control" name="subject" placeholder="" required>
			              </div>
			            </div>
			            <div class="col-md-6">
			              <div class="form-group">	
			              <label>*Email:</label>	                
			                <input type="email" class="form-control" name="subject" placeholder="" required>
			              </div>
			            </div>
			            <div class="col-md-3">
			              <div class="form-group">	
			              <label>Phone / Home:</label>	                
			                <input type="email" class="form-control" name="subject" placeholder="" required>
			              </div>
			            </div>
			            <div class="col-md-3">
			              <div class="form-group">	
			              <label>Phone / Home:</label>	                
			                <input type="email" class="form-control" name="subject" placeholder="" required>
			              </div>
			            </div>
			            <div class="col-md-3">
			              <div class="form-group">	
			              <label>Phone / Office:</label>	                
			                <input type="email" class="form-control" name="subject" placeholder="" required>
			              </div>
			            </div>
			            <div class="col-md-3">
			              <div class="form-group">	
			              <label>Phone / Office:</label>	                
			                <input type="email" class="form-control" name="subject" placeholder="" required>
			              </div>
			            </div>
			            <div class="col-md-12">
			              <div class="form-group">	
			              <label>Nature of Complaint:</label>
			                <textarea rows="4" class="form-control" required></textarea>
			              </div>
			            </div>
			          </div>
			          <div class="text-right"><br>
			            <button class="btn btn-primary solid blank" type="submit">Submit</button>
			          </div>
		         </div>

		        </form>
			</div>
		</div>
	</div>
</section>
<?php
	include("footer.php");
?>