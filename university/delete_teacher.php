<?php
include_once 'connect.php';
$sql = "DELETE FROM teacher WHERE id='" . $_GET["id"] . "'";
if (mysqli_query($conn, $sql)) {
    header( "Location: teacherlist.php" );
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
