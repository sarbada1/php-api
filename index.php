<?php

$host = "localhost";
$username = "root";
$password = "Root@1234";
$db_name = "bca3semproject";

$conn = mysqli_connect($host, $username, $password, $db_name);

if (!$conn) {
    die("Connection failed :" . mysqli_connect_error());
}

function getStudent()
{
    $sql = "SELECT * from students";
    $result = mysqli_query($GLOBALS['conn'], $sql);
    $data = mysqli_fetch_all($result);
    echo json_encode($data);
}

function insertStudent()
{
    $data=json_decode(file_get_contents('php://input'),true);
    
    //check if student already exists in the database
    $name = $data['name'];
    $email = $data['email'];
    $address = $data['address'];
    $sql = "
    INSERT into students(name,email,address) values('$name','$email','$address')";
    if (mysqli_query($GLOBALS['conn'], $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($GLOBALS['conn']);
    }
}

function updateStudent()
{
    $data = json_decode(file_get_contents('php://input'), true);
    $id = $data["id"];
    $name = $data['name'];
    $email = $data['email'];
    $address = $data['address'];

    
    $sql = "UPDATE students SET name ='$name', email='$email' , address='$address' WHERE id=$id";
    if (mysqli_query($GLOBALS['conn'],$sql)){

        echo " record updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($GLOBALS['conn']);
    }
}

function deleteStudent()
{
    $data=json_decode(file_get_contents("php://input"),true);
$id=$data['id'];
$sql="DELETE  FROM students where id=$id";
if(mysqli_query($GLOBALS['conn'],$sql)){
echo "Record deleted Successfully.";
}else{
echo "Error deleting Record : ". mysqli_error($GLOBALS['conn']);
}
}

$server = $_SERVER['REQUEST_METHOD'];

if ($server == "GET") {
    getStudent();
} else if ($server === "POST") {
    insertStudent();
} elseif ($server == "PUT") {
    updateStudent($id);
} else if ($server == "DELETE") {
    deleteStudent();
} else {
    echo "Invalid Request";
}

// getStudent();
