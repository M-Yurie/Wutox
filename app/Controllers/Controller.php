<?php
namespace App\Controllers;

class Controller
{
    protected function view(string $path, array $data = [])
    {
        $fullPath = BASE_PATH . "/app/Views/{$path}.php";

        if (!file_exists($fullPath)) {
            die("View '{$path}' not found. Full path: {$fullPath}");
        }

        extract($data);
        include $fullPath;
    }
}
