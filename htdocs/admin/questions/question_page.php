<?PHP
  session_start();
  session_regenerate_id(TRUE);
?>

<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign up</title>

    <!-- CSSを読み込む -->
    <link rel="stylesheet" href="stylesheet.css">
    <!-- jQueryのライブラリを読み込む -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- bootstrapのライブラリーを読み込む -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
  <!-- jumbotron -->
  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <p class="lead">このページでは、AHA問題の作成・修正・削除を行います</p>
    </div>
  </div>

  <!-- nav -->
  <ul class="nav justify-content-end">
    <li class="nav-item">
        <a class="nav-link" href="../../../index.php">TOP</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="../../../players/players_page.php">playerの管理ページ</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="../admin_page.php">管理者ページ</a>
    </li>
</ul>

  <div class="container mt-3">
    <h2>問題作成</h2>
    <a href="register/register.php">こちら</a>から
  </div>

  <div class="container mt-3">
    <h2>問題修正</h2>
    <a href="edit/edit.php">こちら</a>から
  </div>

  <div class="container mt-3">
    <h2>問題削除</h2>
    <a href="delete/delete.php">こちら</a>から
  </div>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>