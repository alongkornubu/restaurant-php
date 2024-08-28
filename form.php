<?php
require_once("helpers/db.php");

$sql = "INSERT INTO restaurants (title,time,tel,detail) VALUES ('ร้านแม่นวย','07.00-16.00','087','ร้านนี้ใกล้วัดบ้านหนองหลัก');";
$result = mysqli_query($conn,$sql);
var_dump($result);

mysqli_close($conn);
?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ฟอร์ม</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"></head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>


    <?php require_once("components/navbar.php"); ?>
    <div class="container mt-5">
        <h1>ฟอร์มเพิ่มร้านอาหาร</h1>
        <form method="post">
            <div class="mb-3">
                <label class="form-label">ชื่อร้าน</label>
                <input type="text" class="form-control" placeholder="ชื่อร้านอาหาร"  name="restaurant">
            </div>

            <div class="mb-3">
                <label class="form-label">เวลาเปิด-ปิด</label>
                <input type="text" class="form-control" name="time">
            </div>

            <div class="mb-3">
                <label class="form-label">เบอร์โทร</label>
                <input type="number" class="form-control" name="tel">
            </div>

            <div class="mb-3">
                <label class="form-label">ตำแหน่งร้าน</label>
                <textarea class="form-control" name="detail"></textarea>
            </div>

            <button class="btn btn-primary">ส่งข้อมูล</button>
        </form>



    </div>

    <?php require_once("components/footer.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>