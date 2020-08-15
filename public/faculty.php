<?php include 'head.php'; ?>
<?php include 'header.php'; ?>
<body>
    <div class="container">
        <div class="jumbotron">
            <h1>Faculty & Collaborators</h1>
        </div> 
       <!--  <div class="row gs-row">
        	<div class="col-md-3 col-md-offset-4">
        		<div class="gs-grid">
        			<img class="img-circle" src="img/faculty/Dr_Eric_Jones_Profile.jpg" alt="Dr. Erick Jones" width="140" height="140">
        			<h3 class="blue">Dr. Erick Jones</h3>
        			<h4>RAID Lab Director</h4>
        			<p>The University of Texas at Arlington</p>
        			<p>
        				<a href=""><i class="glyphicon glyphicon-envelope" style="font-size: 16px;"></i></a><br>
        				<a href=""><i class="fa fa-linkedin-square" style="font-size:16px"></i> LinkedIn</a><br>
        			</p>
        		</div>
        	</div>
		</div> -->

    <?php include 'fetch_faculty_details.php'; ?>
    
    </div>
    <?php include 'footer.php'; ?>
