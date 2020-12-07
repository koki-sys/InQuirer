<?php
$index = $pdo->prepare('SELECT * FROM rental WHERE customer_id = ? AND rental_flg = 0');
$cnt = $pdo->prepare('SELECT count(*) as cnt FROM rental WHERE customer_id = ? AND rental_flg = 0');
$index->execute([$_SESSION['customer']['id']]);
$cnt->execute([$_SESSION['customer']['id']]);
?>
<?php foreach ($cnt as $c) : ?>
  <?php if ($c['cnt'] == 0) : ?>
    <div class="col-lg-12 mt-5 ml-5">
      <h4 class="text-warning">カートに何も入っていません!</h4>
    </div>
    <div class="col-lg-12 ml-5 mt-3">
      <h6 class="">ヒント：</h6>
    </div>
    <div class="col-lg-12 ml-5">
      <p class="ml-5">🛒書籍一覧から予約したい書籍をブックカートにいれる。</p>
    </div>
    <?php break; ?>
  <?php endif; ?>
  <?php foreach ($index as $rental2) : ?>

    <?php
    $bookimg = $pdo->prepare('SELECT * FROM book WHERE id = ?');
    $bookimg->execute([$rental2['book_id']]);
    ?>

    <?php foreach ($bookimg as $img) : ?>
      <div class="col-3 m-2">
        <img src="../../img/book_img/<?php echo $img['img']; ?>" alt="img" height="80%" width="auto">
      </div>
    <?php endforeach; ?>

  <?php endforeach; ?>
<?php endforeach; ?>