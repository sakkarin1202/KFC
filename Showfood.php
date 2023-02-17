<html> <head>
<title> Showfood </title>
</head>
<body>
<?php
require "connect.php";
$sql = "SELECT * FROM tbl_menu,tbl_food WHERE tbl_menu.MenuID = tbl_food.MenuID
ORDER BY tbl_menu.MenuID ASC"
;
$stmt = $conn->prepare($sql);
$stmt->execute();
?>

<table width="800" border="1">
  <tr>
    <th width="90"> <div align="center">ชื่ออาหาร </th>
    <th width="140"> <div align="center">รายละเอียด </th>
    <th width="120"> <div align="center">เมนู </th>
    <th width="100"> <div align="center">ราคา </th>
    
  </tr>

<?php
  while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>

  <tr>
    <td>   
        <?php echo $result["Foodname"]; ?>
         
    </td>

    <td>
        <?php echo $result["Fooddescription"]; ?>
    </td>

   <td><?php echo $result["Menuname"]; ?></div></td>
    <td><?php echo $result["Foodprice"]; ?></td>
    
    
  </tr>

<?php
  }
?>

</table>

<?php
$conn = null;
?>
</body>  
</html>