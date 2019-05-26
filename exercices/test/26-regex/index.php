<?php

/**
 * Tests
 */
// if(preg_match('/\w/', '_'))
//     die('vrai');
// else
//     die('faux');



/**
 * Extract promotions
 */
// $matches = [];
// $subject = 'Bonjour la P2022, vous succédez à la p2021 et ferez place à la P2023';
// $pattern = '/[pP]20[0-9]{2}/';

// preg_match_all($pattern, $subject, $matches);




/**
 * Censorship
 */
// $subject = 'Foooock la police de merde';
// $pattern = '/f.*ck|merde/i';
// $result = preg_replace($pattern, '!@#$%^&*', $subject);

// echo '<pre>';
// print_r($result);
// echo '</pre>';
// exit;




/**
 * Tweet format
 */
$tweet = 'After a month at the @Space_Station, Dragon is scheduled to return tomorrow with over 5,400 pounds of cargo. http://nasa.gov/ntv #space';

$tweet = preg_replace('/(https?:\/\/)?(([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w\.-]*)*\/?)/', '<a href="$0">$2</a>', $tweet);
$tweet = preg_replace('/@(\w+)/', '<a href="https://twitter.com/$1">@$1</a>', $tweet);
$tweet = preg_replace('/#(\w+)/', '<a href="https://twitter.com/hashtag/$1">#$1</a>', $tweet);

echo '<pre>';
print_r($tweet);
echo '</pre>';
exit;