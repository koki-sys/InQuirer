<!--formを入れる-->
<?php require 'header.php'; ?>
<div class="container mt-3">
  <div class="row">
    <div class="col-5">
      <ul class="list-group list-group-flush">
        <strong>
          <li class="text-center list-group-item" style="list-style: none; background-color: #fbfbfb;">ジャンル
          </li>
        </strong>
        <form action="genre.php" method="post">
          <?php
          require '../component/pdo.php';
          $sql = $pdo->query('SELECT * FROM category ORDER BY id asc');
          require '../component/genre.php';
          ?>
        </form>
      </ul>
    </div>
    <div class="col-2"></div>
    <div class="col-5">
      <ul class="list-group list-group-flush">
        <strong>
          <li class="text-center list-group-item" style="list-style: none; background-color: #fbfbfb;">地域</li>
        </strong>
          <?php
          require '../component/pdo.php';
          $sql = $pdo->query('SELECT * FROM area ORDER BY id asc');
          require '../component/area.php';
          ?>
        </form>
      </ul>
    </div>
  </div>
</div>
<?php require '../footer.php'; ?>