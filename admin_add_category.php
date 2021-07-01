<?php
session_start();
if(isset($_POST['logout'])){
    session_unset();
    session_destroy();
    setcookie("name" , 1,time()-100);
    setcookie("pass" , 1,time()-100);
}
if(!isset($_SESSION['user'])){
    header('REFRESH:0; URL=login_page.php');
}
$con= new mysqli('localhost','root','','mhshop');
if ($con->connect_error){
    die("Cannot able to connection the error is ".$con->connect_error);
} else{
if (isset($_POST['id']) || isset($_POST['name_cate']) || isset($_POST['description']) || isset($_POST['image_url']) ) {
    $id= $_POST['id'];
    $name=$_POST['name_cate'];
    $description=$_POST['description'];
    $image_url = $_POST['image_url'];
}
$num1=0;
$result3= $con->query("SELECT * FROM categroy");
while ($row=$result3 ->fetch_assoc()) {
    ++$num1 ;
}
?>
<html>

<head>
    <meta charset="utf-8">
    <title>Admin page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>
        body {
            margin: 0;
            width: 100%;
            height: 100vh;
            font-family: "Exo", sans-serif;
            color: #fff;
            background-image: url("images/clo4.jpg");
            background-size: cover;
        }

        .div3 {
            height: auto;
            width: 1496px;
            background: rgba(0, 0, 0, 0.45);
            border-radius: 5px;
            margin-top: 10px;


        }

        .text {
            margin: 10px
        }

    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand">Store Admins</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="admin_add_category.php">Category<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin_add_product.php">Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin_add_users.php">Add Users</a>
                </li>
            </ul>
        </div>
        <form method="post" class="form-inline">
            <button class="btn btn-sm btn-light" name="logout" type="submit">Logout</button>
        </form>
    </nav>

<div class="div3 container ">
    <form name="userForm" method="post">
        <div class="form-group">
            <h2>Category</h2>
            <?php
            $id_selected='';
            $name_selected='';
            $des_selected='';
            $image_selected='';
            $dis=false;
            $result1= $con->query("SELECT * FROM categroy ");
            for ($i=0; $i<=$num1; $i++){
                if (isset($_POST[$i])) {
                    $result1->data_seek($i);
                    $row = $result1->fetch_row();
                    $id_selected=$row[0];
                    $name_selected=$row[1];
                    $des_selected=$row[2];
                    $image_selected=$row[3];
                    $dis=true;
                }}
            ?>
            <input type="text" class="form-control text" placeholder="ID" name="id" value="<?php echo $id_selected;?>" >
            <input type="text" class="form-control text" placeholder="Name " name="name_cate" value="<?php echo $name_selected;?>">
            <input type="text" class="form-control text" placeholder="Description" name="description" value="<?php echo $des_selected;?>">
            <input type="text" class="form-control text" placeholder="Image URL" name="image_url" value="<?php echo $image_selected;?>">
        </div>
       <button class="btn btn-secondary" name="insert" href="" type="submit">Create</button>
       <button type="submit" name="update" href="" class="btn btn-secondary">Update</button>
       <button type="submit" name="delete" href="" class="btn btn-secondary">Delete</button>
    </form>
    <div class="row">
        <table class="table table-striped table-dark">
            <form method="post">
                <thead class="table table-striped table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Category Name </th>
                    <th scope="col">Category Description</th>
                    <th scope="col">Image URL</th>
                    <th scope="col">Select Row</th>
                </tr>
                </thead>
                <tbody id="all_data">
                <?php
                $num=0;
                $result= $con->query("SELECT * FROM categroy");
                while ($row=$result ->fetch_row()) {
                    echo "<tr>";
                    echo "<td>".$row['0']."</td>";
                    echo "<td>".$row['1']."</td>";
                    echo "<td>".$row['2']."</td>";
                    echo "<td>".$row['3']."</td>";
                    echo"<td><input type='submit'class='btn btn-sm btn-secondary' name= '$num' value='select'></td></tr>";
                    echo "</tr>";
                    $num++;
                }

                $result= $con->query("SELECT * FROM categroy");
                $found=false;
                if(isset($_POST['insert'])){
                    while ($row=$result ->fetch_row()) {
                        if($id==$row['0']){
                            $found=true;
                        }
                    }
                    if($id==''|| $found==true){
                        echo "<script> alert('The operation Did Not Done Successfully'); </script>";
                    }else{
                        $insert= $con->query("insert into categroy values('".$id."', '".$name."', '".$description."','".$image_url."');");
                        echo "<script> alert('The operation Done Successfully'); location.assign('admin_add_category.php');</script>";
                    }
                }

                if(isset($_POST['update'])){
                    while ($row=$result ->fetch_row()) {
                        if($id==$row['0']){
                            $found=true;
                        }
                    }
                    if($found==true){$update=$con->query("update categroy set name='".$name."', description='".$description."', image_url='".$image_url."' where id =".$id.";");

                    echo "<script> alert('The operation Done Successfully'); location.assign('admin_add_category.php');</script>";

                    }else{
                        echo "<script> alert('The operation Did Not Done Successfully'); </script>";
                    }
                }
                if(isset($_POST['delete'])){
                    while ($row=$result ->fetch_row()) {
                        if($id==$row['0']){
                            $found=true;
                        }
                    }
                    if($found==true){
                        $con->query("DELETE FROM categroy where id= '".$id."';");
                        echo "<script> alert('The operation Done Successfully'); location.assign('admin_add_category.php');</script>";
                     }
                    else{echo "<script> alert('The operation Did Not Done Successfully'); </script>"; }



                }
                }
                ?>
                </tbody>
            </form>
        </table>
    </div>
</div>
</body>

</html>
