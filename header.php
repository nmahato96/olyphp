			<header>
				<div class="logo col-md-1">
					<a href="index.php"><img src="img/logo.png"></a>
				</div>
				<div class="logo_text col-md-7">
					<p>India Largest Marketplace</p>
				</div>
				<div class="my_account_btn col-md-2">
					<?php
					
						if(isset($_SESSION["name"])){
					?>
					<a  class="myacc_dd"><i class="fas fa-user"></i> <?php echo $_SESSION["name"];?></a>
					
						<div class="my_account_dropdown">
							<div class="my_account_one">
								<div class="inner_my_account_one">
									<i class="fas fa-align-left"></i><span>&nbsp;&nbsp;My Account</span>
								</div>
								<div class="inner_my_account_one">
									<ul>
										<li><a href="http://localhost/oly/olyphp/dashboard.php">Ads</a></li>
										<li>Messages</li>
										<li>Settings</li>
									</ul>
								</div>
							</div>
							<div class="my_account_two">
								<div class="inner_my_account_two">
									<i class="far fa-star"></i><span>&nbsp;&nbsp;Favorites:</span>
								</div>
								<div class="inner_my_account_two">
									<ul>
										<li>Ads</li>
										<li>Searches</li>
									</ul>
								</div>
							</div>
							<div class="logout">
								<a href="logout.php"><i class="fas fa-sign-out-alt"></i><span>&nbsp;&nbsp;Logout</span></a>
							</div>
						</div>
					<?php 
						}
						else{
					?>
					<a href="login.php" class="myacc_dd"><i class="fas fa-user"></i> My Account</a>
					<?php 
						}
					?>
				</div>
				<div class="submit_free_add_btn col-md-2">
					<a href="posting.php">Submit a Free Ad</a>
				</div>
				<div class="select_ln">
					<p>Select Language&nbsp;&nbsp;<a>English</a> | <a>Hindi</a></p>
				</div>
			</header>
