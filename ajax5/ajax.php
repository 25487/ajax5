<?php
include 'dbVars.php';
$resultArray = array(); // array voor query
$search = $_GET['q'];
$type = $_GET['type'];
$conn = mysqli_connect($servername,$uid,$pwd,$database);

if (!$conn) {
  echo "failed to connect";
}
mysqli_select_db($conn,$database);
$sql = "SELECT * FROM Country WHERE name LIKE '$search%'";
if ($type == 'list') {
  $result = mysqli_query($conn,$sql);
  while ($row = mysqli_fetch_array($result)) {
    $resultArray[] = $row['Name'];
  }
  echo json_encode($resultArray);//resultaat 1 string 1 keer netwerk
}
if ($type == 'answer') {
  $result = mysqli_query($conn,$sql);


	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		echo "<p>";
			echo "<p>" . $row["Name"] . "</p>";
			echo "<p" . $row["Continent"] . "</p>";
			echo "<p>" . $row["Region"] . "</p>";
			echo "<p>" . $row["SurfaceArea"] . "</p>";
			echo "<p>" . $row["IndepYear"] . "</p>";
			echo "<p>" . $row["Population"] . "</p>";
			echo "<p>" . $row["Capital"] . "</p>";
			echo "<p>" . $row["HeadOfState"] . "</p>";
		echo "</tr>";
		}
	echo "</table>";
}
mysqli_close($conn);
?>
