<?php

namespace App\Http\Controllers;

use App\Models\ToDoList;
use Illuminate\Http\Request;

class ToDoListController extends Controller
{
    public function create(Request $request){
        $required = $request->validate([
            'title' => 'required',
            'desc' => 'required',
            'due_date' => 'required',
        ]);

        $list = ToDoList::create([
            'title' => $request->title,
            'desc' => $request->desc,
            'is_completed' => 'N',
            'status' => 'A',
            'due_date' => $request->due_date,
        ]);

        $status = false;
        $msg = 'Failed to save the list. Please try again.';
        if ($list){
            $status = true;
            $msg = 'List saved successfully!';
        }

        return response()->json([
            'success' => $status,
            'message' => $msg,
            'data' => $list
        ]);
    }
}
