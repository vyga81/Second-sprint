<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>array</title>
</head>

<body>
    <?php

    $ind_array = [7, 4, 9, 12, 21, 13, 23, 8, 11, 20, 17];

    sort($ind_array);
    $comma_array = implode(",", $ind_array);
    echo $comma_array;

    print '</br>';
    print '</br>';
    print '</br>';
    print '</br>';
    print '</br>';
    print '</br>';


    $asoc_array = [
        "Tomas" => 89.7,
        "Petras" => 110.4,
        "Antanas" => 99.2,
        "Linas" => 75.8,
        "Gabrielius" => 66.6,
        "Inga" => 58.2
    ];
    print '</br>';
    print '</br>';
    print("<pre>");
    print_r(array_keys($asoc_array));
    print_r($asoc_array);

    print_r(array_values($asoc_array));

    print("</pre>");

    foreach ($asoc_array as $x => $value) {
        // if ($x < count($asoc_array)) {
        //     echo "$x" . "," . " <br>";
        // } else {
        //     echo "$value" . "" . " <br>";
        // }
        print("<pre>");
        print_r($x);

        print("</pre>");
    }

    // if (!$value == count($asoc_array)) {
    // echo ($value);
    // }
    //  else {
    // $value == count($asoc_array);
    // " $value  " . "" . " <br>";
    // }
    // echo ($value);




    print '</br>';
    print '</br>';
    // foreach ($ind_array as $x => $x_value) {
    //     echo "Key=" . $x . ", Value=" . $x_value;
    //     echo "<br>";
    // str_split($comma_array, count($comma_array));
    // $ind_array = sort($comma_array);
    //echo $comma_array;
    // for ($i = 0; $i < count($ind_array); $i++); {
    //     sort($ind_array);
    //     if ($i == !count($ind_array)) {
    //         implode(",", $ind_array);
    //     } else ($ind_array . ' ');
    // }
    // print_r($ind_array)

    // $people = array("Peter", "Joe", "Glenn", "Cleveland");



    // echo current($people) . "<br>";
    // echo end($people);


    ?>

</body>

</html>