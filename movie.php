<?php
$host = 'localhost';
$dbname = 'video_store';
$username = 'root';
$password = '';

try {
    // Connect to the database
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected to video_store database.<br><br>";

    // 1. INSERT 
    $insertSql = "INSERT INTO movies (title, director, release_year, available)
                  VALUES ('Inception', 'Christopher Nolan', 2010, 1)";
    $pdo->exec($insertSql);
    echo "Inserted new movie.<br><br>";

    // 2. SELECT
    $stmt = $pdo->query("SELECT * FROM movies");
    $movies = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<strong>Movie List:</strong><br>";
    foreach ($movies as $movie) {
        $availability = $movie['available'] ? 'Available' : 'Not Available';
        echo "ID: {$movie['id']}, Title: {$movie['title']}, Director: {$movie['director']}, Year: {$movie['release_year']}, Status: $availability<br>";
    }
    echo "<br>";

    // 3. UPDATE 
    $updateSql = "UPDATE movies SET available = 0 WHERE id = 1";
    $updated = $pdo->exec($updateSql);
    echo "Updated $updated movie(s) availability.<br><br>";

    // 4. DELETE 
    $deleteSql = "DELETE FROM movies WHERE id = 1";
    $deleted = $pdo->exec($deleteSql);
    echo "Deleted $deleted movie(s).<br><br>";

} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
?>
