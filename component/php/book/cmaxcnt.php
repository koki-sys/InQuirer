<?php
$maxcnt = $pdo->prepare('SELECT count(*) as cnt FROM rental WHERE customer_id = ? AND rental_flg = 1');
$cartcnt = $pdo->prepare('SELECT count(*) as cnt FROM rental WHERE customer_id = ? AND rental_flg = 0');
$maxcnt->execute([$_SESSION['customer']['id']]);
$cartcnt->execute([$_SESSION['customer']['id']]);
$nowurl = (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$indexurl = "http://localhost/InQuirer/app/bookcart/index.php";
$addurl = "http://localhost/InQuirer/app/reserve/add.php";
?>
<?php foreach ($maxcnt as $mc) : ?>
  <?php foreach ($cartcnt as $cc) : ?>
    <?php if ($mc['cnt'] > 20) : ?>
      <h4 class="text-danger mt-5 ml-5">貸出上限を超えています。</h4>
      <h5 class="text-danger mt-2 ml-5">現在貸出冊数：<?php echo $mc['cnt']; ?></h5>
      <?php exit; ?>
    <?php elseif ($mc['cnt'] == 20) : ?>
      <p>貸出上限は20冊です</p>
    <?php elseif (($mc['cnt'] + $cc['cnt']) > 20) : ?>
      <h4 class="text-danger mt-5 ml-5">貸出上限を超えています。カートに入れ直してください。</h4>
      <?php exit; ?>
    <?php elseif ($cc['cnt'] == 0 && $nowurl == $addurl) : ?>
      <div class="col-lg-12 mt-5 ml-5">
        <h4 class="text-warning">予約できません！ブックカートの中身を確認して下さい。</h4>
      </div>
      <div class="col-lg-12 ml-5 mt-3">
        <h6 class="">ヒント：</h6>
      </div>
      <div class="col-lg-12 ml-5">
        <p class="ml-5">🛒書籍一覧から予約したい書籍をブックカートにいれる。</p>
      </div>
      <?php exit; ?>
    <?php elseif ($cc['cnt'] == 0 && $nowurl == $indexurl) : ?>
      <div class="col-lg-12 mt-5 ml-5">
        <h4 class="text-warning">ブックカートには何も入っていません！</h4>
      </div>
      <div class="col-lg-12 ml-5 mt-3">
        <h6 class="">ヒント：</h6>
      </div>
      <div class="col-lg-12 ml-5">
        <p class="ml-5">🛒書籍一覧から予約したい書籍をブックカートにいれる。</p>
      </div>
      <?php exit; ?>
    <?php endif; ?>
  <?php endforeach; ?>
<?php endforeach; ?>