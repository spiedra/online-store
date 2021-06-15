<?php

class SessionController
{
    public function __construct()
    {
        $this->view = new View();
        session_start();
    }

    public function manageSession()
    {
        $dataArray = array(
            'userName' => $_POST['userName'],
            'password' => $_POST['password']
        );
        $this->showViewByRole($this->useHttpPostApi($dataArray));
    }

    public function showViewByRole($role)
    {  
        switch ($role) {
            case -1:
                
                break;

            case 1:
                $this->view->show("adminView.php", null);
                break;

            case 2:
                $this->view->show("indexView.php", null);
                break;
        }
    }

    public function useHttpPostApi($dataArray)
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
