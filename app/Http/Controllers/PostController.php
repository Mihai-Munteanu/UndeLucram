<?php

namespace App\Http\Controllers;

use App\Models\Account;
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
            ->with(
                'socialMedia:id,name',
                'account:id,user_name,user_id',
                'account.author:id,name',
                'account.author.listGroups:id,name')
            ->filter(request(['search', 'accountId', 'authorId', 'socialMediaId','listGroupId', 'dateStart', 'dateEnd']))
            ->paginate(10);

        $data = $request->all();

        $accounts = Account::orderBy('user_name')
            ->get(['id', 'user_name']);

        $authors = User::orderBy('name')
            ->get(['id', 'name']);

        $listGroups = ListGroup::orderBy('name')
            ->get(['id', 'name'])
            ->sortBy('name', SORT_NATURAL, false);

        $socialMedia = SocialMedia::orderBy('name')
            ->get(['id', 'name']);

        $dateStart = Post::min('date');
        $dateEnd = Post::max('date');

        return view('posts', [
            'posts' => $posts,
            'data' => $data,
            'accounts' => $accounts,
            'authors' => $authors,
            'listGroups' => $listGroups,
            'socialMedia' => $socialMedia,
            'dateStart' => $dateStart,
            'dateEnd' => $dateEnd,
        ]);
    }
}
