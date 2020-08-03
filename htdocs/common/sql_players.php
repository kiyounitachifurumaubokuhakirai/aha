<?php
  require_once('sql_parent.php');

  class playersModel extends BaseModel {

    /** コンストラクタ */
    public function __construct() {
      parent::__construct();    //親クラスのコンストラクタを呼び出す
    }


    /** デストラクタ*/
    public function __destruct() {
        parent::__destruct();   //親クラスのデストラクタを呼び出す
    }





    /** LoginCheck
     * @param string $name
     * @param string $non_hash_pass
     * @return int 
     */
    public function LoginCheck($name, $non_hash_pass) : int {

      $hash_pass = password_hash($non_hash_pass, PASSWORD_DEFAULT);

      $sql = 'SELECT password FROM players_list WHERE is_deleted=0 AND player=?';
      $stmt = $this->dbh->prepare($sql);
      $data = [];
      $data[] = $name;
      $data[] = $hash_pass;
      $stmt->execute($data);
      $rec = $stmt->fetch(PDO::FETCH_ASSOC);

      //認証処理
      if(password_verify($hash_pass, $rec['password']))  return $rec['id'];

      return 0;
    }




    /** player登録
     *  @param string $player_name
     *  @param string $non_hash_pass
     *  @return bool true → 登録成功、false → 登録済み
     */
    public function registerPlayer ($player_name, $non_hash_pass) : bool {
      //登録者がいるか
      $hash_pass = password_hash($non_hash_pass, PASSWORD_DEFAULT);
      if ($this->isPlayer($player_name, $hash_pass) == true) return false;

      //登録作業
      $sql = 'INSERT INTO players_list (player, password) VALUES(?, ?)';
      $stmt = $this->dbh->prepare($sql);
      $data = [];
      $data[] = $player_name;
      $data[] = $hash_pass;
      $stmt->execute($data);
      return true;
    }




    /** player変更
     *  @param string $player_name
     *  @param string $non_hash_pass
     *  @return bool true → 変更成功、false → 登録済み
     */
    public function changePlayer ($player_id, $player_name, $non_hash_pass) : bool{
      //登録者がいるか
      $hash_pass = password_hash($non_hash_pass, PASSWORD_DEFAULT);

      if ($this->isPlayer($player_name, $hash_pass) == true) return false; //

      //登録作業
      $sql = 'UPDATE players_list set player=?, password=? WHERE is_deleted=0 AND id=?';
      $stmt = $this->dbh->prepare($sql);
      $data = [];
      $data[] = $player_name;
      $data[] = $hash_pass;
      $data[] = $player_id;
      $stmt->execute($data);
      return true;
    }




    /** player削除  (is_deleted=1 とする)
     * @param int $player_id
     */
    public function is_deleted ($player_id) : void {
      $sql = 'UPDATE players_list set is_deleted=1 WHERE is_deleted=0 AND ID=?';
      $stmt = $this->dbh->prepare($sql);
      $data = [];
      $data[] = $player_id;
      $stmt->execute($data);
    }





    /** 既に登録者がいるが確認
     * @param string $player_name
     * @param string $hash_pass
     * @return bool false → 登録なし、true → 登録済み
     */
    public function isPlayer ($player_name, $hash_pass) : bool{
      $sql = 'SELECT password FROM players_list WHERE is_deleted=0 AND player=?';
      $stmt = $this->dbh->prepare($sql);
      $data = [];
      $data = $player_name;

      $result = [];
      while(TRUE){
        $rec = [];
        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        if($rec == FALSE) break;
        $result[] = $rec;
      }

      if(password_verify($hash_pass, $rec['password'])) {
        unset ($_SESSION['err']['register']);
        $_SESSION['err']['register'] = "既に使用されています";
        return true;
      }

      return false;
    }


  }
?>