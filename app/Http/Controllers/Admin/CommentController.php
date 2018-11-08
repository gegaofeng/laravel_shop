<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    //
    public function index(){
        return view('admin.comment.index');
    }
    public function askList(){
        return view('admin.comment.askList');
    }
}
