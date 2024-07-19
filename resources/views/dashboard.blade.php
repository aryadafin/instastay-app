 <x-app-layout>
     <x-slot name="header">
         <h2 class="font-semibold text-xl text-gray-800 leading-tight">
             {{ __('Dashboard') }}
         </h2>
     </x-slot>





     <div class="py-8 ">
         <div class="p-3 text-gray-900">

             <div
                 class="flex items-center justify-center font-semibold p-[12px_24px] rounded-lg h-12 bg-[#4041DA17] text-[#4041DA] m-4 mt-0"">

                 {{ __("You're logged in!") }}

             </div>

             @extends('../layouts/master')
             @section('content')
             @endsection
             @push('after-styles')
                 <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
                     rel="stylesheet">
                 <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
                 <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
                 <style>
                     #editForm {
                         display: none;
                     }
                 </style>
             @endpush
             @push('after-scripts')
                 <script src="https://code.jquery.com/jquery-3.7.1.min.js"
                     integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
                 <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
                 <script src="js/carousel.js"></script>

                
             @endpush
         </div>
     </div>

     <div id="Promo" class="mt-6 w-full bg-white overflow-hidden py-6 flex flex-col gap-3">
         <div class="flex justify-between items-center px-[18px]">
             <h1 class="font-semibold text-lg leading-[27px]">Promo Special For You✨</h1>
             <a href="{{ route('front.index') }}" class="font-semibold text-sm leading-[21px] text-[#4041DA]">See
                 All</a>
         </div>
         <div class="main-carousel">
             <a href="" class="pl-[18px] last:pr-[18px]">
                 <div class="w-fit flex flex-col gap-4">
                     <div class="w-[310px] h-[160px] flex shrink-0 overflow-hidden rounded-xl">
                         <img src="assets/images/thumbnails/thumbnail1.png" class="object-cover w-full h-full"
                             alt="thumbnail">
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
                         <img src="assets/images/thumbnails/thumbnail2.png" class="object-cover w-full h-full"
                             alt="thumbnail">
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
                         <img src="assets/images/thumbnails/thumbnail3.png" class="object-cover w-full h-full"
                             alt="thumbnail">
                     </div>
                     <div class="flex flex-col gap-1">
                         <p class="font-semibold">Amazing Singapore</p>
                         <p class="text-[#757C98] font-semibold text-sm leading-[21px]">Available 22 Promos</p>
                     </div>
                 </div>
             </a>
         </div>
     </div>

     <div id="Bottom-nav"
         class="fixed bottom-0 w-full max-w-[640px] md:max-w-full md:static md:mt-8 flex flex-col md:flex-row p-[24px_18px] md:p-4 border-t border-[#DCDFE6] md:border-t-0 gap-4 bg-white md:justify-center">
        
         <a href="{{ route('front.index') }}"
             class="flex items-center justify-center font-semibold p-[12px_24px] rounded-lg w-full md:w-auto md:min-w-[200px] h-12 bg-[#4041DA17] text-[#4041DA] hover:bg-[#4041DA30] transition-colors">
             Back to Homepage
         </a>
     </div>






     </div>

 </x-app-layout>
