<?php
require_once "../../config/connection.php";
include "../recommendedFood/functions.php";
$food = getRecommendedFood();
$putanja = ABSOLUTE_PATH . "views/admin/data/food.xlsx";


try {
    $excel = new COM("Excel.Application");
    $excel->Visible = 1;
    $excel->DisplayAlerts = 1;
    $workbook = $excel->Workbooks->Open($putanja) or die('File could not be opened!');
    $sheet = $workbook->Worksheets('Sheet1');
    $sheet->activate;

    $field = $sheet->Range("A1");
    $field->activate;	
    $field->Value = "Name of Food:";
    
    $field = $sheet->Range("B1");
    $field->activate;	
    $field->Value = "Description:";
    
    $br = 2;
    foreach ($food as $i) {
        $field = $sheet->Range("A{$br}");
        $field->activate;
        $field->value = $i->name;
        $field = $sheet->Range("B{$br}");
        $field->activate;
        $field->value = $i->description;
        $br++;
    }
    $field = $sheet->Range("C1");
    $field->activate;
    $field->value = $br - 1;
    $workbook->SaveAs(
        ABSOLUTE_PATH . "modules/users/users.xlsx",
        -4143
    );
    $workbook->Save();
    $workbook->Saved = true;
    $workbook->Close;
    $excel->Workbooks->Close();
    $excel->Quit();
    unset($sheet);
    unset($workbook);
    unset($excel);
} catch (Exception $e) {
    echo $e;
}
ob_clean();
header("Content-Type: application/octet-stream");
header("Content-Disposition: attachment; filename=download.xlsx");

readfile($putanja);
