<html>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>
<body>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}

.img-pro {
    display: block;
    border-radius: 50%;
    width:  250px;
    height: 250px;
    margin: auto;
    object-fit: cover;
    /* background-size: cover;
    border-radius:50% 50% 50% 50%; */
}

.column {
  float: left;
  width: 33.3%;
  margin-bottom: 20px;
  padding: 0 20px;
}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
}

.container {
  padding: 0 16px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: #000;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: #555;
}
</style>

<div class="jumbotron" style="background-color: white";>
    <h1 style="padding: 20px; border-width: 5px; border-style: solid;">Graduate Students</h1>
</div> 

<br><br>

<?php include "SimpleXLSX.php";?>

<!-- Information about Graduate students -->
<?php 
if ( $xlsx = SimpleXLSX::parse('data/current_graduates.xlsx') ) {
  $i = 0;
    foreach ($xlsx->rows() as $elt){
      if ($i == 0) {
        echo '<div class="row">';
      } else {
        echo '<div class="column">
        <div class="card">
        <img class="img-pro" src="'.$elt[7].'" alt="Jane">
          <div class="container">
              <h2>'.$elt[1].'</h2>
              <p class="title">'.$elt[2].'</p>
              <p class="title">'.$elt[3].'</p>
              <p><a href='.$elt[5].'>LinkedIn</a></p>
              <p><a href='.$elt[8].'>'.$elt[9].'  </a></p>
              <p><a href="mailto:'.$elt[6].'" <button class="button">Contact</button></a></p>
            </div>
          </div>
        </div>';
      }   
  $i = $i + 1;   
  }
  echo '</div>';
} else {
  echo SimpleXLSX::parseError();
}
?>

<!-- information about former graduate students -->
<br><br>
<div class="jumbotron" style="background-color: white";>
    <h1 style="padding: 20px; border-width: 5px; border-style: solid;">Former Graduate Students</h1>
</div> 

<br><br>
<?php 
if ( $xlsx = SimpleXLSX::parse('data/former_graduates.xlsx') ) {
  $i = 0;
    foreach ($xlsx->rows() as $elt){
      if ($i == 0) {
        echo '<div class="row">';
      } else {
        echo '<div class="column">
        <div class="card">
        <img class="img-pro" src="'.$elt[7].'" alt="Jane">
          <div class="container">
              <h2>'.$elt[1].'</h2>
              <p class="title">'.$elt[2].'</p>
              <p class="title">'.$elt[3].'</p>
            </div>
          </div>
        </div>';
      }   
  $i = $i + 1;   
  }
  echo '</div>';
} else {
  echo SimpleXLSX::parseError();
}
?>

</body>
</html>	
