<?php
require_once 'DBConnection.php';

class CakesDAO extends DBConnection {

    public function insertCake($name, $description, $price) {
        $sql = "INSERT INTO Cakes (Name, Description, Price) VALUES (?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bind_param("ssd", $name, $description, $price);
        $stmt->execute();
        $stmt->close();
    }

    public function updateCake($cakeID, $name, $description, $price) {
        $sql = "UPDATE Cakes SET Name = ?, Description = ?, Price = ? WHERE CakeID = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bind_param("ssdi", $name, $description, $price, $cakeID);
        $stmt->execute();
        $stmt->close();
    }

    public function deleteCake($cakeID) {
        $sql = "DELETE FROM Cakes WHERE CakeID = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bind_param("i", $cakeID);
        $stmt->execute();
        $stmt->close();
    }

    public function listCakes() {
        $sql = "SELECT * FROM Cakes";
        $result = $this->connect()->query($sql);
        $cakes = [];
        while ($row = $result->fetch_assoc()) {
            $cakes[] = $row;
        }
        return $cakes;
    }
}
?>
