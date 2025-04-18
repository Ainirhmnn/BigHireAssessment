<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToDoList extends Model
{
    use HasFactory;

    protected $table = 'todolist';
    protected $fillable = ['title', 'desc', 'is_completed', 'status', 'due_date'];

}
