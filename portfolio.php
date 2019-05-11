<?php include 'templates/head.php' ?>

  <body class="portfolio">

  	<?php include 'templates/navbar.php' ?>
    <?php include 'templates/portfolio-overzicht-websites.php' ?>
    <?php include 'templates/portfolio-overzicht-cvdesign.php' ?>
    <?php include 'templates/footer.php' ?>
    <?php include 'templates/scripts.php' ?>

  <script>
	$( document ).ready(function() {
		 $('.nav #portfolio').addClass('active');	 
	}); 
  </script>