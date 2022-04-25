<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = mysqli_connect('localhost','root','','lab6');

$result = $conn->query("SELECT country, population, capital FROM countries");

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
  if ($outp != "") {$outp .= ",";}
  $outp .= '{"name":"'  . $rs["country"] . '",';
  $outp .= '"population":"'   . $rs["population"]        . '",';
  $outp .= '"capital":"'. $rs["capital"]     . '"}';
}
$outp ='{"records":['.$outp.']}';
$conn->close();

echo($outp);
?>
