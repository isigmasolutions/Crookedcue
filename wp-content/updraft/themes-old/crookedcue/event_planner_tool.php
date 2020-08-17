<?php
/**
 * Template Name:Event Planner Tool
 */

get_header(); ?>
<section class="innerbanner">
		<div class="mainHeading">
			<h1><?php the_title('');?></h1>
		
		</div>
	</section>
    
<!-- ------------------------how to order--------------------------------------- -->
	<section class="HowOrder">
		<div class="container">
			<h2>HOW TO ORDER</h2>
				<div class="row">
					<div class="col-md-4 col-sm-12">
						<a href="#"  class="steps"><ul class="activeStep">
							<li>1. Input your party Data</li>
							<li><img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/partdata.png" alt=""></li>
							<li>Input all the data for your party</li>
							
						</ul></a>
					</div>
					
					<div class="col-md-4 col-sm-12">
						<a href="#"  class="steps"><ul>
							<li>2. Confirm your Order</li>
							<li><img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/confirmorder.png" alt=""></li>
							<li>Confirm that all the data is correct</li>

						</ul></a>
					</div>
					<div class="col-md-4 col-sm-12">
						<a href="#" class="steps"><ul>
							<li>3. Coordinate Payment</li>
							<li><img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/coordeinatePayment.png" alt=""></li>
							<li>Coordinate Payment with our Team</li>
						</ul></a>
					</div>
				</div>
		</div>
	</section>
<!-- -------------------------------------------how to order ends------------------------------------------------------------------ -->

<!-- ---------------------------------------------------Location---------------------------------------------- -->
<section class="location_sideBAr">
	<div class="container">
		<div class="row shiftrowonscroll">
			<div class="col-md-3">
				<div class="SideBar">
					<ul>
						<li><a class="scroll" href="#Location">Location</a></li>
						<li><a class="scroll" href="#PartyInformation">Party Information</a></li>
						<li><a class="scroll" href="#RestaurantArea">Restaurant Area</a></li>
						<li><a class="scroll" href="#Appetizers">Appetizers</a></li>
						<li><a class="scroll" href="#Drinks">Drinks</a></li>
						<li><a class="scroll" href="#Platters">Platters</a></li>
						<li><a class="scroll" href="#MainDish">Main Dish</a></li>
						<li><a class="scroll" href="#Desserts">Desserts</a></li>
						<li><a class="scroll" href="#Activities">Activities</a></li>
						<li><a class="scroll" href="#SpecialRequests">Special Requests</a></li>
						<li><a class="scroll" href="#OrganizerInfo">Organizer Info</a></li>
					</ul>
				</div>
				<div class="partyCost">
					<h3>Party Cost</h3>
					<ul>
						<li><span>Total Cost:</span> <strong>$1500 USD</strong></li>
						<li><span>Cost Per Person:</span> <strong>$35.71 USD</strong></li>
						<li><a href="#">View Order Summary</a></li>

					</ul>
				</div>
			</div>
			<div class="col-md-9">
				<!-- ----------------------------location---------------------------------------- -->
				<div class="locationpart" id="Location">
				<div class="selectBox"> 
					<h3>Location</h3>
					<label>Location Selected: </label>
				<select>
					<option>Etobicoke</option>					
					<option>Mississauga</option>								
				</select>
			</div>
				<div class="row">
					<div class="col-sm-5">
						<img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/locationImg.jpg" alt="">
					</div>
					<div class="col-sm-7">

						<ul>
						<li><strong>Adress:</strong> 3056 Bloor St Wi Etobicoke, ON M8X 1C4,<br/ > Canada</li>
						<li><strong>Phone:</strong> <a href="+14162367736">+1 416-236-7736</a></li>
					   </ul>
					</div>

				</div>
			</div>
				<!-- -------------------------------location ends------------------------------ -->
				<!-- -------------------------------party information------------------------------- -->

				<div class="PartyInfo" id="PartyInformation">
					<h3>Party Information</h3>
					<ul>
						<li><label>Preferred Date 1 </label> <input type="date" name=""></li>
					    <li><label>Preferred Date 2 </label> <input type="date" name=""></li>
					    <li><label>Preferred Date 3 </label> <input type="date" name=""></li>
					    <li><label>Guest Number</label> <input type="number" name="" placeholder="42"> 
					    	<select>
					    		<option>Purpose of the Party</option>
					    		<option>Purpose of the Party</option>
					    		<option>Purpose of the Party</option>
					    </select></li>
					    <li><textarea>Dietary comments</textarea></li>
				    </ul>
				</div>
				<!-- -------------------------------party information ends------------------------------- -->

				<!-- ----------------------------Restaurant Area---------------------------------- -->
				<div class="RestaurantArea" id="RestaurantArea">
					<h3>Preferred Restaurant Area</h3>
					<div class="row">
						<div class="col-md-7">
							<div  class="resturantoptchkbox"><input type="checkbox" name=""></div>

							<div class="resturantopt">
							<span>Pool</span>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,
							 sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
							Ut enim ad minim veniam</p>
							<h4>$140</h4>
							<a href="#">View Options</a>
						</div>
						</div>
						<div class="col-md-5">
							<img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/restaurentArea.jpg">
						</div>
						
					</div>
					<!-- --------------------------------------------------- -->
					<div class="row">
						<div class="col-md-7">
							<div  class="resturantoptchkbox"><input type="checkbox" name="" class="size"></div>

							<div class="resturantopt">

							<span>Patio</span>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,
							 sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
							Ut enim ad minim veniam</p>
							<h4>$100</h4>
							<a href="#">View Options</a>
						</div>
						</div>
						<div class="col-md-5">
							<img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/restaurentArea.jpg">
						</div>
						
					</div>
					<!-- ----------------------------------------------------------- -->
					<!-- --------------------------------------------------- -->
					<div class="row">
						<div class="col-md-7">
							<div  class="resturantoptchkbox"><input type="checkbox" name=""></div>
							<div class="resturantopt">

							<span>Bar</span>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,
							 sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
							Ut enim ad minim veniam</p>
							<h4>$150</h4>
							<a href="#">View Options</a>
						</div>
						</div>
						<div class="col-md-5">
							<img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/restaurentArea.jpg">
						</div>
						
					</div>
					<!-- ----------------------------------------------------------- -->
				</div>
