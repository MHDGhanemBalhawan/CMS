<script src="bootstrap/js/myscript.js"></script>
<header class="navbar navbar-inverse navbar-static-top">
<div id="wrapper">
	<!--keep navbar on top-->
	<div class="container-fluid">
		<div class="navbar-header">
		<a class="navbar-brand" href="#">MHD Ghanem Balhawan</a>
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class = "nav navbar-nav navbar-right" id="myNavbar">
				<li class="cbutton"><a href="index.php">Home</a></li>
				<ul class="nav navbar-nav">
					<li class="dropdown cbutton">
					  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Articles <span class="caret"></span></a>
					  <!--border made other element in the menu black -->
					  <ul class="dropdown-menu" role="menu" style="background-color:black;border:black;">
							<?php
								$sel_cat = "SELECT * FROM `tbl_category`";
								$pre_sel = mysqli_query($conn,$sel_cat);
								while($rows = mysqli_fetch_assoc($pre_sel)){
									if(isset($_GET['cat_name'])){
										if($_GET['cat_name'] == $rows['cat_name']){
											$class = "active";
										} else {
											$class = "";
										}
									} else {
										$class = "";
									}
									echo '<li class="'.$class.'" style="background-color:black;"><a mymenu href="menu.php?cat_name='.$rows['cat_name'].'">'.ucfirst($rows['cat_name']).'</a></li>';
									/* echo '<li id="articles"><a href="menu.php?cat_name='.$rows['cat_name'].'">'.ucfirst($rows['cat_name']).'</a></li>'; */
								}
							?>
					</ul>
					</li>
				</ul>
				<li class="cbutton"><a href="contact.php">Contact Us</a></li>
				<li class="cbutton"><a href="about.php">About Us</a></li>
				<li class="cbutton"><a href="register.php">Register</a></li>
			</ul>
			</div>
		</div>
	</div>
</div>
<!--End wrapper-->
</header>