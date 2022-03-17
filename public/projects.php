<?php include 'head.php'; ?>
<?php include 'header.php'; ?>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="vendors/linericon/style.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
	<!-- main css -->
	<link rel="stylesheet" href="css/style_project.css">

    <div style="background-color: white;" class="jumbotron">
        <h1 style="color: black; padding: 20px; border-width: 5px; border-style: solid;">PROJECTS</h1>
    </div>
    <br>
<section id="Skills" class="features_area">
<br>
<h3 style="color: black; text-align: center; ">Spring 2021</h3>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 text-center">

        </div>
    </div>
    <div class="row feature_inner">

        <?php include "SimpleXLSX.php";?>

            <!-- Information about project from excel file -->
            <?php 
            if ( $xlsx = SimpleXLSX::parse('data/spring2021_projects.xlsx') ) {
                $i = 0;
                    foreach ($xlsx->rows() as $elt){
                    if ($i == 0) {
                        echo '<div class="row">';
                    } else {
                        echo '<div class="col-lg-6 col-md-6">
                            <a href="'.$elt[2].'">
                            <div class="feature_item"><img src="'.$elt[5].'" alt="">
                                <h4>'.$elt[1].'</h4></br>
                                <p>'.$elt[3].'</p></br>
                                <p>'.$elt[4].'</p></div>
                            </a>
                            </div>';
                    }   
                $i = $i + 1;   
                }
                echo '</div>';
                } else {
                    echo SimpleXLSX::parseError();
                }
            ?>



<!-- below is the static page above one uses excel and creates contents dynamically from excel file -->

        <!-- <div class="col-lg-6 col-md-6">
            <a href="AI.php"><div class="feature_item">
                <img src="img/services/vid.png" alt="">
                <h4>AI-Enabled Optimization of the COVID-19 Therapeutics Supply Chain</h4>
                </br>
                <p>Build an optimization model using Gurobi optimizer in Python Language for the COVID-19 Supply Chain from manufacture to home delivery that addresses the needs of at-risk populations and communities.</p>
            </div></a>
        </div>
        
        <div class="col-lg-6 col-md-6">
        <a href="Metal.php"> <div class="feature_item">
                <img src="img/services/rfid.png" alt="">
                <h4>Re-design Metalcraft RFID inlay for improved endurance, operating range, and durability</h4>
                <p>Due to increasing competitive pressure worldwide, Metalcraft wants to re-design of the RFID inlay with new and improved specifications. To do so, Design for Six-Sigma in Research methodology (DFSSR) is used to ensure product with highest quality. </p>
            </div></a>
        </div>

        <div class="col-lg-6 col-md-6">
        <a href="TSC.php">
            <div class="feature_item">
                <img src="img/services/nsf_logo.jpg" alt="">
                <h4>National Science Foundation (NSF) Award Abstract #2028343</h4>
                <br>
                <p>Understanding the Impact of Graduate Fellowships on Broadening Participation in GEO</p>
            </div></a>
        </div>
    </div> -->



</div>
</section>


<?php include 'footer.php'; ?>