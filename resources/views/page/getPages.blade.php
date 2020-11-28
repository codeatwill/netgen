@extends('layouts.frontend.'.$data["templates"]->name) 

@section('title')Page Title @endsection 
@section('keywords')Page keywords @endsection 
@section('metaDescription')Page Description @endsection 

@section('content')
	@if($data["templates"]->name == 'theme-one')
	<!-- banner -->
        <div class="w3-banner-top">
            <div class="agileinfo-dot">
                <div class="w3layouts_menu">
                    <nav class="cd-stretchy-nav edit-content">
                        <a class="cd-nav-trigger" href="#0"> Menu <span aria-hidden="true"></span> </a>
                        <ul>
                            <li>
                                <a href="#home" class="scroll"><span>Home</span></a>
                            </li>
                            <li>
                                <a href="#about" class="scroll"><span>About</span></a>
                            </li>
                            <li>
                                <a href="#experiences" class="scroll"><span>Experiences</span></a>
                            </li>
                            <li>
                                <a href="#skills" class="scroll"><span>Skills</span></a>
                            </li>
                            <li>
                                <a href="#projects" class="scroll"><span>Projects</span></a>
                            </li>
                            <li>
                                <a href="#contact" class="scroll"><span>Contact</span></a>
                            </li>
                        </ul>
                        <span aria-hidden="true" class="stretchy-nav-bg"></span>
                    </nav>
                </div>

                <div class="w3-banner-grids">
                    <div class="col-md-6 w3-banner-grid-left">
                        <div class="w3-banner-img">
                            <img src="/theme-one/images/ban661.jpg" alt="img" />
                            <h3 class="test">{{ $data['users']->name }}</h3>
                            <p class="test">{{ $data['users']->position }}</p>
                        </div>
                    </div>
                    <div class="col-md-6 w3-banner-grid-right">
                        <div class="w3-banner-text">
                            <h3>Career Goal</h3>
                            <p>{{ $data['users']->obj }}</p>
                        </div>
                        <div class="w3-right-addres-1">
                            <ul class="address">
                                <li>
                                    <ul class="agileits-address-text">
                                        <li class="agile-it-adress-left"><b>D.O.B</b></li>
                                        <li><span>:</span>{{ $data['users']->dob }}</li>
                                    </ul>
                                </li>
                                <li>
                                    <ul class="agileits-address-text">
                                        <li class="agile-it-adress-left"><b>PHONE</b></li>
                                        <li><span>:</span>{{ $data['users']->phone }}</li>
                                    </ul>
                                </li>
                                <li>
                                    <ul class="agileits-address-text">
                                        <li class="agile-it-adress-left"><b>ADDRESS</b></li>
                                        <li><span>:</span>{{ $data['users']->address }}</li>
                                    </ul>
                                </li>
                                <li>
                                    <ul class="agileits-address-text">
                                        <li class="agile-it-adress-left"><b>E-MAIL</b></li>
                                        <li><span>:</span><a href="mailto:example@mail.com"> {{ $data['users']->email }}</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <ul class="agileits-address-text">
                                        <li class="agile-it-adress-left"><b>WEBSITE</b></li>
                                        <li><span>:</span><a href="#">{{ $data['users']->website }}</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="thim-click-to-bottom">
                <a href="#about" class="scroll">
                    <i class="fa fa-chevron-down"></i>
                </a>
            </div>
        </div>
        <!-- banner -->
        <!-- /about -->

        <div class="w3-about" id="about">
            <div class="container">
                <div class="w3-about-head">
                    <h3>About me</h3>
                </div>
                <div class="w3-about-grids">
                    <div class="w3-about-grids1">
                        <div class="col-md-6 w3-about-grid-left1">
                            <img src="/theme-one/images/ab5.jpg" alt="img1" />
                        </div>
                        <div class="col-md-6 w3-about-grid-right1">
                            <h3>Aliquam euismod at turpis eu egestas</h3>
                            <p>
                                Nullam pulvinar nunc eget tortor elementum, sed vehicula massa vestibulum. Aenean gravida arcu viverra nisl euismod laoreet. Fusce accumsan vel arcu at tincidunt. Nulla non nulla ultrices, pharetra orci in,
                                varius nunc.
                            </p>
                            <h5>Lorem ipsum dolor sit amet, consectetur adipisci ask</h5>
                            <div class="w3-about-grid-small-border">
                                <div class="col-md-4 w3-about-grid-small">
                                    <h3 class="w3-head-project">20</h3>
                                    <h5>web projects</h5>
                                </div>
                                <div class="col-md-4 w3-about-grid-small">
                                    <h3 class="w3-head-project">30</h3>
                                    <h5>php projects</h5>
                                </div>
                                <div class="col-md-4 w3-about-grid-small">
                                    <h3 class="w3-head-project">50</h3>
                                    <h5>java projects</h5>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="w3-about-grids2">
                            <div class="col-md-6 w3-about-grid-left2">
                                <h3>Pellentesque sit amet ex at nisl posuere</h3>
                                <p>
                                    Nullam pulvinar nunc eget tortor elementum, sed vehicula massa vestibulum. Aenean gravida arcu viverra nisl euismod laoreet. Fusce accumsan vel arcu at tincidunt. Nulla non nulla ultrices, pharetra orci
                                    in, varius nunc.
                                </p>
                                <h4><a href="#">Readmore</a></h4>
                            </div>
                            <div class="col-md-6 w3-about-grid-right2">
                                <img src="/theme-one/images/ab7.jpg" alt="img1" />
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //about  -->
        <!--/ education -->
        <div class="w3-edu-top" id="experiences">
            <div class="container">
                <div class="w3-edu-grids">
                    <div class="col-md-6 w3-edu-grid-left">
                        <div class="w3-edu-grid-header">
                            <h3>Experiences</h3>
                        </div>
                        @foreach($data['user_exp'] as $user_exp)
							<div class="col-md-4 w3-edu-info1">
								<h3>{{ $user_exp->duration }}</h3>
								<h4>{{ $user_exp->position }}</h4>
							</div>
							<div class="col-md-6 w3-edu-info2">
								<h3>{{ $user_exp->name }}</h3>
								<p>{{ $user_exp->desc }}</p>
							</div>
							<div class="clearfix"></div>
                        @endforeach
                    </div>
                    <div class="col-md-6 w3-edu-grid-right">
						<div class="w3-edu-grid-header">
							<h3>Education</h3>
						</div>
						@foreach($data['user_edu'] as $user_edu)
							<div class="col-md-3 w3-edu-info-right1">
								<h3>{{ $user_edu->duration }}</h3>
							</div>
							<div class="col-md-9 w3-edu-info-right2">
								<h3>{{ $user_edu->position }}</h3>
								<h4>{{ $user_edu->name }}</h4>
								<p>{{ $user_edu->desc }}</p>
							</div>
							<div class="clearfix"></div>
                        @endforeach
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- //education -->
        <!-- skills -->
        <div class="skills" id="skills">
            <div class="container">
                <div class="title-w3ls">
                    <h4>My Skills</h4>
                </div>
                <div class="skills-bar">
					@foreach($data['user_skills'] as $user_skills)
						<div class="col-md-6 w3-agile-skills-grid">
							<section class="bar">
								<section class="wrap">
									<div class="wrap_right">
										<div class="bar_group">
											<div class="bar_group__bar thin" label="{{ $user_skills->name }}" show_values="true" tooltip="true" value="{{ $user_skills->exp_rating * 10 }}"></div>
										</div>
									</div>
									<div class="clearfix"></div>
								</section>
							</section>
						</div>
                    @endforeach                    
                </div>
            </div>
        </div>
        <!-- //skills -->

        <!-- main-content -->
        <div class="main-content">
            <!-- gallery -->
            <div class="gallery" id="projects">
                <div class="w3-gallery-head">
                    <h3>My projects</h3>
                </div>
                <div class="container">
                    <div class="gallery_gds">
                        <ul class="simplefilter">
                            <li class="active" data-filter="all">All Projects</li>
