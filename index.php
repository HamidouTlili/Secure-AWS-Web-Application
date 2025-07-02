<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    if (!empty($name) && !empty($email)) {
        $conn = new mysqli("10.0.2.119", "root", "Toomuchzatla12@", "contacts");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $stmt = $conn->prepare("INSERT INTO messages (name, email) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $email);
        $stmt->execute();
        $stmt->close();
        $conn->close();
        echo "Message sent!";
    } else {
        echo "Invalid input!";
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Contact Form</title></head>
<body>
    <form method="post">
        <input type="text" name="name" placeholder="Name" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
