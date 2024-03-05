<?php

namespace App\Http\Controllers;

use App\Models\Visualization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function update(Request $request)
    {
        $data = json_decode($request->getContent(), true) ?? $request->all();

        User::findOrFail($request->get('user_id'))->update([
            'name' => $data['name'],
            'email' => $data['email']
        ]);
    }

    public function changePassword(Request $request)
    {
        $data = json_decode($request->getContent(), true) ?? $request->all();

        User::where('id', $data['user_id'])->update([
            'password' => Hash::make($data['password'])
        ]);
    }

    public function destroy(Request $request)
    {
        User::findOrFail($request->get('user_id'))->delete();
    }
}
