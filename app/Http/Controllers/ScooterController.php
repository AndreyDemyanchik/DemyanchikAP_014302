<?php

namespace App\Http\Controllers;

use App\Models\Visualization;
use Illuminate\Http\Request;

class ScooterController extends Controller
{
    public function create(Request $request)
    {
        $data = json_decode($request->getContent(), true) ?? $request->all();

        Visualization::first()->update([
            'entity_title' => 'scooters',
            'fields' => json_encode(array_filter($data), JSON_UNESCAPED_UNICODE)
        ]);
    }
}
