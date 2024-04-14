<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once '../includes/header.php'?>
</head>
<body>
<?php include_once '../includes/navbar.php'?>
<header class="my-5 container text-center">
        <h2 class="py-3 text-light bg-primary w-50 mx-auto mas-heading">
           Showe Students 
                </h2>
    </header>
    <section class="my-5 w-75 text-center mx-auto container">
       <table class="table table-striped">
<?php     require_once '../../database/model.php';
$model = new student();
$id = $_GET['id'];
$result =$model->show($id);

if(!empty($result)){
    foreach($result as $row){
?>
        <tr>
            <td><strong>Name :</strong></td>
            <td><?php echo $row['name']?></td>
        </tr>
        <tr>
            <td><strong>Address :</strong></td>
            <td><?php echo  $row['address'] ?></td>
        </tr>
        <tr>
            <td><strong>Grade :</strong></td>
            <td><?php echo $row ['grade']?></td>
        </tr>
        <?php
           } 
        }       ?>
       </table>
       <a href="home.php" class="btn btn-primary my-2">Back to Home</a>
    </section>
</body>
</html>