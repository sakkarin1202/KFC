<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesrch_Phone</title>
</head>

<body>
    <h1>กรุณาใส่เบอร์โทร</h1>
    <form action="SearchByPhone.php" method="GET">
        <input type="text" placeholder="  " name="Phonenumber">
        <br><br>
        <input type="submit">
    </form>
</body>

</html>

<?php
require "connect.php";  
$strP_Name = $_GET["Phonenumber"];
$sql = "SELECT * FROM tbl_customer where Phonenumber = ?";
$params = array($strP_Name);
$stmt = $conn->prepare($sql);
$stmt->execute($params);
?>

<table width="800" border="1">
  <tr>
    
    <th width="140"> <div align="center">รหัสลูกค้า</div></th>
    <th width="120"> <div align="center">  ชื่อ </div></th>
    <th width="100"> <div align="center">นามสกุล </div></th>
    <th width="100"> <div align="center">เบอร์โทร </div></th>
  </tr>

<?php
  while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>

  <tr>
    
      
<td><?php echo $result["CustomerID"]; ?></div></td>
    <td><?php echo $result["Firstname"]; ?></td>
        <td><?php echo $result["Lastname"]; ?></td>
        <td><?php echo $result["Phonenumber"]; ?></td>
        
  </tr>

<?php
  }
?>