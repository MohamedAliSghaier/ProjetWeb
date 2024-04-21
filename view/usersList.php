<?php
    include("dashbSides.php") ;
    include '../controller/userC.php';
    $userC = new userC();
    $tab = $userC->listusers();
    function mapUserRole($role) {
        switch ($role) {
            case 1:
                return 'User';
            case 2:
                return 'Admin';
            default:
                return 'Unknown';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/admin.css">
    <title>Document</title>
</head>
<body>
        <main>
        <div class="recent-orders all">
                        <h2>Users</h2>
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Last Name</th>
                                    <th>First Name</th>
                                    <th>Email</th>
                                    <th>Date of Birth</th>
                                    <th>Role</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                foreach ($tab as $user) {
                                    $date=$user['dob'];
                                    $dateObj = new DateTime($date);
                                    $formattedDate = $dateObj->format('d/m/Y');
                                    echo '<tr>
                                        <td>'.$user['id'].'</td>
                                        <td>'.$user['lastname'].'</td>
                                        <td>'.$user['firstname'].'</td>
                                        <td>'.$user['email'].'</td>
                                        <td>'.$formattedDate.'</td>
                                        <td>'.mapUserRole($user['role']).'</td>
                                        <td>
                                            <a href="updateuser.php?id='.$user['id'].'"><button class="btn btn-outline-light m-2">Update</button></a>
                                            <a href="deleteuser.php?id='.$user['id'].'"><button class="btn btn-primary ms-2">Delete</button></a>
                                        </td>
                                    </tr>';
                                }
                            ?>
                            </tbody>
                        </table>
                        
        </div>
        </main>
    

    <script src="../assets/js/admin.js"></script>   
</body>
</html>