<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function index(Post $post)
    {
        return $post->comments;
    }


    public function store(Request $request, Post $post)
    {
        $validator = Validator::make($request->all(), [
            'content' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Validation Error', 'errors' => $validator->errors()], 422);
        }

        try {
            $comment = $post->comments()->create([
                'content' => $request->input('content'),
                'user_id' => auth()->user()->id,
            ]);

            return response()->json([
                'message' => 'Comment created successfully',
                'comment' => $comment,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to create comment',
                'error' => $e->getMessage(),
            ], 400);
        }
    }



    public function show(Post $post, Comment $comment)
    {
        return $comment;
    }

    public function update(Request $request, Post $post, Comment $comment)
    {
        $validator = Validator::make($request->all(), [
            'content' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Validation Error', 'errors' => $validator->errors()], 422);
        }

        try {
            $comment->update([
                'content' => $request->content,
            ]);

            return response()->json([
                'message' => 'Comment updated successfully',
                'comment' => $comment,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to update comment',
                'error' => $e->getMessage(),
            ], 400);
        }
    }

    public function destroy(Post $post, Comment $comment)
    {
        try {
            $comment->delete();
            return response()->json(['message' => 'Comment deleted successfully'], 204);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to delete comment',
                'error' => $e->getMessage(),
            ], 400);
        }
    }
}
