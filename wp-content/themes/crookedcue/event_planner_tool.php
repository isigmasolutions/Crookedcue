<?php
/**
 * Template Name:Event Planner Tool
 */

get_header('inner'); ?>
<section class="innerbanner">
		<div class="mainHeading">
			<h1><?php the_title('');?></h1>
		</div>
	</section>
    <div class="party-planner">
<!-- ------------------------how to order--------------------------------------- -->
	<section class="HowOrder">
		<div class="container">
			<h2>3 EASY STEPS</h2>
			<h3>TO PLANNING YOUR NEXT EVENT</h3>
				<div class="row">
					<div class="col-md-4 col-sm-12">
						<a href="#"  class="steps"><ul class="activeStep">
							<li>1. Select A Location <!--Input your party Data--> </li>
							<li><img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/partdata.png" alt=""></li>
							<li>Input all the data for your party</li>
							
						</ul></a>
					</div>
					
					<div class="col-md-4 col-sm-12">
						<a href="#"  class="steps"><ul>
							<li>2. Plan your party</li>
							<li><img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/confirmorder.png" alt=""></li>
							<li>Confirm that all the data is correct</li>

						</ul></a>
					</div>
					<div class="col-md-4 col-sm-12">
						<a href="#" class="steps"><ul>
							<li>3. Book</li>
							<li><img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/coordeinatePayment.png" alt=""></li>
							<li>Pick a time to meet our even planning specialist to call you.</li>
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
			<div id="sidebar">
				<div class="sidebar-inner noneorhide">
                <div class="SideBar">
					<ul>
						<li><a class="scroll" href="#Location">Location</a></li>
						<li><a id="autoclick" class="scroll" href="#PartyInformation">Party Information</a></li>
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
						<li><a href="/view-order-summary/">View Order Summary</a></li>

					</ul>
				</div>
			</div></div></div>
			<div class="col-md-9">
				<!-- ----------------------------location---------------------------------------- -->
				<div class="locationpart" id="Location">
				<div class="selectBox"> 
					<h3>Location</h3>
					<label>Location Selected: </label>
				<select id="locationonchange">
                <option value="0">Select a location </option>	
                <option value="Mississauga">Mississauga</option>	
				<option value="Etobicoke">Etobicoke</option>					
												
				</select>
			</div>
<div class="noneorhide">			
				<div class="white-bg onchangelocation" style="display: none;"><div class="row">
					<div class="col-sm-5">
						<img id="locationimage" src="" alt="">
					</div>
					<div class="col-sm-7">

						<ul>
						<li><strong>Adress:</strong>  <span id="locationaddress"> </span></li>
						<li><strong>Phone:</strong> <a id="locationphone" href="(905) 271-7665">(905) 271-7665</a></li>
					   </ul>
					</div>

				</div>
			</div>
				<!-- -------------------------------location ends------------------------------ -->
				<!-- -------------------------------party information------------------------------- -->

				<div class="PartyInfo" id="PartyInformation">
					<h3>Plan your party<!-- Party Information--></h3>
					<div class="white-bg"><ul>
						<li class="one col-4"><label>Preferred Date 1 </label> <input type="date" name=""></li>
					    <li class="two col-4"><label>Preferred Date 2 </label> <input type="date" name=""></li>
					    <li class="three col-4"><label>Preferred Date 3 </label> <input type="date" name=""></li>
					    <li class="four col-6"><label>Guest Number</label> <input type="number" name="" placeholder="42"> 
					    	<select> 
					    		<option>Purpose of the Party</option>
					    		<option>Purpose of the Party</option>
					    		<option>Purpose of the Party</option>
					    </select></li>
					    <li class="five col-6"><textarea>Dietary comments</textarea></li>
				    </ul></div>
				</div>
				<!-- -------------------------------party information ends------------------------------- -->

				<!-- ----------------------------Restaurant Area---------------------------------- -->
				<div class="RestaurantArea" id="RestaurantArea">
					<h3>Preferred Restaurant Area</h3>
					<div class="white-bg">
                    <div class="row">
						<div class="col-md-7">
							<?php //echo do_shortcode('[product_table category="23" columns="name,add-to-cart" filters="none"]');?>
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
                    </div>
					<!-- --------------------------------------------------- -->
					<div class="white-bg">
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
                    </div>
					<!-- ----------------------------------------------------------- -->
					<!-- --------------------------------------------------- -->
					<div class="white-bg">
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
                    </div>
					<!-- ----------------------------------------------------------- -->
				</div>
<!-- ----------------------------Restaurant Area Ends---------------------------------- -->

<!-- ---------------------------menu starts------------------------ -->
<div class="menuMain">
<h3>Appetizers</h3>

<!-- -----------------appatizer menu--------------------- -->
<div class="menu" id="Appetizers">
	<div class="white-bg"><div class="row">
		<div class="col-sm-9">
			<ul>
				
				<li><strong>Hand-Cut-Fries <a href="#" target="_blank" class="camraicn"><i class="fas fa-camera"></i></a></strong><br/><span class="discrip">Cut fresh daily</span></li>
				<li><h4>$3.73 </h4></li>
			</ul>
		</div>
