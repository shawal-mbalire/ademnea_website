<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkPackage;
use App\Models\Task;

class WorkpackagesController extends Controller
{
    //
    public function workpackages($id)
    {
        $workpackages = WorkPackage::get()->where('id', $id);
        $tasks = Task::get();
        return view('website.workpackages', [
            'workpackages'=>$workpackages,
            'tasks' => $tasks        
        ]);
    }
}
