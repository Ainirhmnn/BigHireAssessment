<?php

namespace App\Http\Controllers;

use App\Models\ToDoList;
use Illuminate\Http\Request;

class ToDoListController extends Controller
{
    public function create(Request $request){
        $title = 'Create';
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
            'data' => $list,
            'title' => $title
        ]);
    }

    public function edit(ToDoList $list, Request $request){
        $title = 'Edit';
        $required = $request->validate([
            'title' => 'required',
            'desc' => 'required',
            'due_date' => 'required',
        ]);

        $update_list = $list->update([
            'title' => $request->title,
            'desc' => $request->desc,
            'due_date' => $request->due_date,
        ]);

        $status = false;
        $msg = 'Update Unsuccessfull!';
        if($update_list){
            $status = true;
            $msg = 'Updated Successfully!';
        }

        return response()->json([
            'success' => $status,
            'message' => $msg,
            'title' => $title,
        ]);

    }

    public function delete(ToDoList $list){
        $title = 'Delete';
        $update_list = $list->update([
            'status' => 'D',
        ]);

        $status = false;
        $msg = 'Delete Unsuccessfull!';
        if($update_list){
            $status = true;
            $msg = 'Deteleted Successfully!';
        }

        return response()->json([
            'success' => $status,
            'message' => $msg,
            'title' => $title,
        ]);


    }
}
