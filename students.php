<&php 
class Database {
      private $host = "db:3306";
      private $db_name = "institut";
      private $username = "root";
      private $password = "123";
      public $conn;
      
      
      public function getConnection() {
             $this->con = null;
             try {
                 $this->conn = new PDO("mysql:host=".$this->host.";dbname".
                 $this->db_name, $this->userman, $this->password);
                 $this->conn->exec("set name utf8");
             } catch (PDOExceptiom $exceptiom) {
                     echo "COnnection error: ".$exceptiom->getMessage();
             }
      return $this-conn;
      }
}
?>


      

