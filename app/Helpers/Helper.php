<?php

namespace App\Helpers;

use App\Helpers\UserHelper;
use Illuminate\Auth\Access\AuthorizationException;

class Helper
{
    public static function modelTable($table)
    {
        $header = $table[0];
        $content = $table[1];
        $footer = null;
        $tableId = null;

        if (array_key_exists(2, $table)) {
            $footer = $table[2];
        }

        if (array_key_exists(3, $table)) {
            $tableId = $table[3];
        }

        return view('model.table', compact('header', 'content', 'footer', 'tableId'));
    }

    public static function modelAction($action = null)
    {
        return view('model.action');
    }

    public static function validatePermission($permission, $perm_type)
    {
        if (!UserHelper::hasPermission($permission, $perm_type)) {
            throw new AuthorizationException(__("Permissão não permitida: :perm do tipo: :type", ['perm' => $permission, 'type' => $perm_type]));
        }
    }

    public static function taxFormat($taxa)
    {
        return str_replace('.', ',', (((float)$taxa - 1) * 100)) . "%";
    }

    public static function getStates()
    {
        $states = array(
            "1" => "Acre",
            "2" => "Alagoas",
            "3" => "Amapá",
            "4" => "Amazonas",
            "5" => "Bahia",
            "6" => "Ceará",
            "7" => "Distrito Federal",
            "8" => "Espírito Santo",
            "9" => "Goiás",
            "10" => "Maranhão",
            "11" => "Mato Grosso",
            "12" => "Mato Grosso do Sul",
            "13" => "Minas Gerais",
            "14" => "Pará",
            "15" => "Paraíba",
            "16" => "Paraná",
            "17" => "Pernambuco",
            "18" => "Piauí",
            "19" => "Rio de Janeiro",
            "20" => "Rio Grande do Norte",
            "21" => "Rio Grande do Sul",
            "22" => "Rondônia",
            "23" => "Roraima",
            "24" => "Santa Catarina",
            "25" => "São Paulo",
            "26" => "Sergipe",
            "27" => "Tocantins"
        );

        return $states;
    }

    public static function dateFormat($date, string|null $format = "d/m/Y H:i:s")
    {
        return date($format, strtotime($date));
    }

    public static function monetaryRealValue($value)
    {
        if (empty($value)) {
            return "R$ 0,00";
        } else if (fmod($value, 1) == 0) {
            $formatted_value = number_format($value, 2, ',', '.');
            return "R$ " . $formatted_value;
        } else {
            //$formatted_value = number_format($valor * 100, 2, ',', '.');
            $formatted_value = number_format($value, 2, ',', '.');
            return "R$ " . $formatted_value;
        }
    }

    public static function dateFormatOnlyDate($date, string|null $format = "d/m/Y")
    {
        return date($format, strtotime($date));
    }

    public static function removeBomUtf8($s)
    {
        if (substr($s, 0, 3) == chr(hexdec('EF')) . chr(hexdec('BB')) . chr(hexdec('BF'))) {
            return substr($s, 3);
        } else {
            return $s;
        }
    }

    public static function clearString($string)
    {
        $string = self::removeBomUtf8($string);
        $string = str_replace("\r\n", '', $string);
        $string = str_replace("\n", '', $string);
        $string = str_replace("\r", '', $string);
        $string = str_replace(PHP_EOL, '', $string);
        return $string;
    }
}
