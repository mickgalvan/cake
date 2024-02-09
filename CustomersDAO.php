<?php
require_once 'DBConnection.php';

class CustomersDAO extends DBConnection {

    public function insertCustomer($name, $email, $phone) {
        $sql = "INSERT INTO Customers (Name, Email, Phone) VALUES (?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bind_param("sss", $name, $email, $phone);
        $stmt->execute();
        $stmt->close();
    }

    public function updateCustomer($customerID, $name, $email, $phone) {
        $sql = "UPDATE Customers SET Name = ?, Email = ?, Phone = ? WHERE CustomerID = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bind_param("sssi", $name, $email, $phone, $customerID);
        $stmt->execute();
        $stmt->close();
    }

    public function deleteCustomer($customerID) {
        $sql = "DELETE FROM Customers WHERE CustomerID = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bind_param("i", $customerID);
        $stmt->execute();
        $stmt->close();
    }

    public function listCustomers() {
        $sql = "SELECT * FROM Customers";
        $result = $this->connect()->query($sql);
        $customers = [];
        while ($row = $result->fetch_assoc()) {
            $customers[] = $row;
        }
        return $customers;
    }
}
?>
