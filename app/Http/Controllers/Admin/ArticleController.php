<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    //
    public function linkList(){
        return view('admin.article.linklist');
    }
    public function articleList(){
        return view('admin.article.articleList');
    }
    public function categoryList(){
        return view('admin.article.categoryList'); 
    }
    public function agreement(){
        return view('admin.article.agreement');
    }
}
