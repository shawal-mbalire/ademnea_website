<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Validator;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublicationController extends Controller
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
            $publication = Publication::where('name', 'LIKE', "%$keyword%")
                ->orWhere('title', 'LIKE', "%$keyword%")
                ->orWhere('publisher', 'LIKE', "%$keyword%")
                ->orWhere('attachment', 'LIKE', "%$keyword%")
                ->orWhere('year', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $publication = Publication::latest()->paginate($perPage);
        }

        return view('admin.publication.index', compact('publication'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.publication.create');
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
        
        //dd($request->all());
     
        $request->validate([
            'attachment' => 'required|mimes:csv,pdf,doc,docx,xls,xlsx|max:11000',
        ]);
        $filename = $request->file('attachment')->getClientOriginalName();
        $request->file('attachment')->move(public_path('documents/publications'), $filename);


        DB::table('publications')->insert([

            'name' => $request->name,
            'title' => $request->title,
            'publisher' => $request->publisher,
            'year' => $request->year,
            'attachment' => $filename,
            'created_at' => now(),
            'updated_at' => now(),
              
        ]);

         
       // Publication::create($requestData);

        return redirect('admin/publication')->with('flash_message', 'Publication added!');
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
        $publication = Publication::findOrFail($id);

        return view('admin.publication.show', compact('publication'));
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
        $publication = Publication::findOrFail($id);

        return view('admin.publication.edit', compact('publication'));
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
                if ($request->hasFile('attachment')) {
            $requestData['attachment'] = $request->file('attachment')
                ->store('uploads', 'public');
        }

        $publication = Publication::findOrFail($id);
        $publication->update($requestData);

        return redirect('admin/publication')->with('flash_message', 'Publication updated!');
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
        Publication::destroy($id);

        return redirect('admin/publication')->with('flash_message', 'Publication deleted!');
    }
}
