<?php

class validator
{
    public $regexes = Array(
        'date' => "^[0-9]{4}[-/][0-9]{1,2}[-/][0-9]{1,2}\$", // 2016-01-15
        'datetime' => "^[0-9]{4}[-/][0-9]{1,2}[-/][0-9]{1,2} [0-9]{1,2}:[0-9]{1,2}(:[0-9]{1,2})?\$", // 2016-01-15 12:12, 2016-01-15 12:12:00
        'positivenumber' => "^[0-9\.]+\$", // teigiami sveikieji skaičiai bei skaičiai su kableliu (pvz.: 25.14)
        'price' => "^([1-9][0-9]*|0)(\.[0-9]{2})?\$", // kaina (pvz.: 25.99)
        'anything' => "/^[\d\D]{1,}/$", // bet koks simbolis
        'alfanum' => "/^[0-9a-zA-ZąčęėįšųūžĄČĘĖĮŠŲŪŽ ,.-_\\s\?\!]+/$", // tekstas
        'not_empty' => "[a-z0-9A-ZąčęėįšųūžĄČĘĖĮŠŲŪŽ]+", // bet kokia reikšmė, kuri prasideda raide arba skaitmeniu
        'words' => "^[A-Za-ząčęėįšųūžĄČĘĖĮŠŲŪŽ]+[A-Za-ząčęėįšųūžĄČĘĖĮŠŲŪŽ \\s]*\$", // žodžiai
        'phone' => "^[0-9]{9,14}\$",
        'name' => "/^[0-9a-z A-ZčęėįšųūžĄČĘĖĮŠŲŪŽ]+$/"
        /* BE ŠIŲ FORMATŲ DAR GALIMA NAUDOTI STANDARTINIUS:
         * email,
         * int,
         * float,
         * boolen,
         * ip,
         * url*/
    );

    public function validate($item, $type, $maxLength)
    {
        return (!empty($item) && strlen($item) > 0 && strlen($item) <= $maxLength && preg_match($this->regexes[$type], $item));
    }

}
