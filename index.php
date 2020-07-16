<?php

include "db.php";

if (isset($_POST["submit"])) {
	
	if (!empty($_POST["firstname"]) && !empty($_POST["lastname"]) && !empty($_POST["purpose"]) && !empty($_POST["phone_number"])) {
		$firstname = $_POST["firstname"];
		$lastname = $_POST["lastname"];
		$purpose = $_POST["purpose"];
		$phone_number = $_POST["phone_number"];

		$sql = 'INSERT INTO guests(firstname, lastname, purpose, phone_number) values ("'.$firstname.'","'.$lastname.'", "'.$purpose.'", "'.$phone_number.'" )';

		$success = $conn->query($sql);

		if ($success) {
			echo "registration successful";
		}else {
			echo "registration failed, kindly try again!";
		}



	}else {
		echo "username and password are required!";
	}



}


$sql = "SELECT * FROM guests";
$result = $conn->query($sql);
$data = array();
// if ($result->num_rows > 0) {
//   // output data of each row
while($row = $result->fetch_assoc()) {
	array_push($data, $row);
}


// var_dump($data);

// var_dump($_POST);
// echo "<br>";
// echo $_POST["firstname"];
// echo "<br>";
// echo $_POST["lastname"];
// echo "<br>";
// echo $_POST["country"];
// echo "<br>";

// const PII = 3.142;

// // int name = "bubakar";
// $name = "Chibozor";
// $age = 15;
// $account_balance = 200.05;
// $is_married = false;
// $is_in_relationship = true;

// $val_one = 20;
// $val_two = 30;


// $intial = 20;

// while ($intial >= 10) {
// 	# code...
// 	echo $intial."<br>";
// 	$intial--;
// }

// $names = ["name"=>"abubakar", "age"=>"30", "gender"=>"male"];
// $students = array(
// 	array("name"=>"abubakar", "age"=>"30", "gender"=>"male"),
// 	array("name"=>"Kingsley", "age"=>"35", "gender"=>"male"),
// 	array("name"=>"Amaka", "age"=>"24", "gender"=>"female")
// );
// $val_two++;
// $abubakar = $abubakar + 1;

// foreach ($students as $student) {
//       echo $student["name"]." is ".$student["age"]." years old, and is a ".$student["gender"]."<br>";
// }

// echo $names["name"];
// echo "<br>";

// for ($i=0; $i < count($names); $i++) { 

// 	echo $names[$i]."<br>";
// }

// echo "<br>";

// $result = $is_married || $is_in_relationship ? "its true " : "its false" ;

// echo $result."<br>";


// switch ($name) {
// 	case 'Abubakar':
// 		echo "yes its abubakar";
// 		break;
// 	case 'sani':
// 		echo "this is sani";
// 	break;
// 	default:
// 		echo "we dont know you";
// 		break;
// }


// function functionName($age){
//    return $age;
// }

// echo functionName($age);

// if($is_married || $is_in_relationship ){
   
// 	echo "its true";

// }else{
// 	echo "its false";
// }

// TRUE AND TRUE = TRUE;
// TRUE AND FALSE = FALSE;
// FALSE AND TRUE = FALSE;
// FALSE AND FALSE = FALSE;

// OR
// TRUE OR TRUE = TRUE;
// TRUE OR FALSE = TRUE;
// FALSE OR TRUE = TRUE;
// FALSE OR FALSE = FALSE;

//echo "my name is ".$name.". i am ".$age." years old";

// var_dump($name);
// var_dump($age);
// var_dump($account_balance);
// var_dump($is_married);

//conditional statements in php



// echo "php";
// print "hello";

?>


<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>

<h3>Using CSS to style an HTML Form  By AMB</h3>
<h4>JoeBlack added this one</h4>

<div>
  <form action="index.php" method="POST">
    <label for="firstname">Firt Name</label>
    <input type="text" id="firstname" name="firstname" placeholder="Your firtname..">

    <label for="lastname">Last Name</label>
    <input type="text" id="lastname" name="lastname" placeholder="Your lastname..">

    <label for="purpose">Purpose of visit</label>
    <input type="text" id="purpose" name="purpose" placeholder="Your purpose of visit..">

    <label for="phone_number">Phone Number</label>
    <input type="text" id="phone_number" name="phone_number" placeholder="Your phone number..">

    <!-- <label for="country">Country</label>
    <select id="country" name="country">
      <option value="australia">Australia</option>
      <option value="canada">Canada</option>
      <option value="usa">USA</option>
    </select> -->
  
    <input type="submit" value="Submit" name="submit">
  </form>
</div>
<br>

<h1>Guest Record</h1>
<table id="customers">
  <tr>
    <th>firstname</th>
    <th>lastname</th>
    <th>purpose</th>
    <th>phone_number</th>
    <th>time_in</th>
    <th>time_out</th>
	<th>update</th>
	<th>delete</th>
  </tr>
  <?php foreach ($data as $dt) { ?>
  <tr>
    <td><?php echo $dt["firstname"]; ?></td>
    <td><?php echo $dt["lastname"]; ?></td>
    <td><?php echo $dt["purpose"]; ?></td>
    <td><?php echo $dt["phone_number"]; ?></td>
    <td><?php echo $dt["time_in"]; ?></td>
    <td><?php echo $dt["time_out"]; ?></td>
    <td><a href="<?php echo "update.php?id=".$dt["id"];?>">update record</a></td>
    <td><a href="<?php echo "delete.php?id=".$dt["id"];?>">delete record</a></td>
	
  </tr>
  <?php } ?>
</table>
</body>
</html>

