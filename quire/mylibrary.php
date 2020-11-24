<?php require 'header.php'; ?>
<div class="container" style="margin-top: 7%;">
  <div class="row">
    <div class="col-2"></div>
    <div class="col-3">
      <a href="book-index.php" class="text-dark" style="text-decoration: none;">
        <div class="card shadow">
          <img src="../img/book.svg" alt="貸出書籍一覧" width="256" height="128">
          <div class="card-body">
            <h5 class="card-title">貸出書籍一覧</h5>
            <p class="card-text">現在貸出した書籍を確認できます。</p>
          </div>
        </div>
      </a>
    </div>
    <div class="col-2"></div>
    <div class="col-3">
      <a href="receipt.php" class="text-dark" style="text-decoration: none;">
        <div class="card shadow">
          <img src="../img/receipt.svg" alt="貸出予約明細">
          <div class="card-body">
            <h5 class="card-title">貸出予約明細</h5>
            <p class="card-text">貸出予約した予約IDなどの確認ができます。</p>
          </div>
        </div>
      </a>
    </div>
    <div class="col-2"></div>
  </div>
</div>
<?php require '../footer.php'; ?>