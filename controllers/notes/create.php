<?php
require base_path('Validator.php');

$config = require base_path('config.php');
$db = new Database($config['database']);

$heading = 'Create Note';
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];

    if (! Validator::string($_POST['body'], 1, 1000)) {
        $errors['body'] = 'A body of no more than 1,000 characters is required.';

    }
}

view("notes/create.view.php", [
    'heading' => 'Create Note',
    'errors' => $errors
]);