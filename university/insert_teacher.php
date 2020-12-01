<?php

include 'connect.php';
if(isset($_POST['save']))
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $designation = $_POST['designation'];

    $sql = "INSERT INTO teacher VALUES ('$id','$name', '$designation')";
    if (mysqli_query($conn, $sql)) {
      header( "Location: teacherlist.php" );
    } else {
    echo "Error: " . $sql . " " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
