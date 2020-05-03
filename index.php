<?php
    session_start();
    require 'lib/Meli/meli.php';
    require 'configApp.php';
    $meli = new Meli($appId, $secretKey);

    if (isset($_GET['code']) || isset($_SESSION['access_token'])) {

        if (isset($_GET['code']) && !isset($_SESSION['access_token'])) {

            try {

                $user = $meli->authorize($_GET["code"], $redirectURI);
                $_SESSION['access_token'] = $user['body']->access_token;
                $_SESSION['expires_in'] = time() + $user['body']->expires_in;
                $_SESSION['refresh_token'] = $user['body']->refresh_token;
            } 
            
            catch (Exception $e) {
                echo "Exception: ", $e->getMessage(), "\n";
            }
        } 
        
        else {

            if ($_SESSION['expires_in'] < time()) {

                try {
                
                    $refresh = $meli->refreshAccessToken();

                    $_SESSION['access_token'] = $refresh['body']->access_token;
                    $_SESSION['expires_in'] = time() + $refresh['body']->expires_in;
                    $_SESSION['refresh_token'] = $refresh['body']->refresh_token;
                } 
                
                catch (Exception $e) {
                    echo "Exception: ", $e->getMessage(), "\n";
                }
            }
        }
        
        header('Location: seuOliver.php');
    } 

    else {
        
        $auth = $meli->getAuthUrl($redirectURI, Meli::$AUTH_URL[$siteId]);
        header('Location: ' . $auth);
    }
?>

