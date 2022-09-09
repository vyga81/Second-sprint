<?php
$color = 'black';
$link_color = 'red';

if (isset($_GET['color']))
    $color = $_GET['color'];

if (isset($_GET['color']) && $_GET['color'] === 'red')
    $link_color = 'black';

echo '<pre style="color: white;">';
print_r($_SERVER['REQUEST_URI']);
echo '</pre>';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $color; ?></title>
</head>

<body style="background: <?php echo $color; ?>;">
    <a href="?color=<?php echo $link_color; ?>"><?php echo $link_color; ?></a>
</body>

</html>