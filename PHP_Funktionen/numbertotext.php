<?php function numberToWords($number) {
    $words = array(
        1 => 'ein',
        2 => 'zwei',
        3 => 'drei',
        4 => 'vier',
        5 => 'fünf',
        6 => 'sechs'
        // set numbers
    );

    //check if number is in array
    if (array_key_exists($number, $words)) {
        return $words[$number];
    } else {
        return 'Unbekannt'; //number not in array
    }
} ?>