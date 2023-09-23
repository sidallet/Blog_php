<?php

class Nettoyage
{
    #nettoie une chaîne de caractères des tags <> ou caractères spéciaux
    public static function Nettoyer_string(string $s): string
    {
        return filter_var($s,FILTER_SANITIZE_STRING);
    }

    //supprime tout sauf les chiffres et +-
    public static function Nettoyer_int(int $nb): int
    {
        return filter_var($nb,FILTER_SANITIZE_NUMBER_INT);
    }

}