<?php 
   include "SimpleXLSX.php";
   if ( $xlsx = SimpleXLSX::parse('graduates.xlsx') ) {
    // echo '<table><tbody>';
    $i = 0;
     foreach ($xlsx->rows() as $elt){
    // for ($i=0; $i<=4; $i++) {
      if ($i == 0) {
        echo '<div class="row">';
        // echo "<tr><th>" . $elt[0] . "</th><th>" . $elt[1] . "</th></tr>";
      } else {
        // echo "<tr><td>" . $elt[0] . "</td><td>" . $elt[1] . "</td><td>". $elt[2] . "</td><tr>" ;
        echo '<div class="column">
        <div class="card">
        <img class="img-pro" src="'.$elt[7].'" alt="Jane">
          <div class="container">
            <h2>'.$elt[1].'</h2>
            <p class="title">'.$elt[2].'</p>
            <p class="title">'.$elt[3].'</p>
            <p><a href='.$elt[5].'>LinkedIn</a></p>
            <p><a href="mailto:'.$elt[6].'" <button class="button">Contact</button></a></p>
          </div>
        </div>
      </div>';
      }   
      
      
    
    
    $i = $i + 1;   
    }
    echo '</div>';
    // echo "</tbody></table>";

  } else {
    echo SimpleXLSX::parseError();
  }
  
?>