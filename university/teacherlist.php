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
        <form method="post" action="insert_teacher.php">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="teacherId">Teacher ID</label>
                    <input type="text" name="id" class="form-control" id="teacherId" placeholder="Teacher ID">
                </div>
                <div class="form-group col-md-4">
                    <label for="teacherName">Teacher Name</label>
                    <input type="text" name="name" class="form-control" id="teacherName" placeholder="Teacher Name">
                </div>
                <div class="form-group col-md-4">
                    <label for="teacherDesignation">Designation</label>
                    <input type="text" name="designation" class="form-control" id="teacherDesignation" placeholder="Designation">
                </div>
            </div>
            <button type="submit" name="save" class="btn btn-primary">Submit</button>
            
            <a href="index.php" class="btn btn-danger">Back</a>

            <h3 class="text-center pb-3 text-info">Teacher Table</h3>

          <table class="table table-bordered text-center">
              <caption>List of users</caption>
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Teacher ID</th>
                  <th scope="col">Teacher Name</th>
                  <th scope="col">Designation</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>

              <?php
              include "connect.php";
              $result=mysqli_query($conn,"SELECT * FROM teacher");
              $id=1;
              while ($row = mysqli_fetch_array($result)) {
                echo "<tbody> <tr>";
                echo "<th>".$id."</th>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['name']."</td>";
                echo "<td>".$row['designation']."</td>";
                
                echo "<td><a href='edit_teacher.php?id=".$row['id']."' class='btn btn-success'>Edit</a>
                <a href='delete_teacher.php?id=".$row['id']."' class='btn btn-danger'>Delete</a></td>";

                echo " </tr> </tbody>";
                $id++;

              }
              ?>

            </table>

        </form>
    </div>
</body>
</html>
