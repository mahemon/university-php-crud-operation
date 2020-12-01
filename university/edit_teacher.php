<?php
include_once 'connect.php';
if(count($_POST)>0) {
    mysqli_query($conn,"UPDATE teacher set name='" . $_POST['name'] . "',designation='" . $_POST['designation'] . "' WHERE id='" . $_POST['id'] . "'");
    header( "Location: teacherlist.php" );
}
$result = mysqli_query($conn,"SELECT * FROM teacher WHERE id='" . $_GET['id'] . "'");
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
    <div class="container  pt-5">
        <h3 class="text-center text-success pb-3"> Teacher Form </h3>
        <form method="post" action="edit_teacher.php">
          <input type="hidden" name="id" class="txtField" value="<?php echo $row['id']; ?>">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="id">Teacher ID  </label>
                    <input type="text" name="id" class="form-control" id="id"  value="<?php echo $row['id']; ?>" disabled>
                </div>
                <div class="form-group col-md-4">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name"  value="<?php echo $row['name']; ?>">
                </div>

                <div class="form-group col-md-4">
                    <label for="designation">Designation</label>
                    <input type="text" name="designation" class="form-control" id="designation"  value="<?php echo $row['designation']; ?>">
                </div>
            </div>

            <button type="submit" name="save" class="btn btn-primary">Submit</button>
            <a href="teacherlist.php" class="btn btn-danger">Back</a>

        </form>
    </div>
</body>
</html>
