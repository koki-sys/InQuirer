<?php require 'header.php'; ?>
<div class="container">
  <h4>現在地付近の書籍</h4>
  <?php

  /* 本番環境でしか使えない
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