<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Scholarship;
use Illuminate\Http\Request;

class ScholarshipsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $scholarship = Scholarship::where('category', 'LIKE', "%$keyword%")
                ->orWhere('task', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $scholarship = Scholarship::latest()->paginate($perPage);
        }

        return view('admin.scholarship.index', compact('scholarship'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.scholarship.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category'=>'required|max:255',
            'task'=>'required|max:255',
            'topic'=>'required|max:255',
            'deliverables'=>'required',
            'competence'=>'required|max:255',
            'instructions'=>'required',
            'positions'=>'required',
        ]);

    
        $requestData = $request->all();

        
        Scholarship::create($requestData);

        return redirect('admin/scholarship')->with('flash_message', 'Scholarship added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $scholarship = Scholarship::findOrFail($id);

        return view('admin.scholarship.show', compact('scholarship'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $scholarship = Scholarship::findOrFail($id);

        return view('admin.scholarship.edit', compact('scholarship'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $scholarship = Scholarship::findOrFail($id);
        $scholarship->update($requestData);

        return redirect('admin/scholarship')->with('flash_message', 'Scholarship updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Scholarship::destroy($id);

        return redirect('admin/scholarship')->with('flash_message', 'Scholarship deleted!');
    }
}