<!-- ----------------------------Restaurant Area Ends---------------------------------- -->

<!-- ---------------------------menu starts------------------------ -->
<div class="menuMain">
<h3>Appetizers</h3>

<!-- -----------------appatizer menu--------------------- -->
<div class="menu" id="Appetizers">
	<div class="row">
			<div class="col-sm-9">
			<ul>
				
				<li><strong>Hand-Cut-Fries <a href="#" target="_blank" class="camra"><i class="fas fa-camera"></i></a></strong><br/><span class="discrip">Cut fresh daily</span></li>
				<li><h4>$3.73 </h4></li>
			</ul>
		</div>
<div class="col-sm-3">
	<ul>
		<li><label>Quantitiy</label><input type="number" placeholder="2"name=""></li>
		<li><a href="#" class="orderBtn">Add to Order</a></li>
	</ul>
</div>
	</div>
<!-- ------------------------------------------------------------- -->
	<div class="row">
		<div class="col-sm-9">
			<ul>
				
				<li><strong>Garden Salad </strong><br/><span class="discrip">Fresh garden salad served with lettuce, carrots, tomatoes, and house dressing.</span></li>
				<li><h4>$4.31 </h4></li>
			</ul>
		</div>
<div class="col-sm-3">
	<ul>
		<li><label>Quantitiy</label><input type="number" placeholder="2"name=""></li>
		<li><a data-toggle="modal" data-target="#myModal" class="orderBtn">View Options</a>
			<!-- ---------------------------------------- -->
<!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><!-- &times; --><img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/closeicn.png"></button>
          <h4 class="modal-title">Garden Salad</h4>
          <p>Fresh garden salad served with lettuce, carrots, tomatoes, and house dressing.</p>
        </div>
        <div class="modal-body">
          <h6>Toppings</h6>

  <form action="">
  	<ul class="checkopt">
  <li><input type="checkbox" id="Tomato" name="vehicle1" >
  <label for="Tomato"> Tomato</label></li>
  <li><input type="checkbox" id="Olives" name="Olives" >
  <label for="Olives"> Olives</label></li>
  <li><input type="checkbox" id="Onion" name="Onion">
  <label for="Onion"> Onion</label></li>
    <li><input type="checkbox" id="carrot" name="carrot" value="Car">
  <label for="carrot"> Carrot</label></li>
