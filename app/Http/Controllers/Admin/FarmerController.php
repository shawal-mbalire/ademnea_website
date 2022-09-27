<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Models\Farmer;
use Illuminate\Http\Request;


class FarmerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {        
        $perPage = 25;
       
        $farmer = Farmer::latest()->paginate($perPage);

        return view('admin.farmer.index', compact('farmer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        return view('admin.farmer.create');
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
      /*  $this->validate($request, [
            'ownerid'=>'required|max:255',
            'name'=>'required|max:255',
            'district'=>'required',
            'image'=>'required|mimes:jpg,png,jpeg|max:5048'
        ]);*/

        $requestData = $request->all();
              
        Farmer::create($requestData);

        return redirect('admin/farmer')->with('flash_message', 'Farmer added!');
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
       
        $farmer = Farmer::findOrFail($id);

        return view('admin.farmer.show', compact('farmer'));
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
        $farmer = Farmer::findOrFail($id);

        return view('admin.farmer.edit', compact('farmer'));
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
        
        $farmer = Farmer::findOrFail($id);
        $farmer->update($requestData);

        return redirect('admin/farmer')->with('flash_message', 'Farmer updated!');
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
        Farmer::destroy($id);

        return redirect('admin/farmer')->with('flash_message', 'Farmer deleted!');
    }
}
