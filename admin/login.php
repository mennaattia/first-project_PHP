<?php 
include '../app/config.php';
include '../app/functions.php';
?>


<?php 
include '../shared/head.php';
include '../shared/nav.php';
?>

<?php 

if(isset($_POST['login'])){
    $name = $_POST['name'];
    $password = $_POST['password'];
    $hashPassword = sha1($password);
    $select = "SELECT * FROM `admin` WHERE name = '$name' AND password = '$hashPassword'";
    $s = mysqli_query($conn, $select);
    $numOfRows = mysqli_num_rows($s);
    $row = mysqli_fetch_assoc($s);
    // $hashPassword = $row['password'];
    // if(password_verify($password, $hashPassword)){
    
    // }
    if($numOfRows == 1) {
        $_SESSION['admin'] = [
            "name" => $row['name'],
            "role" => $row['role']
        ];
    }
    
    path("admin/login.php");
}

?>

<div class="container">
        <div class="row">
            <div class="col-12" style="margin: auto; margin-top:1%">
              <h1 class="text-center display-1 pt-1">Login</h1>
            </div>
        </div>
</div>
<div class="container col-6">
    <div class="card">
        <div class="card-body">
            <form method="post">
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" type="text" name="name" value="">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input class="form-control" type="password" name="password" value="">
                </div>
                <button name="login" class="btn btn-info m-3">Login</button>
            </form>
        </div>
    </div>
</div>

<?php 
include '../shared/script.php';
?>