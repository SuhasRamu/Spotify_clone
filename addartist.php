<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
</head>
<body>

<h3>Add Artist</h3>

<div class="container">
  <form method="post">
    <label for="fname">Artist Name</label>
    <input type="text" id="aname" name="aname" placeholder="Add Song">



    <label for="lname">Date of Birth</label>
    <input type="date" id="lname" name="dt" placeholder="Relese date">
    <br>

    <label for="subject">BIO</label>
    <input type="text" id="subject" name="bio" placeholder="Write something.." style="height:100px">
    

    

    <input type="submit" name="submit" value="Add">
  </form>
</div>

</body>
</html>
<?php
$con=mysqli_connect("localhost","root","","spotify");
if(isset($_POST['submit'])){
$Artist_Name=$_POST['aname'];
$DOB=$_POST['dt'];
$bio=$_POST['bio'];
$sql="insert into `artist` (a_name,date,bio)
values ('$Artist_Name','$DOB','$bio')";
if($con->query($sql)=== TRUE)
  {
?>
<script>alert ("inserted successfully");
window.location="home.php";
</script>
<?php
  }
}
$con->close();
?>
