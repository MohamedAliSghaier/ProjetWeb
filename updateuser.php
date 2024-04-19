<?php
include '../controller/userC.php';
include '../model/user.php';
$id=$_GET['id'];
$error = "";

// create client
$valid=0;
$userC = new userC();
$user = $userC->showuser($id);
$role=$user['role'];
$date=$user['dob'];
$dateObj = new DateTime($date);
$formattedDate = $dateObj->format('d/m/Y');
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
    echo "<script>alert('Invalid email format. Please enter a valid email address.');</script>";
} elseif (!preg_match($namePattern, $_POST["name"]) || !preg_match($namePattern, $_POST["lname"])) {
    echo "<script>alert('Invalid name format. Names should contain only letters.');</script>";
} elseif (!preg_match($datepattern, $_POST["dob"])) {
    echo "<script>alert('Invalid date. Date should be in the format dd/mm/yyyy.');</script>";
} elseif ($exist && $exist['id']!=$id) {
    echo "<script>alert('Email is already in use.');</script>";
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
$role
);
//var_dump($user);
$userC->updateuser($user,$id);
header('Location: usersList.php');
exit;
} 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/login.css">
    <link href="../logo.png" rel="icon">
    <title>Zaytuna</title>
    <style>
        <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #BFE2EB; /* very faint blue */
        }

        .form-container {
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
            padding: 40px 20px;
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .form-container:before {
            content: "";
            position: absolute;
            top: -20px;
            left: -20px;
            width: calc(100% + 40px);
            height: calc(100% + 40px);
            background: repeating-linear-gradient(45deg, #0E9E86, #0E9E86 10px, #045D56 10px, #045D56 20px);
            opacity: 0.1;
            z-index: -1;
        }

        .form-container h1 {
            margin-bottom: 20px;
            font-size: 36px;
            color: #045D56;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        .input-group {
            margin-bottom: 20px;
        }

        .input-group input {
            width: calc(100% - 20px);
            padding: 12px;
            border: none;
            border-radius: 25px;
            background-color: #EFFBF9;
            outline: none;
            font-size: 18px;
            transition: background-color 0.3s;
        }

        .input-group input:focus {
            background-color: #C2F0E8;
        }

        .form-container button[type="submit"] {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 25px;
            background: linear-gradient(135deg, #0E9E86 0%, #045D56 100%);
            color: #fff;
            font-size: 20px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .form-container button[type="submit"]:hover {
            background: linear-gradient(135deg, #045D56 0%, #0E9E86 100%);
        }

        .social-icons {
            margin-bottom: 20px;
        }

        .social-icons button {
            background: linear-gradient(135deg, #0E9E86 0%, #045D56 100%);
            border: none;
            border-radius: 25px;
            padding: 12px 20px;
            margin-right: 10px;
            color: #fff;
            font-size: 18px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .social-icons button:last-child {
            margin-right: 0;
        }

        .social-icons button:hover {
            background: linear-gradient(135deg, #045D56 0%, #0E9E86 100%);
        }

        span {
            color: #333;
            font-size: 16px;
        }

        span a {
            color: #045D56;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s;
        }

        span a:hover {
            color: #02443E;
        }
    </style>
    </style>
</head>
<body>
    <form id="registerForm" method="post">
        <div class="container">
            <div class="form-container">
                <h1>Update Account</h1>
                <div class="input-group">
                    <input type="text" name="name" value="<?php echo $user['firstname'] ;?>">
                </div>
                <div class="input-group">
                    <input type="text" name="lname" value="<?php echo $user['lastname'] ;?>">
                </div>
                <div class="input-group">
                    <input type="email" name="email" value="<?php echo $user['email'] ;?>">
                </div>
                <div class="input-group">
                    <input type="text" name="pwd" value="<?php echo $user['mdp'] ;?>">
                </div>
                <div class="input-group">
                    <input type="text" name="dob" value="<?php echo $formattedDate ;?>">
                </div>
                <button type="submit" name="register">Update</button>
            </div>
        </div>
    </form>
</body>
</html>
