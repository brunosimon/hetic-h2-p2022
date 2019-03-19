<?php

$matches = [];
preg_match('/^article\/([0-9]+)$/', $q, $matches);

$id = count($matches) > 1 ? $matches[1] : 0;

$title = 'Article '.$id;

include '../views/pages/article.php';