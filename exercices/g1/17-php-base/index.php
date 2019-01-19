<?php

    // $foo = 'bar';
    // $foo = 12;
    // $foo = 12.5;
    // $foo = array();
    // $foo = [
    //     'coucou',
    //     [
    //         true,
    //         false,
    //         [
    //             'encore coucou',
    //             13
    //         ]
    //     ]
    // ];
    // echo $foo[1][2][1];
    // $foo = false;
    // $foo = new stdClass();
    // echo gettype($foo);

    // $toto = 'foo';
    // $tata = 'bar';
    // $tutu = "$toto $tata";
    // echo $tutu;

    // define('TOTO', 'quelque chose');
    // echo TOTO;

    // for($i = 0; $i < 10; $i++)
    // {
    //     echo '<br>'.$i;
    //     echo "<br>$i";
    // }

    // $i = 0;

    // while($i < 10)
    // {
    //     echo '<br>'.++$i;
    // }

    $monTableau = [
        'toto' => 'un',
        'tata' => 'deux',
        'tutu' => true,
        'titi' => false,
        'tete' => 5
    ];

    foreach($monTableau as $_key => $_item)
    {
        echo '<br>'.$_key.' = '.$_item;
    }
    
