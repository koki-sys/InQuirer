<?php require '../../component/php/header/header.php'; ?>
<?php require '../../component/php/pdo.php'; ?>
<div class="container">
  <h4>Myライブラリ</h4>
  <div class="row mt-3">
    <div class="col-lg-2"></div>
    <div class="col-md-6 col-lg-3 mt-5">
      <a href="book.php" class="text-dark">
        <div class="card shadow-sm" style="width: 18rem;">
          <img class="card-img-top" src="../../img/book.svg">
          </img>
          <div class="card-body">
            <h5 class="card-title">貸出書籍一覧</h5>
            <p class="card-text">
              現在貸出した書籍を確認できます。
            </p>
          </div>
        </div>
      </a>
    </div>
    <div class="col-lg-2"></div>
    <div class="col-md-6 col-lg-3 mt-5">
      <a href="detail.php" class="text-dark">
        <div class="card shadow-sm" style="width: 18rem;">
          <img class="card-img-top" src="../../img/receipt.svg">
          </img>
          <div class="card-body">
            <h5 class="card-title">貸出予約明細</h5>
            <p class="card-text">
              貸出予約した予約IDなどの確認ができます。
            </p>
          </div>
        </div>
      </a>
    </div>
    <div class="col-lg-2"></div>
  </div>
</div>
<?php require '../../component/php/footer/footer.php'; ?>