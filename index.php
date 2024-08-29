<?php require_once("helpers/db.php") ?>
<?php
function getRes($conn) {
    $sql = "SELECT * FROM restaurants ";
            if (isset($_GET["search"])) {
                $search = mysqli_real_escape_string($conn, $_GET["search"]);
                $sql .= "WHERE title LIKE '%$search%' ";
            }
            $sql .= "ORDER BY id DESC;";
            $result = mysqli_query($conn, $sql);
            return $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
}


$searchTitle = "";
$searchValue = "";
if (isset($_GET["search"])) {
    $searchTitle = "ค้นหา \"$_GET[search]\" | ";
    $searchValue = $_GET["search"];
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $searchTitle ?> Restaurant </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"></head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" type="text/css" href="./static/style.css">
<body>

  <?php require_once("components/navbar.php"); ?>

<main>
  <section class="py-5 text-center container">
    <div class="col-md-5 mx-auto">
        <?php $rows = getRes($conn); ?>
        <form>
          <div class="input-group rounded">
            <input type="search" class="form-control rounded" placeholder="ร้านอาหาร" name="search" value="<?php echo $searchValue; ?>">
            <button class="btn btn-primary">
              <i class="bi bi-search"></i>
            </button>
          </div>
        </form>
    </div>
  </section>
  <div class="album py-5 bg-light">
    <div class="container">
      <p>จำนวนร้าน <?php echo count($rows)?> รายการ</p>

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php foreach ($rows as $row): ?>
            <div class="col">
              <div class="card shadow-sm">
                <img src="./images/<?php echo $row['image'] ?>" class="bd-placeholder-img card-img-top" width="100%" height="230">

                <div class="card-body">
                  <p class="card-text"><i class="bi bi-shop"></i> <?php echo $row["title"] ?></p>
                  <p class="card-text"><i class="bi bi-clock-fill"></i> <?php echo $row["time"] ?></p>
                  <p class="card-text"><i class="bi bi-telephone-fill"></i> <?php echo $row["tel"] ?></p>
                  <p class="card-text"><?php echo $row["detail"] ?></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div>
                </div>
              </div>
            </div>
        <?php endforeach; ?>

  </div>
</main>


    <?php require_once("components/footer.php"); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<?php mysqli_close($conn); ?>