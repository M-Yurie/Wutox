<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

session_start();

define('BASE_PATH', dirname(__DIR__));

require_once BASE_PATH . '/app/Core/Router.php';

use App\Core\Router;

$scriptDir  = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$path = str_replace($scriptDir, '', $requestUri);
$path = '/' . trim($path, '/');
if ($path === '//') {
    $path = '/';
}

$router = new Router();

/*
 |-----------------------------------------------------------
 | Define routes
 |-----------------------------------------------------------
*/

$router->get('/', function () use ($path) {
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Wutox</title>
        <style>
            body {
                font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
                background: #0f172a;
                color: #e5e7eb;
                display: flex;
                align-items: center;
                justify-content: center;
                height: 100vh;
                margin: 0;
            }
            .card {
                background: #111827;
                padding: 2rem 3rem;
                border-radius: 1rem;
                box-shadow: 0 20px 40px rgba(0,0,0,0.5);
                text-align: center;
            }
            h1 {
                margin-bottom: 0.5rem;
            }
            p {
                margin: 0.25rem 0;
                font-size: 0.9rem;
                color: #9ca3af;
            }
            code {
                background: #020617;
                padding: 0.2rem 0.4rem;
                border-radius: 0.25rem;
            }
        </style>
    </head>
    <body>
        <div class="card">
            <h1>✅ Wutox is running!</h1>
            <p>The file <code>public/index.php</code> was loaded successfully.</p>
            <p>Current path: <code><?= htmlspecialchars($path, ENT_QUOTES, 'UTF-8') ?></code></p>
            <p style="margin-top: 1rem; font-size: 0.8rem;">
                Next step: we will move this into a <strong>HomeController</strong>.
            </p>
        </div>
    </body>
    </html>
    <?php
});

$router->dispatch($path, $_SERVER['REQUEST_METHOD']);
