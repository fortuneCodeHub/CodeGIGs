<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;
// use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;


class ListingController extends Controller
{
    // Show all listings
    public function index()
    {
        // dd(request("tag"));
        return view('listings.index', [
            "listings" => Listing::latest()->filter(request(["tag", "search"]))->paginate(4)
            // "listings" => Listing::all(), this also works but it returns items irregularly
        ]);
    }

    // Show single listing
    public function show(Listing $listing)
    {
        return view('listings.show', [
            "listing" => $listing
        ]);
    }

    // Show Create Form
    public function create()
    {
        return view("listings.create");
    }

    // Store new Job Listing
    public function store(Request $request)
    {
        // dd($request->file("logo"));  // to show $_POST values
        $formFields = $request->validate([
            "title" => "required",
            "company" => ["required", Rule::unique("listings", "company")],  // listings is the table, company is the column on the listings table
            "location" => "required",
            "website" => "required",
            "email" => ["required", "email"],
            "tags" => "required",
            "description" => "required"
        ]);

        // Check if there was an image upload
        if ($request->hasFile("logo")) {
            $formFields["logo"] = $request->file("logo")->store("logos", "public");
        }

        // Add User Id to Database Manually
        $formFields["user_id"] = auth()->id();

        // To seed data into the database you use ::create
        Listing::create($formFields);

        // Flash Messages -- Stored for one page load only, can't be seen on any other page, the below works but we are redirecting to another page, so we send it as a message to the page we redirected to
        // Session::flash("message", "Listing Created Successfully");

        return redirect(route("home"))->with("message", "Listing Created Successfully");
    }

    // Edit Listing
    public function edit(Listing $listing)
    {
        return view("listings.edit", [
            "listing" => $listing
        ]);
    }

    // Update Listing
    public function update(Request $request, Listing $listing)
    {

        // Make sure logged in user is owner
        if ($listing->user_id != auth()->id()) {
            abort(403, "Unauthorized action");
        }

        $formFields = $request->validate([
            "title" => "required",
            "company" => "required",
            "location" => "required",
            "website" => "required",
            "email" => ["required", "email"],
            "tags" => "required",
            "description" => "required"
        ]);

        // Check if there was an image upload
        if ($request->hasFile("logo")) {
            $formFields["logo"] = $request->file("logo")->store("logos", "public");
        }

        // update listing data
        $listing->update($formFields);

        // Flash Messages -- Stored for one page load only, can't be seen on any other page, the below works but we are redirecting to another page, so we send it as a message to the page we redirected to
        // Session::flash("message", "Listing Created Successfully");

        return back()->with("message", "Listing Updated Successfully");
    }

    // Delete Listing
    public function destroy(Listing $listing)
    {
        // Make sure logged in user is owner
        if ($listing->user_id != auth()->id()) {
            abort(403, "Unauthorized action");
        }

        $listing->delete();
        return redirect(route("home"))->with("message", "Listing Deleted Successfully");
    }

    // Manage Listing
    public function manage()
    {
        return view("listings.manage", [
            "listings" => auth()->user()->listings()->get()
        ]);
    }
}
