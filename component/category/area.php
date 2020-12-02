<?php foreach ($sql as $row) :?>
  <form action="area.php" method="post">
  <li class="list-group-item text-center" style="background-color: #fbfbfb;">
  <input type="hidden" name="areaid" value="<?php echo $row['id']; ?>">
  <input type="hidden" name="area" value="<?php echo $row['name']; ?>">
  <input type="submit" class="text-dark btn btn-white" value="<?php echo $row['name']; ?>">
  </li>
  </form>
<?php endforeach; ?>