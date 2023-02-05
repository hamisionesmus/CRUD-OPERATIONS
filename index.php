<?php
// Connect to the database
$conn = mysqli_connect('host', 'username', 'password', 'database');

// Check for connection errors
if (mysqli_connect_errno()) {
    die("Failed to connect to the database: " . mysqli_connect_error());
}

// Create operation
if (isset($_POST['create'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);

    $sql = "INSERT INTO products (name, description, price) VALUES ('$name', '$description', '$price')";
    if (mysqli_query($conn, $sql)) {
        echo "Record created successfully";
    } else {
        echo "Error creating record: " . mysqli_error($conn);
    }
}

// Read operation
if (isset($_GET['read'])) {
    $id = mysqli_real_escape_string($conn, $_GET['read']);

    $sql = "SELECT * FROM products WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $product = mysqli_fetch_assoc($result);

    echo "Name: " . $product['name'] . "<br>";
    echo "Description: " . $product['description'] . "<br>";
    echo "Price: " . $product['price'] . "<br>";
}

// Update operation
if (isset($_POST['update'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);

    $sql = "UPDATE products SET name = '$name', description = '$description', price = '$price' WHERE id = $id";
    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

// Delete operation
if (isset($_GET['delete'])) {
    $id = mysqli_real_escape_string($conn, $_GET['delete']);

    $sql = "DELETE FROM products WHERE id = $id";
    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>





<!-- CREATE AND READ ON A TABLE -->
<?php
// Connect to the database
$conn = mysqli_connect('host', 'username', 'password', 'database');

// Check for connection errors
if (mysqli_connect_errno()) {
    die("Failed to connect to the database: " . mysqli_connect_error());
}

// Read operation
$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);

echo "<table border='1'>";
echo "<tr><th>ID</th><th>Name</th><th>Description</th><th>Price</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['description'] . "</td>";
    echo "<td>" . $row['price'] . "</td>";
    echo "</tr>";
}
echo "</table>";

mysqli_close($conn);
?>
