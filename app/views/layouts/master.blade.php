<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!-- Consider adding a manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
 
<head>
	
	<meta charset="utf-8">
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	<title>Fairweather Garden Services</title>
	
	<script>document.documentElement.className += ' advanced';</script>
	
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<link rel="stylesheet" href="/css/style.css" media="screen">
	<link href='http://fonts.googleapis.com/css?family=Neuton|Montserrat' rel='stylesheet' type='text/css'>

</head>

<body>
	<header class="header">
		<nav class="header__nav">
			<a href="#toggle" id="toggleMenu">Menu</a><!--
			--><div class="header__links"><!--
				--><a href="#info">Info</a><!--
				--><a href="#services">Services</a><!--
				--><a href="#testimonials">Testimonials</a><!--
				--><a href="#contact">Contact</a><!--
			--></div>
		</nav>
		<div class="container">

			

			<div class="wrapper row">
				<div class="half-column half-column--left">
					<img class="header__img header__img--leaf" src="/img/leaf-background.jpg" alt="The leaf part of the logo with image of forest" width="469" height="536"/>
				</div>
				<div class="half-column half-column--right">
					<img class="header__img header__img--logo" src="/img/fairweather-logo.png" alt="Fairweather Garden Services logo" width="403" height="187"/>
				</div>
			</div>
		</div>
	</header>

	<section class="section section--info" id="info">
		<div class="container">
			<div class="wrapper row">
				<h2 class="section__title">Info</h2>
				<p class="section__subhead">Fairweather Garden Services offers a range of garden maintenance services, underpinned by a committed, quality, reliable and friendly approach. Highly regarded by our customers, we are a family run business that takes great pride in our work.</p>
				<ul class="section__images">
					<li><img src="/img/mowing.jpg" width="204" height="179" alt="Lee Fairweather mowing a lawn"/></li>
					<li><img src="/img/topiary.jpg" width="204" height="179" alt="A garden with topiary bushes"/></li>
					<li><img src="/img/lawn.jpg" width="204" height="179" alt="A freshly cut lawn with stripes"/></li>
				</div>
			</div>
		</div>
	</section>

	<section class="section section--services" id="services">
		<div class="container">
			<div class="wrapper">
				<h2 class="section__title">Services</h2>

				<div class="list-box-table">
					<div class="list-box list-box--spring">
						<h3 class="list-box__title">Spring Services</h3>
						<ul class="list-box__items">
							<li>- Garden Maintenance</li>
							<li>- Hedges</li>
							<li>- Planting</li>
							<li>- Garden Clearance</li>
							<li>- Patios</li>
							<li>- Log chopping</li>
							<li>- Tree surgery</li>
							<li>- Shed Repair</li>
						</ul>
						<div class="list-box__icon"></div>
					</div>

					<div class="list-box list-box--summer">
						<h3 class="list-box__title">Summer Services</h3>
						<ul class="list-box__items">
							<li>- Lawns</li>
							<li>- Topiary</li>
							<li>- Gutter clearance</li>
							<li>- Hedge cutting</li>
							<li>- Landscaping</li>
							<li>- Garden clearance</li>
							<li>- Turfing</li>
							<li>- Shed Repair</li>
						</ul>
						<div class="list-box__icon"></div>
					</div>
				</div>
			</div>

		</div>
	</section>

	<section class="section section--facebook" id="facebook">
		<div class="container">
			<div class="wrapper row">
				<h2 class="section__title">Facebook</h2>
				<div class="list-image">
					@foreach($photos as $photo)
						<div class="list-image__item">
							<a href="https://www.facebook.com/permalink.php?story_fbid={{$photo['post_id']}}&id={{$facebookPageId}}" target="_blank">
								<div class="list-image__image-container u-r-corner" style="background-image: url({{$photo['source']}});">
									<img src="{{$photo['source']}}" class="list-image__image u-r-corner" width="{{$photo['width']}}" height="{{$photo['height']}}"/>
									@if(array_key_exists('likes', $photo))
										<div class="list-image__likes">
											<img src="/img/facebook-thumb.svg" class="list-image__likes-image"/>
											<p class="list-image__likes-text">{{count($photo['likes']['data'])}}</p>
										</div>
									@endif
								</div>
							</a>
							<div class="list-image__description">
								<h3 class="list-image__date">{{Carbon\Carbon::parse($photo['updated_time'])->format('jS F \\a\\t H:i A')}}</h3>
								<p class="list-image__message">{{$photo['message']}}</p>
							</div>
						</div>
					@endforeach
				</div>

				<div class="cta">
					<a href="https://www.facebook.com/pages/Fairweather-Garden-Services/1441025676167565" class="cta__button u-r-corner" title="Read more on Facebook">Visit Our Facebook</a>
				</div>
				
			</div>

		</div>
	</section>

	<section class="section section--testimonials" id="testimonials">
		<div class="container">
			<div class="wrapper row">
				<h2 class="section__title">Testimonials</h2>

				<div class="list-box-table">
					<div class="list-box">
						<ul class="list-box__rating-list">
							<li class="list-box__rating"><img src="/img/gray-leaf.svg"/></li>
							<li class="list-box__rating"><img src="/img/gray-leaf.svg"/></li>
							<li class="list-box__rating"><img src="/img/gray-leaf.svg"/></li>
							<li class="list-box__rating"><img src="/img/gray-leaf.svg"/></li>
							<li class="list-box__rating"><img src="/img/gray-leaf.svg"/></li>
						</ul>
						<p class="list-box__text">Fantastic! Absolutely love my garden now and can't wait to sit out in the sunshine and enjoy it highly recommended</p>
						<p class="list-box__footer">8th April 2015 | Macclesfield</p>
					</div>
					<div class="list-box">
						<ul class="list-box__rating-list">
							<li class="list-box__rating"><img src="/img/gray-leaf.svg"/></li>
							<li class="list-box__rating"><img src="/img/gray-leaf.svg"/></li>
							<li class="list-box__rating"><img src="/img/gray-leaf.svg"/></li>
							<li class="list-box__rating"><img src="/img/gray-leaf.svg"/></li>
							<li class="list-box__rating"><img src="/img/gray-leaf.svg"/></li>
						</ul>
						<p class="list-box__text">Brilliant service and very friendly would 100% recommend</p>
						<p class="list-box__footer">30th June 2014 | Macclesfield</p>
					</div>
				</div>
			</div>

			<div class="cta">
				<a href="https://www.facebook.com/pages/Fairweather-Garden-Services/1441025676167565?sk=reviews" class="cta__button u-r-corner" title="Read all our testimonials">All Testimonials</a>
			</div>

		</div>
	</section>

	<section class="section section--contact" id="contact">
		<div class="container">
			<div class="wrapper row">
				<h2 class="section__title">Contact</h2>

				<form class="contact-form">
					<div class="input contact-form__left">
						<input class="input__field" type="text" id="name" required> 
						<label class="input__label" for="name">
							<span class="input__label-content" data-content="Name">Name</span> 
						</label>
					</div><!--
					--><div class="input contact-form__right">
						<input class="input__field" type="tel" id="number" required> 
						<label class="input__label" for="number">
							<span class="input__label-content" data-content="Number">Number</span> 
						</label>
					</div>
					<div class="input">
						<textarea class="input__field" type="tel" id="enquiry" required></textarea>
						<label class="input__label" for="enquiry">
							<span class="input__label-content" data-content="Enquiry">Enquiry</span> 
						</label>
					</div>
					<input type="submit" class="contact-form__submit u-r-corner">
				</form>
			</div>
		</div>
	</section>

   
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="/js/libs/jquery-1.11.1.min.js"><\/script>')</script>
	<script src="js/script.js"></script>

</body>
</html>