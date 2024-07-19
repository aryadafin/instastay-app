@extends('../layouts/master')
@section('content')
    <section id="content"
        class="max-w-[640px] w-full min-h-screen mx-auto flex flex-col bg-[#F8F8F8] overflow-x-hidden pb-[122px] relative">
        <header class="flex justify-center h-[376px] px-[18px] relative overflow-hidden -mb-[106px]">
            <img src="{{ asset('assets/images/backgrounds/BG.png') }}" class="absolute object-cover w-full h-full"
                alt="backgrounds">
            <div class="fixed top-0 w-full max-w-[640px] px-[18px] z-30">
                <nav
                    class="bg-white p-[10px_16px] h-fit w-full flex items-center justify-between rounded-full shadow-[0_8px_30px_0_#0A093212] z-10 mt-[60px]">
                    <a href="{{ route('login') }}">
                        <div
                            class="w-[54px] h-[54px] flex shrink-0 overflow-hidden rounded-full items-center justify-center">
                            <img src="{{ Storage::url(Auth::user()->avatar) }}" class="w-full h-full object-cover"
                                alt="icon">
                        </div>
                    </a>
                    <div class="flex flex-col gap-[2px] text-center">
                        <p class="font-medium text-sm text-[#757C98] leading-[21px]">InstaStay</p>
                        <div class="flex items-center justify-between gap-1">
                            <div class="flex shrink-0">
                                <img src="{{ asset('assets/images/icons/location.svg') }}" alt="icon">
                                <p class="font-semibold text-sm leading-[21px]">ITTS, Tangsel</p>
                            </div>
                        </div>
                    </div>
                    <a href="">
                        <div
                            class="w-[54px] h-[54px] flex shrink-0 overflow-hidden rounded-full items-center justify-center">
                            <img src="{{ asset('assets/images/icons/Notifcations.svg') }}" alt="icon">
                        </div>
                    </a>
                </nav>
            </div>
        </header>
        <div id="Feature" class="px-[18px] relative z-10">
            <div class="card-container">
                <a href="{{ route('front.index') }}" class="back-button">Back</a>
                <div class="coming-soon-text">Coming Soon!</div>
            </div>
        </div>
        </div>
        <div id="Promo" class="mt-6 w-full bg-white overflow-hidden py-6 flex flex-col gap-3">
            <div class="flex justify-between items-center px-[18px]">
                <h1 class="font-semibold text-lg leading-[27px]">Promo Special For You✨</h1>
                <a href="" class="font-semibold text-sm leading-[21px] text-[#4041DA]">See All</a>
            </div>
            <div class="main-carousel">
                <a href="" class="pl-[18px] last:pr-[18px]">
                    <div class="w-fit flex flex-col gap-4">
                        <div class="w-[310px] h-[160px] flex shrink-0 overflow-hidden rounded-xl">
                            <img src="{{ asset('assets/images/thumbnails/thumbnail1.png') }}"
                                class="object-cover w-full h-full" alt="thumbnail">
                        </div>
                        <div class="flex flex-col gap-1">
                            <p class="font-semibold">Wonderful Indonesia</p>
                            <p class="text-[#757C98] font-semibold text-sm leading-[21px]">Available 9 Promos</p>
                        </div>
                    </div>
                </a>
                <a href="" class="pl-[18px] last:pr-[18px]">
                    <div class="w-fit flex flex-col gap-4">
                        <div class="w-[310px] h-[160px] flex shrink-0 overflow-hidden rounded-xl">
                            <img src="{{ asset('assets/images/thumbnails/thumbnail2.png') }}"
                                class="object-cover w-full h-full" alt="thumbnail">
                        </div>
                        <div class="flex flex-col gap-1">
                            <p class="font-semibold">Majestic Thailand</p>
                            <p class="text-[#757C98] font-semibold text-sm leading-[21px]">Available 25 Promos</p>
                        </div>
                    </div>
                </a>
                <a href="" class="pl-[18px] last:pr-[18px]">
                    <div class="w-fit flex flex-col gap-4">
                        <div class="w-[310px] h-[160px] flex shrink-0 overflow-hidden rounded-xl">
                            <img src="{{ asset('assets/images/thumbnails/thumbnail3.png') }}"
                                class="object-cover w-full h-full" alt="thumbnail">
                        </div>
                        <div class="flex flex-col gap-1">
                            <p class="font-semibold">Amazing Singapore</p>
                            <p class="text-[#757C98] font-semibold text-sm leading-[21px]">Available 22 Promos</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div id="Menu-bar" class="fixed bottom-[24px] px-[18px] max-w-[640px] w-full z-30">
            <div
                class="bg-white p-[14px_12px] rounded-full flex items-center justify-center gap-8 shadow-[0_8px_30px_0_#0A093212]">
                <a href="index.html">
                    <div class="flex flex-col gap-1 items-center">
                        <div class="w-6 h-6 flex shrink-0">
                            <img src="{{ asset('assets/images/icons/home-active.svg') }}" alt="icon">
                        </div>
                        <p class="text-xs leading-[18px] font-semibold text-[#4041DA]">Home</p>
                    </div>
                </a>
                <a href="">
                    <div class="flex flex-col gap-1 items-center">
                        <div class="w-6 h-6 flex shrink-0">
                            <img src="{{ asset('assets/images/icons/search-nonactive.svg') }}" alt="icon">
                        </div>
                        <p class="text-xs leading-[18px] font-medium text-[#757C98]">Search</p>
                    </div>
                </a>
                <a href="">
                    <div class="flex flex-col gap-1 items-center">
                        <div class="w-6 h-6 flex shrink-0">
                            <img src="{{ asset('assets/images/icons/activity-nonactive.svg') }}" alt="icon">
                        </div>
                        <p class="text-xs leading-[18px] font-medium text-[#757C98]">Activity</p>
                    </div>
                </a>
                <a href="">
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
@push('after-styles')
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
@endpush
@push('after-scripts')
    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>

    <script src="js/carousel.js"></script>
@endpush
