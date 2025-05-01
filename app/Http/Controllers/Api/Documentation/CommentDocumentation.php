<?php

namespace App\Http\Controllers\Api\Documentation;

/**
 * @OA\Post(
 *     path="/posts/{post}/comments",
 *     summary="Create a new comment",
 *     description="Create a new comment on a specific post",
 *     operationId="commentStore",
 *     tags={"Comments"},
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
 *             required={"content"},
 *             @OA\Property(property="content", type="string", example="This is a great post!")
 *         )
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Comment created successfully",
 *         @OA\JsonContent(ref="#/components/schemas/Comment")
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
 *     path="/posts/{post}/comments/{comment}",
 *     summary="Update a comment",
 *     description="Update an existing comment on a specific post",
 *     operationId="commentUpdate",
 *     tags={"Comments"},
 *     security={{"bearerAuth":{}}},
 *     @OA\Parameter(
 *         name="post",
 *         in="path",
 *         description="Post slug",
 *         required=true,
 *         @OA\Schema(type="string")
 *     ),
 *     @OA\Parameter(
 *         name="comment",
 *         in="path",
 *         description="Comment ID",
 *         required=true,
 *         @OA\Schema(type="integer", format="int64")
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"content"},
 *             @OA\Property(property="content", type="string", example="Updated comment content")
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Comment updated successfully",
 *         @OA\JsonContent(ref="#/components/schemas/Comment")
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
 *         description="Post or comment not found",
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
 *     path="/posts/{post}/comments/{comment}",
 *     summary="Delete a comment",
 *     description="Delete an existing comment on a specific post",
 *     operationId="commentDestroy",
 *     tags={"Comments"},
 *     security={{"bearerAuth":{}}},
 *     @OA\Parameter(
 *         name="post",
 *         in="path",
 *         description="Post slug",
 *         required=true,
 *         @OA\Schema(type="string")
 *     ),
 *     @OA\Parameter(
 *         name="comment",
 *         in="path",
 *         description="Comment ID",
 *         required=true,
 *         @OA\Schema(type="integer", format="int64")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Comment deleted successfully",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Comment deleted successfully")
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
 *         description="Post or comment not found",
 *         @OA\JsonContent(ref="#/components/schemas/ErrorResponse")
 *     )
 * )
 */
class CommentDocumentation
{
    // This class doesn't need any methods, it's just for Swagger annotations
}
