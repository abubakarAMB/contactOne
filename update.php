<?php

include "db.php";

$data = [];

if (isset($_GET["id"]) &&  !empty($_GET["id"])) {
    
    $id = $_GET["id"];

    $sql = "SELECT * FROM users WHERE id = ".$id;

    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
      
        $data = $result->fetch_assoc();

    }else {
        header("location: index.php");

    }
  


}


if (isset($_POST["submit"])) {
	
	if (isset($_POST["username"]) && !empty($_POST["username"]) && isset($_POST["password"]) && !empty($_POST["password"])) {
		$username = $_POST["username"];
		$password = $_POST["password"];
		$id = $_POST["id"];
        $key = rand();
        $updated_at = date("Y-m-d h:i:sa");
		$encrypted_password = md5($password);
		// echo $username." your password is ".$password;
        $hash = md5($key);
		$sql = 'UPDATE users SET username = "'.$username.'" WHERE id = '.$id;

        if ($conn->query($sql) === TRUE) {
            header("location: index.php");
          } else {
            echo "Error updating record: " . $conn->error;
          }


	}else {
		echo "username and password are required!";
	}



}

?>



<!DOCTYPE html>
<html>
<head>
	<title>Updata Page</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>

<h3>Update form </h3>

<div>
  <form action="update.php" method="POST">
    <input type="text" id="id" name="id" value="<?php echo $data["id"]; ?>" style="display:none;">
    <label for="username">Username</label>
    <input type="text" id="username" name="username" placeholder="Your username.." value="<?php echo $data["username"]; ?>">

    <label for="password">Password</label>
    <input type="password" id="password" name="password" placeholder="Your password..">

    <input type="submit" value="Update Record" name="submit">
  </form>
</div>
</body>
</html>

