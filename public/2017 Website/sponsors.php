<?php include 'head.php'; ?>
    </head>
	<script type="text/javascript">
		
			var i=1;
			setInterval(function(){
				var arr=["http://cdn.idplate.com/images/home_page/RFID-universal-hard-tag-toolbox.jpg",
				"http://cdn.idplate.com/images/home_page/asset-id-tags-barcode-labels-nameplates.jpg",
				"http://cdn.idplate.com/images/home_page/UID-asset-id-tags-barcode-nameplates-labels.jpg"]
				document.getElementById("slider").src=arr[i]; 
				i++;
				if(i>=3) i=0;
			}, 3000);
		

		
	</script>
    <body>
        <div class="master-wrapper">
        	<?php include 'header.php'; ?>
        	<!--  ***** This is where you can put in a big hero image or another slider *****
        	<div class="hero">
        	</div>
        	-->
        	<div class="pagebody-no-hero"><!-- change class to pagebody-hero if you add a hero image or slideshow above -->
            <h1 class="pagetitle">Sponsors</h1>
            	<div class="">
                <img class="sponsor-pic" img src="img/metalcraft.jpg" width="" height=""/>
                <p class="sponsor-blurb">Metalcraft has provided property identification solutions since 1950. From a headquarters in Mason City, Iowa, Metalcraft has provided thousands of businesses throughout North America and around the world with a wide range of choices in durable nameplates and labels to meet the needs of the ever-evolving industry of tracking and controlling. These customized products may include consecutive numbers using barcode and/or RFID technologies. Metalcraft nameplates and labels are made from the toughest materials – polyester, anodized aluminum, stainless steel, polycarbonate, ceramic and more – to withstand environments ranging from mild to extreme, resisting abrasion, caustics/acids, solvents, salt air, high temperatures, and UV rays. Visit <a href="http://www.idplate.com/" class="sponsor-links">http://www.idplate.com</a> for more information.</p>
				<img id="slider" src="http://cdn.idplate.com/images/home_page/RFID-universal-hard-tag-toolbox.jpg">
                </div>
            </div>
        	<?php include 'footer.php'; ?>
        </div>
	    
		<?php include 'script.php'; ?>

	</body>
</html>