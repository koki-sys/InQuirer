<?php
    $index = $pdo->prepare('SELECT * FROM rental WHERE customer_id = ? AND rental_flg = 0');
    $index->execute([$_SESSION['customer']['id']]);
    foreach ($index as $rental2) {
      $bookimg = $pdo->prepare('SELECT * FROM book WHERE id = ?');
      $bookimg->execute([$rental2['book_id']]);
      foreach ($bookimg as $img) {
        echo '<div class="col-3 m-2">';
        echo '<img src="../../img/book_img/', $img['img'], '" alt="img" height="80%" width="auto">';
        echo '</div>';
      }
    }
?>