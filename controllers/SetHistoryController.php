<?php

class SetHistoryController extends BaseController {
    public function get(array $context) {
        $_SESSION['REQUEST_URI'] = $_GET['message_url'];

        if (!isset($_SESSION['message_url'])) { 
            $_SESSION['message_url'] = [];
        }

        if (count($_SESSION['message_url']) >= 10) {
            array_shift($_SESSION['message_url']);
        }
        array_push($_SESSION['message_url'],  $_GET['message_url']);

        $url = $_SERVER['HTTP_REFERER'];  
        header("Location: $url");
        exit;
    }
}
