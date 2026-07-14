<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use OpenApi\Attributes as OA;

#[OA\Tag(name: "Users", description: "API Endpoints for Users")]
class UserController extends Controller
{
    #[OA\Get(
        path: "/api/users",
        summary: "Get list of users",
        tags: ["Users"],
        responses: [
            new OA\Response(response: 200, description: "Successful operation")
        ]
    )]
    public function index()
    {
        return response()->json(User::all(), 200);
    }

    #[OA\Post(
        path: "/api/users",
        summary: "Store new user",
        tags: ["Users"],
        responses: [
            new OA\Response(response: 201, description: "Successful operation")
        ]
    )]
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role ?? 'owner';
        $user->usia = $request->usia ?? null;
        $user->save();

        return response()->json($user, 201);
    }

    #[OA\Get(
        path: "/api/users/{id}",
        summary: "Get user information",
        tags: ["Users"],
        parameters: [
            new OA\Parameter(name: "id", in: "path", required: true, schema: new OA\Schema(type: "integer"))
        ],
        responses: [
            new OA\Response(response: 200, description: "Successful operation")
        ]
    )]
    public function show($id)
    {
        return response()->json(User::findOrFail($id), 200);
    }

    #[OA\Put(
        path: "/api/users/{id}",
        summary: "Update existing user",
        tags: ["Users"],
        parameters: [
            new OA\Parameter(name: "id", in: "path", required: true, schema: new OA\Schema(type: "integer"))
        ],
        responses: [
            new OA\Response(response: 200, description: "Successful operation")
        ]
    )]
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if ($request->has('name')) $user->name = $request->name;
        if ($request->has('email')) $user->email = $request->email;
        if ($request->has('password')) $user->password = Hash::make($request->password);
        if ($request->has('role')) $user->role = $request->role;
        if ($request->has('usia')) $user->usia = $request->usia;

        $user->save();

        return response()->json($user, 200);
    }

    #[OA\Delete(
        path: "/api/users/{id}",
        summary: "Delete existing user",
        tags: ["Users"],
        parameters: [
            new OA\Parameter(name: "id", in: "path", required: true, schema: new OA\Schema(type: "integer"))
        ],
        responses: [
            new OA\Response(response: 204, description: "Successful operation")
        ]
    )]
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(null, 204);
    }
}
