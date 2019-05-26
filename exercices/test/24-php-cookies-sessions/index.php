<?php

    session_start();

    // $_SESSION['login'] = 'login_visiteur';
    // $_SESSION['is_admin'] = true;
    // $_SESSION['toto'] = ['tata', 'tutu'];

    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';
    exit;
                        