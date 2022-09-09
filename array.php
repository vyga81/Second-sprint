<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>array</title>
</head>

<body>
    <h1>sort--Rikiavimas → sort($my_array), rsort(), asort(), ksort(), arsort(), krsort(), etc;
    </h1>
    <br>

    <?php
    $my_array = [99, 12, 40, 46, 9, 51];
    $my_negative = [99, -55, 40, 46, 9, -51];
    sort($my_array);
    var_dump($my_array);
    print("<br>");
    rsort($my_array);
    var_dump($my_array);
    print("<br>");
    asort($my_array);
    var_dump($my_array);
    print("<br>");
    ksort($my_array);
    var_dump($my_array);
    print("<br>");
    print("<br>");
    print("<br>");
    print("<br>");
    print("<br>");
    echo '<pre>Narių kiekis masyve (jo ilgis) 	→ count($my_array)
    </pre>';
    echo '<pre>$my_array = [99, 12, 40, 46, 9, 51];</pre>';
    count($my_array);
    print_r(count($my_array));
    print("<br>");
    print("<br>");
    print("<br>");
    echo '<pre>Reikšmės pakeitimas (pasiekti+priskirti) 	→ $my_array[1] = 55;
    </pre>';
    $my_array[1] = 55;
    echo '<pre>$my_array = [99, 12, 40, 46, 9, 51];</pre>';
    count($my_array);
    var_dump($my_array);
    print("<br>");
    print("<br>");
    print("<br>");
    echo '<pre>Vienmačiu masyvu; (array_sum, min, max)
    </pre>';
    // echo '<pre>$my_array = [99, 55, 40, 46, 9, 51];</pre>';
    echo '<pre>$my_negative = [99, -55, 40, 46, 9, -51];</pre>';
    print_r(($my_array));
    print("<br>");
    print("<br>");
    print_r(array_sum($my_array));
    print("<br>");
    print_r(array_sum($my_negative));

    print("<br>");
    print("<br>");

    // $personal_mass = array(
    //    " Vytas" => 89;
    //     "Domas" => 120;
    // )

    $arr = [0, 1, 2, 3];
    echo '<pre>$arr = [0, 1, 2, 3]</pre>';
    echo '<pre>array_slice($arr, 1, 2, true))</pre>';
    print_r(array_slice($arr, 1, 2, true));
    print("<br>");
    print_r($arr);
    print("<br>");
    print("<br>");
    print_r(array_splice($arr, 1, 2, ['a', 'b']));
    print_r($arr);

    print("<br>");
    print("<br>");
    $sum_arr = [25, 50, 90, 2.5, 100];
    echo '<pre>$sum_arr=[25,50,90,2.5,100]</pre>';
    print("<br>");
    print("<br>");
    print_r(array_sum($sum_arr));
    print("<br>");
    print("<br>");
    echo '<pre>Reikšmių minimumas ir maksimumas: → min($my_array) ir max($my_array)</pre>';
    echo '<pre>$sum_arr=[25,50,90,2.5,100]</pre>';
    print("<br>");
    print("<br>");
    echo '<pre> min($my_array)=== </pre>';
    print_r(min($sum_arr));
    print("<br>");
    echo '<pre> max($my_array)=== </pre>';
    print_r(max($sum_arr));
    print("<br>");
    print("<br>");
    echo '<pre>Paieška → array_search($value_to_find, $array, strict_parameter); </pre>';
    $search_array = [3, 5, 6, 6, 6, 0, 2, 1, 4, 9, 7, 23, 34, 12, 11, 10, 23];
    echo '<pre>$search_array = [3, 5, 6, 6, 9, 0, 2, 1, 4, 6, 7, 23, 34, 12, 11, 10, 23]</pre>';
    var_dump(array_search(6, $search_array, true));
    print("<br>");
    echo '<pre>Filtravimas → array_filter($my_array, $callback_function, $flag);  // ARRAY_FILTER_USE_[KEY | BOTH] </pre>';
    $filtr_array = [3, 5, 6, 6, 6, 0, 2, 1, 4, 9, 7, 23, 34, 12, 11, 10, 23];
    echo '<pre>$search_array = [3, 5, 6, 6, 6, 0, 2, 1, 4, 9, 7, 23, 34, 12, 11, 10, 23]</pre>';
    var_dump(array_search(10, $filtr_array, true));
    print("<br>");
    print("<br>");
    print("<br>");
    print("<br>");
    $weight_array = [
        "Tomas" => 89.7,
        "Petras" => 110.4,
        "Antanas" => 99.2,
        "Linas" => 75.8,
        "Gabrielius" => 66.6,
        "Inga" => 58.2
    ];
    echo '<pre>$weight_array = array(
            "Tomas" => 89,
            "Petras" => 110,
            "Antanas" => 99,
            "Linas" => 75,
            "Gabrielius" => 66
            "Inga" => 58.2

        )</pre>';
    var_dump(array_keys($weight_array));
    print("<br>");
    print("<br>");
    print("<br>");
    print("<br>");
    foreach ($weight_array as $x => $value) {
        echo "$x = $value <br>";
    }
    echo '<pre>Suranda maziausia svori</pre>';
    echo min($weight_array) . '. ' . 'Kg';
    print("<br>");
    print("<br>");
    echo '<pre>Suranda didziausia svori</pre>';
    echo max($weight_array) . '. ' . 'Kg';
    print("<br>");
    print("<br>");
    echo '<pre>bendras visu zmoniu svoris</pre>';
    echo array_sum($weight_array) . '. ' . 'Kg';
    $mass = array_sum($weight_array);
    print("<br>");
    print("<br>");
    echo $mass;
    if ($mass < 500) {
        echo '<pre>Jusu bendras svoris yra </pre>' . "$mass" . '<pre>liftu kilt galima </pre>';
    } else {
        echo '<pre>Liftas jusu nebekels, jusu bendras svoris</pre>' . "$mass" . 'Kg' . '<pre>svoris virsija 500 kg leistina norma</pre>';
    }

    print("<br>");
    print("<br>");
    print("<br>");
    print("<br>");
    $weight_array_randMath = [
        "Tomas" => mt_rand(69.7, 109.7),
        "Petras" => mt_rand(90.4, 130.4),
        "Antanas" => mt_rand(79.2, 119.2),
        "Linas" => mt_rand(55.8, 95.8),
        "Gabrielius" =>  mt_rand(46.6, 86.6),
        "Inga" => mt_rand(38.2, 78.2)
    ];
    var_dump(array_keys($weight_array_randMath));
    echo '<pre>Suranda maziausia svori</pre>';
    echo min($weight_array_randMath) . '. ' . 'Kg';
    print("<br>");
    print("<br>");
    echo '<pre>Suranda didziausia svori</pre>';
    echo max($weight_array_randMath) . '. ' . 'Kg';
    print("<br>");
    print("<br>");
    echo '<pre>bendras visu zmoniu svoris</pre>';
    echo array_sum($weight_array_randMath) . '. ' . 'Kg';
    $mass_randMath = array_sum($weight_array_randMath);
    print("<br>");
    print("<br>");
    echo $mass_randMath;
    if ($mass_randMath <= 500) {
        echo '<pre>Jusu bendras svoris yra </pre>' . "$mass_randMath" . '<pre>liftu kilt galima </pre>';
    } else {
        echo '<pre>Liftas jusu nebekels, jusu bendras svoris</pre>' . "$mass_randMath" . 'Kg' . '<pre>svoris virsija 500 kg leistina norma</pre>';
    }
    print("<br>");
    print("<br>");
    asort($weight_array_randMath);
    print("<pre>");
    var_dump($weight_array_randMath);
    print("</pre>");
    print("<br>");
    print("<br>");


    $a1 = array("a" => "vyga", "b" => "mantas", "c" => "linas", "d" => "lukas", "e" => "mykolas", "f" => "brigita", "g" => "laimis");
    $a2 = array("a" => "sarunas", "b" => "mindaugas", "c" => "vilius", "d" => "rokas");
    array_splice($a1, 0, 2, $a2);
    print_r($a1);

    ?>



</body>

</html>