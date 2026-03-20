<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $posts = BlogPost::published()->orderByDesc('published_at')->get();

        $content = view('sitemap', compact('posts'))->render();

        return response($content, 200)->header('Content-Type', 'application/xml');
    }
}
