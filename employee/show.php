<?php 
include '../app/config.php';
include '../app/functions.php';

?>

<?php 
include '../shared/head.php';
include '../shared/nav.php';
?>
<!-- SELECT employee.name empName, employee.salary, departments.name depName FROM employee JOIN
departments ON employee.departmentID = departments.id; -->
<?php 
if(isset($_GET['show'])){
  $id = $_GET['show'];
  $select = "SELECT * FROM employeewdepartment WHERE id = $id";
  $s = mysqli_query($conn, $select);
  $row = mysqli_fetch_assoc($s);
}
// $select = "SELECT * FROM employeewdepartment";
// $s = mysqli_query($conn, $select);
// if(isset($_GET['delete'])){
//   $id = $_GET['delete'];
//   //When the img refuses to work, add the fricking back tic, k?
//   $sa = "SELECT `img` FROM `employee` WHERE id = $id";
//   $se = mysqli_query($conn, $sa);
//   $row = mysqli_fetch_assoc($se);
//   $image = $row['img'];
//   unlink("./upload/$image");
//   $d = "DELETE FROM employee WHERE id = $id ";
//   $delete = mysqli_query($conn, $d);
//   path('employee/view.php');
// }
auth();
?>

<div class="container">
        <div class="row">
            <div class="col-12" style="margin: auto; margin-top:1%">
              <h1 class="text-center display-1 pt-1">View Employees</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-11" style="margin: auto; margin-top:5%">
              <div class="card" style="width: 18rem;">
                <img src="./upload/<?= $row['img'] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title"><?= $row['empName'] ?></h5>
                  <h5 class="card-title"><?= $row['salary'] ?></h5>
                  <h5 class="card-title"><?= $row['depName'] ?></h5>
                </div>
              </div>
            </div>
        </div>
    </div>    
</div>

<?php 
include '../shared/script.php';
?>