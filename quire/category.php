<!--ログインしたかどうかで表示するヘッダーを変える-->
<!--
  urlに操作を変える
  http://localhost/InQuirer/Quire/login.php
  http://localhost/InQuirer/Quire/register.php
  の二つ
-->
<?php
// ログインしたかどうかによって表示するヘッダーを変える
function header_notice()
{
  if (isset($_SESSION['user'])) {
    require '../logined_header.php';
    echo <<<EOM
    <script>
      var name = "<?php echo $_SESSION[user][email]; ?>";
      alert("ようこそ" + name + "さん")
    </script>
    EOM;
  } else {
    require '../nologin_header.php';
    echo <<<EOM
    <script>
      alert("ログインして”);
    </script>
    EOM;
  }
}

session_start();
$referer = $_SERVER['HTTP_REFERER'] ?? '';
if ($referer == "http://localhost/InQuirer/Quire/login.php" || $referer == "http://localhost/InQuirer/Quire/register.php") {
  // ログイン処理
  unset($_SESSION['user']);
  $pdo = new PDO('mysql:host=localhost;dbname=inquirer;charset=utf8', 'soraisu', 'sprwAeixb26vds');
  $sql = $pdo->prepare('select * from user where email=? and password=?');
  foreach ($sql as $row) {
    $_SESSION['user'] = [
      'id' => $row['id'],
      'email' => $row['email'],
      'password' => $row['password']
    ];
  }
  header_notice();
} else {
  header_notice();
}
?>

<div class="container">
  
</div>
<?php require '../footer.php'; ?>