<?php
$host = 'localhost';
$dbname = 'school';
$username = 'root';
$password = '';

try {
    // Connect to database
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected to school database.<br><br>";

    // 1. Insert
    $insertSQL = "INSERT INTO attendance (student_name, date, status)
                  VALUES ('D.T Banz', '2025-06-10', 'Present')";
    $pdo->exec($insertSQL);
    echo "Inserted new attendance record.<br><br>";

    // 2. Retrieve 
    $stmt = $pdo->query("SELECT * FROM attendance");
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<strong>Attendance Records:</strong><br>";
    foreach ($records as $record) {
        echo "ID: {$record['id']}, Name: {$record['student_name']}, Date: {$record['date']}, Status: {$record['status']}<br>";
    }
    echo "<br>";

    // 3. Update 
    $updateSQL = "UPDATE attendance SET status = 'Late' WHERE id = 1";
    $affected = $pdo->exec($updateSQL);
    echo "Updated $affected attendance record(s).<br><br>";

    // 4. Delete 
    $deleteSQL = "DELETE FROM attendance WHERE id = 1";
    $deleted = $pdo->exec($deleteSQL);
    echo "Deleted $deleted attendance record(s).<br><br>";

} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
?>
