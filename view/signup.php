<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Signup</h2>

    <?php if(isset($signupMessage)) {echo $signupMessage;} ?>

    <form method="POST" action="index.php?action=signup" class="needs-validation" novalidate>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" id="name" value="" required>
            <div class="invalid-feedback">Please enter your name.</div>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" name="email" id="email" value="" required>
            <?php if (isset($errors['email'])) echo '<div class="text-danger">' . $errors['email'] . '</div>'; ?>
            <div class="invalid-feedback">Please enter a valid email address.</div>
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" name="password" id="password" required>
            <?php if (isset($errors['password'])) echo '<div class="text-danger">' . $errors['password'] . '</div>'; ?>
            <div class="invalid-feedback">Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one digit.</div>
        </div>

        <button type="submit" class="btn btn-primary">Signup</button>
    </form>

    <div class="mt-3">
        <p>Already have an account? <a href="index.php?action=login">Login here</a>.</p>
    </div>
</div>

<!-- Add Bootstrap JS and Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>