<?php

    $city = isset($_GET['city']) ? $_GET['city'] : 'Paris';
    $url = 'http://api.openweathermap.org/data/2.5/weather?q='.$city.'&APPID=9e8150c9d6fbf87d678d2cf7f7a2c00a&units=metric';
    $cacheKey = md5($url);
    $path = './cache/'.$cacheKey;
    $fromCache = false;

    if(file_exists($path) && time() - filemtime($path) < 60)
    {
        $data = file_get_contents($path);
        $fromCache = true;
    }
    else
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($curl);
        curl_close($curl);

        file_put_contents($path, $data);
    }

    $data = json_decode($data);

    $staticMapUrl = 'https://maps.googleapis.com/maps/api/staticmap?';
    $staticMapUrl .= http_build_query([
        'center' => $data->coord->lat.','.$data->coord->lon,
        'markers' => $data->coord->lat.','.$data->coord->lon,
        'zoom' => 11,
        'size' => '300x300',
        'key' => 'AIzaSyB6u8RLqSXjwSCunqI-U9Mzz0s-JYNKWrc',
    ]);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>API Meteo</title>
</head>
<body>
    <!-- Form -->
    <form action="#" method="get">
        <input type="text" name="city" value="<?= $city ?>">
        <input type="submit">
    </form>

    <!-- Results -->
    <section>

        <?php if($data->cod === 200): ?>

            <h1>Results for <?= $data->name ?></h1>
            <?= $fromCache ? '(from cache)' : '' ?>

            <br><img width="300" height="300" src="<?= $staticMapUrl ?>" alt="">

            <h3>Weather</h3>
            <?php foreach($data->weather as $_weather): ?>
                <div><?= $_weather->description ?></div>
            <?php endforeach; ?>

            <h3>Temperature</h3>
            <div>Min: <?= $data->main->temp_min ?></div>
            <div>Max: <?= $data->main->temp_max ?></div>
            <div>Current: <?= $data->main->temp ?></div>

            <h3>Humidity</h3>
            <div><?= $data->main->humidity ?>%</div>

            <h3>Pressure</h3>
            <div><?= $data->main->pressure ?> hPa</div>

        <?php else: ?>

            <h1>No result</h1>
            
        <?php endif; ?>

    </section>
</body>
</html>