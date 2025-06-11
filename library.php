<?php
$host = 'localhost';
$dbname = 'library';
$username = 'root'; 
$password = '';

try {
    // 1. Connect to the database
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected to database successfully.<br><br>";

    // 2. Insert a new book
    $pdo->exec("INSERT INTO books (title, author, published_year, genre)
                VALUES ('Coding is fun', 'D.T Banz', 2025, 'Educational')");
    echo "New book inserted.<br><br>";

    // 3. Retrieve and display all books
    $stmt = $pdo->query("SELECT * FROM books");
    $books = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "Books in library:<br><br>";
    echo "<table border='1' cellpadding='10'>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Published Year</th>
                <th>Genre</th>
            </tr>";
    foreach ($books as $book) {
        echo "<tr>
                <td>{$book['id']}</td>
                <td>{$book['title']}</td>
                <td>{$book['author']}</td>
                <td>{$book['published_year']}</td>
                <td>{$book['genre']}</td>
              </tr>";
    }
    echo "</table><br><br>";

    // 4. Update a book's details
    $pdo->exec("UPDATE books SET title = 'Coding is fun - 2nd Edition' WHERE title = 'Coding is fun'");
    echo "Book title updated.<br><br>";

    // 5. Delete a book
    $pdo->exec("DELETE FROM books WHERE title = 'Coding is fun - 2nd Edition'");
    echo "Book deleted.<br>";

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
