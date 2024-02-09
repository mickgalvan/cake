CREATE TABLE Cakes (
    CakeID INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(255) NOT NULL,
    Description TEXT,
    Price DECIMAL(10, 2) NOT NULL
);

CREATE TABLE Customers (
    CustomerID INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(255) NOT NULL,
    Email VARCHAR(255) UNIQUE NOT NULL,
    Phone VARCHAR(255) NOT NULL
);

CREATE TABLE Orders (
    OrderID INT AUTO_INCREMENT PRIMARY KEY,
    CustomerID INT NOT NULL,
    Date DATE NOT NULL,
    TotalPrice DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (CustomerID) REFERENCES Customers(CustomerID)
);

CREATE TABLE OrderDetails (
    OrderDetailID INT AUTO_INCREMENT PRIMARY KEY,
    OrderID INT NOT NULL,
    CakeID INT NOT NULL,
    Quantity INT NOT NULL,
    FOREIGN KEY (OrderID) REFERENCES Orders(OrderID),
    FOREIGN KEY (CakeID) REFERENCES Cakes(CakeID)
);

-- Insert into Cakes
INSERT INTO
    Cakes (Name, Description, Price)
VALUES
    ('Chocolate', 'Chocolate sponge cake', 20.00);

INSERT INTO
    Cakes (Name, Description, Price)
VALUES
    ('Vanilla', 'Vanilla cream cake', 15.00);

-- Insert into Customers
INSERT INTO
    Customers (Name, Email, Phone)
VALUES
    ('John Doe', 'johndoe@example.com', '1234567890');

-- Insert into Orders
INSERT INTO
    Orders (CustomerID, Date, TotalPrice)
VALUES
    (1, '2024-02-05', 35.00);

-- Insert into OrderDetails
INSERT INTO
    OrderDetails (OrderID, CakeID, Quantity)
VALUES
    (1, 1, 1);

INSERT INTO
    OrderDetails (OrderID, CakeID, Quantity)
VALUES
    (1, 2, 1);

SELECT
    o.OrderID,
    c.Name AS CustomerName,
    o.Date,
    od.CakeID,
    ca.Name AS CakeName,
    od.Quantity,
    ca.Price,
    o.TotalPrice
FROM
    Orders o
    JOIN Customers c ON o.CustomerID = c.CustomerID
    JOIN OrderDetails od ON o.OrderID = od.OrderID
    JOIN Cakes ca ON od.CakeID = ca.CakeID
WHERE
    o.OrderID = 1;