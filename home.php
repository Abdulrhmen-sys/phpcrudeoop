
<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once '../includes/header.php'?>
</head>
<body>
    <?php include_once '../includes/navbar.php'?>
    <header class="my-5 container text-center">
        <h2 class="py-3 text-light bg-primary w-50 mx-auto mas-heading">
            Students List
        </h2>
    </header>
    <section class="container mx-auto w-60 fs-5 ">
    <a href="showAll.php" class="btn btn-dark">Show All Students</a>
    </section>

    <section class="my-5 w-85 fs-5 text-center mx-auto container">
        
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Grade</th>
                <th>Active</th>
            </tr>
        </thead>
        <tbody>
        <?php 
require_once '../../database/model.php';
$model = new student();
$result =$model->index();

if(!empty($result)){
    foreach($result as $row){
?>
<tr>
    <td><?php echo $row['id']?></td>
    <td><?php echo $row['name']?></td>
    <td><?php echo $row['address']?></td>
    <td><?php echo $row['grade']?></td>
    <td>
        <a href="show.php? id=<?php echo $row['id']?>" class="btn btn-sm btn-primary mx-1">Show</a>
        <a href="edite.php? id=<?php echo $row['id']?>" class="btn btn-sm btn-success mx-1">Edite</a>
        <a href=" delet.php? id=<?php echo $row['id'] ?>" class="btn btn-sm btn-danger mx-1" onclick="return confirm('Are you sure delete')">Delet</a>
    </td>
</tr>
<?php
    } // end of foreach loop 
    }      
?> 
        </tbody>
   </table>
    </section>
    
</body>
</html>