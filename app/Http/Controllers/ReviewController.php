<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon;
use Session;
use App\Campground;
use App\Review;

class ReviewController extends Controller
{
    /**
     * Show the form for creating a new review.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $campground = Campground::find($id);

        return view('review.create')->with([
                'selected_campground' => $campground
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
        $review = new Review();

        # Set the parameters
        # Note how each parameter corresponds to a field in the table
        $review->username = $request->user()->name;
        $review->review = $request->review;
        $review->star_rating = 5;
        $review->campground_id = $request->campground_id;

        $review->save();

        Session::flash('flash_message','Your review was added');
        return redirect('/campgrounds');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