<div class="col-sm-3">
	<ul>
		<li><label>quantity</label><input type="number" placeholder="2"name=""></li>
		<li><a href="#" class="orderBtn">Add to Order</a></li>
	</ul>
</div>
	</div></div>
<!-- ------------------------------------------------------------- -->
	<div class="white-bg"><div class="row">
		
		<div class="col-sm-9">
			<ul>
				
				<li><strong>Garden Salad <a href="#" target="_blank" class="camraicn"><i class="fas fa-camera"></i></a></strong><br/><span class="discrip">Fresh garden salad served with lettuce, carrots, tomatoes, and house dressing.</span></li>
				<li><h4>$4.31 </h4></li>
			</ul>
		</div>
<div class="col-sm-3">
	<ul>
		<li><label>quantity</label><input type="number" placeholder="2"name=""></li>
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
          <h4 class="modal-title">Garden Salad </h4>
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
<li><input type="text" name="" placeholder="Dressing" class="dressing"></li>
</ul>
<!-- <label>Quantity</label> -->
<ul class="groupInput_1">
			
			<li><label>quantity</label><input type="number" placeholder="20"name=""></li>
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
	</div></div>
</div>

<!-- --------------------------drinks  menu----------------------------- -->
<h3>Drinks</h3>
<div class="menu" id="Drinks">
	<div class="white-bg"><div class="row">
		
		<div class="col-sm-9">
			<ul>
				
				<li><strong>7UP Lemonade (Canned) <a href="#" target="_blank" class="camraicn"><i class="fas fa-camera"></i></a></strong><br/><span class="discrip">Refreshing and zesty 7UP!</span></li>
				<li><h4>$2.47 </h4></li>
			</ul>
		</div>
<div class="col-sm-3">
	<ul>
		<li><label>quantity</label><input type="number" placeholder="2"name=""></li>
		<li><a href="#" class="orderBtn">Add to Order</a></li>
	</ul>
</div>
	</div></div>
<!-- ------------------------------------------------------------- -->
<div class="white-bg">	<div class="row">
		
		<div class="col-sm-9">
			<ul>
			
				<li><strong>Scweppes Ginger Ale <a href="#" target="_blank" class="camraicn"><i class="fas fa-camera"></i></a></strong><br/><span class="discrip">Refreshinliu crisp with a bright ginger taste, refined since 1870.</span></li>
				<li><h4>$2.47 </h4></li>
			</ul>
		</div>
<div class="col-sm-3">
	<ul>
		<li><label>quantity</label><input type="number" placeholder="2"name=""></li>
		<li><a href="#" class="orderBtn">Add to Order</a></li>
	</ul>
</div>
	</div></div>
</div>
<!-- --------------------------Platters  menu----------------------------- -->

<h3>Platters</h3>
<div class="menu" id="Platters">
	<div class="white-bg"><div class="row">
		
		<div class="col-sm-9">
			<ul>
				<li><strong>Sushi Platter <a href="#" target="_blank" class="camraicn"><i class="fas fa-camera"></i></a></strong><br/><span class="discrip">Combination of 15 pieces/California roll/nigiri/maki/wasabi/pickled ginger/soya souce</span></li>
				<li><h4>$140 </h4></li>
			</ul>
		</div>
<div class="col-sm-3">
	<ul>
		<li><label>quantity</label><input type="number" placeholder="2"name=""></li>
		<li><a href="#" class="orderBtn">View Options</a></li>
	</ul>
</div>
	</div></div>
<!-- ------------------------------------------------------------- -->
	<div class="white-bg"><div class="row">
		
		<div class="col-sm-9">
			<ul>
				
				<li><strong>Sandwich Platter <a href="#" target="_blank" class="camraicn"><i class="fas fa-camera"></i></a></strong><br/><span class="discrip">Assorted sandwich platters - Chicken Mayo, Egg Mayo, Ham&Cheese</span></li>
				<li><h4>$100 </h4></li>
			</ul>
		</div>
<div class="col-sm-3">
	<ul>
		<li><label>quantity</label><input type="number" placeholder="2"name=""></li>
		<li><a href="#" class="orderBtn">View Options</a></li>
	</ul>
</div>
	</div></span>
</div>

<!-- --------------------------Main Dish  menu----------------------------- -->

<h3>Main Dish</h3>
<div class="menu" id="MainDish">
	<div class="white-bg"><div class="row">
		
		<div class="col-sm-9">
			<ul>
				<li><strong>The Cheese Burger Combo <a href="#" target="_blank" class="camraicn"><i class="fas fa-camera"></i></a></strong><br/><span class="discrip">Beef patty, cheese, lettuce, tomato, pickles, onions, ketchup, mustard, and mayo.</span></li>
				<li><h4>$13.65 </h4></li>
			</ul>
		</div>
<div class="col-sm-3">
	<ul>
		<li><label>quantity</label><input type="number" placeholder="2"name=""></li>
		<li><a href="#" class="orderBtn">View Options</a></li>
	</ul>
