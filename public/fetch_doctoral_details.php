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
$data->read('data/doctoral_students.xls');
error_reporting(E_ALL ^ E_NOTICE);
/*Initializing some columns values to fix a name */
$col_name=2;$col_position=3;$col_major=4;$col_bg=5;$col_linked=6;$col_email=7;$col_img=8;$col_year=9;

$count =0;
$headcount=0;
for ($i = 2; $i <= $data->sheets[0]['numRows']; $i++) {
			if($headcount!=1){
				echo "<h1 class='gs-year'>".$data->sheets[0]['cells'][$i][$col_year]."</h1>";
				$headcount=1;
			}
			if ($count  == 0) {
				echo "<div class='row gs-row'>";
			}
			  echo "<div class='col-md-3'>";
              echo "<div class='gs-grid'>";
              echo "<img class='img-circle' src='{$data->sheets[0]['cells'][$i][$col_img]}' alt='{$data->sheets[0]['cells'][$i][$col_name]}' width='140' height='140'>";
              echo "<h3 class='blue'>".$data->sheets[0]['cells'][$i][$col_name]."</h3>";
              /*echo "<h4>".$data->sheets[0]['cells'][$i][$col_position]."</h4>";*/
              echo "<p><i class='glyphicon glyphicon-book' style='font-size:20px'></i>".$data->sheets[0]['cells'][$i][$col_major]."</p>";
              echo "<p><i class='glyphicon glyphicon-flag' style='font-size:16px'></i>".$data->sheets[0]['cells'][$i][$col_bg]."</p>";
              echo "<p><a href='mailto:{$data->sheets[0]['cells'][$i][$col_email]}'><i class='glyphicon glyphicon-envelope' style='font-size: 16px;'></i>  ".$data->sheets[0]['cells'][$i][$col_email]."</a><br>
                <a href='{$data->sheets[0]['cells'][$i][$col_linked]}'><i class='fa fa-linkedin-square' style='font-size:16px'></i> LinkedIn</a><br>";
            echo "</p>";
            echo "</div>";
          echo "</div>";
          $count++;
          if($count % 4 == 0){
          	$count=0;
          	echo "</div>";
          }
          else if($i==$data->sheets[0]['numRows']){
          	echo "</div>";
          }
          else if(($data->sheets[0]['cells'][$i+1][$col_year] ) == ($data->sheets[0]['cells'][$i][$col_year] ) ){
				//break;
			}
			else{
				$count=0;
				echo "</div>";
				echo "<h1 class='gs-year'>".$data->sheets[0]['cells'][$i+1][9]."</h1>";
				//echo "<div class='row gs-row'>";
			}
	//}
	/*echo "\n";*/
}
 
// print number of rows, columns and sheets
/*echo "Number of sheets: " . sizeof($excel->sheets) . "\n";
for ($x=0; $x<sizeof($excel->sheets); $x++) {
  echo "Number of rows in sheet " . ($x+1) . ": " . $excel->sheets[$x]["numRows"] . "\n";
  echo "Number of columns in sheet " . ($x+1) . ": " . $excel->sheets[$x]["numCols"] . "\n";
}*/

?>