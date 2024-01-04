<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index( $id_product )
    {
        $comments = Comment::where('product_id', $id_product)
            ->with(['user', 'product'])->get();

        return $comments;
    }

    public function store(Request $request)
    {
        $comment = Comment::create([
            'user_id' => Auth::user()->id,
            'comment' => $request->get('comment'),
            'product_id' => $request->get('product_id')
        ]);

        $comment1 = Comment::where('id', $comment->id)
            ->with('user')->first();

        return $comment1;
    }

    public function update($id, Request $request)
    {
        $comment = Comment::find($id);
        $comment->comment = $request->get('comment');
        $comment->save();

        $comment1 = Comment::where('id', $id)
            ->with('user')->first();
        return $comment1;

    }

    public function destroy($id)
    {
        $comment = Comment::find($id);

        $comment->delete();

    }
}
