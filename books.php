<?php
require_once 'config/database.php';

$db = new Database();
$conn = $db->connect();

// Handle add book form submission
if (isset($_GET['action']) && $_GET['action'] === 'add') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = $_POST['title'] ?? '';
        $author = $_POST['author'] ?? '';
        $status = $_POST['status'] ?? 'available';
        $rating = $_POST['rating'] ?? 0;
        $cover = $_POST['cover'] ?? '';
        $stmt = $conn->prepare('INSERT INTO books (title, author, status, rating, cover) VALUES (?, ?, ?, ?, ?)');
        $stmt->execute([$title, $author, $status, $rating, $cover]);
        header('Location: books.php');
        exit;
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Book - Library Management System</title>
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
        <div class="container">
            <h1>Add Book</h1>
            <form method="post" class="form-card">
                <label class="form-label">Title:<br><input type="text" name="title" class="form-input" required></label><br>
                <label class="form-label">Author:<br><input type="text" name="author" class="form-input" required></label><br>
                <label class="form-label">Status:<br>
                    <select name="status" class="form-input">
                        <option value="available">Available</option>
                        <option value="borrowed">Borrowed</option>
                    </select>
                </label><br>
                <label class="form-label">Rating:<br><input type="number" name="rating" min="0" max="5" step="0.1" class="form-input"></label><br>
                <label class="form-label">Cover URL:<br><input type="text" name="cover" class="form-input"></label><br>
                <button type="submit" class="btn btn-primary">Add Book</button>
                <a href="books.php" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </body>
    </html>
    <?php
    exit;
}

// Fetch books
$stmt = $conn->prepare('SELECT * FROM books ORDER BY created_at DESC');
$stmt->execute();
$books = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books - Library Management System</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Books</h1>
        <a href="index.php" class="btn btn-secondary">&larr; Back to Dashboard</a>
        <a href="books.php?action=add" class="btn btn-primary" style="float:right; margin-bottom:10px;">+ Add Book</a>
        <table class="styled-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Status</th>
                    <th>Rating</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($books as $book): ?>
                <tr>
                    <td><?php echo htmlspecialchars($book['id']); ?></td>
                    <td><?php echo htmlspecialchars($book['title']); ?></td>
                    <td><?php echo htmlspecialchars($book['author']); ?></td>
                    <td><?php echo htmlspecialchars($book['status']); ?></td>
                    <td><?php echo htmlspecialchars($book['rating']); ?></td>
                    <td><?php echo htmlspecialchars($book['created_at']); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
