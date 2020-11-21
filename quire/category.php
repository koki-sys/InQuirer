<?php require 'header.php'; ?>
<div class="container mt-3">
  <div class="row">
    <div class="col-5">
      <ul class="list-group list-group-flush">
        <strong>
          <li class="text-center list-group-item" style="list-style: none; background-color: #fbfbfb;">ジャンル
          </li>
        </strong>
        <?php
        $pdo = new PDO('mysql:host=localhost;dbname=inquirer;charset=utf8', 'soraisu', 'sprwAeixb26vds');
        $sql = $pdo->query('select * from category');
        foreach ($sql as $row) {
          echo '<a class="text-center"><li class="list-group-item" style="background-color: #fbfbfb;">', $row['name'], '</li></a>';
        }
        ?>
      </ul>
    </div>
    <div class="col-2"></div>
    <div class="col-5">
      <ul class="list-group list-group-flush">
        <strong>
          <li class="text-center list-group-item" style="list-style: none; background-color: #fbfbfb;">地域</li>
        </strong>
        <?php
        $pdo = new PDO('mysql:host=localhost;dbname=inquirer;charset=utf8', 'soraisu', 'sprwAeixb26vds');
        $sql = $pdo->query('select * from area');
        foreach ($sql as $row) {
          echo '<a class="text-center"><li class="list-group-item" style="background-color: #fbfbfb;">', $row['name'], '</li></a>';
        }
        ?>
      </ul>
    </div>
  </div>
</div>
<?php require '../footer.php'; ?>