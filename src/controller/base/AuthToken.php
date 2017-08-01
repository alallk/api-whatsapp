<?php
namespace APIWhatsapp\Service\Auth;

class AuthTokenControllerBase {

    public function authorize() {
        return false;
    }

    private function isSSL() {

        $https = filter_input(INPUT_SERVER, 'HTTPS');
        $port = filter_input(INPUT_SERVER, 'SERVER_PORT');
        if ($https) {

            if ($https == 1) {
                return true;
            } elseif ($https == 'on') {
                return true;
            }
        } elseif ($port == '443') {
            return true;
        }

        return false;
    }

}
