<?php
include_once 'connect.php';
if(count($_POST)>0) {
  mysqli_query($conn,"UPDATE courseassign set assignid='" . $_POST['assignid'] . "', course_id='" . $_POST['course_id'] . "', student_id='" . $_POST['student_id'] . "' WHERE assignid='" . $_POST['assignid'] . "'");
  header( "Location: give_course.php" );
}
$result=mysqli_query($conn,"SELECT * FROM courseassign where assignid = '" . $_GET['assignid'] . "' ");
$row= mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container pt-5">
    <h3 class="text-center text-success pb-3"> Assign Course to Student </h3>
        <form action="" method="post">
          <input type="hidden" name="assignid"  value="<?php echo $row['assignid']; ?>">
        <div class="form-row">

          <div class="form-group col-md-6">
              <label for="inputEmail4">Course List</label>

              <select class="custom-select" name='course_id'>

                  <?php
                  $course_Id=$row['course_id'];
                  $course_result=mysqli_query($conn,"SELECT * FROM courses where id= ('$course_Id')");
                  while($data=$course_result -> fetch_assoc()){
                   echo "<option value='". $data['id'] ."'>" .$data['course_id'] ."-".$data['course_name'] ."</option>";
                  }
                  $course_list = mysqli_query($conn,"SELECT * FROM courses");
                  if($course_list){
                    while ($course=mysqli_fetch_array($course_list)) {
                      if ( $course['id'] != $row['course_id']) {
                        echo "<option value='". $course['id'] ."'>".$course['course_id'] ."-" .$course['course_name'] ."</option>";
                      }
                    }
                  }?>

              </select>

            </div>


            <div class="form-group col-md-6">
                <label for="inputEmail4">Student List</label>
                <select class="custom-select" name='student_id'>
                
                <?php
                    $student_Id=$row['student_id'];
                    $student_result=mysqli_query($conn,"SELECT * FROM students where id= ('$student_Id')");
                 while($std_data=$student_result -> fetch_assoc()){
                      echo "<option value='". $std_data['id'] ."'>" .$std_data['student_id']."-".$std_data['student_name'] ."</option>";
                  }?>

                  <?php

                  $std_list = mysqli_query($conn,"SELECT * FROM students");
                  if($std_list){
                  while ($std=mysqli_fetch_array($std_list)) {
                    if ($std['id'] != $row['student_id']) {
                      echo "<option value='". $std['id'] ."'>" .$std['student_id'] ."-".$std['student_name']."</option>";
                    }
                  }
                } ?>

                </select>
              </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="give_course.php" class="btn btn-info">Back</a>
        </form>



    </div>
</body>
</html>
