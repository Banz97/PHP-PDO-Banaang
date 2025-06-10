<?php
$host = 'localhost';
$dbname = 'company_db';
$username = 'root';
$password = '';

try {
    // 1. Connect
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected to company_db.<br><br>";

    // 2. Insert
    $insertSQL = "INSERT INTO timelogs (employee_name, log_date, log_time, type)
                  VALUES ('Alice Smith', CURDATE(), CURTIME(), 'IN')";
    $pdo->exec($insertSQL);
    echo "Inserted new timelog.<br><br>";

    // 3. Retrieve
    $stmt = $pdo->query("SELECT * FROM timelogs ORDER BY log_date DESC, log_time DESC");
    $logs = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<strong>All Timelogs:</strong><br>";
    foreach ($logs as $log) {
        echo "ID: {$log['id']}, Name: {$log['employee_name']}, Date: {$log['log_date']}, Time: {$log['log_time']}, Type: {$log['type']}<br>";
    }
    echo "<br>";

    // 4. Update 
    $updateSQL = "UPDATE timelogs SET type = 'OUT' WHERE id = 1 AND type = 'IN'";
    $updated = $pdo->exec($updateSQL);
    echo "Updated $updated timelog(s).<br><br>";

    // 5. Delete
    $deleteSQL = "DELETE FROM timelogs WHERE id = 1";
    $deleted = $pdo->exec($deleteSQL);
    echo "Deleted $deleted timelog(s).<br><br>";

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
