<?php
  require_once('sql_parent.php');
  require_once('sql_compList.php');

  class questionsModel extends BaseModel {

    /**
     * コンストラクタ
     */
    public function __construct() {
      parent::__construct();    //親クラスのコンストラクタを呼び出す
    }


    /**
     * デストラクタ
     */
    public function __destruct() {
        parent::__destruct();   //親クラスのデストラクタを呼び出す
    }




    /** 問題を登録
     * @param varchar title
     * @param int diffiulty
     * @param varchar before_png
     * @param varchar after_png
     * @param varchar answer_png
     * @param varchar explanation
     */
    public function registerQuestion($title, $difficulty, $before_png, $after_png, $answer_png, $explanation){
      $sql = 'INSERT INTO questions_list (title, difficulty, before_png, after_png, answer_png, explanation) VALUES(?, ?, ?, ?, ?, ?)';
      $stmt = $this->dbh->prepare($sql);
      $data = [];
      $data[] = $title;
      $data[] = $difficulty;
      $data[] = $before_png;
      $data[] = $after_png;
      $data[] = $answer_png;
      $data[] = $explanation;
      $stmt->execute($data);
    }



    /** 全問題を取得
     * @return  array
     */
    public function getAllQuestions() {
      $sql = 'SELECT id, title, difficulty FROM questions_list WHERE is_deleted=0';
      $stmt = $this->dbh->prepare($sql);
      $stmt->execute();

      $questions = [];
      while (TRUE)
      {
        $rec = [];
        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        if($rec == FALSE) break;
        $questions[] = $rec;
      }

      return $questions;
    }




    /** ある難易度の全問題を取得
     * @param int difficulty
     * @return  array questions
     */
    public function getAllQuestionsForDicculty($difficulty) {
      $sql = 'SELECT id, title FROM questions_list WHERE (is_deleted=0 AND difficulty=?)';
      $stmt = $this->dbh->prepare($sql);
      $data = [];
      $data[] = $difficulty;
      $stmt->execute();

      $questions = [];
      while (TRUE)
      {
        $rec = [];
        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        if($rec == FALSE) break;
        $questions[] = $rec;
      }

      return $questions;
    }




    /** ある難易度の全問題を取得
     * @param int player_ID
     * @param int difficulty
     * @return  array questions
     */
    public function getAllQuestionsForDiccultyInSignin($player_ID, $difficulty) {
      $questions = [];
      $sql = 'SELECT q.id, q.title c.players_ID FROM questions_list q
               left OUTER JOIN comp_questions_list c ON q.id = c.questions_ID
               WHERE q.is_deleted=0 AND q.difficulty=? AND players_ID!=?
               ORDER BY q.title';
      $stmt = $this->dbh->prepare($sql);
      $data = [];
      $data[] = $difficulty;
      $data[] = $player_ID;
      $stmt->execute();

      $questions = [];
      while (TRUE)
      {
        $rec = [];
        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        if($rec == FALSE) break;
        $questions[] = $rec;
      }

      $sql = 'SELECT q.id, q.title c.players_ID FROM questions_list q
               left OUTER JOIN comp_questions_list c ON q.id = c.questions_ID
               WHERE q.is_deleted=0 AND q.difficulty=? AND players_ID=?
               ORDER BY q.title';
      $stmt = $this->dbh->prepare($sql);
      $stmt->execute();

      while (TRUE)
      {
        $rec = [];
        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        if($rec == FALSE) break;
        $questions[] = $rec;
      }

      return $questions;
    }




    /** 問題を取得
     * @param array question_id
     * @return  array
     */
    public function getQuestion($question_id) {
      $sql = 'SELECT id, title, difficulty, answer_comment FROM questions_list WHERE id=?';
      $stmt = $this->dbh->prepare($sql);
      $data = [];
      $data[] = $question_id;
      $stmt->execute($data);

      return $stmt->fetch(PDO::FETCH_ASSOC);
    }



    /** 問題を削除
     * @param int  ID
     */
    public function deleteQuestion($question_id) {
      $sql = 'UPDATE questions_list set is_deleted=1 WHERE id=?';
      $stmt = $this->dbh->prepare($sql);
      $data = [];
      $data[] = $question_id;
      $stmt->execute($data);
    }



    /** 問題を修正
     * @param int question_id
     * @param varchar title
     * @param int diffiulty
     * @param varchar before_png
     * @param varchar after_png
     * @param varchar answer_png
     * @param varchar explanation
     */
    public function editQuestion($question_id, $title, $difficulty, $before_png, $after_png, $answer_png, $explanation){
      $sql = 'UPDATE questions_list set title=?, difficulty=?, before_png=?, after_png=?, answer_png=?, explanation=? WHERE id=?';
      $stmt = $this->dbh->prepare($sql);
      $data = [];
      $data[] = $title;
      $data[] = $difficulty;
      $data[] = $before_png;
      $data[] = $after_png;
      $data[] = $answer_png;
      $data[] = $explanation;
      $data[] = $question_id;
      $stmt->execute($data);
    }
  }

?>