<?php require '../../component/php/header/header.php'; ?>
<?php require '../../component/php/pdo.php'; ?>

<div class="container mt-5">
  <?php require '../../component/php/book/cmaxcnt.php'; ?>
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
    <?php require '../../component/php/book/bookcart.php'; ?>
  </div>
</div>
<?php require '../../component/php/footer/footer.php'; ?>