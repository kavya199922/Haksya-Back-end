<?php
include "connect.php";

$sql=mysqli_query($conn,"SELECT * FROM shop");
$row = mysqli_num_rows($sql);
while ($row = mysqli_fetch_array($sql)){
echo $row['CUSTOMERNAME'];
echo "<br/>";
}
?>
