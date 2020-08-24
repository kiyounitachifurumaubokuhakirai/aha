<?php
  require_once('sql_parent.php');

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