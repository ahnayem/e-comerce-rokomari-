		<header>
			<div class="container clearfix">
				<div class="row">
					<div class="col-md-12">
						<h1 class="brandlogo"><a href="index"><img src="assets/img/ims_logo_bold.png" alt="Institute of Multidisciplinary Studies" class="logo"></a></h1>
						<div class="topinfo">
							<ul class="social-icons list-soc">
								<!-- <a href="#"><img src="assets/img/login-button.png"/></a> -->
								
								<?php if (isset($_SESSION['user_id'])){ ?>
									<a href="dashboard" class="btn btn-default" style="background-color: #1c224f; color: #fff; margin: -18px 0px 0px 0px; font-size: 11px;border-radius: 30px; border: none;padding: 8px 11px;"><i class="fa fa-user" style="border: 1px solid #fff; border-radius: 100%; padding: 4px 5px;"></i> ACCOUNT</a>
								<?php }else{ ?>
									<a href="signin.php" class="btn btn-default" style="background-color: #1c224f; color: #fff; margin: -18px 0px 0px 0px; font-size: 11px;border-radius: 30px; border: none;padding: 8px 11px;"><i class="fa fa-user" style="border: 1px solid #fff; border-radius: 100%; padding: 4px 5px;"></i> LOGIN</a>
								<?php } ?>


								<li><a href="https://www.facebook.com/imsvu" target="_blank"><i class="icon-facebook"></i></a></li>
								<li><a href="#" title="Twitter"><i class="icon-twitter"></i></a></li>
								<li><a href="#" title="Linkedin"><i class="icon-linkedin"></i></a></li>
								<!-- <li><a href="#" title="Youtube"><i class="icon-youtube"></i></a></li> -->
								<!-- <li><a href="#" title="Slack"><i class="fa fa-slack"></i></a></li> -->
							</ul>
							<!--div class="infoaddress">
								<form id="search" action="#" method="post">							
									<input type="text" onfocus="if(this.value =='Search here...' ) this.value=''" onblur="if(this.value=='') this.value='Search here...'" value="Search here..." name="s">
									<a href="#"></a>							
								</form>
							</div-->
						</div>
						<div class="clearfix">
						</div>
						<div id="menuzord" class="menuzord red">
							<ul class="menuzord-menu">
								<li><a href="index">Home</a></li>
								<li class="vertical-devider"></li>
								<li><a href="under.html">IMS</a>
									<ul class="dropdown">
										<li><a href="under.html">Who we are!</a></li>
		                                <!--li><a href="http://vu.edu.bd/cse/mission-vission">Mission & Vission</a></li-->
		                                <li><a href="under.html">Life at Rajshahi</a></li>
		                                <li><a href="under.html">Administration</a></li>
		                                <li><a href="our_expert.php">Our Experts</a></li>
		                            </ul>
								</li>
								<li class="vertical-devider"></li>
								<li><a href="#">Our Activities</a>
									<ul class="dropdown">
		                                <li><a href="under.html">Public Lectures</a></li>
		                                <li><a href="under.html">Weekly Seminars</a></li>
		                                <li><a href="under.html">VU Funding Projects</a>
		                                    <ul class="dropdown">
												<li><a href="under.html"> 2017-18 </a></li>
												<li><a href="under.html"> 2018-19 </a></li>
											</ul>
		                                </li>
		                                <li><a href="under.html">Funding Sources</a></li>
									</ul>
								</li>
								<li class="vertical-devider"></li>
								<li><a href="under.html">Publications</a>
									<ul class="dropdown">
										<li><a href="under.html">Bulletins</a></li>
										<li><a href="under.html">Books</a></li>
		                                <li><a href="under.html">Seminar Volumes</a></li>
		                                <li><a href="under.html">Journal</a>
											<ul class="dropdown">
												<li><a href="under.html"> Science & Engineering </a></li>
												<li><a href="under.html"> Arts, Commerce, Law & Social Sciences </a></li>
											</ul>
		                                </li>
		                                <li><a href="under.html">Research Monographs</a></li>
									</ul>
								</li>
								<li class="vertical-devider"></li>
								<li><a href="under.html">Collaboration</a>
									<ul class="dropdown">
		                                <li><a href="under.html">National</a>
											<ul class="dropdown">
												<li><a href="under.html"> Individual </a></li>
												<li><a href="under.html"> Institutional </a></li>
											</ul>
		                                </li>
		                                <li><a href="under.html">International</a>
											<ul class="dropdown">
												<li><a href="under.html"> Individual </a></li>
												<li><a href="under.html"> Institutional </a></li>
											</ul>
		                                </li>
									</ul>
								</li>
								<li class="vertical-devider"></li>
								<li><a href="#">Research Groups</a>
									<ul class="dropdown">
		                                <li><a href="under.html">Statistical Analysis Group</a></li>
		                                <li><a href="under.html">AI Group</a></li>
										<li><a href="under.html">Cognitive Analysis Group</a></li>
									</ul>
								</li>
								<li class="vertical-devider"></li>
								<li><a href="#">Online Resources</a>
									<ul class="dropdown">
										<li><a href="under.html">Database</a>
											<ul class="dropdown">
												<li><a href="under.html"> Pubmed</a></li>
											</ul>
										</li>
		                                <li><a href="under.html">Books</a></li>
		                                <li><a href="under.html">Articles</a></li>
										<li><a href="under.html">Research Monographs</a></li>
										<li><a href="under.html">Thesis Papers</a>
											<ul class="dropdown">
												<li><a href="under.html"> Masters</a></li>
												<li><a href="under.html"> MPhil</a></li>
												<li><a href="under.html"> PhD</a></li>
											</ul>
										</li>
									</ul>
								
								</li>
									
								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</header>	