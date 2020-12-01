<?php
include_once 'connect.php';
$sql = "DELETE FROM courseassign WHERE assignid='" . $_GET["assignid"] . "'";
if (mysqli_query($conn, $sql)) {
    header( "Location: give_course.php" );
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
