<?php
 include('inc/config.php');
?>
<!DOCTYPE html>

<html class="no-js" lang="en">

<head>

	<!--- basic page needs
   ================================================== -->
	<meta charset="utf-8">
	<title>MCA SJEC-BLOG</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- mobile specific metas
   ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
   ================================================== -->
	<?php include('css/head.php'); ?>

	<!-- favicons
	================================================== -->
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="icon" href="favicon.ico" type="image/x-icon">

	<!-- Carousel
	================================================== -->

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body id="top">

	<!-- header 
   ================================================== -->
	<?php include 'navigation.php'; ?>

	<!-- carousel
   ================================================== -->

	<div class="container">
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
			</ol>

			<!-- Wrapper for slides -->
			<div class="carousel-inner">

				<div class="item active">
					<img src="images/thumbs/featured/sty1.jpg" alt="Los Angeles" style="width:100%;">
					<div class="carousel-caption">
						<h3>Master's of Computer Application (MCA)</h3>
						<p>Department of computer Application , Technocrats</p>
					</div>
				</div>

				<div class="item">
					<img src="images/thumbs/featured/sty2.jpg" alt="Chicago" style="width:100%;">
					<div class="carousel-caption">
						<h3>Chicago</h3>
						<p>Thank you, Chicago!</p>
					</div>
				</div>

				<div class="item">
					<img src="images/thumbs/featured/sty3.jpg" alt="New York" style="width:100%;">
					<div class="carousel-caption">
						<h3>New York</h3>
						<p>We love the Big Apple!</p>
					</div>
				</div>

			</div>
			<!-- Left and right controls -->
			<a class="left carousel-control" href="#myCarousel" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>



	<!-- page header
   ================================================== -->
	<section id="page-header">
		<div class="row current-cat">
			<div class="col-full">
				<h1>Master's of Computer Application (MCA)</h1>
			</div>
		</div>
	</section>




	<!-- masonry
   ================================================== -->
	<section id="bricks" class="with-top-sep">

		<div class="row masonry">

			<!-- brick-wrapper -->
			<div class="bricks-wrapper">

				<div class="grid-sizer"></div>

				<?php
					$sql = mysqli_query($conn,"SELECT * FROM department d,upload u WHERE d.dept_id=u.dept_id AND d.dept_name='MCA' ORDER BY upload_date DESC");
					while($row = mysqli_fetch_array($sql)){
						?>
<article class="brick entry format-standard animate-this">

<div class="entry-thumb">
	<a href="single-standard.html" class="thumb-link">
		<img src="images/uploads/MCA/<?php echo $row['image']; ?>" alt="building">
	</a>
</div>

<div class="entry-text">
	<div class="entry-header">

		<div class="entry-meta">
			<span class="cat-links">
				Uploaded on<br> <?php echo date("d-m-Y h:i:s", strtotime($row['upload_date'])); ?>
				
			</span>
		</div>

		<h1 class="entry-title"><?php echo $row['title']; ?></h1>

	</div>
	<div class="entry-excerpt">
		<?php echo $row['description']; ?>
	</div>
</div>

</article>
						<?php
					}
				?>
				
			</div> <!-- end brick-wrapper -->

		</div> <!-- end row -->

		<div class="row">

			<nav class="pagination">
				<span class="page-numbers prev inactive">Prev</span>
				<span class="page-numbers current">1</span>
				<a href="#" class="page-numbers">2</a>
				<a href="#" class="page-numbers">3</a>
				<a href="#" class="page-numbers">4</a>
				<a href="#" class="page-numbers">5</a>
				<a href="#" class="page-numbers">6</a>
				<a href="#" class="page-numbers">7</a>
				<a href="#" class="page-numbers">8</a>
				<a href="#" class="page-numbers">9</a>
				<a href="#" class="page-numbers next">Next</a>
			</nav>

		</div>

	</section> <!-- bricks -->


	<!-- footer
   ================================================== -->
	<footer>

		<div class="footer-main">

			<div class="row">

				<div class="col-four tab-full mob-full footer-info">

					<h4>About Our Site</h4>

					<p>
						Lorem ipsum Ut velit dolor Ut labore id fugiat in ut fugiat nostrud qui in dolore commodo eu
						magna Duis cillum dolor officia esse mollit proident Excepteur exercitation nulla. Lorem ipsum
						In reprehenderit commodo aliqua irure labore.
					</p>

				</div> <!-- end footer-info -->

				<div class="col-two tab-1-3 mob-1-2 site-links">

					<h4>Site Links</h4>

					<ul>
						<li><a href="#">About Us</a></li>
						<li><a href="#">Blog</a></li>
						<li><a href="#">FAQ</a></li>
						<li><a href="#">Terms</a></li>
						<li><a href="#">Privacy Policy</a></li>
					</ul>

				</div> <!-- end site-links -->

				<div class="col-two tab-1-3 mob-1-2 social-links">

					<h4>Social</h4>

					<ul>
						<li><a href="#">Twitter</a></li>
						<li><a href="#">Facebook</a></li>
						<li><a href="#">Dribbble</a></li>
						<li><a href="#">Google+</a></li>
						<li><a href="#">Instagram</a></li>
					</ul>

				</div> <!-- end social links -->

				<div class="col-four tab-1-3 mob-full footer-subscribe">

					<h4>Subscribe</h4>

					<p>Keep yourself updated. Subscribe to our newsletter.</p>

					<div class="subscribe-form">

						<form id="mc-form" class="group" novalidate="true">

							<input type="email" value="" name="dEmail" class="email" id="mc-email"
								placeholder="Type &amp; press enter" required="">

							<input type="submit" name="subscribe">

							<label for="mc-email" class="subscribe-message"></label>

						</form>

					</div>

				</div> <!-- end subscribe -->

			</div> <!-- end row -->

		</div> <!-- end footer-main -->

		<div class="footer-bottom">
			<div class="row">

				<div class="col-twelve">
					<div class="copyright">
						<span>© Copyright Abstract 2016</span>
						<span>Design by <a href="http://www.styleshout.com/">styleshout</a></span>
					</div>

					<div id="go-top">
						<a class="smoothscroll" title="Back to Top" href="#top"><i class="icon icon-arrow-up"></i></a>
					</div>
				</div>

			</div>
		</div> <!-- end footer-bottom -->

	</footer>

	<div id="preloader">
		<div id="loader"></div>
	</div>

	<!-- Java Script
   ================================================== -->
	<script src="js/jquery-2.1.3.min.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/main.js"></script>

</body>

</html>