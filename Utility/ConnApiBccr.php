<?php

class ConnApiBccr
{
    // Connection to the web service of BCCR of Costa Rica
    public static function getDollarExchangeRate()
    {
        $doc = new DOMDocument();
        date_default_timezone_set('UTC');
        $urlWS_c = "https://gee.bccr.fi.cr/Indicadores/Suscripciones/WS/wsindicadoreseconomicos.asmx/ObtenerIndicadoresEconomicos?Indicador=317&FechaInicio=" . date("d/m/Y") . "&FechaFinal=" . date("d/m/Y") . "&Nombre=Juan%20Carlos%20Sequeira%20Piedra&SubNiveles=N&CorreoElectronico=carlospiedrasp@gmail.com&Token=SI62R0E60A";

        $xml = file_get_contents($urlWS_c);
        $doc->loadXML($xml);
        $ind = $doc->getElementsByTagName('INGC011_CAT_INDICADORECONOMIC');

        foreach ($ind as $node) {
            $change = substr($node->getElementsByTagName('NUM_VALOR')->item(0)->nodeValue, 0, -6);
        }
        return $change;
    }

    public static function appendExchangeRate($result)
    {
        $res = array('exchangeRate' => ConnApiBccr::getDollarExchangeRate());
        $result = array_map(function($r) use($res){
            return array_merge($r, $res);
        }, $result);
        return $result;
    }
}
