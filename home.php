<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
*{
    margin: 0;
    padding: 0;
}
.rate {
    float: left;
    height: 46px;
    padding: 0 10px;
}
.rate:not(:checked) > input {
    position:absolute;
    top:-9999px;
}
.rate:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:30px;
    color:#ccc;
}
.rate:not(:checked) > label:before {
    content: '★ ';
}
.rate > input:checked ~ label {
    color: #ffc700;    
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
    color: #deb217;  
}
.rate > input:checked + label:hover,
.rate > input:checked + label:hover ~ label,
.rate > input:checked ~ label:hover,
.rate > input:checked ~ label:hover ~ label,
.rate > label:hover ~ input:checked ~ label {
    color: #c59b08;
}
.button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 40px 900px;
  cursor: pointer;
}
</style>
</head>
<body>
  <button type="button" class="button" onclick="window.location.href = 'addsong.php';">Add song</button>

<h2>Top 10 Songs</h2>

<table>
<thead>
<tr>
  <th><strong>ID</strong></th>
  <th><strong>Cover Image</strong></th>
  <th><strong>Song Name</strong></th>
  <th><strong>Date of Relese</strong></th>
  <th><strong>Artist</strong></th>
  <th><strong>Rating</strong></th>
  

 
</tr>
</thead>
<tbody>
<?php
$con=mysqli_connect("localhost","root","","spotify");
$sel_query="Select * from song ORDER BY rating DESC LIMIT 10;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
  <form >
    <td align="center"><?php echo $row["id"]; ?></td>
  <td align="center"><?php echo '<img src="image/'.$row['cover'].'" width="80" 
     height="50" />';  ?></td>
  <td align="center"><?php echo $row["sname"]; ?></td>
  <td align="center"><?php echo $row["dor"]; ?></td>
  <td align="center"><?php echo $row["artist"]; ?></td>
  <form method="post">
<td align="center">
  <div class="rate">
    <input type="radio" id="star5" name="rate" value="5" />
    <label for="star5" title="text">5 stars</label>
    <input type="radio" id="star4" name="rate" value="4" />
    <label for="star4" title="text">4 stars</label>
    <input type="radio" id="star3" name="rate" value="3" />
    <label for="star3" title="text">3 stars</label>
    <input type="radio" id="star2" name="rate" value="2" />
    <label for="star2" title="text">2 stars</label>
    <input type="radio" id="star1" name="rate" value="1" />
    <label for="star1" title="text">1 star</label>
  </div>
  <input type="submit" name="submit" value="Add">
   </td></form>
    
 
     
  
</tr>
<?php  } ?>
<?php 
if(isset($_POST["submit"])){ 
     
    $name = $_POST["rate"];
    
    $sql="insert into `song` (rating)values ('$name')";
    
if($con->query($sql)=== TRUE)
  {
?>
<script>alert ("Rated  successfully");

</script>
<?php
  }
}

$con->close();
?>

</tbody>
</table>
<br>
<br><br>
<h2>Top 10 Artist</h2>
<table>
<thead>
<tr>
  <th><strong>Artist Name</strong></th>
  <th><strong>Date of Birth</strong></th>
  <th><strong>Bio</strong></th>
 
  

 
</tr>
</thead>
<tbody>
<?php
$con=mysqli_connect("localhost","root","","spotify");
$sel_query="Select * from artist ;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
  
  <td align="center"><?php echo $row["a_name"]; ?></td>
  <td align="center"><?php echo $row["date"]; ?></td>
  <td align="center"><?php echo $row["bio"]; ?></td>
   
     
  
</tr>
<?php  } ?>

</tbody>
</table>
</body>
</html>

