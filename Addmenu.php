<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Menu</title>
</head>

<body>
    <h1>Add Menu</h1>
    <form action="Addmenu.php"method="POST">
        <input type="text" placeholder="กรุณาใส่รหัสอาหาร" name="FoodID">
    <br><br>
        <input type="text"placeholder="กรุณาใส่ชื่ออาหาร" name="Foodname">
    <br><br>
        <textarea placeholder="กรุณาใส่รายละเอียดรายการอาหาร" name="Fooddescription"></textarea>
    <br><br>
        <input type="text"placeholder="กรุณาใส่ราคา" name="Foodprice">
    <br><br>
        <input type="text"placeholder="กรุณาใส่รหัสประเภทอาหาร" name="MenuID">
    <br><br>    
    <input type="submit">
</form>
</body>
</html>

<?php
//if(!empty($_POST['CustomerID'])&&!empty($_POST['Name'])):
    if(!empty($_POST['FoodID']))
    {
        
    require 'connect.php';
        $sql_insert="insert into tbl_food values (:FoodID,:Foodname,:Fooddescription,:Foodprice,:MenuID)";

        $stmt=$conn->prepare($sql_insert);
        $stmt->bindParam(':FoodID',$_POST['FoodID']);
        $stmt->bindParam(':Foodname',$_POST['Foodname']);
        $stmt->bindParam(':Fooddescription',$_POST['Fooddescription']);
        $stmt->bindParam(':Foodprice',$_POST['Foodprice']);
        $stmt->bindParam(':MenuID',$_POST['MenuID']);
        

        if($stmt->execute()):
            $message ='เพิ่มข้อมูลสำเร็จ';
            //header("Location:/business/selectCountry1.php");
        
        else:
            $message ='เพิ่มข้อมูลไม่สำเร็จ';
        endif;
        echo $message;
        $conn =null;

    }      
    ?>         
