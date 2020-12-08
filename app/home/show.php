<?php require '../../component/php/header/header.php'; ?>
<?php require '../../component/php/pdo.php'; ?>
<?php
$showid = htmlspecialchars($_POST['showid']);
$show = $pdo->prepare('SELECT * FROM book WHERE id = ?');
$sgen = $pdo->prepare('SELECT * FROM category WHERE id = ?');
$slib = $pdo->prepare('SELECT * FROM library WHERE id = ?');
$show->execute([$showid]);
?>
<div class="container mt-5">
  <?php foreach ($show as $s) : ?>
    <div class="row">
      <div class="col-lg-4">
        <h4 class="float-left"><?php echo $s['name']; ?></h4>
      </div>
      <div class="col-lg-8">
        <form action="../bookcart/add.php" method="post">
          <input type="hidden" name="cartid" value="<?php echo $s['id']; ?>">
          <input type="submit" class="btn btn-info mr-3 ml-3" value="ブックカートへ"></a>
        </form>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4 mt-5">
        <img src="../../img/book_img/<?php echo $s['img']; ?>" alt="img">
      </div>
      <div class="col-lg-6 mt-5">
        <div class="row">
          <h5>作者：</h5><br>
          <p class="ml-3"><?php echo $s['author']; ?></p>
        </div>
        <div class="row mt-3">
          <h5>出版社：</h5><br>
          <p class="ml-3"><?php echo $s['publisher']; ?></p>
        </div>
        <?php $sgen->execute([$s['category_id']]); ?>
        <?php foreach ($sgen as $gen) : ?>
          <div class="row mt-3">
            <h5>ジャンル：</h5>
            <p class="ml-3"><?php echo $gen['name']; ?></p>
          </div>
        <?php endforeach; ?>
        <div class="row mt-3">
          <h5>ISBN：</h5><br>
          <p class="ml-3"><?php echo $s['isbn']; ?></p>
        </div>
        <?php $slib->execute([$s['library_id']]); ?>
        <?php foreach ($slib as $lib) : ?>
          <div class="row mt-3">
            <h5>在庫のある図書館：</h5><br>
            <p class="ml-3"><?php echo $lib['name']; ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  <?php endforeach; ?>
</div>
<?php require '../../component/php/footer/footer.php'; ?>