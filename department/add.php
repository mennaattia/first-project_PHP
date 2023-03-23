<?php 
include '../app/config.php';
include '../app/functions.php';

?>


<?php 
include '../shared/head.php';
include '../shared/nav.php';
?>

<?php 

$name_value = NULL;
if(isset($_POST['send'])){
    $name = $_POST['name'];
    $insertMessage = "INSERT INTO departments VALUES(NULL, '$name')";
    $i = mysqli_query($conn, $insertMessage);
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
</div>
<div class="container col-6">
    <div class="card">
        <div class="card-body">
            <form method="post">
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" type="text" name="name" value="<?php echo $name_value ?>">
                </div>
                <button name="send" class="btn btn-info m-3">Save Department</button>
            </form>
        </div>
    </div>
</div>

<?php 
include '../shared/script.php';
?>