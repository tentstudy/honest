<?php 
class Database 
  {

    public $servername ;
    public $username ;
    public $password ;
    public $dbname ;
    public $conn;
    function __construct($servername,$username,$password,$dbname)
    {
      $this->servername=$servername;
      $this->username=$username;
      $this->password=$password;
      $this->dbname=$dbname;
      $this->conn= new mysqli($servername,$username,$password,$dbname);
      mysqli_set_charset($this->conn,"utf8");
    }

    public function Close()
    {
      $this->conn->Close();
    }

    public function query($query)
    {
      return $this->conn->query($query);
    }
  }
  $db = new Database('localhost','root',"",'honest');
 ?>