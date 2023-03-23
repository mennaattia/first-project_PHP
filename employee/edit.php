<?php 
include '../app/config.php';
include '../app/functions.php';

?>


<?php 
include '../shared/head.php';
include '../shared/nav.php';
?>
<?php 

?>
<?php 
if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $d = "SELECT * FROM `employeewdepartment` WHERE id = $id";
    $s = mysqli_query($conn, $d);
    $row = mysqli_fetch_assoc($s);
    $row2 = mysqli_fetch_assoc($s);
    if(isset($_POST['send'])){
        $name = $_POST['name'];
        $salary = $_POST['salary'];
        // Img Code
        // Or we can use rand(int $min , int $max);
        if(!empty($_FILES['image']['name'])) {
            $image_name = time() . $_FILES['image']['name'];
            $tmp_name = $_FILES['image']['tmp_name'];
            $location = "upload/" . $image_name;
            move_uploaded_file($tmp_name, $location);
            $img_name = $row['img'];
            unlink("./upload/$img_name");
        } else {
            $image_name = $row['img'];
        }
        $depID = $_POST['depID'];
        $insertMessage = "UPDATE employee SET name = '$name', salary = '$salary', img = '$image_name' WHERE id = $id";
        $i = mysqli_query($conn, $insertMessage);
        path('employee/view.php');
    }
}
$select = "SELECT * FROM employeewdepartment";
$ss = mysqli_query($conn, $select);
auth();
?>

<div class="container">
        <div class="row">
            <div class="col-12" style="margin: auto; margin-top:1%">
              <h1 class="text-center display-1 pt-1">Edit employees</h1>
            </div>
        </div>
</div>
<div class="container col-6">
    <div class="card">
        <div class="card-body">
            <!-- For the sake of your hair, don't forget the enctype idiot ~I'm not an idiot -->
            <form method="post" enctype="multipart/form-data">
            <?php foreach($ss as $data): ?>
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" type="text" name="name" value="<?php echo $data['empName'] ?>">
                </div>
                <div class="form-group">
                    <label>Salary</label>
                    <input class="form-control" type="text" name="salary" value="<?php echo $data['salary'] ?>">
                </div>
                <span><img class="img-fluid" src="./upload/<?= $row['img'] ?>" alt=""></span>
                <div class="form-group">
                    <label>Image</label>
                    <input class="form-control" type="file" name="image">
                </div>
                <div class="form-group">
                    <label for="">Department</label>
                    <select name="depID" id="form-control">
                        
                        
                            <option value="<?php echo $row2['departmentID'] ?>"><?php echo $data['depName'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <button name="send" class="btn btn-danger m-3">Update Employee</button>
            </form>
        </div>
    </div>
</div>

<?php 
include '../shared/script.php';
?>