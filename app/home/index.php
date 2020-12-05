<?php require '../../component/header/header.php'; ?>
<div class="container">
  <h4>書籍一覧</h4>
  <?php

  /* 本番環境でしか使えないのでコメント化(ipから位置情報を取得)
  function grabIpInfo($ip)
  {
    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, "https://api.ipgeolocationapi.com/geolocate/" . $ip);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    $returnData = curl_exec($curl);
    curl_close($curl);
    return $returnData;
  }
  $ipInfo = grabIpInfo($_SERVER["REMOTE_ADDR"]);
  $ipJsonInfo = json_decode($ipInfo);

  echo $ipJsonInfo->name;
  */

  ?>
  <div class="row">
    <?php
    require '../../component/pdo.php';
    $sql = $pdo->query('SELECT * FROM book');
    ?>
    <?php foreach ($sql as $book) : ?>
      <div class="col-md-6 col-lg-4 mt-5">
        <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="../../img/book_img/<?php echo $book['img']; ?>">
          </img>
          <div class="card-body">
            <h5 class="card-title"><?php echo $book['name']; ?></h5>
            <a href="#" class="btn btn-info mr-3">ブックカートへ</a>
            <a href="#">書籍詳細へ</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
<?php require '../../component/footer/footer_content.php'; ?>