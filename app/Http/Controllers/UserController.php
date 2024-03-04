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

        User::where('id', $data['user_id'])->update([
            'name' => $data['name'],
            'email' => $data['email']
        ]);
    }

    public function changePassword(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        User::where('id', $data['user_id'])->update([
            'password' => Hash::make($data['password'])
        ]);
    }

    public function destroy(Request $request)
    {
        //$data = json_decode($request->all(), true);
        //Storage::put('test/test.json', json_encode(['test' => 'value'], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));

        //User::where('id', $data['user_id'])->delete();
    }
}
