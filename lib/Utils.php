<?php

/**
 * 
 */
class Utils {

    public  static function dataDif($data1, $data2, $intervalo) {//calcula intervalo entre datas
        switch ($intervalo) {
            case 'ano':
                $Q = 86400 * 365;
                break; //ano
            case 'mes':
                $Q = 2592000;
                break; //mes
            case 'dia':
                $Q = 86400;
                break; //dia
            case 'hora':
                $Q = 3600;
                break; //hora
            case 'min':
                $Q = 60;
                break; //minuto
            default:
                $Q = 1;
                break; //segundo
        }
        return round((strtotime($data2) - strtotime($data1)) / $Q);
    }

    public  static function valida_data($data) {
        $data = split("[-,/]", $data);
        if (!checkdate($data[1], $data[0], $data[2]) and !checkdate($data[1], $data[2], $data[0])) {
            return false;
        }
        return true;
    }
    public  static function converte_data($data) {
        if (Utils::valida_data($data)) {
            return implode(!strstr($data, '/') ? "/" : "-", array_reverse(explode(!strstr($data, '/') ? "-" : "/", $data)));
        }
    }

//funcao que copia os arquivos da pasta 'template' para o 'notice'
    public  static function copy_r( $path, $dest ) {
        if (is_dir($path)) {
            @mkdir($dest);
            $objects = scandir($path);
            if (sizeof($objects) > 0) {
                foreach ($objects as $file) {
                    if ($file == "." || $file == "..")
                        continue;
                    if (is_dir($path . DS . $file)) {
                        copy_r($path . DS . $file, $dest . DS . $file);
                    } else {
                        copy($path . DS . $file, $dest . DS . $file);
                    }
                }
            }
            return true;
        } elseif (is_file($path)) {
            return copy($path, $dest);
        } else {
            return false;
        }
    }
}
