<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= !empty($title) ? $title : '' ?></title>
    <link rel="stylesheet" href="<?= URL ?>assets/style.css">
</head>
<body>
    <header>
        <ul>
            <li>
                <a href="<?= URL ?>">Home</a>
            </li>
            <li>
                <a href="<?= URL ?>about-us">About</a>
            </li>
        </ul>
    </header>