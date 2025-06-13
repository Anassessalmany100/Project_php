<?php
require_once 'db.php';


// Handle add book form submission
if (isset($_GET['action']) && $_GET['action'] === 'add') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = $_POST['title'] ?? '';
        $author = $_POST['author'] ?? '';
        $status = $_POST['status'] ?? 'available';
        $rating = $_POST['rating'] ?? 0;
        $cover = $_POST['cover'] ?? '';
        $stmt = $db->prepare('INSERT INTO books (title, author, status, rating, cover) VALUES (?, ?, ?, ?, ?)');
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
        <link rel="stylesheet" href="css/stylebo.css">
    </head>

    <body>
        <div class="container">
            <h1>Add Book</h1>
            <form method="post" class="form-card">
                <label class="form-label">Title:<br>
                    <input type="text" name="title" class="form-input" required>
                </label>
                <label class="form-label">Author:<br>
                    <input type="text" name="author" class="form-input" required>
                </label>
                <label class="form-label">Status:<br>
                    <select name="status" class="form-input">
                        <option value="available">Available</option>
                        <option value="borrowed">Borrowed</option>
                    </select>
                </label><br>
                <label class="form-label">Rating:<br><input type="number" name="rating" min="0" max="5" step="0.1"
                        class="form-input"></label><br>
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

// Handle edit book
if (isset($_GET['action']) && $_GET['action'] === 'edit' && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $db->prepare('SELECT * FROM books WHERE id = ?');
    $stmt->execute([$id]);
    $book = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$book) {
        header('Location: books.php');
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = $_POST['title'] ?? '';
        $author = $_POST['author'] ?? '';
        $status = $_POST['status'] ?? 'available';
        $rating = $_POST['rating'] ?? 0;
        $cover = $_POST['cover'] ?? '';
        $stmt = $db->prepare('UPDATE books SET title=?, author=?, status=?, rating=?, cover=? WHERE id=?');
        $stmt->execute([$title, $author, $status, $rating, $cover, $id]);
        header('Location: books.php');
        exit;
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Book - Library Management System</title>
        <link rel="stylesheet" href="css/stylebo.css">
    </head>

    <body>
        <div class="container">
            <h1>Edit Book</h1>
            <form method="post" class="form-card">
                <label class="form-label">Title:<br><input type="text" name="title" class="form-input" required
                        value="<?php echo htmlspecialchars($book['title']); ?>"></label><br>
                <label class="form-label">Author:<br><input type="text" name="author" class="form-input" required
                        value="<?php echo htmlspecialchars($book['author']); ?>"></label><br>
                <label class="form-label">Status:<br>
                    <select name="status" class="form-input">
                        <option value="available" <?php if ($book['status'] == 'available')
                            echo 'selected'; ?>>Available
                        </option>
                        <option value="borrowed" <?php if ($book['status'] == 'borrowed')
                            echo 'selected'; ?>>Borrowed
                        </option>
                    </select>
                </label><br>
                <label class="form-label">Rating:<br><input type="number" name="rating" min="0" max="5" step="0.1"
                        class="form-input" value="<?php echo htmlspecialchars($book['rating']); ?>"></label><br>
                <label class="form-label">Cover URL:<br><input type="text" name="cover" class="form-input"
                        value="<?php echo htmlspecialchars($book['cover']); ?>"></label><br>
                <button type="submit" class="btn btn-primary">Update Book</button>
                <a href="books.php" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </body>

    </html>
    <?php
    exit;
}

// Handle delete book
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $db->prepare('DELETE FROM books WHERE id = ?');
    $stmt->execute([$id]);
    header('Location: books.php');
    exit;
}

// Fetch books
$stmt = $db->prepare('SELECT * FROM books ORDER BY created_at DESC');
$stmt->execute();
$books = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books - Library</title>
    <link rel="stylesheet" href="tylebo.css">
    <style>
        .styled-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin-top: 24px;
            font-size: 16px;
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 12px rgba(44, 62, 80, 0.08);
        }

        .styled-table thead tr {
            background-color: #3498db;
            color: #fff;
            text-align: left;
        }

        .styled-table th,
        .styled-table td {
            padding: 14px 18px;
            border-bottom: 1px solid #e0e0e0;
            vertical-align: middle;
        }

        .styled-table tr:last-child td {
            border-bottom: none;
        }

        .styled-table tbody tr:hover {
            background-color: #f5faff;
            transition: background 0.2s;
        }

        .btn {
            display: inline-block;
            padding: 8px 18px;
            border-radius: 6px;
            border: none;
            text-decoration: none;
            font-size: 1rem;
            cursor: pointer;
            margin-right: 6px;
            margin-bottom: 2px;
            transition: background 0.2s, box-shadow 0.2s, transform 0.1s;
            box-shadow: 0 2px 8px rgba(44, 62, 80, 0.04);
        }

        .btn-primary {
            background: linear-gradient(90deg, #3366cc 60%, #254a99 100%);
            color: #fff;
        }

        .btn-primary:hover {
            background: linear-gradient(90deg, #254a99 60%, #3366cc 100%);
            transform: translateY(-2px) scale(1.03);
        }

        .btn-warning {
            background: #f1c40f;
            color: #fff;
        }

        .btn-warning:hover {
            background: #b7950b;
        }

        .btn-danger {
            background: #e74c3c;
            color: #fff;
        }

        .btn-danger:hover {
            background: #c0392b;
        }

        .btn-sm {
            padding: 6px 14px;
            font-size: 0.95rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>BookHaven</h1>
        <a href="books.php?action=add" class="btn btn-primary">+ Add Book</a><a href="index.php" class="btn btn-primary"><---</a>
        <table class="styled-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Status</th>
                    <th>Rating</th>
                    <th>Actions</th>
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
                        <td>
                            <a href="books.php?action=edit&id=<?php echo $book['id']; ?>"
                                class="btn btn-warning btn-sm">Edit</a>
                            <a href="books.php?action=delete&id=<?php echo $book['id']; ?>" class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete this book?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>