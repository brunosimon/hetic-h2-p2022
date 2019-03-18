<?php

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'https://pokeapi.co/api/v2/pokemon/ditto/');
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($curl);
$result = json_decode($result);
echo '<pre>';
print_r($result);
echo '</pre>';
exit;