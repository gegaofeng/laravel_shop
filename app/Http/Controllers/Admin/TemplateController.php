<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TemplateController extends Controller
{
    //
    public function templateList(){
        return view('admin.template.templateList');
    }
}
