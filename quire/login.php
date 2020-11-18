<?php require '../auth_header.php'; ?>
<div class="container bg-light border border-dark mt-5" style="padding-bottom: 20%">
  <ul class="float-right" style="list-style: none;">
    <li><a href="home.php" class="text-dark float-right p-3 m-2">
        <span class="border border-dark rounded-circle p-3" style="font-size: 2em;">x</span>
      </a><br>
    </li>
    <li><img src="../img/login.png" alt="login" class="float-right" width="70%" height="70%" style="margin-top: 15%; margin-right: 25%"></li>
  </ul>

  <div class="ml-5 mt-5">
    <h3>サインイン</h3>
    <label class="mt-2">新規ユーザの方</label>
    <a href="register.php">アカウント作成</a>
    <form action="home.php" method="post">
      <div class="form-group mt-3">
        <input type="text" name="login" placeholder="ユーザ名、又はEメール" class="form-control" style="width: 40%;"><br>
        <input type="password" name="password" placeholder="パスワード" class="form-control" style="width: 40%;"><br>
      </div>
      <button type="submit" class="pt-2 pb-2 bg-dark text-white" style="width: 40%;">サインイン</button>
    </form>
  </div>
</div>
<?php require '../footer.php'; ?>