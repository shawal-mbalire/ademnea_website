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
        
        //picking the image of the publication.
                //this code uploads the picture from the form.
                $request->validate(['image' => 'required|image|mimes:png,jpg,jpeg|max:11000']);
                $picname = $request->file('image')->getClientOriginalName();
                $request->image->move(public_path('images/publications'), $picname);

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
            'image' => $picname,
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



     //pick and save the file if available
        if ($request->hasFile('attachment')) {
         
            $request->validate([
                'attachment' => 'required|mimes:csv,pdf,doc,docx,xls,xlsx|max:11000',
            ]);
            $filename = $request->file('attachment')->getClientOriginalName();
            $request->file('attachment')->move(public_path('documents/publications'), $filename);


            DB::table('publications')
            ->where('id', $id)
            ->update([
                'attachment' => $filename,
                'updated_at' => now(),
    
            ]);
   
        }


        //pick and save the image if available
        if ($request->hasFile('image')) {

            $request->validate(['image' => 'required|image|mimes:png,jpg,jpeg|max:11000']);
            $picname = $request->file('image')->getClientOriginalName();
            $request->image->move(public_path('images/publications'), $picname);

            DB::table('publications')
            ->where('id', $id)
            ->update([
                'image' => $picname,
                'updated_at' => now(),
    
            ]);

        }


        DB::table('publications')
        ->where('id', $id)
        ->update([

            'name' => $request->name,
            'title' => $request->title,
            'publisher' => $request->publisher,
            'year' => $request->year,
            'updated_at' => now(),

        ]);
 

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
