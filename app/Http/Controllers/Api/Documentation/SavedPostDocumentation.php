<?php

namespace App\Http\Controllers\Api\Documentation;

/**
 * @OA\Get(
 *     path="/saved-posts",
 *     summary="Get list of saved posts",
 *     description="Returns paginated list of all saved posts for the authenticated user",
 *     operationId="savedPostIndex",
 *     tags={"Saved Posts"},
 *     security={{"bearerAuth":{}}},
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
 *         @OA\JsonContent(ref="#/components/schemas/SavedPostCollection")
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthenticated",
 *         @OA\JsonContent(ref="#/components/schemas/ErrorResponse")
 *     )
 * )
 *
 * @OA\Get(
 *     path="/saved-posts/{savedPost}",
 *     summary="Get saved post details",
 *     description="Returns details of a specific saved post",
 *     operationId="savedPostShow",
 *     tags={"Saved Posts"},
 *     security={{"bearerAuth":{}}},
 *     @OA\Parameter(
 *         name="savedPost",
 *         in="path",
 *         description="Saved Post ID",
 *         required=true,
 *         @OA\Schema(type="integer", format="int64")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation",
 *         @OA\JsonContent(ref="#/components/schemas/SavedPost")
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
 *         description="Saved post not found",
 *         @OA\JsonContent(ref="#/components/schemas/ErrorResponse")
 *     )
 * )
 *
 * @OA\Post(
 *     path="/saved-posts",
 *     summary="Save a post",
 *     description="Save a post for the authenticated user",
 *     operationId="savedPostStore",
 *     tags={"Saved Posts"},
 *     security={{"bearerAuth":{}}},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"post_id"},
 *             @OA\Property(property="post_id", type="integer", example=1)
 *         )
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Post saved successfully",
 *         @OA\JsonContent(ref="#/components/schemas/SavedPost")
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthenticated",
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
 * @OA\Patch(
 *     path="/saved-posts/{savedPost}",
 *     summary="Update a saved post",
 *     description="Update an existing saved post",
 *     operationId="savedPostUpdate",
 *     tags={"Saved Posts"},
 *     security={{"bearerAuth":{}}},
 *     @OA\Parameter(
 *         name="savedPost",
 *         in="path",
 *         description="Saved Post ID",
 *         required=true,
 *         @OA\Schema(type="integer", format="int64")
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             @OA\Property(property="post_id", type="integer", example=2)
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Saved post updated successfully",
 *         @OA\JsonContent(ref="#/components/schemas/SavedPost")
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
 *         description="Saved post not found",
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
 *     path="/saved-posts/{savedPost}",
 *     summary="Delete a saved post",
 *     description="Delete an existing saved post",
 *     operationId="savedPostDestroy",
 *     tags={"Saved Posts"},
 *     security={{"bearerAuth":{}}},
 *     @OA\Parameter(
 *         name="savedPost",
 *         in="path",
 *         description="Saved Post ID",
 *         required=true,
 *         @OA\Schema(type="integer", format="int64")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Saved post deleted successfully",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Saved post deleted successfully")
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
 *         description="Saved post not found",
 *         @OA\JsonContent(ref="#/components/schemas/ErrorResponse")
 *     )
 * )
 */
class SavedPostDocumentation
{
    // This class doesn't need any methods, it's just for Swagger annotations
}
