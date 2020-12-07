<?php require '../../component/header/header.php'; ?>
<div class="container">
  <?php
  $name = $_POST['search'];
  require '../../component/pdo.php';
  $searchsql = $pdo->prepare('SELECT * FROM book WHERE name LIKE ?');
  $searchsql->execute(['%' . $name . '%']);
  ?>
  <?php if (($_POST['search']) != null) : ?>
    <h4>「<?php echo $_POST['search']; ?>」の検索結果</h4>
    <div class="row">
      <?php foreach ($searchsql as $search) : ?>
        <div class="col-md-6 col-lg-4 mt-5">
          <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="../../img/book_img/<?php echo $search['img']; ?>">
            </img>
            <div class="card-body">
              <h5 class="card-title"><?php echo $search['name']; ?></h5>
              <div class="row">
                <form action="../bookcart/add.php" method="post">
                  <input type="hidden" name="cartid" value="<?php echo $search['id']; ?>">
                  <input type="submit" class="btn btn-info mr-3 ml-3" value="ブックカートへ"></a>
                </form>
                <form action="../home/show.php" method="post">
                  <input type="hidden" name="showid" value="<?php echo $search['id']; ?>">
                  <input type="submit" class="text-primary btn-white btn" value="書籍詳細"></a>
                </form>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

  <?php else : ?>
    <h4>見つかりませんでした。</h4>
    <h6 class="mt-5">ヒント：</h6>
    <p class="mt-3">🔎日本の地方区分名で探してみる。</p>
    <p>🔎書籍名の中に含まれるキーワードで探してみる。</p>
  <?php endif; ?>
</div>
<?php require '../../component/footer/footer.php'; ?>