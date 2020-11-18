<!--ログインしたかどうかで表示するヘッダーを変える-->
<?php
session_start();

if (isset($_SESSION['user'])) {
  require '../logined_header.php';
} else {
  require '../nologin_header.php';
}
?>

<div class="container">
  <h4>現在地付近の書籍</h4>
  <div class="row">
    <div class="col-0 col-md-1 col-lg-0">
      <div class="col-md-5 col-lg-4">
        <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="#" width="100%">
          </img>
          <div class="card-body">
            <h5 class="card-title">bookTitle</h5>
            <a href="#" class="btn btn-info mr-3">ブックカートへ</a>
            <a href="#">書籍詳細へ</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php require '../footer.php'; ?>