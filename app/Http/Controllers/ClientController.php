<?php

namespace App\Http\Controllers;

use App\Models\Visualization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    public function create(Request $request)
    {
        $data = json_decode($request->getContent(), true) ?? $request->all();

        Visualization::first()->update([
            'entity_title' => 'clients',
            'fields' => json_encode(array_filter($data), JSON_UNESCAPED_UNICODE)
        ]);
    }
}
