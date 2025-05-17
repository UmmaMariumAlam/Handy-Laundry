<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Customer;
use App\Models\Laundromat;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    /**
     * Display a listing of the ratings.
     */
    public function index()
    {
        // Get all ratings with associated customer and laundromat relationships
        $ratings = Rating::with(['customer', 'laundromat'])->get();

        // Return the ratings as JSON
        return response()->json([
            'status' => 'success',
            'message' => 'Ratings retrieved successfully.',
            'data' => $ratings
        ], 200);
    }

    /**
     * Store a newly created rating in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'customer_id' => 'required|exists:customers,customer_id',
            'laundromat_id' => 'required|exists:laundromats,laundromat_id',
            'ratings' => 'required|numeric|between:0,5', // Rating should be between 0 and 5
        ]);

        // Create a new rating
        $rating = Rating::create([
            'customer_id' => $request->customer_id,
            'laundromat_id' => $request->laundromat_id,
            'ratings' => $request->ratings,
        ]);

        // Return a response with the created rating
        return response()->json([
            'status' => 'success',
            'message' => 'Rating submitted successfully.',
            'data' => $rating
        ], 201);
    }

    /**
     * Display the specified rating.
     */
    public function show($id)
    {
        // Find the rating by ID and load associated customer and laundromat
        $rating = Rating::with(['customer', 'laundromat'])->findOrFail($id);

        // Return the rating as a response
        return response()->json([
            'status' => 'success',
            'message' => 'Rating retrieved successfully.',
            'data' => $rating
        ], 200);
    }

    /**
     * Update the specified rating in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'customer_id' => 'required|exists:customers,customer_id',
            'laundromat_id' => 'required|exists:laundromats,laundromat_id',
            'ratings' => 'required|numeric|between:0,5',
        ]);

        // Find the rating and update it
        $rating = Rating::findOrFail($id);
        $rating->update([
            'customer_id' => $request->customer_id,
            'laundromat_id' => $request->laundromat_id,
            'ratings' => $request->ratings,
        ]);

        // Return a response with the updated rating
        return response()->json([
            'status' => 'success',
            'message' => 'Rating updated successfully.',
            'data' => $rating
        ], 200);
    }

    /**
     * Remove the specified rating from storage.
     */
    public function destroy($id)
    {
        // Find the rating by ID and delete it
        $rating = Rating::findOrFail($id);
        $rating->delete();

        // Return a success message after deletion
        return response()->json([
            'status' => 'success',
            'message' => 'Rating deleted successfully.'
        ], 200);
    }
}
