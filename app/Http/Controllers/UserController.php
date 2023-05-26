<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'username' => 'required|max:50|unique:users',
            'kecamatan' => 'required|max:50',
            'password' => 'required|confirmed|min:8'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $role = Role::where('name', 'kecamatan')->firstOrFail();

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'kecamatan' => $request->kecamatan,
            'role_id' => $role->id,
            'password' => Hash::make($request->password)
        ]);

        if($user) {
            return response()->json([
                'success' => true,
                'user' => $user,
            ], 201);
        }

        return response()->json([
            'success' => false,
        ], 409);
    }

    public function login(Request $request) {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required|min:8',
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $credentials = $request->only('username', 'password');

        if(!$token = JWTAuth::attempt($credentials, ['exp' => Carbon\Carbon::now()->addDays(1)->timestamp])){
            return response()->json([
                'success' => false,
                'message' => 'Username atau Password Anda salah'
            ]);
        }

        $user = User::where('username', $request->username)->with('role')->firstOrFail();
        $role = $user->role->name;



        return response()->json([
            'success' => true,
            'user' => $user,
            'role' => $role,
            'token' => $token,
        ], 200);
    }

    public function logout() {
        $removeToken = JWTAuth::invalidate(JWTAuth::getToken());

        if($removeToken) {
            return response()->json([
                'success' => true,
                'message' => 'Logout berhasil'
            ]);
        } else {
            return response()->json([
                'message' => 'Kesalahan logout'
            ]);
        }
    }

    public function index() {
        $users = User::all();
        $response = [];

        foreach($users as $user) {
            $response[] = [
                'id' => $user->id,
                'name' => $user->name,
                'username' => $user->username,
                'kecamatan' => $user->kecamatan,
                'password' => $user->password
            ];
        }
        return response()->json($response);
        // return response()->json($user);
    }

    public function show($id) {
        $user = User::find($id);
        if ($user) {
            // $decodedPassword = explode('\r\n', $user->password);
            return response()->json([
                'success' => true,
                'admin' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'username' => $user->username,
                    'kecamatan' => $user->kecamatan,
                    'password' => $user->password
                ],
            ], 201);
        }

        return response()->json([
            'success' => false,
            'message' => 'Data Admin tidak ditemukan'
        ], 404);
    }

    public function update(Request $request, string $id) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'username' => 'required|max:50|unique:users',
            'kecamatan' => 'required|max:50',
            'password' => 'required|confirmed|min:8'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->kecamatan = $request->kecamatan;
        $user->password = Hash::make($request->password);
        $user->save();

        if($user) {
            return response()->json([
                'success' => true,
                'message' => 'User berhasil diubah',
                'user' => $user,
            ], 201);
        }

        return response()->json([
            'success' => false,
            'message' => 'User tidak ditemukan'
        ], 409);
    }

    public function destroy(string $id) {
        $user = User::findOrFail($id);
        $user->delete();

        if($user) {
            return response()->json([
                'success' => true,
                'message' => 'User berhasil dihapus'
            ], 201);
        }

        return response()->json([
            'success' => false,
            'message' => 'User gagal dihapus. User tidak ditemukan'
        ], 409);
    }
}
