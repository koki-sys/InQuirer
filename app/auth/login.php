<?php require '../../component/php/header/auth_header.php'; ?>
<div class="container bg-light border border-dark mt-5 shadow-lg" style="padding-bottom: 15%">
    <ul class="float-right" style="list-style: none;">
        <li><a href="../home/index.php" class="text-dark float-right p-3 m-2">
                <span class="rounded-circle p-3" style="font-size: 3em;">x</span>
            </a><br>
        </li>
    </ul>

    <div style="margin-top: 8%">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-6">
                <h3>サインイン</h3>
                <label class="mt-2">新規ユーザの方</label>
                <a href="register.php">アカウントの作成</a>
            </div>
            <div class="col-md-5"></div>
        </div>
        <form action="../home/index.php" method="post">
            <div class="form-group mt-5">
                <div class="col-12 col-md-6 float-right">
                    <img src="../../img/login.png" alt="login" class="mx-auto d-block" width="60%" height="60%">
                </div>
                <div class="col-12 col-md-6">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-10">
                            <input type="text" name="name" placeholder="ユーザ名を入力" class="form-control"><br>
                            <input type="password" name="password" placeholder="パスワード" class="form-control"><br>
                            <input type="submit" value="サインイン" class="pt-2 pb-2 bg-dark text-white btn-block">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php require '../../component/php/footer/footer.php'; ?>