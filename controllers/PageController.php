<?php

require_once __DIR__ . '/../utils/helper_functions.php';
require_once __DIR__ . '/../models/Ad.php';
require_once __DIR__ . '/../models/User.php';

function pageController()
{

    // defines array to be returned and extracted for view
    $data = [];

    // get the part of the request after the domain name
    $request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);


    // switch that will run functions and setup variables dependent on what route was accessed
    switch ($request) {
        // TODO: put routes here
        case "/":
            $mainView = '../views/home.php';
            break;
        case "/ads":
            $data['ads'] = Ad::all();
            $mainView = '../views/ads/index.php';
            break;
        case "/ads/show":
            $mainView = '../views/ads/show.php';
            break;
        case "/ads/create":
            $mainView = '../views/ads/create.php';
            break;
        case "/ads/edit":
            $mainView = '../views/ads/edit.php';
            break;
        case "/users":
            $mainView = '../views/users/index.php';
            break;
        case "/users/show":
            $mainView = '../views/users/account.php';
            break;
        case "/users/edit":
            $mainView = '../views/users/edit.php';
            break;
        case "/login":
            $mainView = '../views/auth/login.php';
            break;
        case "/signup":
            $mainView = '../views/auth/signup.php';
            break;
        case "/logout":
            $mainView = '../views/auth/logout.php';
            break;
        default:    // displays 404 if route not specified above
            $mainView = '../views/404.php';
            break;
    }

    $data['mainView'] = $mainView;

    return $data;
}

extract(pageController());