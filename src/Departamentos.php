<?php

require_once 'SqlProvider.php';

class Departamentos {



    var $depid = '', $nombre = '', $nombreresponsable = '', $ispublico = '', $autorespemail = '', $created = '', $updated = '', $firma = '';

    public function Copy($object) {

        foreach (get_object_vars($object) as $key => $value) {
            $this->$key = $value;
        }
    }

    public function GetById($depId) {
        if (isset($depId)) {
            $query = "select * from dptos_getbyid() where DepId = " . $depId . ";";
            $array = SqlProvider::Execute($query);

            if ($array) {
                $this->Copy($array[0]);
                return $this;
            } else
                return null;
        }
        return null;
    }

    public function SaveNew() {
        $ip = 'false';
        if ($this->ispublico == 1) {
            $ip = 'true';
        }
        $query = "select * from dptos_insert('" . $this->nombre . "','" . $this->nombreresponsable . "'," . $ip . ",'" . $this->created . "','" . $this->updated . "','" . $this->autorespemail . "','" . $this->firma . "');";
        $array = SqlProvider::Execute($query);

        if ($array) {
            return $array[0]->dptos_insert;
        } else {
            return null;
        }
    }

    public function Update() {
        $ip = 'false';
        if ($this->ispublico == 1) {
            $ip = 'true';
        }
        $query = "select * from dptos_update('" . $this->nombre . "','" . $this->nombreresponsable . "'," . $ip . ",'" . $this->autorespemail . "','" . $this->firma . "'," . $this->depid . ");";
        $array = SqlProvider::Execute($query);
        if ($array) {

            return $array[0];
        } else {
            return null;
        }
    }

    public function GetAll() {
        $query = "select * from dptos_getbyid() order by nombre asc;";
        $list = SqlProvider::Execute($query);
        if ($list) {

            return $list;
        } else {
            return null;
        }

    }

}
