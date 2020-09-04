<?PHP
    session_start();
    session_regenerate_id(TRUE);
  
    require_once('../common/define.php');
    require_once('../common/sql_players.php');
    require_once('../common/sql_compList.php');
    require_once('../common/sql_questions.php');
  
    $question = sanitize($_POST);

    //  解いたというcheckをする
    if ((isset($_SESSION["signIn"]['is_signIn'])))
    {
        try
        {
            $comp = new compListModel;
            $comp -> checkCompQuestion($_SESSION["signIn"]['is_signIn'], $question['id']);
        } catch (Exception $e)
        {
            var_dump($e);
            exit();
            header('Local: aha_list.php');
        }
    }
    $comp = null;

    // 問題を取得
    try
    {
        $q = new questionsModel;
        $AHA = $q->getQuestion($question['id']);
    } catch (Exception $e)
    {
        var_dump($e);
        exit();
        header('Local: aha_list.php');
    }
    $q = null;

    // imgのパスを作成
    $dir = "../img/";
    if ($AHA['difficulty'] == 1) $dir .= 'easy/';
    elseif ($AHA['difficulty'] == 2) $dir .= 'normal/';
    elseif ($AHA['difficulty'] == 3) $dir .= 'hard/';
    else    header('Local: aha_list.php');
    $dir .= strstr($AHA['before_png'], '_', true) . '/';
?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sample</title>
    

    <!-- CSSを読み込む -->
    <link rel="stylesheet" href="stylesheet.css">
    <!-- jQueryのライブラリを読み込む -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- bootstrapのライブラリーを読み込む -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>
<body>

    <div class="container my-5">
        <div class="tick" data-value="1234"　data-did-init="setupFlip">
            <div data-repeat="true">
                <span data-view="flip"></span>
            </div>
        </div>
        <!-- カウントダウン表示 -->
        <div id="countDown-wrapper">
            <div id="countDown"></div>
        </div>
        <!-- aha画像 -->
        <div id="img-wrapper">
            <img id="targetImage" class="before" src="<?= $dir . $AHA['before_png']?>" alt="" height="600" width="980">
            <img class="after" src="<?= $dir . $AHA['after_png']?>" alt="" height="600" width="980">
            <img class="answer" src="<?= $dir . $AHA['answer_png']?>" alt="" height="600" width="980">
        </div>
        <!-- progress -->
        <div class="progress" class="container my-3">
            <div id="progressBar" class="progress-bar progress-bar-striped" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <!-- start button -->
        <div class="btn-wrapper">
            <button type="button" id="btnStart" class="btn btn-primary">START</button>
        </div>
    </div>
    <div class="container">
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link" href="../index.php">TOPページへ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="aha_answer.php">確認する（答え合わせ）</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">次の問題へ</a>
            </li>
        </ul>
    </div>


    <script type="text/javascript" src="script.js"></script>
</body>
</html>