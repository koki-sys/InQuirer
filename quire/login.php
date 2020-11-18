<?php require '../auth_header.php'; ?>
<div class="container bg-light border border-dark mt-5 shadow-lg" style="padding-bottom: 15%">
  <ul class="float-right" style="list-style: none;">
    <li><a href="home.php" class="text-dark float-right p-3 m-2">
        <span class="rounded-circle p-3" style="font-size: 3em;">x</span>
      </a><br>
    </li>
    <li><img src="../img/login.png" alt="login" class="float-right" width="70%" height="70%" style="margin-top: 15%; margin-right: 25%"></li>
  </ul>

  <div class="ml-5" style="margin-top: 8%">
    <h3>サインイン</h3>
    <label class="mt-2">新規ユーザの方</label>
    <a href="register.php">アカウントの作成</a>
    <form action="home.php" method="post">
      <div class="form-group mt-3">
        <div class="form-row">
          <div class="col-12 col-md-6">
            <input type="text" name="login" placeholder="ユーザ名、又はEメール" class="form-control"><br>
          </div>
          <div class="col-md-6"></div>
          <div class="col-12 col-md-6">
            <input type="password" name="password" placeholder="パスワード" class="form-control"><br>
          </div>
          <div class="col-md-6"></div>
          <div class="col-12 col-md-6">
            <button type="submit" class="pt-2 pb-2 bg-dark text-white btn-block">サインイン</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
<?php require '../footer.php'; ?>