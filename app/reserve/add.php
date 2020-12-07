<?php require '../../component/header/header.php'; ?>
<?php require '../../component/pdo.php'; ?>
<?php if (isset($_SESSION['customer'])) : ?>
  <?php
  $anum = mt_rand(100, 999);
  $bnum = mt_rand(100, 999);
  $cnum = mt_rand(100, 999);
  $rnum = $anum . $bnum . $cnum;
  ?>
  <?php require '../../component/book/rmaxcnt.php'; ?>
  <?php
  $reserve = $pdo->prepare('UPDATE rental SET random = ?, rental_flg = 1 WHERE customer_id = ?');
  $reserve->execute([$rnum, $_SESSION['customer']['id']]);

  $info = $pdo->prepare('SELECT * FROM rental WHERE random = ? AND customer_id = ? AND rental_flg = 1');
  $info->execute([$rnum, $_SESSION['customer']['id']]);
  ?>
  <?php foreach ($info as $row) : ?>


    }
    <?php
    $lib = $pdo->prepare('SELECT * FROM library WHERE id = ?');
    $lib->execute([$row['receipt_library_id']]);
    ?>
    <div class="container mt-5">
      <div class="row">
        <div class="col-lg-4">
          <h4 class="float-left">貸出予約が完了しました。</h4>
        </div>
        <div class="col-lg-2">
          <a href="../home/index.php" class="btn btn-outline-success btn-block">書籍一覧へ</a>
        </div>
      </div>
      <div class="row ml-1">
        <p class="text-danger mt-1">予約IDをメモして、貸出時に司書にお伝えください</p>
      </div>
      <div class="row mt-5">
        <div class="col-lg-3">
          <p>予約ID：</p>
        </div>
        <div class="col-lg-4">
          <p><?php echo $row['random']; ?></p>
        </div>
        <div class="col-lg-5"></div>
      </div>
      <div class="row mt-4">
        <div class="col-lg-3">
          <p>予約日時：</p>
        </div>
        <div class="col-lg-4">
          <p><?php echo $row['reserve_date']; ?></p>
        </div>
        <div class="col-lg-5"></div>
      </div>
      <div class="row mt-4">
        <div class="col-lg-3">
          <p>受取期限日：</p>
        </div>
        <div class="col-lg-4">
          <p><?php echo $row['receipt_date']; ?></p>
        </div>
        <div class="col-lg-5"></div>
      </div>
      <div class="row mt-4">
        <div class="col-lg-3">
          <p>受取図書館</p>
        </div>
        <div class="col-lg-4">
          <?php foreach ($lib as $librow) : ?>
            <p><?php echo $librow['name']; ?></p>
          <?php endforeach; ?>
        </div>
        <div class="col-lg-5"></div>
      </div>
    </div>
    <?php break; ?>
  <?php endforeach; ?>
<?php else : ?>
  <?php header('Location: http://localhost/InQuirer/app/auth/login.php'); ?>
<?php endif; ?>
<?php require '../../component/footer/footer.php'; ?>