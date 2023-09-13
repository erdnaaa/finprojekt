<?php
include "connect.php"; // your db connect file

$year = $_POST['year'];
$month = $_POST['month'];

$query = "SELECT WEEK(`date`) as week, SUM(`cost`) as value 
          FROM `pesanana` 
          WHERE YEAR(`date`) = '$year' AND MONTH(`date`) = '$month' 
          GROUP BY WEEK(`date`)";

$result = $mysqli -> query($query);

$data = array();
while ($row = mysqli_fetch_array($result)) {
  $data[] = $row;
}

print json_encode($data);
?>