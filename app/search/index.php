<?php require '../../component/header/header.php'; ?>
<div class="container">
  <?php if (($_POST['search']) != null) : ?>
    <h4><?php echo $_POST['search']; ?>の検索結果</h4>
  <?php else : ?>
    <h4>見つかりませんでした。</h4>
    <h6 class="mt-5">ヒント：</h6>
    <p class="mt-3">🔎日本の地方区分名で探してみる。</p>
    <p>🔎書籍名の中に含まれるキーワードで探してみる。</p>
  <?php endif; ?>
</div>
<?php require '../../component/footer/footer_content.php'; ?>