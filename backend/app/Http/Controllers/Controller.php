<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function store(Request $request)
{
    if (auth()->user()->cannot('create projects')) {
        abort(403);
    }
    // ... logika membuat proyek
}
}
