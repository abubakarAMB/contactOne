<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
	<h1>This is the home Page</h1>
	<a href="index.php">Go Back</a>
   <div class="main">
   	  <p>Hello world</p>
   	  <h3>This is a header</h3>
   </div>
  <table>
  	<thead>
  		<th>Names</th>
  		<th>Age</th>
  		<th>Gender</th>
  		<th>Class</th>
  	</thead>
  	<tbody>
  		<tr>
  			<td colspan="2">Abubakar Musa Bala</td>
  		<!-- 	<td>15</td> -->
  			<td>Male</td>
  			<td>Class 1</td>
  		</tr>
  		<tr>
  			<td>Abubakar Musa Bala</td>
  			<td>15</td>
  			<td>Male</td>
  			<td>Class 1</td>
  		</tr>
  		<tr>
  			<td>Abubakar Musa Bala</td>
  			<td>15</td>
  			<td>Male</td>
  			<td>Class 1</td>
  		</tr>
  	</tbody>
  </table>


  <form action="home.php" method="post">
  	<label for="name">Full Name</label>
  	<input type="text" name="name" id="name"><br>
  		<label for="zip-code">Zip Code</label>
    <input type="number" name="zip-code" id="zip-code"><br>
    	<label for="email">Email</label>
    <input type="email" name="email" id="email"><br>
    	<label for="password">Password</label>
    <input type="password" name="password" id="password"><br>
    <input type="submit" name="submit">
  </form>
  
  <video width="400" controls>
  <source src="https://www.youtube.com/watch?v=a9Ld1jisfA4" type="video/mp4">
  Your browser does not support HTML video.
</video>




</body>
</html>