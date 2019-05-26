<?php

include 'config.php';

session_destroy();

header('location: login.php');
exit;