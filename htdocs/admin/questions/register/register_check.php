<?PHP
    session_start();
    session_regenerate_id(TRUE);

    require_once('../../../common/define.php');
    require_once('../../../common/sql_questions.php');

    //$_SESSION リセット
    if (isset($_SESSION['err']) && $_SESSION['err'])  unset($_SESSION['err']);
    if (isset($_SESSION['question']) && $_SESSION['question'])  unset($_SESSION['question']);

    $_SESSION['question'] = sanitize($_POST);

    /** validity check
     * タイトル
     * 画像×3枚
     * 答えの補足解説
     */
    $validity = TRUE;
    // タイトル
    if (($_SESSION['question']['title'] == "") || (strlen($_SESSION['question']['title']) > 20))
    {
        $validity = FALSE;
        $_SESSION['err']['question']['title'] = 'タイトルは1文字以上20文字以内で設定してください';
    } elseif (ctype_space($_SESSION['question']['title']) == true)
    {
        $validity = FALSE;
        $_SESSION['err']['question']['title'] = '空白文字は使えません';
    }
    // 画像（変化前）
    if (!isset($_SESSION['question']['before']) || ($_SESSION['question']['before'] == ""))
    {
        $validity = FALSE;
        $_SESSION['err']['question']['before'] = '画像が設定されていません';
    }
    // 画像（変化後）
    if (!isset($_SESSION['question']['after']) || ($_SESSION['question']['after'] == ""))
    {
        $validity = FALSE;
        $_SESSION['err']['question']['after'] = '画像が設定されていません';
    }
    // 画像（答え）
    if (!isset($_SESSION['question']['answer']) || ($_SESSION['question']['answer'] == ""))
    {
        $validity = FALSE;
        $_SESSION['err']['question']['answer'] = '画像が設定されていません';
    }
    // 答えの補足解説
    if (ctype_space($_SESSION['question']['explanation']) == true)
    {
        $validity = FALSE;
        $_SESSION['err']['question']['explanation'] = '空白文字は使えません';
    } elseif(strlen($_SESSION['question']['explanation']) > 100)
    {
        $validity = FALSE;
        $_SESSION['err']['question']['explanation'] = '補足解説は100文字以内で設定してください';
    }


    if ($validity == FALSE)
    {
        header('Location: register.php');
        exit();
    }
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

    <div class="container">
        <h2 class="display-5">問題作成（確認）</h2>
    </div>



<!-- FORM -->
    <div class="container my-5">
    <form action="#" method="POST" enctype="multipart/form-data">
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
            <label for="explanation" class="col-sm-4 col-form-label">答えの解説 <span class="badge badge-warning">100文字まで</span></label>
            <div class="col-sm-6">
                <textarea class="form-control" id="explanation" row="5"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-3">
                <button type="cancel" class="btn btn-secondary" formaction="../question_page.php">破棄して問題管理画面へ</button>
            </div>
            <div class="col-sm-2">
                <button type="submit" class="btn btn-primary" formaction="register_check.php">登録（確認）</button>
            </div>
        </form>
    </div>
    
</body>
</html>