<?php include 'head.php'; ?>
<?php include 'header.php'; ?>

<body>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
  <div class="container slideshow">
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
          <img src="img/main-slider/woolf.jpg" alt="Welcome to RAID LABS" style="width:100%;">
        </div>

        <div class="item">
          <img src="img/main-slider/nsf.gif" alt="National Science Foundation IRES" style="width:100%;">
        </div>

        <div class="item">
          <img src="img/main-slider/sensors.jpg" alt="Advancing Technology" style="width:100%;">
          <!--  <div class="container">
            <div class="carousel-caption">
              <h1>Focuses..</h1>
              <p>Supply Chain Logistics/Supply Chain (warehouse location) Analysis for city government.<br>
              Engineering Management-Productivity tool that measures the productivity of engineers and knowledge workers based on behavioral characteristics.</p>
              <p><a class="btn btn-lg btn-primary" href="about.php" role="button">Browse About Us..</a></p>
            </div>
        </div> -->
        </div>
      </div>

      <!-- Left and right controls -->
      <!-- <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a> -->

    </div>
  </div>

  <div class="container marketing">
    <div class="row">
      <div class="col-lg-4">
        <div class="panel-grid">
          <!--  <img class="img-circle" src="img/transparent-arrow.png" alt="getnewimage" width="140" height="140"> -->
          <a href="projects.php">
            <h2 class="blue">Projects and Services</h2>
            <p>View the current(ongoing) and past projects and experiments at the RFID, AI and Data Science Labs.</p>
            <!-- <p><a class="btn btn-default" href="projects.php" role="button">View details »</a></p> -->
          </a>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="panel-grid">
          <!-- <img class="img-circle" src="img/transparent-arrow.png" alt="getnewimage" width="140" height="140"> -->
          <a href="publications.php">
            <h2 class="blue">Publications</h2>
          <p>Browse past and present publications from the RFID, AI and Data Science Labs.</p><br>
          </a>
        </div>
      </div>
      <div class="col-lg-4">
        <a href="patents_products.php">
          <div class="panel-grid">
            <!-- <img class="img-circle" src="img/transparent-arrow.png" alt="getnewimage" width="140" height="140"> -->
            <h2 class="blue">Patents &amp; Products</h2>
            <p>Learn about patents and products from the RFID, AI and Data Science Labs.</p><br>
        </a>
      </div>
    </div>

  </div>


  <div id="block_container" style="display: flex;justify-content: center;">
    <div id="bloc1" style="text-align: center">
      <div class="blog-motto">
        <h1 class="blog-title dark-orange">Mission</h1>
        <p class="lead blog-description">Providing integrated solutions in logistics and other data driven environments through automatic data capture, real world prototypes, and analysis.</p>
        <h1 class="blog-title dark-orange">Vision</h1>
        <p class="lead blog-description">Ten years from now, practically everything will be tracked wirelessly. In an effort to support the marriage of industries' supply chain needs for automatic identification technology with academia's theoretical applications, <a href="http://www.linkedin.com/pub/erick-jones/11/927/628">Dr. Erick C. Jones</a> has created an industry / academia collaboration. This facility's purpose is to support project initiatives like Radio Frequency Identification (RFID), Artificial Intelligence, Data Science, Logistics (Supply Chain Engineering), Manufacturing (Six-Sigma and Lean initiatives), and Information Technology (ERP, WMS). The facility's goal is to enhance the Industrial Engineering field by utilizing some of research methodologies to provide solutions in the areas of RFID, Supply Chain Logistics, and Engineering Management. <a href="faculty.php">Meet the rest of our team &raquo;</a></p>
      </div>
    </div>
    </br>
    <div id="bloc2"><img style="width: 400px;" src="img/faculty/Dr_Eric_Jones.jpg" alt="Dr Eric Jones"></div>
  </div>

  <!-- <div class="container content">
    <div class="col-sm-9 blog-main">
        <div class="blog-header">
          <div class="blog-bg">
              <div class="blog-above-text">
                <div class="blog-motto">
                  <h1 class="blog-title dark-orange">Mission</h1>
                  <p class="lead blog-description">Providing integrated solutions in logistics and other data driven environments through automatic data capture, real world prototypes, and analysis.</p>
                  <h1 class="blog-title dark-orange">Vision</h1><p class="lead blog-description">Ten years from now, practically everything will be tracked wirelessly. In an effort to support the marriage of industries' supply chain needs for automatic identification technology with academia's theoretical applications, <a href="http://www.linkedin.com/pub/erick-jones/11/927/628">Dr. Erick C. Jones</a> has created an industry / academia collaboration. This facility's purpose is to support project initiatives like Radio Frequency Identification (RFID), Logistics (Supply Chain Engineering), Manufacturing (Six-Sigma and Lean initiatives), and Information Technology (ERP, WMS). The facility's goal is to enhance the Industrial Engineering field by utilizing some of research methodologies to provide solutions in the areas of RFID, Supply Chain Logistics, and Engineering Management. <a href="faculty.php">Meet the rest of our team &raquo;</a></p>
             </div>
            </div>
          </div>
        </div>
    </div> -->
  <div class="col-sm-3 blog-sidebar">
    <div class="sidebar-module sidebar-module-inset">
      <div class="container content">


        <!-- <div class="recent-news">
                            <h4>News from the lab:</h4>
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
                    </div> -->
      </div>
    </div>
  </div>
  </div>
  </div>


  <?php include 'footer.php'; ?>