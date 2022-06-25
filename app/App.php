<?php

declare(strict_types=1);

// Your Code

$records =  (array)[];
foreach ($files as $file) {

    $handler = fopen(FILES_PATH . $file, "r");

    $column = fgetcsv($handler);

    while (($record = fgetcsv($handler)) !== false) {
        array_push($records, array_combine($column, $record));
    }
}


function convertToFloat(array $record): float
{
    $phase1 = str_replace("$", "", $record["Amount"]);
    $phase2 = str_replace(",", "", $phase1);
    return floatval($phase2);
}


$amounts = array_map("convertToFloat", $records);

$totalIncome = array_sum(array_filter($amounts, fn ($num) => $num >= 0));
$totalExpense = array_sum(array_filter($amounts, fn ($num) => $num < 0));
$netTotal = $totalIncome + $totalExpense;
