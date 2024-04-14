
<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once '../includes/header.php' ?>
</head>
<body>
    <?php include_once '../includes/navbar.php'?>
    <header class="my-5 container text-center">
        <h2 class="py-2 text-light bg-primary w-50 mx-auto mas-heading">
            Add  Students 
        </h2>
    </header>
    <section class="my-5 w-50 mx-auto container">
    <?php     require_once '../../database/model.php';
$model = new student();
$id = $_GET['id'];
$result =$model->show($id) ;
$updata = $model->updata($id);
if(!empty($result)){
    foreach($result as $row){
?>
        <form action="" method="post">   
                     <div class="form-group my-2">
                <label for="name">Student Name</label>
            <input type="text" class="form-control" 
            name="name" id="name" VALUE="<?php echo $row['name']?>">
        </div>
            <div class="form-group my-2">
                <label for="text">Student Address</label>
            <input type="text" class="form-control" 
            name="address" id="address" VALUE="<?php echo $row['address'] ?>">
        </div>
            <div class="form-group my-2">
                <label for="number">Student Grade</label>
            <input type="text" class="form-control" 
            name="grade" id="grade" VALUE="<?php echo $row['grade'] ?>">
        </div>
        <input type="submit" name="updata" class="btn btn-primary my-2">
        </form>
        <?php }   
                   } ?>
    </section>
</body>
</html>