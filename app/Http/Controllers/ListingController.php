<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listings = Listing::latest()
            ->filter(request(['tag', 'txtsearch']))
            ->paginate(2);

        return view('listings.listings')->with([
            'listings' => $listings
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('listings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formValidation = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('tbllistings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);
        
        //Uploading a file
        if($request->hasFile('logo')){
            $formValidation['logo'] = $request->file('logo')
                ->store('companieslogos', 'public');
        }

        $formValidation['user_id'] = auth()->id();

        Listing::create($formValidation);

        return redirect('/')->with('message', 'Listing created successfuly!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Listing $listing)
    {
        //$listing = Listing::findOrFail($id); Comentariamos porque usamos route model binding 

        return view('listings.listing')->with([
            'listing' => $listing
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Listing $listing)
    {
        return view('listings.edit')->with([
            'listing' => $listing
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Listing $listing)
    {
        //Make sure logged in user is owner
        if($listing->user_id != auth()->id()){
            abort('403', 'Unauthorized action!');
        }

        $formValidation = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);
        
        //Uploading a file
        if($request->hasFile('logo')){
            $formValidation['logo'] = $request->file('logo')
                ->store('companieslogos', 'public');
        }

        $listing->update($formValidation);

        return back()->with(['message' => 'Listing updated successfuly!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Listing $listing)
    {
        //Make sure logged in user is owner
        if($listing->user_id != auth()->id()){
            abort('403', 'Unauthorized action!');
        }
        
        $listing->delete();
        return redirect('/')->with([
            'message' => 'Listing deleted successfuly!'
        ]);
    }

    public function manage(){
        $listings = Listing::where('user_id', '=', auth()->id())
            ->get();
        
        return view('listings.manage')->with([
            'listings' => $listings
        ]);
    }
}
