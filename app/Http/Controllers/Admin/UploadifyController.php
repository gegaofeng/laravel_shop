<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploadifyController extends Controller
{
    //
    public function upload(){
        return view('admin.uploadify.upload');
    }
}
