<?php
 

    $word = new COM("word.application") or die("Fail to make word instance");
    $word->Visible = 0;

    $word->Selection->Font->Name="Arial";
    $word->Selection->Font->Size=16;
    $word->Selection->TypeText("\t Name: Stefan Vaskovic 124/18 \n");

    $file = tempnam("../../data","CV");
    $word->Documents[1]->SaveAs($file);
    $word->Quit();
    unset($word);

    header("Content-Type: application/octet-stream");
    header("Content-Disposition: attachment; filename=download.docx");

    readfile($file);
    unlink($file);
?>