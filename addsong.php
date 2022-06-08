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
.rating {
display: flex;
flex-direction: row-reverse;
justify-content: center;
}


.rating > input{ display:none;}

.rating > label {
position: relative;
width: 1.1em;
font-size: 15vw;
color: #FFD700;
cursor: pointer;
}

.rating > label::before{
content: "\2605";
position: absolute;
opacity: 0;
}

.rating > label:hover:before,
.rating > label:hover ~ label:before {
opacity: 1 !important;
}

.rating > input:checked ~ label:before{
opacity:1;
}

.rating:hover > input:checked ~ label:before{ opacity: 0.4; }

</style>
</head>
<body>

<h3>Add Sond</h3>

<div class="container">
  <form method="post" action="" enctype="multipart/form-data">
    <label for="fname">Song Name</label>
    <input type="text" id="fname" name="name" placeholder="Add Song">



    <label for="lname">Date of Relesed</label>
    <input type="date" id="lname" name="dor" placeholder="Relese date">
    <br>
    <br><br>
    <label for="image">Cover Image</label>
    <input type="file"  name="choosefile" >
    <br>
    
    <?php
    $con=mysqli_connect("localhost","root","","spotify");
    $query ="SELECT a_name FROM artist";
    $result = $con->query($query);
    if($result->num_rows> 0){
      $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    ?>
    <br>
    <br>
    <select name="artist">
   <option>Select Artist</option>
  <?php 
  foreach ($options as $option) {
  ?>
    <option><?php echo $option['a_name']; ?> </option>
    <?php 
    }
   ?>
</select>

   <button type="button"  onclick="window.location.href = 'addartist.php';">Add Artist</button>
    <br>
    <br>
    <input type="submit" name="submit" value="Add">
    <br>
    

  </form>
</div>

</body>
</html>

<?php
$con=mysqli_connect("localhost","root","","spotify");

if(isset($_POST["submit"])){ 
     
    $name = $_POST["name"];
    $dor = $_POST["dor"];
    $artist = $_POST["artist"];

    $filename = $_FILES["choosefile"]["name"];

    $tempname = $_FILES["choosefile"]["tmp_name"];  

    $folder = "image/".$filename;
    move_uploaded_file($tempname, $folder);
    
    $sql="insert into `song` (sname,dor,cover,artist)values ('$name','$dor','$filename','$artist')";
    
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