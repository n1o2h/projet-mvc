<?php
use App\core\Application;
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
    <div class="container-fluid">
        <a class="navbar-brand fs-2 fw-bold" href="/">My MVC Project</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <?php if(Application::isExisteUser()):  ?>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class=" btn btn-primary btn-m me-2" href="/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-primary btn-m border border-primary" href="/register">Register</a>
                    </li>
                </ul>
            <?php else: ?>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class=" btn btn-primary btn-m me-2" href="/profile">Profile</a>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                    <span class="navbar-text text-dark me-2">
                        Welcome <?= Application::$app->user ? Application::$app->user->getDisplayName() : 'Guest' ?>
                    </span>
                        <a class="btn btn-danger" href="/logout">Logout</a>
                    </li>
                </ul>
            <?php endif;?>
        </div>
    </div>
</nav>
<div class="container mt-4">
    <?php if ($success = Application::$app->session->getMessage('success')): ?>
        <div class="alert alert-success">
            <?= $success ?>
        </div>
    <?php endif; ?>

    {{content}}
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
