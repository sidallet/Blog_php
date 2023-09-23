<?php

#permet de vérifier si un string ou un int est valide
class Validation
{
    static function Verifier_string(string $s): bool
    {
        if(!empty($s)) {
            return true;
        }
        return false;
    }

    static function Verifier_int(int $nb): bool
    {
        if(isset($nb)) {
	  if(filter_var($nb,FILTER_VALIDATE_INT))
		return true;
        }
        return false;
    }
    static function Verifier_date($date)
    {
        $format = 'Y-m-d';
        $dt = DateTime::createFromFormat($format, $date);
        return preg_match('#^[1-2][0-9][0-9][0-9]-[0-1][0-9]-[0-3][0-9]$#', $date);

    }

}
