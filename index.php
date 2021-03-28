<?php
// エラーを表示する
ini_set( 'display_errors', 1 );

require_once 'function.php';

$pdo = connectDB();

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    // 画像を取得

    $sql = 'SELECT * FROM k_table ORDER BY created_at DESC';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $image = $stmt->fetchAll();


} else {
    // 画像を保存
    if (!empty($_FILES['image']['name'])) {
        $name = $_FILES['image']['name'];
        $type = $_FILES['image']['type'];
        $content = file_get_contents($_FILES['image']['tmp_name']);
        $size = $_FILES['image']['size'];

        $sql = 'INSERT INTO k_table(image_name, image_type, image_content, image_size, created_at)
                VALUES (:image_name, :image_type, :image_content, :image_size, now())';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':image_name', $name, PDO::PARAM_STR);
        $stmt->bindValue(':image_type', $type, PDO::PARAM_STR);
        $stmt->bindValue(':image_content', $content, PDO::PARAM_STR);
        $stmt->bindValue(':image_size', $size, PDO::PARAM_INT);
        $stmt->execute();
    }
    unset($pdo);
    header('Location:index.php');
    exit();
}

unset($pdo);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
<header>
    <div class="bg-image">
        <!-- BENTOの説明 -->
        <div class="content">
          <h1 class="inner">BENTO</h1>
          <div id="mean" style="display: none;">
            <p class="meaning">is</p>
            <p class="meaning">Japanese culture</p>
            <p class="meaning">For someone you love</p>
          </div>
        </div>
       </div>
</header>

<main>

    　　　<!-- 記録ボタン -->
    <!-- <div id="box1">
    <a id="btn1">
        <p id="record">RECORD</p>
    </a> -->
         <!-- フォーム表示 -->


         <!-- list.phpへデータを送る 画像の場合はenctypeをつける-->
<!-- <form method="POST" enctype="multipart/form-data">
　<div class="form-group">
        <label class="upload-label">
    　　　Select File
     　　<input type="file" name="upfile" id="upfile" accept="image/jpeg, image/png, image/gif" capture="camera">
    　　 </label>
　</div> -->
    <!-- <input type="text" name="text" id="text"> -->
    <!-- とりあえず保留→　　　<textarea id="textarea"></textarea> -->
    <!-- 　　　<button type="submit" id="save">SAVE</button> -->
<!-- </form> -->



            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>SELECT</label>
                    <br>
                    <input type="file" name="image" required>
                </div>
                <button type="submit" class="btn btn-primary">保存</button>
            </form>

<div id="logs">
        <?php for ($i = 0; $i < count($image); $i++): ?>
        <img src="image.php?id=<?= $image[$i]['image_id']; ?>">
        <?php endfor; ?>
</div>


        <!-- <div class="carousel-inner">
        <?php for ($i = 0; $i < count($image); $i++): ?>
                <div class="carousel-item <?php if ($i == 0) echo 'active'; ?>">
                <img src="image.php?id=<?= $image[$i]['image_id']; ?>" class="d-block w-100">
                </div>
            <?php endfor; ?>
        </div> -->

        <!-- <a class="carousel-control-prev" href="#lightbox" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#lightbox" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a> -->
      </div>
    </div>
  </div>
</div>
</main>
</html>