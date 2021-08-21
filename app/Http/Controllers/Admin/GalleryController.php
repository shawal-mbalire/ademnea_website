<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
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
            $gallery = Gallery::where('title', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('image_url', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $gallery = Gallery::latest()->paginate($perPage);
        }

        return view('admin.gallery.index', compact('gallery'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.gallery.create');
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

//        $requestData = $request->all();
//                if ($request->hasFile('image')) {
//            $requestData['image'] = $request->file('image')
//                ->store('uploads', 'public');
//        }



        $this->validate($request, [
            'title'=>'required|max:255',
            'description'=>'required',
            'image_url'=>'required|mimes:jpg,png,jpeg|max:5048'
        ]);

        $newImageName = time() . '-' . $request->title . '.' . $request->image_url->extension();
        $request->image_url->move(public_path('gallery'), $newImageName);
        $requestData = $request->all();
        if($files=$request->file('images')){
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                $file->move('image',$name);
                $images[]=$name;
            }
        }

        $requestData['image'] = implode("|",$images);
      

        Gallery::create($requestData);

        return redirect('admin/gallery')->with('flash_message', 'Photo Added to Gallery!');
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
        $gallery = Gallery::findOrFail($id);

        return view('admin.gallery.show', compact('gallery'));
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
        $gallery = Gallery::findOrFail($id);

        return view('admin.gallery.edit', compact('gallery'));
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
        $newImageName = time() . '-' . $request->title . '.' . $request->image_url->extension();
        $request->image_url->move(public_path('gallery'), $newImageName);

        $requestData = $request->all();
                if ($request->hasFile('image')) {
            $requestData['image'] = $newImageName;
        }


        $gallery = Gallery::findOrFail($id);
        $gallery->update($requestData);

        return redirect('admin/gallery')->with('flash_message', 'Gallery updated!');
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
        Gallery::destroy($id);

        return redirect('admin/gallery')->with('flash_message', 'Gallery deleted!');
    }
}
