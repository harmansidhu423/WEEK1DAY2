<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Save Contact</title>
</head>
<body>
<h1>Saving Contact...</h1>
<?php
$firstName =$_POST['firstName'];
echo 'First Name: ' .$firstName .'<br />';
$lastName =$_POST['lastName'];
echo 'Last Name: ' .$lastName .'<br />';
$email =$_POST['email'];
echo 'Email:' .$email .'<br />';
// let's connect to the database and save our file
// Step 1 - coonect to the DB
$conn = new PDO( 'mysql: host=LocalHost;dbname=PHP', 'root', '' );
// Step 2 create a sql command
$sql ="INSERT INTO contacts(firstName,lastName,email)
VALUES(:firstName,:lastName,:email)";

//Step 3prepare the command to prevant sql injection attacks
$cmd =$conn->prepare($sql);

$cmd->bindParam(':lastName',$lastName, PDO::PARAM_STR,  30);
$cmd->bindParam(':email',$email, PDO::PARAM_STR,  120);

//Step 4 execute the sql command$cmd->bindParam(':firstName',$firstName, PDO::PARAM_STR,  30);
$cmd->execute();
//Step 5 close the connection to the DB
$conn =null;
//redirect to a new page

?>
</body>
</html>