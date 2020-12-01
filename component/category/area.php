<?php
foreach ($sql as $row) {
  echo '<form action="area.php" method="post">';
  echo '<li class="list-group-item text-center" style="background-color: #fbfbfb;">';
  echo '<input type="hidden" name="areaid" value="', $row['id'], '">';
  echo '<input type="hidden" name="area" value="', $row['name'], '">';
  echo '<input type="submit" class="text-dark btn btn-white" value="', $row['name'],'">';
  echo '</li>';
  echo '</form>';
}
?>