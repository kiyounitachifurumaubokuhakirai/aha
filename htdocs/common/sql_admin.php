<?php
  require_once('sql_parent.php');

  class adminModel extends BaseModel {

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

  }
?>