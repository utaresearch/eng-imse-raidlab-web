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
$data->read('img/lab_videos.xls');
error_reporting(E_ALL ^ E_NOTICE);
/*Initializing some columns values to fix a name */
$col_video_name=2;$col_video_link=3;

$count =0;
$headcount=0;
for ($i = 2; $i <= $data->sheets[0]['numRows']; $i++) {
			if ($count  == 0) {
				echo "<div class='row gs-row'>";
			}
			  echo "<div class='col-md-3'>";
              echo "<div class='lab-grid'>";
              echo "<h3 class='blue'>".$data->sheets[0]['cells'][$i][$col_video_name]."</h3>";
              echo "<div class= 'video-frame-wrapper'>";
              echo "<iframe width='100%' height='100%' src='{$data->sheets[0]['cells'][$i][$col_video_link]}' frameborder='0' allowfullscreen gesture='media'></iframe>";
              echo "</div>";
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
}/*end of for loop*/
?>