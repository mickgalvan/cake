<?php
require_once 'DBConnection.php';

class OrdersDAO extends DBConnection {

    public function insertOrder($customerID, $date, $totalPrice) {
        $sql = "INSERT INTO Orders (CustomerID, Date, TotalPrice) VALUES (?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bind_param("isd", $customerID, $date, $totalPrice);
        $stmt->execute();
        $stmt->close();
    }

    public function updateOrder($orderID, $customerID, $date, $totalPrice) {
        $sql = "UPDATE Orders SET CustomerID = ?, Date = ?, TotalPrice = ? WHERE OrderID = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bind_param("isdi", $customerID, $date, $totalPrice, $orderID);
        $stmt->execute();
        $stmt->close();
    }

    public function deleteOrder($orderID) {
        $sql = "DELETE FROM Orders WHERE OrderID = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bind_param("i", $orderID);
        $stmt->execute();
        $stmt->close();
    }

    public function listOrders() {
        $sql = "SELECT * FROM Orders";
        $result = $this->connect()->query($sql);
        $orders = [];
        while ($row = $result->fetch_assoc()) {
            $orders[] = $row;
        }
        return $orders;
    }
}
?>