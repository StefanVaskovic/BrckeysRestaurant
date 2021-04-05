<?php
    require_once "../config/connection.php";
    function allPages()
    {
        return
            ["Home", "About", "Reservation", "Register", "Login", "Food", "Profile Picture"];
    }
    
    function accessToPagesPercentage()
    {
        $array = [];
        $sum = 0;
        $home = 0;
        $author = 0;
        $contact = 0;
        $registration = 0;
        $login = 0;
        $food = 0;
        $profilePicture = 0;
        $oneDayAgo = strtotime("1 day ago");
    
        
        @$file = file(LOG_FILE);
        if (count($file)) {
            foreach ($file as $item) {
                $delovi = explode("__", $item);
                $url = explode(".php", $delovi[0]);
                if(strpos(@$url[1],"&")){
                    $strana = explode("&",$url[1])[0];
                }
                else{
                    @$strana = $url[1];
                }
                if (strtotime(@$delovi[2]) >= $oneDayAgo) {
                    switch ($strana) {
                        case "":
                            $home++;
                            $sum++;;
                            break;
                        case "?page=home":
                            $home++;
                            $sum++;;
                            break;
                        case "?page=about":
                            $author++;
                            $sum++;;
                            break;
                        case "?page=reservation":
                            $contact++;
                            $sum++;;
                            break;
                        case "?page=register":
                            $registration++;
                            $sum++;;
                            break;
                        case "?page=login":
                            $login++;
                            $sum++;;
                            break;
                        case "?page=foodMenu":
                            $food++;
                            $sum++;;
                            break;
                        case "?page=changeProfilePic":
                            $profilePicture++;
                            $sum++;;
                            break;
                        default:
                            $home++;
                            $sum++;;
                            break;
                    }
                }
            }
            if ($sum > 0) {
                $array[] = round($home * 100 / $sum, 2);
                $array[] = round($author * 100 / $sum, 2);
                $array[] = round($contact * 100 / $sum, 2);
                $array[] = round($registration * 100 / $sum, 2);
                $array[] = round($login * 100 / $sum, 2);
                $array[] = round($food * 100 / $sum, 2);
                $array[] = round($profilePicture * 100 / $sum, 2);
            }
        }
        return $array;
    }
    
    function noteLogin($id)
    {
        @$file = fopen(LOGIN_FILE, "a");
        $input = $id . "\n";
        @fwrite($file, $input);
        @fclose($file);
    }
    function numberOfLoggedInUsers()
    {
        return count(file(LOGIN_FILE));
    }
    
    function deleteLoggedInUsers($id)
    {
        $id = (int) $id;
        $input = "";
        @$file = file(LOGIN_FILE);
        if (count($file)) {
            foreach ($file as $item) {
                $idInFile = trim((int) $item);
                if ($idInFile != $id) {
                    $input .= $idInFile . "\n";
                }
            }
        }
        @$file = fopen(LOGIN_FILE, "w");
        @fwrite($file, $input);
        @fclose($file);
    }
    
    
?>