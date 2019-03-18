<?php

    // Get city and use Paris as default
    $city = !empty($_GET['city']) ? $_GET['city'] : 'Paris';

    // Create URL
    $url = 'https://api.openweathermap.org/data/2.5/weather?';
    $url .= http_build_query([
        'q' => $city,
        'appid' => 'ba72531e0013533820c0ca21c3ae1e83',
        'units' => 'metric',
    ]);
    
    // Cache info
    $cacheKey = md5($url);
    $cachePath = './cache/'.$cacheKey;
    $cacheUsed = false;

    // Cache available
    if(file_exists($cachePath) && time() - filemtime($cachePath) < 60)
    {
        $result = file_get_contents($cachePath);
        $cacheUsed = true;
    }

    // Cache not available
    else
    {
        // Make request to API
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        $result = curl_exec($curl);
        curl_close($curl);

        // Save API in cache
        file_put_contents($cachePath, $result);
    }

    // Decode JSON
    $result = json_decode($result);

    // Create static map URL
    if(!empty($result) && $result->cod === 200)
    {
        $staticMapUrl = 'https://maps.googleapis.com/maps/api/staticmap?';
        $staticMapUrl .= http_build_query([
            'center' => $result->coord->lat.','.$result->coord->lon,
            'markers' => $result->coord->lat.','.$result->coord->lon,
            'zoom' => 10,
            'size' => '300x300',
            'key' => 'AIzaSyB6u8RLqSXjwSCunqI-U9Mzz0s-JYNKWrc',
        ]);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>API</title>
</head>
<body>
    
    <!-- Form -->
    <form action="#" method="get">
        <input type="text" name="city" placeholder="Paris" required value="<?= $city ?>">
        <input type="submit">
    </form>

    <!-- Result -->
    <h1>Météo pour <?= $city ?></h1>

    <?php if($result->cod !== 200): ?>

        City not found

    <?php else: ?>

        <?= $cacheUsed ? '[from cache]<br>' : '' ?>

        <img src="<?= $staticMapUrl ?>" width="150" height="150">

        <h3>Weather</h3>

        <?php foreach($result->weather as $_weather): ?>
            <div><?= $_weather->description ?></div>
        <?php endforeach; ?>

        <h3>Temperature</h3>
        <div>Min: <?= $result->main->temp_min ?>°</div>
        <div>Max: <?= $result->main->temp_max ?>°</div>
        <div>Current: <?= $result->main->temp ?>°</div>

    <?php endif ?>

</body>
</html>