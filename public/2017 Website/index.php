		<?php include 'head.php'; ?>
		<link rel="stylesheet" type="text/css" href="nivo-slider/nivo-slider.css" />
        <link rel="stylesheet" type="text/css" href="nivo-slider/themes/light/light.css" />
        <script type="text/javascript" src="nivo-slider/jquery.nivo.slider.pack.js" ></script>
    </head>
    <body>
        <div class="master-wrapper">
        	<?php include 'header.php'; ?>
        	<div class="hero"><!-- Nivo Slider lives here. Documentation: http://docs.dev7studios.com/jquery-plugins/nivo-slider -->
	        	<div class="slider-wrapper theme-light">
	        		<div class="ribbon"></div>
	        		<div id="slider" class="nivoSlider">
					    <img src="img/nivo-slider/woolf.jpg" alt="Welcome to RAID LABS"/>
					    <img src="img/nivo-slider/nsf.gif" alt="National Science Foundation IRES" />
					    <img src="img/nivo-slider/sensors.jpg" alt="Advancing Technology"/>
					</div>
				</div>
        	</div>
        	<div class="pagebody-hero">
        		<div class="sidekick-wrapper group">
    				<a href="projects.php" class="sidekick">
    					<div class="sidekick-content">
    						<h2 class="projects-blue">Projects & Services</h2>
    						<p>View the projects and experiments currently underway at the Radio Frequency and Auto Identification Labs</p>
    						<span class="arrow-button projects-background">
    							<img src="img/transparent-arrow.png" alt=" ">
    						</span>
    					</div>
	    			</a>
    				<a href="publications.php" class="sidekick">
    					<div class="sidekick-content">
    						<h2 class="publications-green">Publications</h2>
    						<p>Browse past and present publications from the Radio Frequency and Auto Identification Labs</p>
    						<span class="arrow-button publications-background">
    							<img src="img/transparent-arrow.png" alt=" ">
    						</span>
    					</div>
	    			</a>
    				<a href="patents_products.php" class="sidekick">
    					<div class="sidekick-content">
    						<h2 class="patents-orange">Patents &amp; Products</h2>
    						<p>Learn about patents and products from the Radio Frequency and Auto Identification Labs</p>
    						<span class="arrow-button patents-background">
    							<img src="img/transparent-arrow.png" alt=" ">
    						</span>
    					</div>
	    			</a>
        		</div>
        		<div class="home-content group">
    				<div class="body-column">
    					<div class="body-content">
    						<h2>Mission</h2>
    						<p>Providing integrated solutions in logistics and other data driven environments through automatic data capture, real world prototypes, and analysis.</p>
    						<h2>Vision</h2>
    						<div class="home-vision group">
	    						<img src="img/dr_jones.jpg">
	    						<p>Ten years from now, practically everything will be tracked wirelessly. In an effort to support the marriage of industries' supply chain needs for automatic identification technology with academia's theoretical applications, <a href="http://www.linkedin.com/pub/erick-jones/11/927/628">Dr. Erick C. Jones</a> has created an industry / academia collaboration. This facility's purpose is to support project initiatives like Radio Frequency Identification (RFID), Logistics (Supply Chain Engineering), Manufacturing (Six-Sigma and Lean initiatives), and Information Technology (ERP, WMS). The facility's goal is to enhance the Industrial Engineering field by utilizing some of research methodologies to provide solutions in the areas of RFID, Supply Chain Logistics, and Engineering Management. <a href="faculty.php">Meet the rest of our team &raquo;</a></p>
	    					</div>
    						<h2>Books</h2>
    						<div class="home-books group">
    							<img src="img/book-rfidandauto.png"><img src="img/book-cert_handbook.jpg"><img src="img/book-rfid.jpg">
    						</div>
    						<p> For more information, see our <a href="books.php">books page</a></p>
    						<h1>Scholarships</h1>
                            <p>The RAID labs is committed to further the education of the students that are employed there. The RAID labs would also like to give students who have gone above and beyond what was asked, a chance to be recognize. If you would like to apply for this scholarship please see the attached flier.</p>
                            <h2><a href="PDFs/RAID Scholarship App.pdf">RAID LABS SCHOLARSHIP</a></h2>
                            <p>&nbsp;</p>
    					</div>
    				</div>
    				<div class="news-column">
    					<div class="recent-news">
    						<h2>News from the lab:</h2>
							<a class="twitter-timeline" data-lang="en" data-theme="light" href="https://twitter.com/RAID_Labs?ref_src=twsrc%5Etfw">Tweets by RAID_Labs</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
							<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
							</script>
							<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.11';
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
	</script>
							<div class="fb-page" data-href="https://www.facebook.com/RAID-lab-UTA-116406855666743/" data-tabs="timeline" data-width="500" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/RAID-lab-UTA-116406855666743/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/RAID-lab-UTA-116406855666743/">RAID lab UTA</a></blockquote>
    					</div>
    				</div>
        		</div>
        	</div>
        	<?php include 'footer.php'; ?>
        </div>
	    
	    <script type="text/javascript">
		$(window).load(function() {
		    $('#slider').nivoSlider({
			    effect: 'fold', 
			    animSpeed: 1000,
			    pauseTime: 8000,
			    directionNav: false,
			});
		});
		</script>
		
		<?php include 'script.php'; ?>

	</body>
</html>