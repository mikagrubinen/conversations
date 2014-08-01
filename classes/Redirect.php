<?php


/**
 * If is numeric than stay on same page but include error file.
 * else redirect to $location
 *
 * @author miroslav
 */
class Redirect {
    public static function to($location = null) {
        if($location){
            if (is_numeric($location)) {
                switch ($location) {
                    case 404:
                        header('HTTP/1.0 404 Not Found');
                        include 'includes/errors/404.php';
                        exit();
                        break;
                }
            }
            header('Location: ' . $location);
            exit();
        }
    }
}
