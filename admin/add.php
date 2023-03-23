<?php 
include '../app/config.php';
include '../app/functions.php';

?>


<?php 
include '../shared/head.php';
include '../shared/nav.php';
?>

<?php 

$select = "SELECT * FROM `roles`";
$s = mysqli_query($conn, $select);

$name_value = NULL;
$password_value = NULL;
if(isset($_POST['send'])){
    $name = $_POST['name'];
    $hashPassword = sha1($_POST['password']);
    $password = $hashPassword;
    $role = $_POST['role'];
    // Or we can use rand(int $min , int $max);
    
    $insertMessage = "INSERT INTO admin VALUES(NULL, '$name', '$password', '$role')";
    $i = mysqli_query($conn, $insertMessage);
    path('admin/view.php');
}
$select = "SELECT * FROM admin";
$ss = mysqli_query($conn, $select);
auth(1);
?>
<div class="container">
        <div class="row">
            <div class="col-12" style="margin: auto; margin-top:1%">
              <h1 class="text-center display-1 pt-1">View Employees</h1>
            </div>
        </div>
</div>
<div class="container col-6">
    <div class="card">
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" type="text" name="name" value="<?php echo $name_value ?>">
                </div>
                

                <div class="form-group">
                    <label>Password</label>
                    <input class="form-control" type="password" name="password" value="<?php echo $password_value ?>">
                </div>

                
                <div class="form-group">
                    <label>Role</label>
                    <select name="role" class="group-control" id="">
                    <?php foreach($s as $data): ?>
                        <option value="<?= $data['id'] ?>"><?= $data['description'] ?></option>
                <?php endforeach; ?>
                    </select>
                </div>
                <button name="send" class="btn btn-info m-3">Save Admin</button>
            </form>
        </div>
    </div>
</div>

<?php 
include '../shared/script.php';
?>