<input type="text" name="" placeholder="Dressing" class="dressing"></li>
</ul>
<!-- <label>Quantity</label> -->
<ul class="groupInput_1">
			
			<li><label>Quantitiy</label><input type="number" placeholder="20"name=""></li>
				<li><a href=""  class="orderBtn">Add to Order</a></li>

		</ul>
</form>
        </div>
        
      </div>
      
    </div>
  </div>
  <!-- --------------------------------------- -->
		</li>
	</ul>
</div>
	</div>
</div>

<!-- --------------------------drinks  menu----------------------------- -->
<h3>Drinks</h3>
<div class="menu" id="Drinks">
	<div class="row">
		<div class="col-sm-2">
			<img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/imgbrdr.png">
		</div>
		<div class="col-sm-7">
			<ul>
				
				<li><strong>7UP Lemonade (Canned)</strong><br/><span class="discrip">Refreshing and zesty 7UP!</span></li>
				<li><h4>$2.47 </h4></li>
			</ul>
		</div>
<div class="col-sm-3">
	<ul>
		<li><label>Quantitiy</label><input type="number" placeholder="2"name=""></li>
		<li><a href="#" class="orderBtn">Add to Order</a></li>
	</ul>
</div>
	</div>
<!-- ------------------------------------------------------------- -->
	<div class="row">
		<div class="col-sm-2">
			<img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/imgbrdr.png">
		</div>
		<div class="col-sm-7">
			<ul>
			
				<li><strong>Scweppes Ginger Ale</strong><br/><span class="discrip">Refreshinliu crisp with a bright ginger taste, refined since 1870.</span></li>
				<li><h4>$2.47 </h4></li>
			</ul>
		</div>
<div class="col-sm-3">
	<ul>
		<li><label>Quantitiy</label><input type="number" placeholder="2"name=""></li>
		<li><a href="#" class="orderBtn">Add to Order</a></li>
	</ul>
</div>
	</div>
</div>
<!-- --------------------------Platters  menu----------------------------- -->

<h3>Platters</h3>
<div class="menu" id="Platters">
	<div class="row">
		<div class="col-sm-2">
			<img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/imgbrdr.png">
		</div>
		<div class="col-sm-7">
			<ul>
				<li><strong>Sushi Platter</strong><br/><span class="discrip">Combination of 15 pieces/California roll/nigiri/maki/wasabi/pickled ginger/soya souce</span></li>
				<li><h4>$140 </h4></li>
			</ul>
		</div>
<div class="col-sm-3">
	<ul>
		<li><label>Quantitiy</label><input type="number" placeholder="2"name=""></li>
		<li><a href="#" class="orderBtn">View Options</a></li>
	</ul>
</div>
	</div>
<!-- ------------------------------------------------------------- -->
	<div class="row">
		<div class="col-sm-2">
			<img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/imgbrdr.png">
		</div>
		<div class="col-sm-7">
			<ul>
				
				<li><strong>Sandwich Platter</strong><br/><span class="discrip">Assorted sandwich platters - Chicken Mayo, Egg Mayo, Ham&Cheese</span></li>
				<li><h4>$100 </h4></li>
			</ul>
		</div>
<div class="col-sm-3">
	<ul>
		<li><label>Quantitiy</label><input type="number" placeholder="2"name=""></li>
		<li><a href="#" class="orderBtn">View Options</a></li>
	</ul>
</div>
	</div>
</div>

<!-- --------------------------Main Dish  menu----------------------------- -->

<h3>Main Dish</h3>
<div class="menu" id="MainDish">
	<div class="row">
		<div class="col-sm-2">
			<img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/imgbrdr.png">
		</div>
		<div class="col-sm-7">
			<ul>
				<li><strong>The Cheese Burger Combo</strong><br/><span class="discrip">Beef patty, cheese, lettuce, tomato, pickles, onions, ketchup, mustard, and mayo.</span></li>
				<li><h4>$13.65 </h4></li>
			</ul>
		</div>
<div class="col-sm-3">
	<ul>
		<li><label>Quantitiy</label><input type="number" placeholder="2"name=""></li>
		<li><a href="#" class="orderBtn">View Options</a></li>
	</ul>
</div>
	</div>
<!-- ------------------------------------------------------------- -->
	<div class="row">
		<div class="col-sm-2">
			<img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/imgbrdr.png">
		</div>
		<div class="col-sm-7">
			<ul>
				<li><strong>Grilled Chicken Sandwich</strong><br/><span class="discrip">Boneless chicken breast with lettuce, tomato, pickles, onions, ketchup, mustard, 
