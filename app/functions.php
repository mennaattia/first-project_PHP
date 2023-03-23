<?php 

function test($condition, $message) {
    if($condition) {
        echo "";
    } else {
        echo "
        <div class='alert aler-danger col-5 mx-auto'>
        $message Unsuccessful
        </div>
        ";
    }
}

function path($go) {
    echo "<script>location.replace('/Trial/$go')</script>";
}
function filterValidation($inputValue) {
    $inputValue = trim($inputValue);
    $inputValue = strip_tags($inputValue);
    $inputValue = htmlspecialchars($inputValue);
    $inputValue = stripslashes($inputValue);
    return $inputValue;
}
function stringValidation($inputValue) {
    $empty = empty($inputValue);
    $length = $inputValue < 5;
    if($empty == true || $length == true) {
        return true;
    } else {
        return false;
    }
}
function numberValidation($inputValue) {
    $empty = empty($inputValue);
    $isNumber = filter_var($inputValue, FILTER_VALIDATE_INT) == FALSE;
    $isNegative = $inputValue < 0;
    if($empty == true || $isNumber == true || $isNegative == true) {
        return true;
    } else {
        return false;
    }
}
// All auth() functions must be the last thing
function auth($role1 = null, $role = null, $arole = null) 
{
    if($_SESSION['admin']) {
        if($_SESSION['admin']['role'] == $role1 || $_SESSION['admin']['role'] == $role || $_SESSION['admin']['role'] == $arole){
        } else {
            path("shared/downlaod.png");
        }
    } else {
        path("admin/login.php");
    }
}
?>