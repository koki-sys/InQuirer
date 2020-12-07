<?php
$maxcnt = $pdo->prepare('SELECT count(*) as cnt FROM rental WHERE customer_id = ? AND rental_flg = 1');
$cartcnt = $pdo->prepare('SELECT count(*) as cnt FROM rental WHERE customer_id = ? AND rental_flg = 0');
$maxcnt->execute([$_SESSION['customer']['id']]);
$cartcnt->execute([$_SESSION['customer']['id']]);
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
    <?php endif; ?>
  <?php endforeach; ?>
<?php endforeach; ?>