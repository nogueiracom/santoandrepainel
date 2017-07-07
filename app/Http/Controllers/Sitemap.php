<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class Sitemap extends Controller
{
    public function sitemap() {

      $posts = User::get();

      return response()->view('site', compact('posts'))->header('Content-Type', 'text/xml');
    }
}
