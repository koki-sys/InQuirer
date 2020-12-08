<?php require '../../component/header/header.php'; ?>
<?php require '../../component/pdo.php'; ?>
<div class="container">
  <a href="index.php">
    ＜＜ Myライブラリへ</a>
  <h4 class="mt-5 ml-5">貸出明細一覧</h4>
  <?php require '../../component/book/rmaxcnt.php'; ?>
  <div class="row ml-5 mt-3">
    <?php
    $detail = $pdo->prepare('SELECT * FROM rental WHERE customer_id = ? AND rental_flg = 1');
    $detail->execute([$_SESSION['customer']['id']]);
    $backd = '';
    ?>
    <ul class="list-group list-group-flush ml-5">
      <strong>
        <?php foreach ($detail as $d) : ?>
          <?php if ($backd != $d['reserve_date']) : ?>
            <form action="detail_show.php" method="post">
              <li class="list-group-item text-center" style="background-color: #fbfbfb;">
                <input type="hidden" name="detail" value="<?php echo $d['reserve_date']; ?>">
                <?php $backd = $d['reserve_date']; ?>
                <input type="submit" class="text-dark btn btn-white" value="<?php echo $d['reserve_date']; ?>   予約分">
              </li>
            </form>

          <?php endif; ?>
        <?php endforeach; ?>
      </strong>
    </ul>

  </div>
</div>
<?php require '../../component/footer/footer.php'; ?>