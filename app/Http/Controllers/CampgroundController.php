<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon;
use Session;
use App\Campground;

class CampgroundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campgrounds = Campground::all();
        return view('campground.index')->with('campgrounds', $campgrounds);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('campground.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the user input
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'campsites' => 'numeric|min:1',
        ]);

        # Instantiate a new Model object
        $campground = new Campground();

        # Set the parameters
        # Note how each parameter corresponds to a field in the table
        $campground->name = $request->name;
        $campground->description = $request->description;
        $campground->campsites = $request->campsites;
        if ($request->restrooms && $request->restrooms == "on") {
            $campground->restrooms = true;
        } else {
            $campground->restrooms = false;
        }
        $campground->fees = $request->fees;
        $campground->address = $request->address;
        $campground->city = $request->city;
        $campground->state = $request->state;
        $campground->zipcode = $request->zipcode;

        # Invoke the Eloquent save() method
        # This will generate a new row in the `campgrounds` table, with the above data
        $campground->save();

        $campgrounds = Campground::all();
        Session::flash('flash_message','Your campground was added');
        return view('campground.index')->with('campgrounds', $campgrounds);;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $campground = Campground::find($id);
        // Add validation to ensure this is found
        return view('campground.show')->with('campground', $campground);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $campground = Campground::find($id);
        // Add validation to ensure this is found
        return view('campground.edit')->with('campground', $campground);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campground = Campground::find($id);
        // Add validation to ensure this is found

        // Validate the user input
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'campsites' => 'numeric|min:1',
        ]);

        # Set the parameters
        # Note how each parameter corresponds to a field in the table
        $campground->name = $request->name;
        $campground->description = $request->description;
        $campground->campsites = $request->campsites;
        if ($request->restrooms && $request->restrooms == "on") {
            $campground->restrooms = true;
        } else {
            $campground->restrooms = false;
        }
        $campground->fees = $request->fees;
        $campground->address = $request->address;
        $campground->city = $request->city;
        $campground->state = $request->state;
        $campground->zipcode = $request->zipcode;

        # Invoke the Eloquent save() method
        # This will update the existing row in the `campgrounds` table, with the above data
        $campground->save();

        $campgrounds = Campground::all();
        Session::flash('flash_message','Your campground edits were saved');
        return view('campground.index')->with('campgrounds', $campgrounds);;
    }

    /**
     * Show the confirmation for deleting the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $campground = Campground::find($id);
        // Add validation to ensure this is found

        return view('campground.delete')->with('campground', $campground);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
