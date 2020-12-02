<?php session_start(); ?>
<?php require '../../component/header/auth_header.php'; ?>
<div class="container bg-light border border-dark mt-5 shadow-lg" style="padding-bottom: 11%">
  <ul class="float-right" style="list-style: none;">
    <li>
      <a href="../home/index.php" class="text-dark float-right p-3 m-2">
        <span class="rounded-circle p-3" style="font-size: 3em;">x</span>
      </a><br>
    </li>
  </ul>

  <div style="margin-top: 8%;">
    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-6">
        <h3>アカウントの作成</h3>
        <label class="mt-2">アカウントをお持ちの方</label>
        <a href="login.php">サインイン</a>
      </div>
      <div class="col-md-5"></div>
    </div>
    <form action="../home/index.php" method="post">
      <div class="form-group mt-5">
        <?php
        $name = $email = $password = '';
        if (isset($_SESSION['user'])) {
          $name = $_SESSION['user']['name'];
          $email = $_SESSION['user']['email'];
          $password = $_SESSION['user']['password'];
        }
        ?>
        <div class="col-12 col-md-6 float-right">
          <img src="../../img/register.png" alt="login" class="mx-auto d-block" width="60%" height="60%">
        </div>
        <div class="col-12 col-md-6">
          <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-10">
              <input type="text" name="name" placeholder="ユーザ名" class="form-control"><br>
              <input type="text" name="email" placeholder="Eメール" class="form-control"><br>
              <input type="password" name="password" placeholder="パスワード" class="form-control"><br>
              <input type="submit" value="サインアップ" class="pt-2 pb-2 bg-dark text-white btn-block">
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
<?php require '../../component/footer/footer.php'; ?>