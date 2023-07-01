<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employeee";
$con = mysqli_connect($servername,$username,$password,$dbname);
if(isset($_POST['save']))
{
     $name = $_POST['name'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$department = $_POST['department'];
$address = $_POST['address'];
$query ="INSERT INTO  emp ( name, gender, email,dept,address) values ('$name','$gender','$email','$department','$address')";
$res = mysqli_query($con,$query);
if($res)
{
    echo "<script>alert('Data inserted successfully');</script>";
}
}

if(isset($_POST['search']))
{
     $nid = $_POST['id'];
$query="SELECT * FROM emp WHERE id='$nid'";
$data = mysqli_query($con,$query);
$res = mysqli_fetch_assoc($data);


}
?>
<?php
if(isset($_POST['modify']))
{ $nid = $_POST['id'];
     $name = $_POST['name'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$department = $_POST['department'];
$address = $_POST['address'];
$query ="UPDATE emp SET name = '$name',gender = '$gender',email = '$email', dept= '$department',address = '$address' where id= '$nid'";
if($query)
{
    echo "<script>alert('Data updated successfully');</script>";
}
$result = mysqli_query($con,$query);
}
?>
<?php
if(isset($_POST['delete']))
{ $nid = $_POST['id'];
     
$query ="Delete  from emp where id='$nid'";
$result = mysqli_query($con,$query);
if($query)
{
    echo "<script>alert('Data Deleted successfully');</script>";
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee record management system</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1 class="m">EMPLOYEE DATA ENTRY AUTOMATION SOFTWARE</h1>
        <div class="form">
<form action="form.php" method="POST">
<input type="text" class="textfield" placeholder="search id" name="id" id="id"value="<?php if(isset($_POST['search'])){echo $res['id'];}?>">
<input type="text" class="textfield"  placeholder="Employee name" name="name" id="name" value="<?php if(isset($_POST['search'])){echo $res['name'];}?>">
<select name="gender" id="gender" class="textfield">
    <option value="not selected">Gender</option>
    <option value="Male" >Male</option>
    <option value="Female" >FeMale</option>
    <option value="others" >others</option>
</select>
<input type="email" class="textfield"  placeholder="enter your Email id" name="email"value="<?php if(isset($_POST['search'])){echo $res['email'];}?>" >
<select name="department" id="dept" class="textfield">
    <option value="not selected" >Department</option>
    <option value="Account" >Account</option>
    <option value="Sales" >Sales</option>
    <option value="HR" >HR</option>
    <option value="marketing">marketing</option>
    <option value="IT" >IT</option>
    <option value="Business Development">Business Development</option>
</select>
<br>
<textarea name="address" id="address" cols="30" rows="10"placeholder="enter address"><?php if(isset($_POST['search'])){echo $res['address'];}?></textarea>
<input type="submit" id="sbmt" value="search" class="sbmt" name="search">
<input type="submit"  value="save" class="sbmt" style="background-color:green;" name="save">
<input type="submit"  value="modify" class="sbmt" style="background-color:red;" name="modify">
<input type="submit"  value="Delete" class="sbmt" style="background-color:yellow;" name="delete" OnClick="deleteconfirm()">
<input type="reset"  value="Clear" class="sbmt" style="background-color:grey;" name="clear">
</form>
        </div>
    </div>
</body>
</html>
<script>
    function deleteconfirm()
    {
        confirm('are you sure want to delete?');
    }
</script>
