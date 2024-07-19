<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Country;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Http\Requests\StoreHotelRequest;
use App\Http\Requests\CityHotelRequest;
use App\Http\Requests\UpdateHotelRequest;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotels = Hotel::with(['rooms'])->orderByDesc('id')->paginate(10);
        return view('admin.hotels.index', compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::orderByDesc('id')->get();
        $cities = City::orderByDesc('id')->get();
        return view('admin.hotels.create', compact('countries', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHotelRequest $request)
    {
        DB::transaction(function() use ($request) {
            $validated = $request->validated();

            if ($request->hasFile('thumbnail')) {
                $thumbnailPath = $request->file('thumbnail')->store('thumbnails/' . date('Y/m/d'), 'public');
                $validated['thumbnail'] = $thumbnailPath;
            }

            $validated['slug'] = Str::slug($validated['name']);
             $validated['star_level'] = $request->star_level;

            $hotel = Hotel::create($validated);

            // menyimpan beberapa foto 3
            if ($request->hasFile('photos')) {
                foreach ($request->file('photos') as $photo) {
                    $photoPath = $photo->store('photos/' . date('Y/m/d'), 'public');

                    $hotel->photos()->create([
                        'photo' => $photoPath,
                    ]);
                }
            }

        });
        return redirect()->route('admin.hotels.index')->with('success', 'Hotel berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Hotel $hotel)
    {
        //
        $latestPhotos = $hotel->photos()->orderByDesc('id')->take(3)->get();
        return view('admin.hotels.show', compact('hotel', 'latestPhotos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hotel $hotel)
    {
        //
        $countries = Country::orderByDesc('id')->get();
        $cities = City::orderByDesc('id')->get();
        $latestPhotos = $hotel->photos()->orderByDesc('id')->take(3)->get();
        return view('admin.hotels.edit', compact('hotel', 'countries', 'cities', 'latestPhotos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHotelRequest $request, Hotel $hotel)
    {
        //
        DB::transaction(function() use ($request, $hotel) {
            $validated = $request->validated();

            if ($request->hasFile('thumbnail')) {
                $thumbnailPath = $request->file('thumbnail')->store('thumbnails/' . date('Y/m/d'), 'public');
                $validated['thumbnail'] = $thumbnailPath;
            }

            $validated['slug'] = Str::slug($validated['name']);
             $validated['star_level'] = $request->star_level;

            $hotel ->update($validated);

            // menyimpan beberapa foto 3
            if ($request->hasFile('photos')) {
                foreach ($request->file('photos') as $photo) {
                    $photoPath = $photo->store('photos/' . date('Y/m/d'), 'public');
                    $hotel->photos()->create([
                        'photo' => $photoPath,
                    ]);
                }
            }

        });
        return redirect()->route('admin.hotels.index')->with('success', 'Hotel berhasil ditambahkan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hotel $hotel)
{
    // Wrap in try-catch block to handle potential errors
    try {
        DB::transaction(function () use ($hotel) {
            $hotel->delete();
        });

        return redirect()->route('admin.hotels.index')->with('success', 'Hotel deleted successfully.');
    } catch (\Exception $e) {
        // Log the error and return with an error message
        \Log::error('Error deleting hotel: ' . $e->getMessage());

        return redirect()->route('admin.hotels.index')->with('error', 'Failed to delete hotel.');
    }
}
public function booking_details(HotelBooking $hotelBooking)
{
    // Pastikan untuk memuat hubungan dengan hotel
    $hotel = $hotelBooking->hotel;
    
    return view('dashboard.booking_details', compact('hotelBooking', 'hotel'));
}

public function getMapLink(Hotel $hotel)
    {
        return response()->json(['link_gmaps' => $hotel->link_gmaps]);
    }
   
}
