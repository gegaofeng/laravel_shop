<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TopicController extends Controller
{
    //
    public function topicList(){
        return view('admin.topic.topicList');
    }
}
