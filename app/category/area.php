<!-- areaテーブルからとる -->
<!-- bookテーブルからとる -->
<?php require 'header.php'; ?>
<div class="container">
  <h4>地域：
    <?php
      echo $_POST['area'];
    ?>
  </h4>
  <?php

  /* 本番環境でしか使えない(ipから位置情報を取得)
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
    require '../component/pdo.php';
    $sql = $pdo->prepare('SELECT * FROM book WHERE area_id = ?');
    $sql->execute([$_POST['areaid']]);
    foreach ($sql as $book) {
      echo '<div class="col-md-5 col-lg-4 mt-5">';
      echo '<div class="card" style="width: 18rem;">';
      echo '<img class="card-img-top" src="../img/book_img/', $book['img'], '">';
      echo '</img>';
      echo '<div class="card-body">';
      echo '<h5 class="card-title">', $book['name'], '</h5>';
      echo '<a href="#" class="btn btn-info mr-3">ブックカートへ</a>';
      echo '<a href="#">書籍詳細へ</a>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
    }
    ?>

  </div>
</div>
<?php require '../footer_content.php'; ?>