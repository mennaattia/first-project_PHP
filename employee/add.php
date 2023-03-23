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
$errors = [];
$name_value = NULL;
$salary_value = NULL;
$depID_value = NULL;
if(isset($_POST['send'])){
    $name = filterValidation($_POST['name']);
    $salary = filterValidation($_POST['salary']);
    $depID = filterValidation($_POST['depID']);
    // $img = $_POST['image'];
    // Or we can use rand(int $min , int $max);
    $image_name = time() . $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $location = "upload/" . $image_name;
    move_uploaded_file($tmp_name, $location);

    if(stringValidation($name)) {
        $errors[] = "Please enter a name";
    }
    if(numberValidation(empty($salary))) {
        $errors[] = "Please enter a salary";
    }

    if(empty($errors)) {
        $insertMessage = "INSERT INTO employee VALUES(NULL, '$name', $salary, '$image_name', $depID)";
        $i = mysqli_query($conn, $insertMessage);
        path('employee/view.php');
    }
}
$select = "SELECT * FROM employeewdepartment";
$ss = mysqli_query($conn, $select);
auth(1, 2, 3);
?>
<?php if(!empty($errors)) : ?>
    <?php foreach( $errors as $data ): ?>
        <div><?php echo $data ?></div>
    <?php endforeach; ?>
<?php endif; ?>
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
                    <label>Salary</label>
                    <input class="form-control" type="text" name="salary" value="<?php echo $salary_value ?>">
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input class="form-control" type="file" name="image">
                </div>
                <div class="form-group">
                    <label>Department</label>
                    <select name="depID" id="form-control">
                        <?php foreach($s as $data): ?>
                            <option value="<?php echo $data['id'] ?>"><?php echo $data['name'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <button name="send" class="btn btn-info m-3">Save Employee</button>
            </form>
        </div>
    </div>
</div>

<?php 
include '../shared/script.php';
?>