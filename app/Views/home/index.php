<?php include BASE_PATH . "/app/Views/layout/header.php"; ?>
<?php include BASE_PATH . "/app/Views/layout/nav.php"; ?>

<main class="main-content">
    <div class="card">
        <h1>MERGEEEEEEE </h1>
        <p>The file <code>app/Views/home/index.php</code> was loaded successfully via <strong>HomeController</strong>.</p>
        <p style="margin-top: 1rem; font-size: 0.8rem;">
            Title passed from controller: <strong><?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8') ?></strong>
        </p>
    </div>

<?php include BASE_PATH . "/app/Views/layout/footer.php"; ?>
