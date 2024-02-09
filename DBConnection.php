<?php
class DBConnection {
    private $server = "localhost";
    private $username = "yourUsername";
    private $password = "yourPassword";
    private $database = "CakeShop";

    protected function connect() {
        $mysqli = new mysqli($this->server, $this->username, $this->password, $this->database);
        if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }
        return $mysqli;
    }
}
?>
