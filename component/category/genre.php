<?php
foreach ($sql as $row) {
  echo '<form action="genre.php" method="post">';
  echo '<li class="list-group-item text-center" style="background-color: #fbfbfb;">';
  echo '<input type="hidden" name="genreid" value="', $row['id'], '">';
  echo '<input type="hidden" name="genre" value="', $row['name'], '">';
  echo '<input type="submit" class="text-dark btn btn-white" value="', $row['name'],'">';
  echo '</li>';
  echo '</form>';
}
?>