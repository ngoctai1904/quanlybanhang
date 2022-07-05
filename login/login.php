<?php
$link = mysqli_connect('mysql', 'root', '', 'number') or die ("Khong the ket noi den CSDL MYSQL");
session_start();
if (isset($_SESSION['username'])){
unset($_SESSION['username']);
}

if (isset($_POST['login'])) {

$username = addslashes($_POST['username']);
$email = addslashes($_POST['email']);
$password = addslashes($_POST['password']);

if (!$username ||!$email  ||!$password ) {
echo "Nhập đầy đủ thông tin <a href='javascript: history.go(-1)'>Trở lại</a>";
exit;
}

$query = "SELECT * FROM users WHERE username='$username'";

$result = mysqli_query($link, $query) or die( mysqli_error($link));

$row = mysqli_fetch_array($result);

if ($password != $row['password']) {
    echo "Mật khẩu không đúng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
    exit;
    }
if ($email != $row['email']) {
    echo "Email không đúng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
    exit;
    }
if ($username != $row['username']) {
    echo "Tên đăng nhập không đúng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
    exit;
    }
    if($row['role_id'] == 1){
            $_SESSION ['role_id'] = $row['role_id'];
        }
        else{
            $_SESSION ['role_id'] = 0;
        }
    $_SESSION['username'] = $username;
    $link->close();
    header('Location: index.php');
    exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/log.css">
    <link rel="stylesheet" href="./css/fontawesome-free-6.1.0-web/css/all.min.css">   
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:ital,wght@0,300;0,400;0,500;1,300&display=swap&subset=vietnamese"><title>Document</title>
</head>
<body>
    <div class="log-form">
        <form  action="login.php" method="post">
            <div class="main">
                <h1>Đăng nhập</h1>
            </div>            
            <div class="form-in">
                <i class="fa-solid fa-user"></i>
                <input type="text" placeholder="Tên đăng nhập..." name='username'>
            </div>
            <div class="form-in">
                <i class="fa-solid fa-user"></i>
                <input type="text" placeholder="email..." name='email'>
            </div>
            <div class="form-in">
                <i class="fa-solid fa-lock"></i>
                <input type="password" placeholder="Mật Khẩu..." name='password'>
            </div>
            <div class="btn">
                <button name="login">Đăng nhập</button>
                <button><a href="index.php">Trở lại</a></button>
            </div>
        </form>
    </div>

</body>
</html>




