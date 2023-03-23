<?php 
session_start();
if(isset($_GET['logout'])){
    session_unset();
}
?>

<!-- Nav -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Company</a>
            <?php if(isset($_SESSION['admin'])): ?>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/Trial/index.php">Home</a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Department
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="/Trial/department/add.php">Add Department</a></li>
                    <li><a class="dropdown-item" href="/Trial/department/view.php">View Departments</a></li>
                </ul>
                
                </li>

                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Employee
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="/Trial/employee/add.php">Add Employee</a></li>
                    <li><a class="dropdown-item" href="/Trial/employee/view.php">View Employees</a></li>
                </ul>
                
                </li>

                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Admin
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="/Trial/admin/add.php">Add Admin</a></li>
                    <li><a class="dropdown-item" href="/Trial/admin/view.php">View Admin</a></li>
                </ul>
                
                </li>
            </ul>
            <form method="get" class="d-flex" role="search">
                <button name="logout" class="btn btn-outline-success"type="submit">Logout</button>
            </form>
            <?php endif; ?>
            <?php if(!isset($_SESSION['admin'])): ?>
            <div class="d-flex" role="search">
                <a class="btn btn-outline-success" href="/Trial/admin/login.php" type="submit">Login</a>
            </div>
            <?php endif; ?>
            </div>
        </div>
    </nav>