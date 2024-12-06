<?php
session_start();
include 'db_connection.php';

$menu = [
    [
        'id' => 1,
        'name' => 'Pizza',
        'description' => 'Cheese, tomatoes, and a variety of toppings.',
        'price' => 12.99
    ],
    [
        'id' => 2,
        'name' => 'Burger',
        'description' => 'Juicy beef patty, lettuce, tomato, and cheese.',
        'price' => 8.99
    ],
    [
        'id' => 3,
        'name' => 'Pasta',
        'description' => 'Penne with marinara sauce and Parmesan.',
        'price' => 10.49
    ],
    [
        'id' => 4,
        'name' => 'Salad',
        'description' => 'Fresh greens with cucumbers, tomatoes, and dressing.',
        'price' => 6.99
    ],
    [
        'id' => 5,
        'name' => 'Sushi',
        'description' => 'Fresh rolls with fish, rice, and seaweed.',
        'price' => 14.99
    ]
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item_id = $_POST['item_id'];
    $quantity = $_POST['quantity'];
    $name = $menu[$item_id - 1]['name'];
    $price = $menu[$item_id - 1]['price'];
    $total = $price * $quantity;

    $stmt = $conn->prepare("INSERT INTO orders (item_id, name, quantity, price, total) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("isidd", $item_id, $name, $quantity, $price, $total);

    if ($stmt->execute()) {
        echo "<script>alert('Order placed successfully!');</script>";
    } else {
        echo "<script>alert('Error placing order.');</script>";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Menu</title>
    <link rel="stylesheet" href="/css/food_menu.css">
</head>
<body>
    <div class="menu-container">
        <h1>Our Delicious Menu</h1>
        <div class="menu-list">
            <?php foreach ($menu as $item): ?>
                <div class="menu-item">
                    <h3><?php echo $item['name'];?></h3>
                    <p class="description"><?php echo $item['description']; ?></p>
                    <p class="price">$<?php echo number_format($item['price'], 2); ?></p>
                    <form action="food_menu.php" method="POST">
                        <input type="hidden" name="item_id" value="<?php echo $item['id']; ?>">
                        <label for="quantity">Quantity:</label>
                        <input type="number" name="quantity" min="1" required><br>
                        <input class="order-btn" type="submit" value="Order Now">
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
