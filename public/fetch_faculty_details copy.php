<?php
// include class file
require_once 'Excel/reader.php';

 
// initialize reader object
// ExcelFile($filename, $encoding);
$data = new Spreadsheet_Excel_Reader();
// Set output Encoding.
$data->setOutputEncoding('CP1251');

 
// read spreadsheet data
//$excel->read('img/graduate_students.xlsx');
$data->read('img/faculty.xls');
error_reporting(E_ALL ^ E_NOTICE);
/*Initializing some columns values to fix a name */
$col_name=2;$col_position=3;$col_major=4;$col_bg=5;$col_linked=6;$col_email=7;$col_img=8;$col_year=9;



$count =0;
$headcount=0;
for ($i = 2; $i <= $data->sheets[0]['numRows']; $i++) {

        			if ($count  == 0) {
                echo "<br>";
        				echo "<div class='row gs-row'>";
        			}
              if($i==2){
               echo "<div class='col-md-3 col-centered'>";
             }
             else {
              echo "<div class='col-md-3'>";
            }
              echo "<div class='gs-grid'>";
              echo "<img class='img-circle' src='{$data->sheets[0]['cells'][$i][$col_img]}' alt='{$data->sheets[0]['cells'][$i][$col_name]}' width='140' height='140'>";
              echo "<h3 class='blue'>".$data->sheets[0]['cells'][$i][$col_name]."</h3>";
              echo "<h4>".$data->sheets[0]['cells'][$i][$col_position]."</h4>";
              echo "<p>".$data->sheets[0]['cells'][$i][$col_bg]."</p>";
              echo "<p><a href='mailto:{$data->sheets[0]['cells'][$i][$col_email]}'><i class='glyphicon glyphicon-envelope' style='font-size: 16px;'></i>  ".$data->sheets[0]['cells'][$i][$col_email]."</a><br>
                <a href='{$data->sheets[0]['cells'][$i][$col_linked]}'><i class='fa fa-linkedin-square' style='font-size:16px'></i> LinkedIn</a><br>";
            echo "</p>";
            echo "</div>";
          echo "</div>";
          $count++;
          /*if($data->sheets[0]['cells'][$i][$col_name]=="Dr. Eric Jones"){
          	//echo "</div>";
          }*/
          if ($i==2){
            $count=0;
            echo "</div>";
          }
          else if($count % 4 == 0){
          	$count=0;
          	echo "</div>";
          }
          else if($i==$data->sheets[0]['numRows']){
          	echo "</div>";
          }
}

?>