<?php
require_once "../../config/connection.php";
session_start();
if(isset($_POST['btnUpload'])){
    $file = $_FILES['uplPic'];

    $name =time()."_".$file["name"];
    $type = $file["type"];
    $tmpPath = $file["tmp_name"];
    $size = $file["size"];

    $allowedTypes = ["image/jpg","image/jpeg","image/png"];
    if(!in_array($type,$allowedTypes)){
        $_SESSION['errors'] = ["Allowed types are jpg,jpeg and png"];
        header("Location: ../../admin.php?page=changeProfilePic");
    }
    else{
        $newPath = "../../assets/img/$name";

        $uploaded = move_uploaded_file($tmpPath,$newPath);
    
        if($uploaded){
            $extension = pathinfo($newPath,PATHINFO_EXTENSION);
    
            $dimensions = getimagesize($newPath);
    
            list($width,$height) = $dimensions;
    
            $newWidth = 100;
            $newHeight = $height * $newWidth / $width;
    
            $image = imagecreatetruecolor($newWidth,$newHeight);
    
            switch ($extension) {
                case 'jpg':
                    $uploadedImage = imagecreatefromjpeg($newPath);
                    break;
                case 'jpeg':
                    $uploadedImage = imagecreatefromjpeg($newPath);
                    break;
                case 'png':
                    $uploadedImage = imagecreatefrompng($newPath);
                    break;
            }
    
            imagecopyresampled($image,$uploadedImage,0,0,0,0,$newWidth,$newHeight,$width,$height);
    
            $resizedImagePath = "../../assets/img/";
            $namePic = time()."_"."resizedImage.".$extension;
    
            switch ($extension) {
                case 'jpg':
                    imagejpeg($image,$resizedImagePath.$namePic);
                    break;
                case 'jpeg':
                    imagejpeg($image,$resizedImagePath.$namePic);
                    break;
                case 'png':
                    imagepng($image,$resizedImagePath.$namePic);
                    break;
            }
    
            require_once "insertImageIntoDb.php";
    
           try {
             $insert = insert();
             if($insert){
                header("Location: ../../admin.php?page=changeProfilePic");
            }
           } catch (PDOException $e) {
               echo $e->getMessage();
           }
        }
    }
}