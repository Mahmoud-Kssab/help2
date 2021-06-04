<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Datatables\MessageDataTable;
use App\Models\Message;
class MessageController extends Controller
{
    public function index(MessageDataTable $mes)
    {

         return $mes->render('admin.messages.index');

    }

}
