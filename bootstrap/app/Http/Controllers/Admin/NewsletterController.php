<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
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
            $newsletter = Newsletter::where('title', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->orWhere('attachment', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $newsletter = Newsletter::latest()->paginate($perPage);
        }

        return view('admin.newsletter.index', compact('newsletter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.newsletter.create');
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
        
        $requestData = $request->all();
                if ($request->hasFile('image')) {
            $requestData['image'] = $request->file('image')
                ->store('uploads', 'public');
        }
        if ($request->hasFile('attachment')) {
            $requestData['attachment'] = $request->file('attachment')
                ->store('uploads', 'public');
        }

        Newsletter::create($requestData);

        return redirect('admin/newsletter')->with('flash_message', 'Newsletter added!');
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
        $newsletter = Newsletter::findOrFail($id);

        return view('admin.newsletter.show', compact('newsletter'));
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
        $newsletter = Newsletter::findOrFail($id);

        return view('admin.newsletter.edit', compact('newsletter'));
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
                if ($request->hasFile('image')) {
            $requestData['image'] = $request->file('image')
                ->store('uploads', 'public');
        }
        if ($request->hasFile('attachment')) {
            $requestData['attachment'] = $request->file('attachment')
                ->store('uploads', 'public');
        }

        $newsletter = Newsletter::findOrFail($id);
        $newsletter->update($requestData);

        return redirect('admin/newsletter')->with('flash_message', 'Newsletter updated!');
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
        Newsletter::destroy($id);

        return redirect('admin/newsletter')->with('flash_message', 'Newsletter deleted!');
    }
}
