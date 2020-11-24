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
    $notice = $_SESSION['user']['name'];
    echo <<< EOM
    <script>
      var name = <?php $notice ?>;
      alert("ようこそ" + name + "さん");
    </script>
    EOM;
  } else {
    require '../nologin_header.php';
    echo <<< EOM
    <script>
      alert("ログインして”);
    </script>
    EOM;
  }
}

session_start();
$referer = $_SERVER['HTTP_REFERER'] ?? '';
if ($referer == "http://localhost/InQuirer/quire/login.php" && isset($_POST['name'], $_POST['password'])) {
  // ログイン処理
  unset($_SESSION['user']);
  $pdo = new PDO('mysql:host=localhost;dbname=inquirer;charset=utf8', 'soraisu', 'sprwAeixb26vds');
  $sql = $pdo->prepare('select * from user where name=? and password=?');
  $sql->execute([$_POST['name'], $_POST['password']]);
  foreach ($sql as $row) {
    $_SESSION['user'] = [
      'id' => $row['id'],
      'name' => $row['name'],
      'email' => $row['email'],
      'password' => $row['password']
    ];
  }
  header_notice();
} elseif ($referer == "http://localhost/InQuirer/quire/register.php" && isset($_POST['name'], $_POST['email'], $_POST['password'])) {
  // 新規登録処理
  $pdo = new PDO('mysql:host=localhost;dbname=inquirer;charset=utf8', 'soraisu', 'sprwAeixb26vds');

  if (isset($_SESSION['user'])) {
    $id = $_SESSION['user']['id'];
    $sql = $pdo->prepare('select * from user where id=? and name=?');
    $sql->execute([$id, $_POST['name']]);
  } else {
    $sql = $pdo->prepare('select * from user where name=?');
    $sql->execute([$_POST['name']]);
  }

  if (empty($sql->fetchAll())) {
    if (isset($_SESSION['user'])) {
      $sql = $pdo->prepare('update user set name=?, email=?, password=? where id=?');
      $sql->execute([
        $_POST['name'],
        $_POST['email'],
        $_POST['password'],
        $id
      ]);
      $_SESSION['user'] = [
        'id' => $id,
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'password' => $_POST['password']
      ];
      echo '更新しました。';
      header_notice();
    } else {
      $sql = $pdo->prepare('insert into user values(null,?,?,?)');
      $sql->execute([
        $_POST['name'],
        $_POST['email'],
        $_POST['password']
      ]);
      $login = $pdo->prepare('select * from user where name=? and password=?');
      $login->execute([
        $_POST['name'],
        $_POST['password']
      ]);
      foreach ($login as $row) {
        $_SESSION['user'] = [
          'id' => $row['id'],
          'name' => $row['name'],
          'email' => $row['email'],
          'password' => $row['password']
        ];
      }
      echo '登録しました。';
      header_notice();
    }
  } else {
    echo 'ログイン名が既に使用されていますので、変更してください。';
  }
} else {
  header_notice();
}
?>