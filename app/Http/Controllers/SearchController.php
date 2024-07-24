<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        return view('search');
    }

    public function search(Request $request)
    {
        $value = $request->value;
        $users = User::with('department', 'designation')->where('name', 'like', '%' . $value . '%')
            ->orWhereHas('department', function ($q) use ($value) {
                $q->where('name', 'like', '%' . $value . '%');
            })
            ->orWhereHas('designation', function ($q) use ($value) {
                $q->where('name', 'like', '%' . $value . '%');
            })
            ->get();

        return response()->json(['ststus' => true, 'users' => $users]);
    }
}
