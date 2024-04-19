<?php
include '../controller/userC.php';
include '../model/user.php';

$error = "";

// create client
$user = null;
$valid=0;
$userC = new userC();
// create an instance of the controller
if (
isset($_POST["name"]) &&
isset($_POST["lname"]) &&
isset($_POST["email"]) &&
isset($_POST["pwd"]) &&
isset($_POST["dob"])
) {
if (
!empty($_POST["name"]) &&
!empty($_POST["lname"]) &&
!empty($_POST["email"]) &&
!empty($_POST["pwd"]) &&
!empty($_POST["dob"]) 
) {
// Server-side validation
$exist= $userC->getbyemail($_POST["email"]);
$emailPattern = '/^[\w.%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
$namePattern = '/^[A-Za-z]+$/';
$datepattern = '/^(0[1-9]|[1-2][0-9]|3[0-1])\/(0[1-9]|1[0-2])\/\d{4}$/';

if (!preg_match($emailPattern, $_POST["email"])) {
    echo "<script>alert('Invalid email format. Please enter a valid email address.'); window.location.href = 'login.php';</script>";
} elseif (!preg_match($namePattern, $_POST["name"]) || !preg_match($namePattern, $_POST["lname"])) {
    echo "<script>alert('Invalid name format. Names should contain only letters.'); window.location.href = 'login.php';</script>";
} elseif (!preg_match($datepattern, $_POST["dob"])) {
    echo "<script>alert('Invalid date. Date should be in the format dd/mm/yyyy.'); window.location.href = 'login.php';</script>";
} elseif ($exist) {
    echo "<script>alert('Email already exists. Please try another one.'); window.location.href = 'login.php';</script>";
} else {
    $valid = 1; // Form validation passed
}

} else {
$error = "Missing information";
}
}

if ($valid == 1) {  
// Form is valid, proceed with adding the user
$user = new user(
$_POST["email"],
$_POST["pwd"],
$_POST["name"],
$_POST["lname"],
$_POST["dob"],
1
);
//var_dump($user);
$userC->adduser($user);
header('Location: usersList.php');
exit;
} 
