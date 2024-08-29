<?php require_once("helpers/db.php"); ?>

<?php
function createRes($conn) {
    $title = mysqli_real_escape_string($conn,$_POST["title"]);
    $time = mysqli_real_escape_string($conn,$_POST["time"]);
    $tel = mysqli_real_escape_string($conn,$_POST["tel"]);
    $detail = mysqli_real_escape_string($conn,$_POST["detail"]);
    // uploadimage
    $uploadfile = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "./images/" . $uploadfile;
    $sql = "INSERT INTO restaurants (title,time,tel,detail,image) VALUES ('$title','$time','$tel','$detail','$uploadfile');";
    $file = move_uploaded_file($tempname, $folder);
    return $result = mysqli_query($conn,$sql,$file);
    // var_dump($result);
}
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
        <?php if($_SERVER['REQUEST_METHOD'] == "POST"): ?>
            <?php $result = createRes($conn); ?>
            <?php if($result): ?>
                <div class="alert alert-primary" role="alert">บันทึกร้านอาหารเรียบร้อย</div>
                <p>
                    <a href="./">หน้าแรก</a>
                </p>
            <?php else: ?>
                <div class="alert alert-danger" role="alert">บันทึกร้านอาหารผิดพลาด</div>
                <?php echo $result ?>
                <p>
                    <a href="form.php">เพิ่มร้านอาหารใหม่</a>
                </p>

            <?php endif; ?>
        <?php else: ?>
            <form method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">ชื่อร้าน</label>
                    <input type="text" class="form-control" placeholder="ชื่อร้านอาหาร"  name="title">
                </div>

                <div class="mb-3">
                    <label class="form-label">เวลาเปิด-ปิด</label>
                    <input type="text" class="form-control"  name="time">
                </div>

                <div class="mb-3">
                    <label class="form-label">เบอร์โทร</label>
                    <input type="number" class="form-control"   name="tel">
                </div>

                <div class="mb-3">
                    <label class="form-label">ตำแหน่งร้าน</label>
                    <textarea class="form-control" name="detail"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">รูปภาพ</label>
                    <input type="file" class="form-control" name="uploadfile">
                </div>

                <button class="btn btn-primary">ส่งข้อมูล</button>
            </form>
        <?php endif; ?>



    </div>

    <?php require_once("components/footer.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>

<?php mysqli_close($conn); ?>