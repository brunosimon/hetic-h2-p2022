<?php

/**
 * Extract promotions
 */
// $pattern = '/p20[0-9][0-9]/i';
// $subject = 'Bonjour la P2022, vous succédez à la p2021 et ferez place à la P2023';
// $matches = [];

// preg_match_all($pattern, $subject, $matches);

// echo '<pre>';
// print_r($matches);
// echo '</pre>';
// exit;




/**
 * Censorship
 */
// $pattern = '/f.*ck|merde/i';
// $subject = 'F.ck la police de merde';
// $result = preg_replace($pattern, '!@#$%^&*', $subject);

// echo '<pre>';
// print_r($result);
// echo '</pre>';
// exit;



/**
 * Tweet
 */
$tweet = 'After a month at the @Space_Station, Dragon is scheduled to return tomorrow with over 5,400 pounds of cargo. http://nasa.gov/ntv #space';

$tweet = preg_replace(
    '/(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w\.-]*)*\/?/',
    '<a href="$0">$0</a>',
    $tweet
);

$tweet = preg_replace(
    '/@([a-z_]+)/i',
    '<a href="https://twitter.com/$1">$0</a>',
    $tweet
);

$tweet = preg_replace(
    '/#([a-z_]+)/i',
    '<a href="https://twitter.com/hashtag/$1">$0</a>',
    $tweet
);

echo $tweet;