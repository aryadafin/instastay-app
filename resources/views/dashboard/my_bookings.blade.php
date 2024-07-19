@extends('../layouts/master')
@section('content')
    <section id="content"
        class="max-w-[640px] w-full min-h-screen mx-auto flex flex-col bg-white overflow-x-hidden pb-[80px] relative">
        <div class="w-full h-[150px] bg-gradient-to-r from-[#4041DA] to-[#2A3FCC]">
            <div class="relative z-10 px-[18px] flex flex-col mt-[60px]">
                <div class="top-menu flex justify-center items-center">
                    <p class="font-semibold text-lg text-white">Recent Activity</p>
                </div>
            </div>
        </div>

        <div class="px-[18px] mt-[-30px]">
            @forelse($mybookings as $booking)
                <div class="activity-result bg-white rounded-xl overflow-hidden shadow-md mb-4">
                    <div class="flex items-center gap-3 p-4">
                        <div class="thumbnail-container w-[100px] h-[100px] flex-shrink-0 rounded-xl overflow-hidden">
                            <img src="{{ Storage::url($booking->room->photo) }}" class="object-cover w-full h-full"
                                alt="thumbnail">
                        </div>
                        <div class="hotel-info flex flex-col gap-[6px] flex-grow">
                            <p class="font-semibold text-lg">{{ $booking->hotel->name }}</p>
                            <div class="flex items-center gap-2">
                                <img src="{{ asset('assets/images/icons/location-grey.svg') }}" alt="location"
                                    class="w-4 h-4">
                                <p class="text-sm text-gray-600">{{ $booking->hotel->country->name }}</p>
                            </div>
                            <div class="flex items-center gap-2">
                                <img src="{{ asset('assets/images/icons/star-outline-grey.svg') }}" alt="star"
                                    class="w-4 h-4">
                                <p class="text-sm text-gray-600">{{ $booking->hotel->star_level }} Star</p>
                            </div>
                            <p class="text-[#54A917] font-semibold">Rp
                                {{ number_format($booking->room->price, 0, ',', ',') }}<span
                                    class="text-gray-600 text-sm">/night</span></p>
                        </div>
                    </div>
                    <a href="{{ route('dashboard.booking_details', $booking) }}"
                        class="block w-full bg-[#4041DA] text-white text-center py-3 font-semibold">
                        Booking Details
                    </a>
                </div>
            @empty
                <p class="text-center mt-4">No bookings found.</p>
            @endforelse
        </div>

        <div id="Menu-bar" class="fixed bottom-[24px] px-[18px] max-w-[640px] w-full z-30">
            <div
                class="bg-white p-[14px_12px] rounded-full flex items-center justify-center gap-8 shadow-[0_8px_30px_0_#0A093212]">
                <a href="{{ route('front.index') }}">
                    <div class="flex flex-col gap-1 items-center">
                        <div class="w-6 h-6 flex shrink-0">
                            <img src="{{ asset('assets/images/icons/home-nonactive.svg') }}" alt="icon">
                        </div>
                        <p class="text-xs leading-[18px] font-semibold text-[#757C98]">Home</p>
                    </div>
                </a>
                <a href="{{ route('front.hotels') }}">
                    <div class="flex flex-col gap-1 items-center">
                        <div class="w-6 h-6 flex shrink-0">
                            <img src="{{ asset('assets/images/icons/search-nonactive.svg') }}" alt="icon">
                        </div>
                        <p class="text-xs leading-[18px] font-medium text-[#757C98]">Search</p>
                    </div>
                </a>
                <a href="{{ route('dashboard.my-bookings') }}">
                    <div class="flex flex-col gap-1 items-center">
                        <div class="w-6 h-6 flex shrink-0">
                            <img src="{{ asset('assets/images/icons/activity-active.svg') }}" alt="icon">
                        </div>
                        <p class="text-xs leading-[18px] font-medium text-[#4041DA]">Activity</p>
                    </div>
                </a>
                <a href="{{ route('dashboard') }}">
                    <div class="flex flex-col gap-1 items-center">
                        <div class="w-6 h-6 flex shrink-0">
                            <img src="{{ asset('assets/images/icons/settings-nonactive.svg') }}" alt="icon">
                        </div>
                        <p class="text-xs leading-[18px] font-medium text-[#757C98]">Settings</p>
                    </div>
                </a>
            </div>
        </div>
    </section>
@endsection
