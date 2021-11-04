<?php

namespace App\Http\Controllers;

use App\Models\ListGroup;
use App\Models\Post;
use App\Models\SocialMedia;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *ß
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $posts = Post::latest('date')
            ->with('author:id,name', 'socialMedia:id,name', 'author.listGroups:id,name')
            ->filter(request(['search', 'author','socialMedia','listGroup', 'dateStart', 'dateEnd', 'author']))
            ->paginate(10);

        $data = $request->all();

        $authors = User::orderBy('name')
            ->get(['id', 'name']);

        $listGroups = ListGroup::orderBy('name')
            ->get(['id', 'name'])
            ->sortBy('name', SORT_NATURAL, false);

        $socialMedia = SocialMedia::get(['id', 'name']);

        $dateStart = Post::min('date');
        $dateEnd = Post::max('date');

        return view('posts', [
            'posts' => $posts,
            'data' => $data,
            'authors' => $authors,
            'listGroups' => $listGroups,
            'socialMedia' => $socialMedia,
            'dateStart' => $dateStart,
            'dateEnd' => $dateEnd,
        ]);
    }
}
