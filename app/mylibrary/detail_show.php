<?php require '../../component/header/header.php'; ?>
<?php require '../../component/pdo.php'; ?>
<?php
$date = htmlspecialchars($_POST['detail']) ?? '';
$backd = '';
$resv_show = $pdo->prepare('SELECT * FROM rental WHERE customer_id = ? AND reserve_date =? AND rental_flg=1');
$resv_show->execute([$_SESSION['customer']['id'], $date]);
$lib = $pdo->prepare('SELECT * FROM library WHERE id = ?');
?>
<div class="container mt-5">
  <a href="index.php">
    ＜＜ Myライブラリへ</a>
  <div class="row mt-5 ml-5">
    <div class="col-lg-3">
      <h4><?php echo $date; ?>予約分</h4>
    </div>
    <div class="col-lg-9">
      <p class="text-danger">
        予約IDをメモして、貸出時に司書にお伝えください
      </p>
    </div>
  </div>
  <?php foreach ($resv_show as $resv) : ?>
    <?php if ($backd != $resv['reserve_date']) : ?>
      <div class="row mt-5 ml-5">
        <div class="col-lg-3">
          <p>予約ID：</p>
        </div>
        <div class="col-lg-4">
          <p><?php echo $resv['random']; ?></p>
        </div>
        <div class="col-lg-5"></div>
      </div>
      <div class="row mt-4 ml-5">
        <div class="col-lg-3">
          <p>予約日時：</p>
        </div>
        <div class="col-lg-4">
          <p><?php echo $resv['reserve_date']; ?></p>
        </div>
        <div class="col-lg-5"></div>
      </div>
      <div class="row mt-4 ml-5">
        <div class="col-lg-3">
          <p>受取期限日：</p>
        </div>
        <div class="col-lg-4">
          <p><?php echo $resv['receipt_date']; ?></p>
        </div>
        <div class="col-lg-5"></div>
      </div>
      <div class="row mt-4 ml-5">
        <div class="col-lg-3">
          <p>受取図書館</p>
        </div>
        <div class="col-lg-4">
          <?php $lib->execute([$resv['receipt_library_id']]); ?>
          <?php foreach ($lib as $librow) : ?>
            <p><?php echo $librow['name']; ?></p>
          <?php endforeach; ?>
        </div>
        <div class="col-lg-5"></div>
      </div>
      <?php $backd = $resv['reserve_date']; ?>
    <?php endif; ?>
  <?php endforeach; ?>
</div>
<?php require '../../component/footer/footer.php'; ?>