<?php

include 'connect.php';
if(isset($_POST['save']))
{
  $student_id = $_POST['student_id'];
  $course_id = $_POST['course_id'];
  $sql = "INSERT INTO courseassign (student_id, course_id) VALUES ('$student_id','$course_id')";


  if (mysqli_query($conn, $sql)) {
    header( "Location: give_course.php" );
  } else {
  echo "Error: " . $sql . " " . mysqli_error($conn);
  }

  mysqli_close($conn);
}
?>
