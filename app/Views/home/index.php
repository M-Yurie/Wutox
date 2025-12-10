<?php
    require __DIR__ . '/../../config/db.php';

    $today = date('Y-m-d');

    $stmt = $pdo->prepare("
        SELECT id, title, image_path, start_date, end_date, event_type
        FROM events
        WHERE end_date >= :today
        ORDER BY start_date ASC
        LIMIT 6
    ");
    $stmt->execute([':today' => $today]);
    $events = $stmt->fetchAll();
    ?>

<?php require BASE_PATH . "/config/database.php";  ?>

<?php include BASE_PATH . "/app/Views/layout/header.php"; ?>
<?php include BASE_PATH . "/app/Views/layout/nav.php"; ?>

<main class="main-content">
    <div class="content">
        <div class="welcome-text">
            <h1>Wutox - Honkai: Star Rail wiki and database</h1>
            <p>Wutox is a wiki and database for Honkai: Star Rail, a HoYoverse turn-based space fantasy RPG. Check out our guides, character reviews, tier list and more!</p>
        </div>
        <div class="events-section">
            <h2 class="section-title">Current events</h2>
            <div class="events-list">

            </div>
        </div>
    </div>

<?php include BASE_PATH . "/app/Views/layout/footer.php"; ?>
