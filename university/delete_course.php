<?php
include_once 'connect.php';
$sql = "DELETE FROM courses WHERE id='" . $_GET["id"] . "'";
if (mysqli_query($conn, $sql)) {
    header( "Location: course.php" );
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
