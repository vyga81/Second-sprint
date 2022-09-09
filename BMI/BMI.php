<?php include 'header.php'; ?>


<?php
$errh = $errw = $errg = "";
$height = $weight = "";
$bmipass = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (empty($_POST['height'])) {
        $errh = "<span style='color:#ed4337; font-size:17px; display:block'>Height is required</span>";
    } else {
        $height = validate($_POST['height']);
    }

    if (empty($_POST['weight'])) {
        $errw = "<span style='color:#ed4337; font-size:17px; display:block'>Weight is required</span>";
    } else {
        $weight = validate($_POST['weight']);
    }

    if (empty($_POST['height'] && $_POST['weight'])) {
        echo "";
    } else {
        $bmi = (($weight / ($height * $height)) * 10000);
        $bmipass = $bmi;
    }
}

function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<div class="Wrapper">
    <h2>Check your BMI</h2>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <div class="section1"><span>Enter your height :</span>
            <input type="text" name="height" autocomplete="off" placeholder="centimetres"><?php echo $errh; ?>
        </div>


        <div class="section2">
            <span>Enter your weight :</span>
            <input type="text" name="weight" autocomplete="off" placeholder="kilograms"><?php echo $errw; ?>
        </div>


        <div class="submit">
            <input type="submit" name="submit" value="Check BMI">
            <input type="reset" value="Clear">
        </div>


    </form>
</div>
<?php
error_reporting(0);
echo "<span class='pass'>Your BMI is : " . number_format($bmipass, 2) . "</span>";
if (isset($_POST['submit'])) {
    if ($bmipass >= 13.6 && $bmipass <= 18.5) {
        echo "<span style='color:#00203FFF; display:block; margin-top:5px ;margin-right:50px'> Low body weight. You need to gain weight by eating moderately.</span>"; ?>
        <img src="images/fav.png" class="one">
    <?php
    } elseif ($bmipass > 18.5 && $bmipass < 24.9) {
        echo "<span style='color:#00203FFF; display:block; margin-top:5px;margin-right:50px'> The standard of good health.</span>"; ?>
        <img src="images/fav.png" class="two">
    <?php
    } elseif ($bmipass > 25 && $bmipass < 29.9) {
        echo "<span style='color:#00203FFF; display:block; margin-top:5px;margin-right:50px'> Excess body weight. Exercise needs to reduce excess weight.</span>"; ?>
        <img src="images/fav.png" class="three">
    <?php
    } elseif ($bmipass > 30 && $bmipass < 34.9) {
        echo "<span style='color:#00203FFF; display:block; margin-top:5px;margin-right:50px'> The first stage of obesity. It is necessary to choose food and exercise.</span>"; ?>
        <img src="images/fav.png" class="four">
    <?php
    } elseif ($bmipass > 35 && $bmipass < 39.9) {
        echo "<span style='color:#00203FFF; display:block; margin-top:5px;margin-right:50px'> The second stage of obesity. Moderate diet and exercise are required.</span>"; ?>
        <img src="images/fav.png" class="five">
    <?php
    } elseif ($bmipass >= 40) {
        echo "<span style='color:#00203FFF; display:block; margin-top:450px; margin-right:500px'> Excess fat.<b style='color:#ed4337'> Fear of death</b>. Need a doctor advice.</span>"; ?>
        <img src="images/fav.png" class="six">
<?php
    }
} else {
    echo "";
}
?>

<?php include 'footer.php'; ?>