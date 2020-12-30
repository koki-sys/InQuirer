<?php
$maxcnt = $pdo->prepare('SELECT count(*) as cnt FROM rental WHERE customer_id = ? AND rental_flg = 1');
$maxcnt->execute([$_SESSION['customer']['id']]);
?>
<?php foreach ($maxcnt as $mc) : ?>
    <?php if ($mc['cnt'] > 20) : ?>
        <h4 class="text-danger mt-5 ml-5">貸出上限を超えています。</h4>
        <h5 class="text-danger mt-2 ml-5">現在貸出冊数：<?php echo $mc['cnt']; ?></h5>
        <?php exit; ?>
    <?php elseif ($mc['cnt'] == 0) : ?>
        <h5 class="mt-5 text-center">予約した書籍はありません。</h5>
    <?php endif; ?>
<?php endforeach; ?>