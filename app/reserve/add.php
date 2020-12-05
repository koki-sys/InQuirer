<?php require '../../component/header/header.php'; ?>
<?php require '../../component/pdo.php'; ?>
<?php if (isset($_SESSION['customer'])) : ?>
  <?php
  $reserve = $pdo->prepare('UPDATE rental SET rental_flg = 1 WHERE customer_id = ?');
  $reserve->execute([$_SESSION['customer']['id']]);
  ?>
  <div class="container mt-5 position-relative">
    <div class="row">
      <div class="col-lg-4">
        <h4 class="float-left">貸出予約が完了しました。</h4>
      </div>
      <div class="col-lg-2">
        <a href="../home/index.php" class="btn btn-outline-success btn-block">書籍一覧へ</a>
      </div>
    </div>
    <div class="row">
      
    </div>
  </div>
<?php else : ?>
  <?php header('Location: http://localhost/InQuirer/app/auth/login.php'); ?>
<?php endif; ?>
<?php require '../../component/footer/footer.php'; ?>