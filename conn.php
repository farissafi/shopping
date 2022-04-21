<?php
// connecting in database
$conn = mysqli_connect("localhost", "root", "", "shopping");
if (!$conn) {
  die("No connect" . mysqli_connect_errno());
}
?>