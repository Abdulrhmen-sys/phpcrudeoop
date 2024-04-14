<?php


class student{

    private $server ="localhost";
    private $username ="root";
    private $password ="";
    private $dbName ="phpcrude";
    private $conn;

    public function __construct(){
        try{
            $this->conn = new mysqli($this->server ,$this->username ,$this->password 
            ,$this->dbName);
        }catch(Exception $err){
            echo "connection error" .$err->getMessage();
        }
    }
// get students to table
public function index(){
    $student = null;
    $query ="SELECT * FROM student";
    if ($sql = $this->conn->query($query)){
        while ($row = mysqli_fetch_assoc($sql)){
            $student[] = $row ;
        }
    }
    return $student;
}

// add new student

 public function store() {
    if (isset($_POST['creat'])) {
        if (isset($_POST['name']) 
        && isset($_POST['address'])
     && isset($_POST['grade'])){
            if (!empty($_POST['name']) && 
            !empty($_POST['address']) && 
            !empty($_POST['grade'])) {
                $name = mysqli_real_escape_string($this->conn , $_POST['name']);
                $address = mysqli_real_escape_string($this->conn , $_POST['address']);
                $grade = mysqli_real_escape_string($this->conn , $_POST['grade']);

                $query = "INSERT INTO `student` (name,address,grade) 
                VALUES ('$name','$address' , '$grade')";
                if ($sql = $this->conn->query($query)) {
                    echo "<script>alert('Student added successfully');</script>";
                    echo "<script>window.location.href = '../../index.php';</script>";
                }else{
                    echo "<script>alert('Something Went Wrong Try Again !');</script>";
                    echo "<script>window.location.href = '../../index.php';</script>";
                }
            }else{
                echo "<script>alert('Enter Valid Data and Try Again');</script>";
                echo "<script>window.location.href = '../../index.php';</script>";
            }
        }
    }
} 
// delet data
  public function delete ($id){
 $query ="DELETE FROM student where id ='$id'";
     if($sql= $this->conn->query($query)) {
        return true ;
        header("location:home.php");
     } else{
        return false ;
     }
}
     
public function show($id){
    $std =null;
    $query = "SELECT name, address, grade FROM `student` where id ='$id'";
    if ($sql = $this->conn->query($query)){
        while ($row = mysqli_fetch_assoc($sql)){
            $std[] = $row ;
        }
    }
 return $std;

}

public function updata($id){
    if(isset($_POST['updata']))
    $id=$_GET['id']; {
        if (isset($_POST['name'])&&
        (isset($_POST['address']))&&
        (isset($_POST['grade']))){
            if (!empty($_POST['name'])&&
            !empty($_POST['address'])&&
            !empty($_POST['grade'])){
                $name = mysqli_real_escape_string($this->conn , $_POST['name']);
                $address = mysqli_real_escape_string($this->conn , $_POST['address']);
                $grade = mysqli_real_escape_string($this->conn , $_POST['grade']);

                $query = "UPDATE `student` SET name='$name', address='$address' ,grade='$grade' where id ='$id'";
                if ($sql = $this->conn->query($query)) {
                    echo "<script>alert('Student update successfully');</script>";
                    echo "<script>window.location.href = '../../index.php';</script>";
                }else{
                    echo "<script>alert('Something Went Wrong Try Again !');</script>";
                    echo "<script>window.location.href = '../../index.php';</script>";
                }
            }else{
                echo "<script>alert('Enter Valid Data and Try Again');</script>";
                echo "<script>window.location.href = '../../index.php';</script>";
            }
            }
        }

    }
}

?>
