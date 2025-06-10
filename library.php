<?php
$host = 'localhost';
$dbname = 'library';
$username = 'root'; 
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connected successfully.<br><br>";

    // Insert a book
    $pdo->exec("INSERT INTO books (title, author, published_year, genre)
                VALUES ('Coding is fun', 'D.T Banz', 2025, 'Educational')");
    echo "Book inserted.<br><br>";

    // Select all books
    $stmt = $pdo->query("SELECT * FROM books");
    $books = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "Books in library:<br>";
    foreach ($books as $book) {
        echo "ID: {$book['id']}, Title: {$book['title']}, Author: {$book['author']}, Year: {$book['published_year']}, Genre: {$book['genre']}<br>";
    }

    // Update a book
    $pdo->exec("UPDATE books SET title = 'The Hobbit: Revised Edition' WHERE title = 'The Hobbit'");
    echo "<br>Book updated.<br>";

    // Delete a book
    $pdo->exec("DELETE FROM books WHERE title = 'The Hobbit: Revised Edition'");
    echo "Book deleted.<br>";

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
