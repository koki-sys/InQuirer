# 書籍予約サイト InQuirer
![InQuirer](img/InQuirer.svg)
## InQuirerについて
このWebサイトは全国の書籍を探し、（擬似的に）貸出することができるものです。
※実際に貸し出すことはできません。

## 機能一覧
* 予約機能
* ブックカート機能（カート機能）
* 検索機能
* 認証機能
* Myライブラリ機能（予約明細、予約書籍）

## GitHubからコードをダウンロードして開発する場合
1.任意のディレクトリにクローンする
* Git（HTTPS）：`git clone https://github.com/koki-sys/InQuirer.git`
* Git（SSL）：`git clone git@github.com:koki-sys/InQuirer.git`
* GitHubCLI：`gh repo clone koki-sys/InQuirer`

2.phpmyadminのSQL欄に`Database/InQuirer.sql`のコード全行をコピペ、実行

3.２と同じように`Database/Data.sql`の全行をコピペ、実行

4.`component/php/component.php`を開き
その中にあるコードを`app/[folder]/[file].php`内に埋め込み、開発を進めてください。

*サンプルデータ、SQLも入っています。

## バージョン
v1.0 ```InQuirerを完成させました。```

## お問い合わせ
追加してほしい機能、不具合などに関しましては以下の連絡先にお問い合わせください。<br>
メールアドレス: soraisu7@gmail.com
