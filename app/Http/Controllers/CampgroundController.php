<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon;
use Session;
use App\Campground;
use App\Review;
use App\Type;

class CampgroundController extends Controller
{
    /**
     * Display a listing of ALL of the campgrounds.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        # Get all Camgounds along with their Reviews and Type using pivot tables
        $campgrounds = Campground::with(['reviews','type'])->get();

        # We want to automatically have one selected, so select the first one
        # Note:  It's ok if there is not any campgrounds, this will return NULL
        # and the UI handles NULL so no validation is needed here
        $selected_campground = $campgrounds->first();

        return view('campground.index')->with([
            'campgrounds' => $campgrounds,
            'selected_campground' => $selected_campground
        ]);
    }

    /**
     * Show the form for creating a new campground.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        # Get all of the Types so that the UI can provide this in the form
        $types = Type::all();

        return view('campground.create')->with([
            'types' => $types
        ]);
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
        $campground->fees = $request->fees;
        $campground->address = $request->address;
        $campground->city = $request->city;
        $campground->state = $request->state;
        $campground->zipcode = $request->zipcode;
        $campground->type_id = $request->type_id;

        # Invoke the Eloquent save() method
        # This will generate a new row in the `campgrounds` table, with the above data
        $campground->save();

        $campgrounds = Campground::all();
        Session::flash('flash_message','Your campground was added');
        return view('campground.index')->with([
                'campgrounds' => $campgrounds,
                'selected_campground' => $campground
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $campgrounds = Campground::all();
        $selected_campground = Campground::find($id);

        // Add validation to ensure this is found
        return view('campground.index')->with([
                'campgrounds' => $campgrounds,
                'selected_campground' => $selected_campground
            ]);
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
        $campground->fees = $request->fees;
        $campground->address = $request->address;
        $campground->city = $request->city;
        $campground->state = $request->state;
        $campground->zipcode = $request->zipcode;
        $campground->type_id - $request->type_id;

        # Invoke the Eloquent save() method
        # This will update the existing row in the `campgrounds` table, with the above data
        $campground->save();

        Session::flash('flash_message','Your campground edits were saved');

        $campgrounds = Campground::all();
        $selected_campground = Campground::find($id);

        // Add validation to ensure this is found
        return view('campground.index')->with([
                'campgrounds' => $campgrounds,
                'selected_campground' => $selected_campground
            ]);
    }

    /**
     * Show the confirmation for deleting the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $selected_campground = Campground::find($id);
        // Add validation to ensure this is found

        return view('campground.delete')->with('selected_campground', $selected_campground);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        # Get the Campground to be deleted
        $campground = Campground::find($id);

        if(is_null($campground)) {
            Session::flash('message','Campground not found.');
        }
        else {
            # First remove any reviews associated with this campground
            if($campground->reviews()) {
                $campground->reviews()->detach();
            }

            # Then delete the campground
            $campground->delete();

            # Finish
            Session::flash('flash_message', $campground->name.' was deleted.');
        }

        # Get all Camgounds along with their Reviews and Type using pivot tables
        $campgrounds = Campground::with(['reviews','type'])->get();

        # We want to automatically have one selected, so select the first one
        # Note:  It's ok if there is not any campgrounds, this will return NULL
        # and the UI handles NULL so no validation is needed here
        $selected_campground = $campgrounds->first();

        return view('campground.index')->with([
            'campgrounds' => $campgrounds,
            'selected_campground' => $selected_campground
        ]);
    }
}
