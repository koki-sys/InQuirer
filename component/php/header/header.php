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
    if (isset($_SESSION['customer'])) {
        require 'logined_header.php';
        $notice = $_SESSION['customer']['name'];
        echo <<< EOM
    <script>
      var name = <?php $notice ?>;
      alert("ようこそ" + name + "さん");
    </script>
    EOM;
    } else {
        require 'nologin_header.php';
        echo <<< EOM
    <script>
      alert("ログインして”);
    </script>
    EOM;
    }
}

session_start();
$referer = $_SERVER['HTTP_REFERER'] ?? '';
if ($referer == "http://localhost/InQuirer/app/auth/login.php" && isset($_POST['name'], $_POST['password'])) {
    // ログイン処理
    unset($_SESSION['customer']);
    $pdo = new PDO('mysql:host=localhost;dbname=inquirer;charset=utf8', 'soraisu', 'sprwAeixb26vds');
    $sql = $pdo->prepare('select * from customer where name=? and password=?');
    $sql->execute([
        htmlspecialchars($_POST['name']),
        htmlspecialchars($_POST['password'])
    ]);
    foreach ($sql as $row) {
        $_SESSION['customer'] = [
            'id' => $row['id'],
            'name' => $row['name'],
            'email' => $row['email'],
            'password' => $row['password']
        ];
    }
    header_notice();
} elseif ($referer == "http://localhost/InQuirer/app/auth/register.php" && isset($_POST['name'], $_POST['email'], $_POST['password'])) {
    // 新規登録処理
    $pdo = new PDO('mysql:host=localhost;dbname=inquirer;charset=utf8', 'soraisu', 'sprwAeixb26vds');

    if (isset($_SESSION['customer'])) {
        $id = $_SESSION['customer']['id'];
        $sql = $pdo->prepare('select * from customer where id=? and name=?');
        $sql->execute([$id, htmlspecialchars($_POST['name'])]);
    } else {
        $sql = $pdo->prepare('select * from customer where name=?');
        $sql->execute([htmlspecialchars($_POST['name'])]);
    }

    if (empty($sql->fetchAll())) {
        if (isset($_SESSION['customer'])) {
            $sql = $pdo->prepare('update customer set name=?, email=?, password=? where id=?');
            $sql->execute([
                htmlspecialchars($_POST['name']),
                htmlspecialchars($_POST['email']),
                htmlspecialchars($_POST['password']),
                $id
            ]);
            $_SESSION['customer'] = [
                'id' => $id,
                'name' => htmlspecialchars($_POST['name']),
                'email' => htmlspecialchars($_POST['email']),
                'password' => htmlspecialchars($_POST['password'])
            ];
            echo '更新しました。';
            header_notice();
        } else {
            $sql = $pdo->prepare('insert into customer values(null,?,?,?)');
            $sql->execute([
                htmlspecialchars($_POST['name']),
                htmlspecialchars($_POST['email']),
                htmlspecialchars($_POST['password'])
            ]);
            $login = $pdo->prepare('select * from customer where name=? and password=?');
            $login->execute([
                htmlspecialchars($_POST['name']),
                htmlspecialchars($_POST['password'])
            ]);
            foreach ($login as $row) {
                $_SESSION['customer'] = [
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
        header_notice();
    }
} else {
    header_notice();
}
?>