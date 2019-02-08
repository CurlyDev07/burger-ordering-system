<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Practie json</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body onload="startTime()" id="body" class="" >
    

<?php
    $get_json_data = file_get_contents("json_files/data.json");
    $jason_data = json_decode($get_json_data, true);// returns the whole json object

// NOTES
    // 1.$jason_data -> returns the whole jason object
    // 2.$key1 -> returns the index number of $value1 array ... this returns this [0][1][2][3][4].
    // 3.$key2 -> returns the assoc array of $value2 ... this returns this [bread],[sauce],[sandwich_type],[cheese],[veggies].
    // 4.$key3 -> returns the index number of $value3 ... this returns this [0][1] so on and its depends on how many key and value pairs are set.
    // 5.$value3 -> returns the value of key3 ... this returns this [Cucumber],[Lettuce],[Spinach],[Tomato],[Olives]. depends on how many key and value pairs are set.

// MINIMAP
        // Array --------------------------->$jason_data
        // (
        //     [0] => Array  --------------------------->$key1
        //         (
        //             [bread] => Array --------------------------->$key2
        //                 (
        //                     [0] --------------------------------------->$key3
        //                        => Whole Wheat------------------------------->$value3
        //                     [1] => Italian Herb
        //                     [2] => Japanese Parmasen
        //                 )
        //         )
        // )

    foreach ($jason_data as $key1 => $value1) {
        // echo "key1: ".$key1."<br>";

        foreach ($value1 as $key2 => $value2) {
            // echo "key2: ".$key2."<br>";

            foreach ($value2 as $key3 => $value3) {
                echo "key3: ".$key3."<br>";
                // echo "value3: ".$value3."<br>";
            }

        }//$key2
    }// $key1

    echo "<pre>";
        print_r($jason_data);
    echo "<pre>";
?>  





</body>
</html>


