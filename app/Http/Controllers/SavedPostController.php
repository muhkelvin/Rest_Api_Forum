<?php

namespace App\Http\Controllers;

use App\Http\Resources\SavedPostResource;
use App\Models\SavedPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SavedPostController extends Controller
{
    public function index()
    {
        return SavedPostResource::collection(SavedPost::all());
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'post_id' => 'required|exists:posts,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Validation Error', 'errors' => $validator->errors()], 422);
        }

        try {
            $savedPost = SavedPost::create([
                'post_id' => $request->post_id,
                'user_id' => auth()->user()->id,
            ]);

            return response()->json([
                'message' => 'Post saved successfully',
                'saved_post' => $savedPost,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to save post',
                'error' => $e->getMessage(),
            ], 400);
        }
    }

    public function show(SavedPost $savedPost)
    {
        return response()->json($savedPost, 200);
    }

    public function update(Request $request, SavedPost $savedPost)
    {
        $validator = Validator::make($request->all(), [
            'post_id' => 'required|exists:posts,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Validation Error', 'errors' => $validator->errors()], 422);
        }

        try {
            $savedPost->update([
                'post_id' => $request->post_id,
            ]);

            return response()->json([
                'message' => 'Saved post updated successfully',
                'saved_post' => $savedPost,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to update saved post',
                'error' => $e->getMessage(),
            ], 400);
        }
    }

    public function destroy(SavedPost $savedPost)
    {
        try {
            $savedPost->delete();
            return response()->json(['message' => 'Saved post deleted successfully'], 204);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to delete saved post',
                'error' => $e->getMessage(),
            ], 400);
        }
    }
}
