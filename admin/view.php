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
$select = "SELECT * FROM `adminroles`";
$s = mysqli_query($conn, $select);
if(isset($_GET['delete'])){
  $id = $_GET['delete'];
  //When the img refuses to work, add the fricking back tic, k?
//   $sa = "SELECT `img` FROM `employee` WHERE id = $id";
//   $se = mysqli_query($conn, $sa);
//   $row = mysqli_fetch_assoc($se);
//   $image = $row['img'];
//   unlink("./upload/$image");
  $d = "DELETE FROM admin WHERE id = $id ";
  $delete = mysqli_query($conn, $d);
  path('admin/view.php');
}
auth();
?>

<div class="container">
        <div class="row">
            <div class="col-12" style="margin: auto; margin-top:1%">
              <h1 class="text-center display-1 pt-1">View Employees</h1>
            </div>
        </div>
        <!-- nn -->
        <!-- <div class="row">
          <div class="col-4"></div>
          <div class="col-4"></div>
        </div> -->
        
              <!-- <form action="./search.php" method="get">
              <div class="row my-3">
                <div class="col-9">
                <div class="form-group">
                  <input name="search" type="text" class="form-control" placeholder="SEARCH">
                </div>

                </div>
                <div class="col-2">
                  <div class="d-grid">
                    <button name="btn-search" class="btn btn-info">Search</button>
                  </div>
                </div>
                </div>
              </form> -->
        
        <div class="row">
            <div class="col-11" style="margin: auto; margin-top:5%">
            <table class="table table-striped">
              
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Admin</th>
                    <th scope="col">Role</th>
                    <th colspan="2">Action</th>
                </tr>
                </thead>
                <?php foreach ($s as $data):?>
                <tbody>
                <tr>
                    <th scope="row"><?= $data['id'] ?></th>
                    <td><?= $data['name'] ?></td>
                    <td><?= $data['description'] ?></td>
                    <td><a class="btn btn-info" href="/Trial/employee/edit.php?edit=<?=  $data['id'] ?>">Edit</a></td>
                    <!-- <td><a class="btn btn-danger" href="/Trial/employee/view.php?delete=<?=  $data['id'] ?>">Delete</a></td> -->
                    <td><a class="btn btn-danger" href="/Trial/employee/show.php?show=<?=  $data['id'] ?>">Show</a></td>
                </tr>
                </tbody>
                
              <?php endforeach; ?>
            </table>
            </div>
        </div>
    </div>    
</div>

<?php 
include '../shared/script.php';
?>