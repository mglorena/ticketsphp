<?php

class SqlProvider {

    
    public function Execute($query) {
        $conexion = pg_connect("host=localhost dbname=tdd user=tdd password=tdd");
        $result = pg_query($query) or die('Query failed: ' . pg_last_error());
        $array = array();
        while ($row = pg_fetch_object($result)) {
            $array[] = $row;
        }
        pg_free_result($result);
        pg_close($conexion);
        return $array;
        
    }

}
