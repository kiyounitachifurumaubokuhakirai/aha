<?PHP

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
 <!-- Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>
<body>
    <!-- jumbotron -->
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h2 class="display-5">問題作成</h2>
            <p class="lead">このページの項目を登録すると問題が作成できます</p>
        </div>
    </div>

    <!-- nav -->
    <div class="mt-3">
    <ul class="nav justify-content-end">
        <li class="nav-item">
            <a class="nav-link active" href="#">TOP</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="sign_in/sign_in.php">sign in</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="sign_up/sign_up.php">sign up</a>
        </li>
    </ul>
</div>


<!-- FORM -->
    <div class="container my-5">
    <form>
        <div class="form-group row">
            <!-- 難易度 -->
            <label for="difficulty" class="col-sm-4 col-form-label">難易度</label>
            <div class="col-sm-5">
                <select class="form-control" id="difficulty">
                    <option value=1>easy</option>
                    <option value=2>normal</option>
                    <option value=3>hard</option>
                </select>
            </div>
        </div> 
        <!-- 画像の登録 -->
        <div class="form-group row">
            <label for="before" class="col-sm-4 col-form-label">変更前の画像 <span class="badge badge-warning">画像サイズ：980×600 pngファイル</span></label>
            <div class="col-sm-6">
                <input type="file" class="form-control-file" id="before">
            </div>
        </div>
        <div class="form-group row">
            <label for="after" class="col-sm-4 col-form-label">変更後の画像 <span class="badge badge-warning">画像サイズ：980×600 pngファイル</span></label>
            <div class="col-sm-6">
                <input type="file" class="form-control-file" id="after">
            </div>
        </div>
        <div class="form-group row">
            <label for="answer" class="col-sm-4 col-form-label">答えの画像 <span class="badge badge-warning">画像サイズ：980×600 pngファイル</span></label>
            <div class="col-sm-6">
                <input type="file" class="form-control-file" id="answer">
            </div>
        </div>
        <div class="form-group row">
            <label for="explanation" class="col-sm-4 col-form-label">答えの解説 <span class="badge badge-warning">画像サイズ：980×600 pngファイル</span></label>
            <div class="col-sm-6">
                <textarea class="form-control" id="explanation" row="5"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-2">
                <button type="cancel" class="btn btn-secondary">破棄してTOPへ</button>
            </div>
            <div class="col-sm-2">
                <button type="submit" class="btn btn-primary">登録</button>
            </div>
        </form>
    </div>
    
</body>
</html>