<!--
                            <li data-filter="1">php</li>
                            <li data-filter="2">Java</li>
                            <li data-filter="3">Web development</li>
-->
                        </ul>
                        <div class="filtr-container" style="padding: 0px; position: relative; height: 858px;">
                            @foreach($data['user_portfolio'] as $key => $user_portfolio)
								<div
									class="col-md-4 col-ms-6 jm-item first filtr-item"
									data-category="all 1, 5"
									data-sort="Busy streets"
									style="opacity: 1; transform: scale(1) translate3d(0px, 0px, 0px); backface-visibility: hidden; perspective: 1000px; transform-style: preserve-3d; position: absolute; transition: all 0.5s ease-out 0ms;"
								>
									<div class="jm-item-wrapper">
										<div class="jm-item-image">
											@if($user_portfolio->image != null)
												<img id="port-img-{{ $key }}" src="/images/portfolio/{{ $user_portfolio->image }}" alt="Image"  />
											@else
												<img id="port-img-{{ $key }}" src="/no-image.jpg" alt="Image"/>
											@endif
											<span class="jm-item-overlay"> </span>
											<div class="jm-item-button">
												<h3 id="port-name-{{ $key }}" style="display:none;">{{ $user_portfolio->name }}</h3>
												<p id="port-desc-{{ $key }}" style="display:none;">{{ $user_portfolio->desc }}</p>
												<a href="#" data-key="{{ $key }}" class="show-data">View Details</a>
											</div>
										</div>
									</div>
								</div>
                            @endforeach
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!--//gallery-->
        </div>
        <!-- //main-content -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="w3ls-property-images w3-pop1-img"></div>

                <div class="ins-details">
                    <div class="ins-name show-div">
                        
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <!-- contact -->
        <div class="contact" id="contact">
            <div class="container">
                <div class="w3ls-heading">
                    <h3>Contact me</h3>
                </div>
                <div class="contact-w3ls">
                    <form action="/submit-contract/{{ $data['users']->id }}" method="post">
                        <div class="col-md-7 col-sm-7 contact-left agileits-w3layouts">
                            <input type="text" name="name" placeholder="Name" required="required" />
                            <input type="email" class="email" name="Email" placeholder="Email" required="required" />
                            <input type="text" name="phone" placeholder="Mobile Number" required="required" />
                        </div>
                        <div class="col-md-5 col-sm-5 contact-right agileits-w3layouts">
                            <textarea name="msg" placeholder="Message" required=""></textarea>
                            <input type="submit" value="Submit" />
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
        <!-- //contact -->
        
        @section('pageScripts')
			<script src="/theme-one/js/jquery.filterizr.js"></script>

			<!-- Kick off Filterizr -->
			<script type="text/javascript">
				$(document).ready(function () {
					
					$(".show-data").click(function(){
						
						var key = $(this).attr('data-key');
						console.log(key);
						html = '<img  src="'+$('#port-img-'+key).attr('src')+'" / >';
						html += '<h3>'+$('#port-name-'+key).text()+'</h3>';
						html += '<p>'+$('#port-desc-'+key).text()+'</p>';
						console.log(html);
						$('.show-div').html('');
						$('.show-div').append(html);
						$('#myModal').modal('show');
						
					});
					//Initialize filterizr with default options
					$(".filtr-container").filterizr();
					
					
				});
			</script>
		@endsection
			
        @section('footer')
			<div class="w3l_footer">
				<div class="container">
					<div class="w3ls_footer_grids">
						<div class="w3ls_footer_grid">
							<div class="col-md-4 w3ls_footer_grid_left">
								<div class="w3ls_footer_grid_leftl">
									<i class="fa fa-map-marker" aria-hidden="true"></i>
								</div>
								<div class="w3ls_footer_grid_leftr">
									<h4>Location</h4>
									<p>{{ $data['users']->address }}</p>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="col-md-4 w3ls_footer_grid_left">
								<div class="w3ls_footer_grid_leftl">
									<i class="fa fa-envelope" aria-hidden="true"></i>
								</div>
								<div class="w3ls_footer_grid_leftr">
									<h4>Email</h4>
									<a href="mailto:info@example.com">{{ $data['users']->email }}</a>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="col-md-4 w3ls_footer_grid_left">
								<div class="w3ls_footer_grid_leftl">
									<i class="fa fa-phone" aria-hidden="true"></i>
								</div>
								<div class="w3ls_footer_grid_leftr">
									<h4>Call Me</h4>
									<p>{{ $data['users']->phone }}</p>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
				<div class="w3l_footer_pos">
					<p>© 2017 C-Resume. All Rights Reserved | Design by <a href="https://w3layouts.com/">W3layouts</a></p>
				</div>
			</div>
        @endsection
        
	@else
		<div class="page-content">
            <div>
                <div class="profile-page">
                    <div class="wrapper">
                        <div class="page-header page-header-small" filter-color="green">
                            <div class="page-header-image" data-parallax="true" style="background-image: url('images/cc-bg-1.jpg');"></div>
                            <div class="container">
                                <div class="content-center">
                                    <div class="cc-profile-image">
                                        <a href="#"><img src="/theme-two/images/anthony.jpg" alt="Image" /></a>
                                    </div>
                                    <div class="h2 title">{{ $data['users']->name }}</div>
                                    <p class="category text-white">{{ $data['users']->position }}</p>
                                    <a class="btn btn-primary smooth-scroll mr-2" href="#contact" data-aos="zoom-in" data-aos-anchor="data-aos-anchor">Hire Me</a>
                                </div>
                            </div>
                            <div class="section">
                                <div class="container">
                                    <div class="button-container">
                                        <a class="btn btn-default btn-round btn-lg btn-icon" href="#" rel="tooltip" title="Follow me on Facebook"><i class="fa fa-facebook"></i></a>
                                        <a class="btn btn-default btn-round btn-lg btn-icon" href="#" rel="tooltip" title="Follow me on Twitter"><i class="fa fa-twitter"></i></a>
                                        <a class="btn btn-default btn-round btn-lg btn-icon" href="#" rel="tooltip" title="Follow me on Google+"><i class="fa fa-google-plus"></i></a>
                                        <a class="btn btn-default btn-round btn-lg btn-icon" href="#" rel="tooltip" title="Follow me on Instagram"><i class="fa fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section" id="about">
                    <div class="container">
                        <div class="card" data-aos="fade-up" data-aos-offset="10">
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="card-body">
                                        <div class="h4 mt-0 title">About</div>
                                        <p>{{ $data['users']->obj }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="card-body">
                                        <div class="h4 mt-0 title">Basic Information</div>
                                        <div class="row">
                                            <div class="col-sm-4"><strong class="text-uppercase">DOB:</strong></div>
                                            <div class="col-sm-8">{{ $data['users']->dob }}</div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-sm-4"><strong class="text-uppercase">Email:</strong></div>
                                            <div class="col-sm-8">{{ $data['users']->email }}</div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-sm-4"><strong class="text-uppercase">Phone:</strong></div>
                                            <div class="col-sm-8">{{ $data['users']->phone }}</div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-sm-4"><strong class="text-uppercase">Address:</strong></div>
                                            <div class="col-sm-8">{{ $data['users']->address }}</div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-sm-4"><strong class="text-uppercase">Language:</strong></div>
                                            <div class="col-sm-8">{{ $data['users']->language }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section" id="skill">
                    <div class="container">
                        <div class="h4 text-center mb-4 title">Professional Skills</div>
                        <div class="card" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                            <div class="card-body">
                                <div class="row">
                                  
                                   @foreach($data['user_skills'] as $user_skills)
										<div class="col-md-6">
											<div class="progress-container progress-primary">
												<span class="progress-badge">{{ $user_skills->name }}</span>
												<div class="progress">
													<div
														class="progress-bar progress-bar-primary"
														data-aos="progress-full"
														data-aos-offset="10"
														data-aos-duration="2000"
														role="progressbar"
														aria-valuenow="60"
														aria-valuemin="0"
														aria-valuemax="100"
														style="width: {{ $user_skills->exp_rating }}%;"
													></div>
													<span class="progress-value">{{ $user_skills->exp_rating }}%</span>
												</div>
											</div>
										</div>
                                   @endforeach
                                
								</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section" id="portfolio">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 ml-auto mr-auto">
                                <div class="h4 text-center mb-4 title">Portfolio</div>
                                <div class="nav-align-center">
                                    <ul class="nav nav-pills nav-pills-primary" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#web-development" role="tablist"><i class="fa fa-laptop" aria-hidden="true"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content gallery mt-5">
                            <div class="tab-pane active" id="web-development">
                                <div class="ml-auto mr-auto">
                                    <div class="row">
										@foreach($data['user_portfolio'] as $user_portfolio)
											<div class="col-md-6">
												<div class="cc-porfolio-image img-raised" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
													<a href="#web-development">
														<figure class="cc-effect">
															@if($user_portfolio->image != null)
																<img src="/images/portfolio/{{ $user_portfolio->image }}" alt="Image" style="height: 416px;width: 550px;" />
															@else
																<img src="/no-image.jpg" alt="Image" style="height: 416px;width: 550px;" />
															@endif
															
															<figcaption>
																<div class="h4">{{ $user_portfolio->name }}</div>
																<p>{{ $user_portfolio->desc }}</p>
															</figcaption>
														</figure>
													</a>
												</div>
											</div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section" id="experience">
                    <div class="container cc-experience">
                        <div class="h4 text-center mb-4 title">Work Experience</div>
                        @foreach($data['user_exp'] as $user_exp)
							<div class="card">
								<div class="row">
									<div class="col-md-3 bg-primary" data-aos="fade-right" data-aos-offset="50" data-aos-duration="500">
										<div class="card-body cc-experience-header">
											<p>{{ $user_exp->duration }}</p>
											<div class="h5">{{ $user_exp->name }}</div>
										</div>
									</div>
									<div class="col-md-9" data-aos="fade-left" data-aos-offset="50" data-aos-duration="500">
										<div class="card-body">
											<div class="h5">{{ $user_exp->position }}</div>
											<p>
												{{ $user_exp->desc }}
											</p>
										</div>
									</div>
								</div>
							</div>
                        @endforeach
                        
                    </div>
                </div>
                <div class="section">
                    <div class="container cc-education">
                        <div class="h4 text-center mb-4 title">Education</div>
                        @foreach($data['user_edu'] as $user_edu)
                        <div class="card">
                            <div class="row">
                                <div class="col-md-3 bg-primary" data-aos="fade-right" data-aos-offset="50" data-aos-duration="500">
                                    <div class="card-body cc-education-header">
                                        <p>{{ $user_edu->duration }}</p>
                                        <div class="h5"{{ $user_edu->name }}</div>
                                    </div>
                                </div>
                                <div class="col-md-9" data-aos="fade-left" data-aos-offset="50" data-aos-duration="500">
                                    <div class="card-body">
                                        <div class="h5">{{ $user_edu->position }}</div>
                                        <p>
                                           {{ $user_edu->desc }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                         @endforeach
                        
                    </div>
                </div>
                
                <div class="section" id="contact">
                    <div class="cc-contact-information" style="background-image: url('images/staticmap.png');">
                        <div class="container">
                            <div class="cc-contact">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="card mb-0" data-aos="zoom-in">
                                            <div class="h4 text-center title">Contact Me</div>
                                            <div class="row">
												<div class="col-sm-12">
													@include('flash-message')
													@if($errors->any())
													<ul class="alert alert-danger">
														@foreach ($errors->all() as $error)
														<li>{{ $error }}</li>
														@endforeach
													</ul>
													@endif 
												</div>
											</div>
                                            <div class="row">
                                                <div class="col-md-6">
													
                                                    <div class="card-body">
                                                        <form action="/submit-contract/{{ $data['users']->id }}" method="POST">
                                                            <div class="p pb-3"><strong>Feel free to contact me </strong></div>
                                                            <div class="row mb-3">
                                                                <div class="col">
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                                                                        <input class="form-control" type="text" name="name" placeholder="Name" required="required" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col">
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                                                        <input class="form-control" type="text" name="phone" placeholder="Phone" required="required" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col">
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                                                        <input class="form-control" type="email" name="email" placeholder="E-mail" required="required" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <textarea class="form-control" name="msg" placeholder="Your Message" required="required"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <button class="btn btn-primary" type="submit">Send</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="card-body">
                                                        <p class="mb-0"><strong>Address </strong></p>
                                                        <p class="pb-2">{{ $data['users']->address }}</p>
                                                        <p class="mb-0"><strong>Phone</strong></p>
                                                        <p class="pb-2">{{ $data['users']->phone }}</p>
                                                        <p class="mb-0"><strong>Email</strong></p>
                                                        <p>{{ $data['users']->email }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	@endif
	
	@section('name') 
	{{ $data['users']->name }}
	@endsection 

	@section('pageScripts')
	@endsection 
@endsection


