<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Customer;
use App\Models\Laundromat;
use App\Models\Rating;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with(['customer', 'laundromat', 'rating'])->get();
        return view('reviews.index', compact('reviews'));
    }

    public function show($id)
    {
        $review = Review::with(['customer', 'laundromat', 'rating'])->findOrFail($id);
        return view('reviews.show', compact('review'));
    }

    public function create()
    {
        $laundromats = Laundromat::all();
        $ratings = Rating::all();
        return view('reviews.create', compact('laundromats', 'ratings'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'laundromat_id' => 'required|exists:laundromats,laundromat_id',
            'ratings_id'    => 'required|exists:ratings,id',
            'review'        => 'required|string',
        ]);

       // $validated['customer_id'] = auth()->id(); // Remove spaces around id()

        Review::create($validated);

        return redirect()->route('reviews.index')->with('success', 'Review added successfully!');
    }

    public function edit($id)
    {
        $review = Review::findOrFail($id);
        $laundromats = Laundromat::all();
        $ratings = Rating::all();
        return view('reviews.edit', compact('review', 'laundromats', 'ratings'));
    }

    public function update(Request $request, $id)
    {
        $review = Review::findOrFail($id);

        $validated = $request->validate([
            'ratings_id' => 'required|exists:ratings,id',
            'review'     => 'required|string',
        ]);

        $review->update($validated);

        return redirect()->route('reviews.index')->with('success', 'Review updated successfully!');
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect()->route('reviews.index')->with('success', 'Review deleted successfully!');
    }
}
