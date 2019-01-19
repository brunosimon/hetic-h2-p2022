<?

    // $foo = 'bar';
    // $foo = 13;
    // $foo = 13.37;
    // $foo = array('un', 'tableau', 13, true, false);
    // $foo = true;
    // $foo = new stdClass();

    // $foo = [
    //     'un',
    //     'deux',
    //     [
    //         'coucou',
    //         'hello',
    //         [
    //             'a',
    //             'b',
    //             'c',
    //         ],
    //     ],
    // ];
    // echo $foo[2][2][1];




    // $toto = 'foo';
    // $tata = 'bar';
    // $titi = 'hello';
    // // $tutu = $toto.' '.$tata;
    // $tutu = "kikoo $toto $tata $titi";

    // echo $tutu;


    // define('TOTO', 'tata');
    // echo TOTO;

    // for($i = 0; $i < 10; $i++)
    // {
    //     echo '<br>'.$i;
    // }
    
    // $i = 0;

    // while($i < 9)
    // {
    //     echo '<br>'.++$i;
    // }

    $myArray = [
        'toto' => 'un',
        'tata' => 'deux',
        'tutu' => 3,
        'titi' => true,
        'tete' => false,
        'tttt' => []
    ];

    echo $myArray['tutu'];

    foreach($myArray as $_key => $_item)
    {
        echo '<br>'.$_key.' = '.$_item;
    }