</div>
	</div></div>
<!-- ------------------------------------------------------------- -->
	<div class="white-bg"><div class="row">
		
		<div class="col-sm-9">
			<ul>
				<li><strong>Grilled Chicken Sandwich <a href="#" target="_blank" class="camraicn"><i class="fas fa-camera"></i></a></strong><br/><span class="discrip">Boneless chicken breast with lettuce, tomato, pickles, onions, ketchup, mustard, 
and mayo.</span></li>
				<li><h4>$15.12 </h4></li>
			</ul>
		</div>
<div class="col-sm-3">
	<ul>
		<li><label>quantity</label><input type="number" placeholder="2"name=""></li>
		<li><a href="#" class="orderBtn">View Options</a></li>
	</ul>
</div>
	</div></div>
</div>

<!-- --------------------------Desert  menu----------------------------- -->

<h3>Desserts</h3>
<div class="menu" id="Desserts">
	<div class="white-bg"><div class="row">
		
		<div class="col-sm-9">
			<ul>
				<li><strong>Cheesecake <a href="#" target="_blank" class="camraicn"><i class="fas fa-camera"></i></a></strong><br/><span class="discrip">This Extra Rich and Creamy Cheesecake is freezer friendly and perfect for special occasions!</span></li>
				<li><h4>$15.65 </h4></li>
			</ul>
		</div>
<div class="col-sm-3">
	<ul>
		<li><label>quantity</label><input type="number" placeholder="2"name=""></li>
		<li><a href="#" class="orderBtn">Add to Order</a></li>
	</ul>
</div>
	</div></div>
<!-- ------------------------------------------------------------- -->
	<div class="white-bg"><div class="row">
		
		<div class="col-sm-9">
			<ul>
				
				<li><strong>Oreo Ice Cream <a href="#" target="_blank" class="camraicn"><i class="fas fa-camera"></i></a></strong><br/><span class="discrip">Easy cookies and cream Oreo Ice Cream made with just four ingredients.</span></li>
				<li><h4>$10.12 </h4></li>
			</ul>
		</div>
<div class="col-sm-3">
	<ul>
		<li><label>quantity</label><input type="number" placeholder="2"name=""></li>
		<li><a href="#" class="orderBtn">Add to Order</a></li>
	</ul>
</div>
	</div></div>
</div>
<!-- --------------------------Activity  menu----------------------------- -->

<h3>Activities</h3>
<div class="menu" id="Activities">
	<div class="white-bg"><div class="row">
		
		<div class="col-sm-6">
			<ul>
				<li><strong>Pool Tables <a href="#" target="_blank" class="camraicn"><i class="fas fa-camera"></i></a></strong><br/><span class="discrip">Looking for a party with a difference?</span></li>
				<li><h4>$100 </h4></li>
			</ul>
		</div>
		<div class="col-sm-6">

			<ul class="groupInput">
			<li><label>Hours</label><input type="number" placeholder="2"name=""></li>
			<li><label>quantity</label><input type="number" placeholder="5"name=""><a href="">Add to Order</a></li>

		</ul>
		</div>
	</div></div>
<!-- ------------------------------------------------------------- -->
<div class="white-bg"><div class="row">
		
		<div class="col-sm-6">
			<ul>
				<li><strong>Pinpong Tables <a href="#" target="_blank" class="camraicn"><i class="fas fa-camera"></i></a></strong><br/><span class="discrip">Looking for a party with a difference?</span></li>
				<li><h4>$120 </h4></li>
			</ul>
		</div>
		<div class="col-sm-6">

			<ul class="groupInput">
			<li><label>Hours</label><input type="number" placeholder="6"name=""></li>
			<li><label>quantity</label><input type="number" placeholder="5"name=""><a href="">Add to Order</a></li>

		</ul>
		</div>
	</div></div>
<!-- ------------------------- -->
</div>
    	</div>
	</div>
    
    <section class="specialRequest" id="specialRequest">
	<h3>Special Requests</h3>
	<textarea placeholder="Tell Us How we can make you event even better. Do you know any special  requests?">
		Tell Us How we can make your event even better. Do you know any special  requests?
	</textarea>
<h3>Organizer Info</h3>
	<div class="OrganizerInfo" id="OrganizerInfo">
    <div class="OrganizerFrom">
		

		<form>
			<ul>
			<li><input type="text" name="" placeholder="Name"></li>
			<li><input type="email" name="" placeholder="Email"></li>
			<li><input type="text" name="" placeholder="Address"></li>
			<li><input type="tel" name="" placeholder="Phone"></li>
			<li><input type="tel" name="" placeholder="Company Name "></li>

			<li><a href="/view-order-summary/" class="orderBtn_1">View Order Summary</a></li>

</ul>
		</form>
	</div>
</div>
</section>
	</div>
    
    </div></div>
</section>
<!-- -----------------------------------------------menu and Location Ends-------------------------------------------------- -->
</div>





<?php
get_footer();