<?php
namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index() {
        return response()->json(User::all(), 200);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string',
            'email' => 'required|email|unique:users',
            'nomor_telepon' => 'required|digits_between:10,15',
            'status_aktif' => 'required|boolean',
            'departemen' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = User::create($request->all());
        return response()->json(['message' => 'User created', 'data' => $user], 201);
    }

    public function show($id) {
        $user = User::find($id);
        return $user ? response()->json($user) :
            response()->json(['error' => 'User not found'], 404);
    }

    public function update(Request $request, $id) {
        $user = User::find($id);
        if (!$user) return response()->json(['error' => 'User not found'], 404);

        $validator = Validator::make($request->all(), [
            'nama' => 'string',
            'email' => 'email|unique:users,email,'.$id,
            'nomor_telepon' => 'digits_between:10,15',
            'status_aktif' => 'boolean',
            'departemen' => 'string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user->update($request->all());
        return response()->json(['message' => 'User updated', 'data' => $user]);
    }

    public function destroy($id) {
        $user = User::find($id);
        if (!$user) return response()->json(['error' => 'User not found'], 404);
        $user->delete();
        return response()->json(['message' => 'User deleted']);
    }
}
