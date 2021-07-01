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

if (isset($_POST['id'])) {
    $id= $_POST['id'];
}
if (isset($_POST['name_pro'])) {
    $name=$_POST['name_pro'];
}
if (isset($_POST['type_pro'])) {
    $type=$_POST['type_pro'];
}
if (isset($_POST['price'])) {
    $price=$_POST['price'];
}
if (isset($_POST['image'])) {
    $image=$_POST['image'];
}
if (isset($_POST['category_id'])) {
    $category_id=$_POST['category_id'];
}
if (isset($_POST['discount'])) {
    $discount=$_POST['discount'];
}
$num4=0;
$result3= $con->query("SELECT * FROM product");
while ($row=$result3 ->fetch_assoc()) {
    $num4++;
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
            background-image:url("images/clo4.jpg") ;
            background-size:cover;
        }
        .div3{  height:auto;
            width: 1496px;
            background:rgba(0,0,0,0.45);
            border-radius: 5px;
            margin-top: 10px;


        }
        .text{ margin: 10px }

    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" >Store Admins</a>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="admin_add_category.php">Category</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="admin_add_product.php">Product<span class="sr-only">(current)</span></a>
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
<div class="div3 container " >
    <form method="post">
        <div class="form-group">
            <h2>Product</h2>
            <?php
            $id_selected='';
            $name_selected='';
            $type_selected='';
            $price_selected='';
            $image_selected='';
            $category_id_selected='';
            $discount_selected='';
            $result1= $con->query("SELECT * FROM product");
            for ($i=0; $i<=$num4; $i++){
                if (isset($_POST[$i])) {
                    $result1->data_seek($i);
                    $row = $result1->fetch_row();
                    $id_selected=$row[0];
                    $name_selected=$row[1];
                    $type_selected=$row[2];
                    $price_selected=$row[3];
                    $image_selected=$row[4];
                    $category_id_selected=$row[5];
                    $discount_selected=$row[6];
                }

            }

            ?>
            <input type="text" class="form-control text " placeholder="ID" name="id" value="<?php echo $id_selected;?>">
            <input type="text" class="form-control text" placeholder="Name" name="name_pro" value="<?php echo $name_selected;?>" >
              <select name="type_pro" class="form-control text">
                <option value="normal" <?php if($type_selected=='normal'){ echo 'selected'; } ?>>normal</option>
                <option value="discount" <?php if($type_selected=='discount'){echo 'selected';} ?>>discount</option>
            </select>
            <input type="text" class="form-control text" placeholder="Price" name="price"value="<?php echo $price_selected;?>">
            <input type="text" class="form-control text" placeholder="URL image" name="image" value="<?php echo $image_selected;?>">
            <input type="text" class="form-control text" placeholder="CategoryId" name="category_id" value="<?php echo $category_id_selected;?>" >
            <input type="text" class="form-control text" placeholder="Discount" name="discount" value="<?php echo $discount_selected;?>" >

        </div>
        <button class="btn btn-secondary" name="insert"  type="submit">Create</button>
        <button type="submit" name="update"  class="btn btn-secondary">Update</button>
        <button type="submit" name="delete"  class="btn btn-secondary">Delete</button>
    </form>
    <div class="row">

        <table class="table table-striped table-dark">
            <form method="post">
            <thead class="table table-striped table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Product Name </th>
                <th scope="col">Type</th>
                <th scope="col">Price</th>
                <th scope="col">URL image</th>
                <th scope="col">CategoryId</th>
                <th scope="col">discount</th>
                <th scope="col">Select Row</th>
            </tr>
            </thead>
            <tbody id="all_data">

            <?php
            $result= $con->query("SELECT * FROM product");
            $num5=0;
            while ($row=$result ->fetch_assoc()) {
                echo "<tr><td>".$row['id']."</td><td>". $row['name']."</td><td>".$row['type']."</td><td>".$row['price']."</td><td>".$row['image']."</td><td>".$row['categroy_id']."</td><td>".$row['discount']."</td><td><input type='submit'class='btn btn-sm btn-secondary' name= '$num5' value='select'></td></tr>";
                $num5++;

            }
            $result1= $con->query("SELECT * FROM product");
            $result2= $con->query("SELECT * FROM categroy");
            $found1=false;
            $found=false;
            if(isset($_POST['insert'])){
                while ($row=$result2 ->fetch_row()) {
                    if($category_id==$row['0']){
                        $found1=true;
                    }
                }
                while ($row=$result1->fetch_row()) {
                    if($id==$row['0']){
                        $found=true;
                    }
                }
                if($found==true||$found1==false){echo "<script> alert('The operation Did Not Done Successfully'); </script>"; }
                else{ $insert= $con->query("insert into product values('".$id."', '".$name."', '".$type."', '".$price."', '".$image."', '".$category_id."',' ".$discount."');");
                    echo "<script> alert('The operation Done Successfully'); location.assign('admin_add_product.php');</script>";
                }
            }

            if(isset($_POST['update'])){
                while ($row=$result1 ->fetch_row()) {
                    if($id==$row['0']){
                        $found=true;
                    }
                }
                if($found==true){ $update=$con->query("update product set name='".$name."', type='".$type."', price=' ".$price."', image='".$image."', categroy_id='".$category_id."' , discount=".$discount." where id =".$id.";");
                    echo "<script> alert('The operation Done Successfully'); location.assign('admin_add_product.php');</script>";
                     }
                else{echo "<script> alert('The operation Did Not Done Successfully'); </script>"; }

            }
            if(isset($_POST['delete'])){
                while ($row=$result1 ->fetch_row()) {
                    if($id==$row['0']){
                        $found=true;
                    }
                }
                if($found==true){
                    $con->query("DELETE FROM product where id= '".$id."';");
                    echo "<script> alert('The operation Done Successfully'); location.assign('admin_add_product.php');</script>";}
                else{echo "<script> alert('The operation Did Not Done Successfully'); </script>"; }
            }
            }         ?>
            </tbody>
        </form>
        </table>
    </div>
</div>
</body>
</html>