<?php class ReviewController extends Controller
{
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'title' => 'required',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required',
        ]);

        // Create a new review in the database
        $review = new Review;
        $review->title = $validatedData['title'];
        $review->rating = $validatedData['rating'];
        $review->review = $validatedData['review'];
        $review->save();

        // Redirect the user back to the form page with a success message
        return redirect('index.html')->with('success', 'Review submitted successfully!');
    }
}