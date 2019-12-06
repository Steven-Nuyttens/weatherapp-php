<!doctype html>
<html>
<head>
<meta charset="UTF-8" />
    <title>Exercise OpenWeatherMap with PHP</title>
</head>
<body>
    <h1>Check the weather</h1>
    <div>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<input id="input" name="input" type="text" placeholder="City">
<input type="submit" value="Submit">
</form>
</div>
<style>
body {
background-image: url("img/566396.jpg");
background-repeat: no-repeat;
color: white;
}
.card {
    margin: 3px;
    border: 2PX;
    padding: 5px;
    display: flex;
    justify-content: center;
}
</style>
<?php
if (isset($_POST["input"])) { ?>
<h2><?php $_POST["input"]?></h2>

<?php
 $url ="http://api.openweathermap.org/data/2.5/forecast?q=".$_POST["input"]."&units=metric&appid=45f97520bd39e147cf6fa52afd05b530";

 $json = file_get_contents($url);
        $info = json_decode($json);
        $list = $info->list;
    for( $i = 0; $i < count($list); $i+=8){ ?>
    <div class="card">
    <?php
    $date = $list[$i]->dt;
    $temp = $list[$i]->main->temp;
    $wind = $list[$i]->wind->speed;
    $weather = $list[$i]->weather[0]->description;
    $icon = $list[$i]->weather[0]->icon;
    ?>
    <p style="font-weight: bold">Date: <?php echo(date("l d/m",$date)); ?></p> 
    <p><strong>Temp:</strong> <?php echo($temp); ?>°C</p>  
    <p><strong>Wind:</strong> <?php echo($wind); ?> km/h</p> 
    <p><?php echo($weather); ?></p>
    <img src="img/<?php echo($icon)?>.png">  
    </div>
<?php } }?>


</body>
</html>








































 
