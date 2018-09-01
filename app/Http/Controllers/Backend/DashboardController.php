<?php

namespace App\Http\Controllers\Backend;

use Telegram\Bot\Laravel\Facades\Telegram;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index ()
    {
        $response = Telegram::getMe();

        $botId = $response->getId();
        $firstName = $response->getFirstName();
        $username = $response->getUsername();

        error_log(print_r($response,1));

        return view('backend.index');
    }
}
