<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>สุธิดา นาสีแสน(บุ๊กบิ๊ก)</title>
</head>

<body>
<h1>ข้อมูลจังหวัด -- สุธิดา นาสีแสน(บุ๊กบิ๊ก)</h1>

<form method="post" action="">
    ชื่อภาค <input type="text" name="rname" autofocus required>
    <button type="submit" name="Submit">บันทึก</button>
    </form>

    <br>
    <br>

    <?php
    if(isset($_POST['Submit'])){
        include_once("connectdb.php");
        $rname = $_POST['rname'];
        $sql2 = "INSERT INTO regions VALUES (NULL, '{$rname}')";
        mysqli_query($conn, $sql2) or die ("insert ไม่ได้");
    }
    
    ?>

    <table border="1">
    <tr>
        <th>รหัสภาค</th>
        <th>ชื่อภาค</th>
        <th>ลบ</th>
    </tr>

    <?php
    include_once("connectdb.php");
    $sql = "SELECT * FROM regions ORDER BY r_id ASC";
    $rs = mysqli_query($conn, $sql);

    while($data = mysqli_fetch_array($rs)){
    ?>
    <tr>
        <td><?php echo $data['r_id'];?></td>
        <td><?php echo $data['r_name'];?></td>
        <th width="50" align="center"><a href="delete_region.php?id=<?php echo $data['r_id'];?>"onClick="return confirm('ยืนยันการลบ?')"><img src="images/del.png" width="20"></th>
    </tr>
    <?php } ?>
    </table>

</body>
</html>