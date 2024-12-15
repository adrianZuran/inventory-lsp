<?php 
include 'db/conn.php';

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM admin WHERE username = ? AND password = ?");
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    $admin = $result->fetch_assoc();
    if($result->num_rows == 1) {
        $_SESSION['admin'] = $admin;
        header('location: http://localhost/lastdrill/page/dashboard.php');
        exit();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-5 card shadow p-4 col-4">
    <h1 class="text-center">Login</h1>
    <?php if (isset($error_message)): ?>
        <div class="alert alert-danger" role="alert">
            <?= $error_message ?>
        </div>
    <?php endif; ?>
    <form action="login.php" method="post" class="w-50 mx-auto mt-4">
        <div class="mb-3">
            <label for="username" class="form-label">Username:</label>
            <input type="text" name="username" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="d-grid">
            <button type="submit" name="login" class="btn btn-primary">Login</button>
        </div>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>