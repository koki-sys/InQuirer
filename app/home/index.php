<?php require '../../component/php/header/header.php'; ?>
<?php require '../../component/php/pdo.php'; ?>
<?php $sql = $pdo->query('SELECT * FROM book'); ?>
<div class="container">
    <h4>書籍一覧</h4>
    <?php
    /* 本番環境でしか使えないのでコメント化(ipアドレスから位置情報を取得)
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
        <?php require '../../component/php/book/card.php'; ?>
    </div>
</div>
<?php require '../../component/php/footer/footer.php'; ?>