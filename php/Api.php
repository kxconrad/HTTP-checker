<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of api
 *
 * @author konrad
 */
class Api
{

    public function getResponse()
    {
        if ($this->checkValid($_POST['url'])) {

            $this->curlRequest($_POST['url']);
        } else {
            $response = array('code' => 404, 'url' => $_POST['url']);

            echo json_encode($response);
        }
    }

    private function checkValid($url)
    {
        if (!$url || !is_string($url) || !preg_match('/^http(s)?:\/\/[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(\/.*)?$/i',
                $url)) {
            return false;
        }
        return true;
    }

    private function curlRequest($url)
    {
        $ch       = curl_init($url);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        $output   = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $redirect = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
        curl_close($ch);

        $response = array('code' => $httpcode, 'url' => $url, 'redirect' => $redirect);

        echo json_encode($response);
    }
}
$api = new Api();
$api->getResponse();
