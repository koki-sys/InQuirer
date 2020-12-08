<!-- bookテーブルからとる -->
<?php require '../../component/php/header/header.php'; ?>
<div class="container">
  <h4>ジャンル：
    <?php
    echo htmlspecialchars($_POST['genre']);
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
    require '../../component/php/pdo.php';
    $sql = $pdo->prepare('SELECT * FROM book WHERE category_id = ?');
    $sql->execute([htmlspecialchars($_POST['genreid'])]);
    ?>
    <?php require '../../component/php/book/card.php'; ?>
  </div>
</div>
<?php require '../../component/php/footer/footer.php'; ?>