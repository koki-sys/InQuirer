<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
      integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"
      crossorigin="anonymous"
    />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Kosugi+Maru&family=M+PLUS+Rounded+1c:wght@400;500&display=swap"
      rel="stylesheet"
    />
    <style>
      body {
        font-family: "Kosugi Maru", sans-serif;
      }
    </style>
    <link rel="shortcut icon" href="../favicon.ico" />
    <title>InQuirer 書籍貸出サイト</title>
  </head>
  <body style="background-color: #fbfbfb">
    <nav
      class="navbar navbar-expand-lg navbar-light mt-3 mr-5 ml-5"
      style="background-color: #fbfbfb"
    >
      <a href="home.php">
        <img src="../img/InQuirer.svg" alt="InQuirer" />
      </a>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto"></ul>
        <ul class="navbar-nav">
          <li class="nav-item mr-1">
            <a class="nav-link" href="home.php"
              >書籍一覧<span class="sr-only">(current)</span></a
            >
          </li>
          <li class="nav-item mr-1">
            <a class="nav-link" href="category.html">カテゴリ</a>
          </li>
          <li>
            <form class="form-inline my-2 my-lg-0">
              <input
                class="form-control mr-sm-2"
                type="search"
                placeholder="Search"
                aria-label="Search"
              />
              <button
                class="btn btn-outline-success my-2 my-sm-0"
                type="submit"
              >
                Search
              </button>
            </form>
          </li>
        </ul>
      </div>
    </nav>

    <nav
      class="navbar navbar-expand-lg mr-5 ml-5"
      style="background-color: #fbfbfb"
    >
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto"></ul>
        <ul class="navbar-nav w-25">
          <li class="nav-item mr-2 w-25">
            <a
              class="nav-link btn btn-outline-warning text-warning"
              href="home.php"
              >新規登録</a
            >
          </li>
          <li class="nav-item mr-2 w-25">
            <a class="nav-link btn btn-warning text-white" href="category.html"
              >ログイン</a
            >
          </li>
          <li class="nav-item w-50">
            <a class="nav-link btn btn-primary" href="">予約確定</a>
          </li>
        </ul>
      </div>
    </nav>

