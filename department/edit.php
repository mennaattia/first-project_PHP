<?php 
include '../app/config.php';
include '../app/functions.php';

?>


<?php 
include '../shared/head.php';
include '../shared/nav.php';
?>

<?php 
if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $d = "SELECT * FROM departments WHERE id = $id";
    $s = mysqli_query($conn, $d);
    $delete = mysqli_fetch_assoc($s);
    if(isset($_POST['send'])){
        $name = $_POST['name'];
        $insertMessage = "UPDATE departments SET name = '$name' WHERE id = $id";
        $i = mysqli_query($conn, $insertMessage);
        path('department/view.php');
    }
}
$name_value = NULL;
auth();
?>

<div class="container">
        <div class="row">
            <div class="col-12" style="margin: auto; margin-top:1%">
              <h1 class="text-center display-1 pt-1">Edit Departments</h1>
            </div>
        </div>
</div>
<div class="container col-6">
    <div class="card">
        <div class="card-body">
            <form method="post">
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" type="text" name="name" value="<?php echo $delete['name'] ?>">
                </div>
                <button name="send" class="btn btn-danger m-3">Update Department</button>
            </form>
        </div>
    </div>
</div>

<?php 
include '../shared/script.php';
?>