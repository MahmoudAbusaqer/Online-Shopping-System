<?php
session_start();
$host= "localhost";
$username="root";
$password="";
$database="mhshop";
$conn= mysqli_connect($host,$username,$password,$database);
$is_found=false;
$select = "Select * from `admin-customer` ";
if (isset($_COOKIE['name']) && isset($_COOKIE['pass'])){
    if ($result = mysqli_query($conn, $select)) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['id'] == $_COOKIE['name'] && $row['password'] == $_COOKIE['pass'] && $row['is_admin'] == 'yes'){
                header('REFRESH:0; URL=admin_add_category.php');
            }elseif ($row['id'] == $_COOKIE['name'] && $row['password'] == $_COOKIE['pass'] && $row['is_admin'] == 'no'){
                header('REFRESH:0; URL=index.php');
            }
        }
    }
}
if(isset($_POST['rem']) ){
    setcookie("name",$_POST['username'],time()+6000);
    setcookie("pass",md5($_POST['password']),time()+6000);
}
    if(isset($_POST['log'])){
        if($_POST['username'] != '' && $_POST['password']!= '') {
            $name = $_POST['username'];
            $pass = md5($_POST['password']);
            $_SESSION['user'] = [
                'username' => $name,
                'password' => $pass];
            if ($result = mysqli_query($conn, $select)) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $name_data = $row['id'];
                    $pass_data = $row['password'];
                    $is_admin = $row['is_admin'];

                    if ($name_data == $name && $pass_data == $pass && $is_admin == 'yes') {
                        header('REFRESH:0; URL=admin_add_category.php');
                        $is_found = true;
                        break;
                    } elseif ($name_data == $name && $pass_data == $pass && $is_admin == 'no') {
                        header('REFRESH:0; URL=index.php');
                        $is_found = true;
                        break;
                    }
                }
            }
            if ($is_found == false) {
                echo "<script> alert('Name or Password is wrong or you are not an admin or user'); </script>";
            }
//                if (isset($_POST['rem'])) {
//                    $remember = $_POST['rem'];
//                }
        }elseif ($_POST['username'] == '' || $_POST['password']== ''){
            echo "<script> alert('Name or Password is empty'); </script>";
        }
}
            ?>
<!DOCTYPE html>
<html lang="">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="bootstrap-4.4.1-dist/css/bootstrap.css">
    <title>Log In</title>
    <style>
        body {
            margin: 0;
            width: 100%;
            height: 100vh;
            font-family: "Exo", sans-serif;
            background-color: rgba(0, 0, 0, 0.8);
        }
        .bigbackground {
            background-color: rgba(0, 0, 0, 0.8);
            background-image: url(images/photo-of-woman-near-clothes-374677.jpg);
            background-size: cover;
            background-position: center;
            box-shadow: 0px 0px 10px #000;
            position: absolute;
            top: 0px;
            left: 0px;
            bottom:0px;
            width: 830px;
            height: auto;

        }
        .smallbackground {
            margin: auto;
            padding: 40px;
            border-radius: 5px;
            position: absolute;
            top: 100px;
            left: 850px;
            right: 50px;
            width: 500px;
        }

        .smallbackground .header-text {
            font-size: 32px;
            font-weight: 600;
            padding-bottom: 40px;
            text-align: center;
        }

        #remember{
            margin: -10px 0px;
            width: 10%;
        }
        .smallbackground input {
            padding: 10px;
            margin: 15px 0px;
            border-radius: 10px;
            width: 95%;
            font-size: 16px;
            font-family: 'Sans-serif';
            text-align: center;
        }

        .smallbackground button {
            background-color: #c02364;
            color: #fff;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            width: 50%;
            font-size: 18px;
            padding: 10px;
            margin: 10px 95px;
        }
        h1{
            color: white;
            font-family: 'Sans-serif';
            font-weight: bolder;
        }
        label{
            color: white;
        }
        p{
            font-family: 'Times New Roman';
            font-size: 18px;
            font-weight: bolder;
        }
    </style>
</head>

<body>
<div class="bigbackground">
    <div class="smallbackground">
        <div class="header-text"><h1>Login Here</h1></div>
        <form name="userLogin" method="post">
            <input type="text" placeholder="ID" id="username" name="username" value="<?php if (isset($_COOKIE['name'])){echo $_COOKIE['name'];}?>">
            <input type="password" placeholder="Password" id="password"name="password" value="<?php if (isset($_COOKIE['name'])){echo $_COOKIE['pass'];}?>">
            <span><input type="checkbox" id="remember" name="rem" <?php if (isset($_COOKIE['name'])){?>checked <?php } ?>><label>Remember me</label></span>
            <button type="submit" id="button" value="login" name="log">Login</button>
        </form>
    </div>
</div>
</body>
</html>