and mayo.</span></li>
				<li><h4>$15.12 </h4></li>
			</ul>
		</div>
<div class="col-sm-3">
	<ul>
		<li><label>Quantitiy</label><input type="number" placeholder="2"name=""></li>
		<li><a href="#" class="orderBtn">View Options</a></li>
	</ul>
</div>
	</div>
</div>

<!-- --------------------------Desert  menu----------------------------- -->

<h3>Desserts</h3>
<div class="menu" id="Desserts">
	<div class="row">
		<div class="col-sm-2">
			<img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/imgbrdr.png">
		</div>
		<div class="col-sm-7">
			<ul>
				<li><strong>Cheesecake</strong><br/><span class="discrip">This Extra Rich and Creamy Cheesecake is freezer friendly and perfect for special occasions!</span></li>
				<li><h4>$15.65 </h4></li>
			</ul>
		</div>
<div class="col-sm-3">
	<ul>
		<li><label>Quantitiy</label><input type="number" placeholder="2"name=""></li>
		<li><a href="#" class="orderBtn">Add to Order</a></li>
	</ul>
</div>
	</div>
<!-- ------------------------------------------------------------- -->
	<div class="row">
		<div class="col-sm-2">
			<img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/imgbrdr.png">
		</div>
		<div class="col-sm-7">
			<ul>
				
				<li><strong>Oreo Ice Cream</strong><br/><span class="discrip">Easy cookies and cream Oreo Ice Cream made with just four ingredients.</span></li>
				<li><h4>$10.12 </h4></li>
			</ul>
		</div>
<div class="col-sm-3">
	<ul>
		<li><label>Quantitiy</label><input type="number" placeholder="2"name=""></li>
		<li><a href="#" class="orderBtn">Add to Order</a></li>
	</ul>
</div>
	</div>
</div>
<!-- --------------------------Activity  menu----------------------------- -->

<h3>Activities</h3>
<div class="menu" id="Activities">
	<div class="row">
		<div class="col-sm-2">
			<img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/imgbrdr.png">
		</div>
		<div class="col-sm-4">
			<ul>
				<li><strong>Pool Tables</strong><br/><span class="discrip">Looking for a party with a difference?</span></li>
				<li><h4>$100 </h4></li>
			</ul>
		</div>
		<div class="col-sm-6">

			<ul class="groupInput">
			<li><label>Hours</label><input type="number" placeholder="2"name=""></li>
			<li><label>Quantitiy</label><input type="number" placeholder="5"name=""><a href="">Add to Order</a></li>

		</ul>
		</div>
	</div>
<!-- ------------------------------------------------------------- -->
<div class="row">
		<div class="col-sm-2">
			<img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/imgbrdr.png">
		</div>
		<div class="col-sm-4">
			<ul>
				<li><strong>Pinpong Tables</strong><br/><span class="discrip">Looking for a party with a difference?</span></li>
				<li><h4>$120 </h4></li>
			</ul>
		</div>
		<div class="col-sm-6">

			<ul class="groupInput">
			<li><label>Hours</label><input type="number" placeholder="6"name=""></li>
			<li><label>Quantitiy</label><input type="number" placeholder="5"name=""><a href="">Add to Order</a></li>

		</ul>
		</div>
	</div>
<!-- ------------------------- -->
</div>
    	</div>
	</div>
	</div>
</section>
<!-- -----------------------------------------------menu and Location Ends-------------------------------------------------- -->

<section class="specialRequest" id="specialRequest">
	<div class="container">
	<h2>Special Requests</h2>
	<textarea placeholder="Tell Us How we can make you event even better. Do you know any special  requests?">
		Tell Us How we can make you event even better. Do you know any special  requests?
	</textarea>

	<div class="OrganizerInfo" id="OrganizerInfo">
		<h2>Organizer Info</h2>

		<form>
			<ul>
			<li><input type="text" name="" placeholder="Name"></li>
			<li><input type="email" name="" placeholder="Email"></li>
			<li><input type="text" name="" placeholder="Address"></li>
			<li><input type="tel" name="" placeholder="Phone"></li>
			<li><input type="tel" name="" placeholder="Add Company Name "></li>

			<li><a href="#" class="orderBtn_1">View Order Summary</a></li>

</ul>
		</form>
	</div>
</div>
</section>




<?php
get_footer();
