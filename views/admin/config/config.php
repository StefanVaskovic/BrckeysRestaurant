<?php
    define('ABSOLUTE_PATH', $_SERVER['DOCUMENT_ROOT']."/foodee/");

    define('ENV_FILE',ABSOLUTE_PATH."views/admin/config/.env");
    define('LOG_FILE',ABSOLUTE_PATH."views/admin/data/log.txt");
    define('ERROR_FILE',ABSOLUTE_PATH."views/admin/data/errors.txt");
    define('LOGIN_FILE',ABSOLUTE_PATH."views/admin/data/login.txt");


    define("DBNAME", env("DBNAME"));
    define("SERVER", env("SERVER"));
    define("USERNAME", env("USERNAME"));
    define("PASSWORD", env("PASSWORD"));

    function env($name){
        fopen(ENV_FILE,"r");
        $data = file(ENV_FILE);
        foreach ($data as $item) {
            $arrayFile = explode("=",trim($item));
            $nameFile = $arrayFile[0];
            $valueFile = $arrayFile[1];
            if($name == $nameFile){
                return $valueFile;
            }
        }
    }

?>