<?php

// Home
$app
    ->get(
        '/',
        function($request, $response)
        {
            $viewData = [];

            return $this->view->render($response, 'pages/home.twig', $viewData);
        }
    )
    ->setName('home')
;

// Promotions
$app
    ->get(
        '/promotions',
        function($request, $response)
        {
            // Fetch promotions
            $query = $this->db->query('SELECT * FROM promotions');
            $promotions = $query->fetchAll();

            $viewData = [];
            $viewData['promotions'] = $promotions;

            return $this->view->render($response, 'pages/promotions.twig', $viewData);
        }
    )
    ->setName('promotions')
;

// Promotion
$app
    ->get(
        '/promotions/{year:[0-9]{4}}',
        function($request, $response, $arguments)
        {
            $viewData = [];

            return $this->view->render($response, 'pages/promotion.twig', $viewData);
        }
    )
    ->setName('promotion')
;

// Random student
$app
    ->get(
        '/students/random',
        function($request, $response)
        {
            return 'Random student';
        }
    )
    ->setName('random_student')
;

// Student
$app
    ->get(
        '/students/{slug:[a-z0-9-_]+}',
        function($request, $response, $arguments)
        {
            $viewData = [];

            return $this->view->render($response, 'pages/student.twig', $viewData);
        }
    )
    ->setName('student')
;