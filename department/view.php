<?php 
include '../app/config.php';
include '../app/functions.php';

?>

<?php 
include '../shared/head.php';
include '../shared/nav.php';
?>

<?php 
$select = "SELECT * FROM departments";
$s = mysqli_query($conn, $select);
if(isset($_GET['delete'])){
  $id = $_GET['delete'];
  $d = "DELETE FROM departments WHERE id = $id ";
  $delete = mysqli_query($conn, $d);
  path('department/view.php');
}
auth();
?>

<div class="container">
        <div class="row">
            <div class="col-12" style="margin: auto; margin-top:1%">
              <h1 class="text-center display-1 pt-1">View Departments</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-11" style="margin: auto; margin-top:5%">
            <table class="table table-striped">
              
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Department</th>
                    <th colspan="2">Action</th>
                </tr>
                </thead>
                <?php foreach ($s as $data):?>
                <tbody>
                <tr>
                    <th scope="row"><?= $data['id'] ?></th>
                    <td><?= $data['name'] ?></td>
                    <td><a class="btn btn-info" href="/Trial/department/edit.php?edit=<?=  $data['id'] ?>">Edit</a></td>
                    <td><a class="btn btn-danger" href="/Trial/department/view.php?delete=<?=  $data['id'] ?>">Delete</a></td>
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