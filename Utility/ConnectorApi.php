<?php

class ConnectorApi
{
    public static function useHttpPostApi($dataArray)
    {
        $url = "http://localhost/TiendaEnLineaJuanCarlosSequeiraSemestreIAnno2021/apiRest.php";
        $data = http_build_query($dataArray);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $resp = curl_exec($ch);
        curl_close($ch);
        return json_decode($resp, true);
    }
}
