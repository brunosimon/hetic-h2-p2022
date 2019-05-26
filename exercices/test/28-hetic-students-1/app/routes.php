<?php

// Home
$app
    ->get(
        '/',
        function($request, $response)
        {
            $dataView = [];

            return $this->view->render($response, 'pages/home.twig', $dataView);
        }
    )
    ->setName('home')
;

$app
    ->get(
        '/promotions',
        function($request, $response)
        {
            // Find promotion
            $query = $this->db->query('SELECT * FROM promotions');
            $promotions = $query->fetchAll();

            // Data view
            $dataView = [];
            $dataView['promotions'] = $promotions;
            
            return $this->view->render($response, 'pages/promotions.twig', $dataView);
        }
    )
    ->setName('promotions')
;

$app
    ->get(
        '/promotions/{year:[0-9]{4}}',
        function($request, $response, $arguments)
        {
            // Find promotion
            $prepare = $this->db->prepare('SELECT * FROM promotions WHERE year = :year');
            $prepare->bindValue('year', $arguments['year']);
            $prepare->execute();
            $promotion = $prepare->fetch();

            // Promotion not found
            if(!$promotion)
            {
                throw new \Slim\Exception\NotFoundException($request, $response);
            }

            // Find students
            $prepare = $this->db->prepare('SELECT * FROM students WHERE id_promotion = :id_promotion');
            $prepare->bindValue('id_promotion', $promotion->id);
            $prepare->execute();
            $students = $prepare->fetchAll();

            // Data view
            $dataView = [];
            $dataView['promotion'] = $promotion;
            $dataView['students'] = $students;
            
            return $this->view->render($response, 'pages/promotion.twig', $dataView);
        }
    )
    ->setName('promotion')
;

$app
    ->get(
        '/students/random',
        function($request, $response)
        {
            // Fetch random student
            $query = $this->db->query('SELECT * FROM students ORDER BY RAND() LIMIT 1');
            $student = $query->fetch();

            // Create URL to the random student
            $url = $this->router->pathFor('student', [ 'slug' => $student->slug ]);

            return $response->withRedirect($url);
        }
    )
    ->setName('random_student')
;

$app
    ->get(
        '/students/{slug:[a-zA-Z0-9_-]+}',
        function($request, $response, $arguments)
        {
            // Find student
            $prepare = $this->db->prepare('SELECT * FROM students WHERE slug = :slug');
            $prepare->bindValue('slug', $arguments['slug']);
            $prepare->execute();
            $student = $prepare->fetch();

            // Student not found
            if(!$student)
            {
                throw new \Slim\Exception\NotFoundException($request, $response);
            }

            // Find promotion
            $prepare = $this->db->prepare('SELECT * FROM promotions WHERE id = :id');
            $prepare->bindValue('id', $student->id_promotion);
            $prepare->execute();
            $promotion = $prepare->fetch();

            // Promotion not found
            if(!$promotion)
            {
                throw new \Slim\Exception\NotFoundException($request, $response);
            }

            // Data view
            $dataView = [];
            $dataView['student'] = $student;
            $dataView['promotion'] = $promotion;
            
            return $this->view->render($response, 'pages/student.twig', $dataView);
        }
    )
    ->setName('student')
;
