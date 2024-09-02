<?php
$host = 'localhost';
$db = 'DutyLog';
$user = 'root';
$pass = '';

$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $department = $_POST['department'];
    $actionType = $_POST['actionType'];

    // Insert data into 'attendance' table
    $stmt = $pdo->prepare("INSERT INTO attendance (name, department, actionType, time) VALUES (?, ?, ?, NOW())");
    $stmt->execute([$name, $department, $actionType]);

    echo "Action recorded successfully!";
}
?>
<form method="POST">
    <input type="text" name="name" placeholder="Name" required>
    <input type="text" name="department" placeholder="Department" required>
    <select name="actionType" required>
        <option value="clockIn">Clock In</option>
        <option value="clockOut">Clock Out</option>
    </select>
    <input type="submit" value="Submit">
</form>
