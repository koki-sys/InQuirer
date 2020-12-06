<?php require '../../component/header/header.php'; ?>
<?php require '../../component/pdo.php'; ?>
<div class="container mt-5">
  <div class="row">
    <div class="col-lg-2">
      <h4 class="float-left">ブックカート</h4>
    </div>
    <div class="col-lg-8">
      <p class="text-danger mt-1">予約はまだ完了していません!　右上の「予約確定」を押して、予約を完了させてください 。</p>
    </div>
  </div>
  <h6 class="mt-3">ブックカートに入っているもの</h6>
  <div class="row">
    <?php
    $index = $pdo->prepare('SELECT * FROM rental WHERE customer_id = ? AND rental_flg = 0');
    $index->execute([$_SESSION['customer']['id']]);
    foreach ($index as $rental2) {
      $bookimg = $pdo->prepare('SELECT * FROM book WHERE id = ?');
      $bookimg->execute([$rental2['book_id']]);
      foreach ($bookimg as $img) {
        echo '<div class="col-3 m-2">';
        echo '<img src="../../img/book_img/', $img['img'], '" alt="img" height="80%" width="auto">';
        echo '</div>';
      }
    }
    ?>
  </div>
</div>
<?php

?>
<?php require '../../component/footer/footer.php'; ?>