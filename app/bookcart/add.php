<?php require '../../component/header/header.php'; ?>
<?php require '../../component/pdo.php'; ?>
<?php
date_default_timezone_set('Asia/Tokyo');
$nowdate = date("Y/m/d");
$recdate = date("Y/m/d", strtotime("+2 day"));
$cartid = $_POST['cartid'] ?? '';
?>
<?php if (isset($_SESSION['customer']) && $cartid != null) : ?>
  <?php
  $booksql = $pdo->prepare('SELECT * FROM book WHERE id = ?');
  $booksql->execute([$cartid]);
  foreach ($booksql as $book) {
    $cartsql = $pdo->prepare('INSERT INTO rental VALUES(null, ?,0,?,?,0,?,?)');
    $cartsql->execute([$_SESSION['customer']['id'], $nowdate, $recdate, $book['library_id'], $book['id']]);
  }
  ?>
  <div class="container mt-5 position-relative">
    <div class="row">
      <div class="col-lg-4">
        <h4 class="float-left">ブックカートに追加しました。</h4>
      </div>
      <div class="col-lg-8">
        <div class="row">
          <div class="col-lg-3">
            <a href="../home/index.php" class="btn btn-outline-success btn-block">書籍一覧へ</a>
          </div>
          <div class="col-lg-3">
            <a href="../reserve/add.php" class="btn btn-primary btn-block">予約確定</a>
          </div>
          <div class="col-lg-6"></div>
        </div>
      </div>
    </div>
    <h6 class="mt-3">ブックカートに入っているもの</h6>
    <div class="row">
      <?php require '../../component/book/bookcart.php'; ?>
    </div>
  </div>

<?php else : ?>
  <?php header('Location: http://localhost/InQuirer/app/auth/login.php'); ?>
<?php endif; ?>
<?php require '../../component/footer/footer.php'; ?>