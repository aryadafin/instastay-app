@extends('../layouts/master')
@section('content')
    <x-app-layout>
        <x-slot name="header">
            <div class="flex flex-row justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Details Booking') }}
                </h2>
            </div>
        </x-slot>

        <div class="py-12">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">
                    <div class="item-card flex flex-row justify-between items-center">
                        <div class="flex flex-row items-center gap-x-3">
                            <img src="{{ Storage::url($hotelBooking->hotel->thumbnail) }}" alt=""
                                class="rounded-2xl object-cover w-[120px] h-[90px]">
                            <div class="flex flex-col">
                                <h3 class="text-indigo-950 text-xl font-bold">
                                    {{ $hotelBooking->hotel->name }}
                                </h3>
                                <p class="text-slate-500 text-sm">
                                    {{ $hotelBooking->hotel->city->name }}, {{ $hotelBooking->hotel->country->name }}
                                </p>

                            </div>
                        </div>
                        @if (!$hotelBooking->is_paid)
                            <form action="{{ route('admin.hotel_bookings.update', $hotelBooking) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                                    Approve
                                </button>
                            </form>
                        @endif
                    </div>
                    <div class="item-card flex flex-row justify-between items-center">
                        <div class="flex flex-row items-center gap-x-3">
                            <img src="{{ Storage::url($hotelBooking->room->photo) }}" alt=""
                                class="rounded-2xl object-cover w-[120px] h-[90px]">
                            <div class="flex flex-col">
                                <p class="text-slate-500 text-sm">
                                    Your room:
                                </p>
                                <h3 class="text-indigo-950 text-xl font-bold">
                                    {{ $hotelBooking->room->name }}
                                </h3>

                            </div>
                        </div>
                        <div class="hidden md:flex flex-col">
                            <p class="text-slate-500 text-sm">Price</p>
                            <h3 class="text-indigo-950 text-xl font-bold">
                                Rp {{ number_format($hotelBooking->room->price, 0, ',', ',') }}/night
                            </h3>
                        </div>

                    </div>
                    <hr class="my-5">

                    <div class="grid grid-cols-2 gap-5">
                        <div class="flex flex-col gap-y-4">
                            <div class="flex flex-col">
                                <p class="text-slate-500 text-sm">Status</p>
                                @if ($hotelBooking->is_paid)
                                    <span class="w-fit text-sm font-bold py-2 px-3 rounded-full bg-green-500 text-white">
                                        SUCCESS
                                    </span>
                                @else
                                    <span class="w-fit text-sm font-bold py-2 px-3 rounded-full bg-orange-500 text-white">
                                        PENDING
                                    </span>
                                @endif
                            </div>

                            <div class="flex flex-col">
                                <p class="text-slate-500 text-sm">Name</p>
                                <h3 class="text-indigo-950 text-xl font-bold">
                                    {{ $hotelBooking->customer->name }}
                                </h3>
                            </div>

                            <div class="flex flex-col">
                                <p class="text-slate-500 text-sm">Email</p>
                                <h3 class="text-indigo-950 text-xl font-bold">
                                    {{ $hotelBooking->customer->email }}
                                </h3>
                            </div>
                        </div>
                        <div class="flex flex-col gap-y-4">
                            <div class="flex flex-col">
                                <p class="text-slate-500 text-sm">Quantity</p>
                                <h3 class="text-indigo-950 text-xl font-bold">
                                    {{ $hotelBooking->room->total_people }} people
                                </h3>
                            </div>

                            <div class="flex flex-col">
                                <p class="text-slate-500 text-sm">Total Nights</p>
                                <h3 class="text-indigo-950 text-xl font-bold">
                                    {{ $hotelBooking->total_days }}
                                </h3>
                            </div>

                            <div class="flex flex-col">
                                <p class="text-slate-500 text-sm">Date</p>
                                <h3 class="text-indigo-950 text-xl font-bold">
                                    {{ $hotelBooking->checkin_at->format('M d, Y') }} -
                                    {{ $hotelBooking->checkout_at->format('M d, Y') }}
                                </h3>
                            </div>

                        </div>
                    </div>

                    <hr class="my-5">

                    <div class="grid grid-cols-2 gap-5">
                        <div class="flex flex-col gap-y-4">

                            <div class="flex flex-col">
                                <p class="text-slate-500 text-sm">Total Amount</p>
                                <h3 class="text-indigo-950 text-xl font-bold">
                                    Rp {{ number_format($hotelBooking->total_amount, 0, ',', ',') }}
                                </h3>
                            </div>
                        </div>
                        <div class="flex flex-col gap-y-4">
                            <h3 class="text-indigo-950 text-xl font-bold">
                                Bukti Pembayaran
                            </h3>
                            <a id="Main-thumbnail" href="{{ Storage::url($hotelBooking->proof) }}"
                                class="col-span-3 glightbox w-full aspect-[393/247] overflow-hidden"
                                data-gallery="gallery1">
                                <img src="{{ Storage::url($hotelBooking->proof) }}" class="object-cover w-full h-full"
                                    alt="thumbnail">
                            </a>


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </x-app-layout>
@endsection
@push('after-styles')
    <!-- CSS -->
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" />
@endpush

@push('after-scripts')
    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/mcstudios/glightbox/dist/js/glightbox.min.js"></script>

    <script src="{{ asset('js/hotel-details.js') }}"></script>
    <script src="{{ asset('js/carousel.js') }}"></script>
    <script src="{{ asset('js/map.js') }}"></script>
@endpush
