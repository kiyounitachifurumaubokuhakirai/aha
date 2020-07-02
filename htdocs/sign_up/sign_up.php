<?PHP

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
    <div class="container mt-5">
        <form action="#" method="POST">
          <h2>sign up</h2>
          <p>登録することで、続きからプレイ出来ます</p>
          <div class="container mt-4">
            <div class="form-group row">
              <label for="name" class="col-sm-3 col-form-label">氏名またはニックネーム</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="name">
              </div>
            </div>
            <div class="form-group row">
              <label for="Password1" class="col-sm-3 col-form-label">パスワード</label>
              <div class="col-sm-9">
                <input type="password" class="form-control" id="Password1">
              </div>
            </div>
            <div class="form-group row">
              <label for="Password2" class="col-sm-3 col-form-label">パスワード（再入力）</label>
              <div class="col-sm-9">
                <input type="password" class="form-control" id="Password2">
              </div>
            </div>

            <div class="form-group row">
            <div class="col-sm-3">
                <button type="cancel" class="btn btn-secondary">キャンセルし、トップページへ</button>
              </div>
              <div class="col-sm-3">
                <button type="submit" class="btn btn-primary">登録</button>
              </div>
            </div>
          </div>
        </form>

    </div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>