<?php

namespace App\Http\Controllers\Api\Documentation;
use App\Http\Controllers\Controller;



/**
 * @OA\Get(
 *     path="/posts",
 *     summary="Get list of posts",
 *     description="Returns paginated list of all posts",
 *     operationId="postIndex",
 *     tags={"Posts"},
 *     @OA\Parameter(
 *         name="page",
 *         in="query",
 *         description="Page number",
 *         required=false,
 *         @OA\Schema(type="integer", default=1)
 *     ),
 *     @OA\Parameter(
 *         name="per_page",
 *         in="query",
 *         description="Number of items per page",
 *         required=false,
 *         @OA\Schema(type="integer", default=15)
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation",
 *         @OA\JsonContent(ref="#/components/schemas/PostCollection")
 *     )
 * )
 *
 * @OA\Get(
 *     path="/posts/{post}",
 *     summary="Get post details",
 *     description="Returns details of a specific post by slug",
 *     operationId="postShow",
 *     tags={"Posts"},
 *     @OA\Parameter(
 *         name="post",
 *         in="path",
 *         description="Post slug",
 *         required=true,
 *         @OA\Schema(type="string")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation",
 *         @OA\JsonContent(ref="#/components/schemas/Post")
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Post not found",
 *         @OA\JsonContent(ref="#/components/schemas/ErrorResponse")
 *     )
 * )
 *
 * @OA\Post(
 *     path="/posts",
 *     summary="Create a new post",
 *     description="Create a new blog post",
 *     operationId="postStore",
 *     tags={"Posts"},
 *     security={{"bearerAuth":{}}},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"title", "content", "category_id", "slug"},
 *             @OA\Property(property="title", type="string", example="My New Post"),
 *             @OA\Property(property="content", type="string", example="This is the content of my new post."),
 *             @OA\Property(property="slug", type="string", example="my-new-post"),
 *             @OA\Property(property="category_id", type="integer", example=1)
 *         )
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Post created successfully",
 *         @OA\JsonContent(ref="#/components/schemas/Post")
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthenticated",
 *         @OA\JsonContent(ref="#/components/schemas/ErrorResponse")
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Validation error",
 *         @OA\JsonContent(ref="#/components/schemas/ErrorResponse")
 *     )
 * )
 *
 * @OA\Patch(
 *     path="/posts/{post}",
 *     summary="Update a post",
 *     description="Update an existing blog post",
 *     operationId="postUpdate",
 *     tags={"Posts"},
 *     security={{"bearerAuth":{}}},
 *     @OA\Parameter(
 *         name="post",
 *         in="path",
 *         description="Post slug",
 *         required=true,
 *         @OA\Schema(type="string")
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             @OA\Property(property="title", type="string", example="Updated Post Title"),
 *             @OA\Property(property="content", type="string", example="This is the updated content."),
 *             @OA\Property(property="slug", type="string", example="updated-post-title"),
 *             @OA\Property(property="category_id", type="integer", example=2)
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Post updated successfully",
 *         @OA\JsonContent(ref="#/components/schemas/Post")
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthenticated",
 *         @OA\JsonContent(ref="#/components/schemas/ErrorResponse")
 *     ),
 *     @OA\Response(
 *         response=403,
 *         description="Forbidden",
 *         @OA\JsonContent(ref="#/components/schemas/ErrorResponse")
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Post not found",
 *         @OA\JsonContent(ref="#/components/schemas/ErrorResponse")
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Validation error",
 *         @OA\JsonContent(ref="#/components/schemas/ErrorResponse")
 *     )
 * )
 *
 * @OA\Delete(
 *     path="/posts/{post}",
 *     summary="Delete a post",
 *     description="Delete an existing blog post",
 *     operationId="postDestroy",
 *     tags={"Posts"},
 *     security={{"bearerAuth":{}}},
 *     @OA\Parameter(
 *         name="post",
 *         in="path",
 *         description="Post slug",
 *         required=true,
 *         @OA\Schema(type="string")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Post deleted successfully",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Post deleted successfully")
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthenticated",
 *         @OA\JsonContent(ref="#/components/schemas/ErrorResponse")
 *     ),
 *     @OA\Response(
 *         response=403,
 *         description="Forbidden",
 *         @OA\JsonContent(ref="#/components/schemas/ErrorResponse")
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Post not found",
 *         @OA\JsonContent(ref="#/components/schemas/ErrorResponse")
 *     )
 * )
 */
class PostDocumentation
{
    // This class doesn't need any methods, it's just for Swagger annotations
}
