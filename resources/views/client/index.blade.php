@extends('master.client-base')

@section('content')
    <!-- Hero Section -->
    <section class="bg-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24">
            <div class="grid md:grid-cols-2 gap-8 items-center">
                <div class="text-center md:text-left">
                    <h1 class="text-4xl md:text-6xl font-extrabold text-black leading-tight">
                        Find Your<br>Perfect Style
                    </h1>
                    <p class="mt-4 text-lg text-gray-600 max-w-lg mx-auto md:mx-0">
                        Discover our new collection of premium shoes, clothes, and bags. Unmatched quality and timeless
                        design.
                    </p>
                    <div class="mt-8 flex justify-center md:justify-start space-x-4">
                        <a href="{{route('client.shop')}}"
                           class="bg-black text-white font-semibold px-8 py-3 rounded-lg shadow-md hover:bg-gray-800 transition-all">Shop
                            Now</a>
                        <a href="#"
                           class="bg-gray-200 text-black font-semibold px-8 py-3 rounded-lg hover:bg-gray-300 transition-all">Learn
                            More</a>
                    </div>
                </div>
{{--                <div class="relative">--}}
{{--                    <img src="https://images.unsplash.com/photo-1483985988355-763728e1935b?q=80&w=2070&auto=format&fit=crop"--}}
{{--                         alt="Featured Outfit" class="rounded-lg shadow-2xl w-full h-full object-cover">--}}
{{--                    <div class="absolute -bottom-4 -right-4 bg-white p-4 rounded-lg shadow-lg hidden md:block border">--}}
{{--                        <p class="font-bold">New Summer Collection</p>--}}
{{--                        <p class="text-sm text-gray-500">Just Arrived</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div>
                    <div>
                        <img src="{{asset("images/slider/slide_1.jpg")}}"
                             alt="Slider 1" class="rounded-lg shadow-2xl w-full h-full object-cover">
                    </div>
{{--                    <div>--}}
{{--                        <img src="{{asset("images/slider/slide_2.jpg")}}"--}}
{{--                             alt="Slider 2" class="rounded-lg shadow-2xl w-full h-full object-cover">--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <img src="{{asset("images/slider/slide_3.jpg")}}"--}}
{{--                             alt="Slider 3" class="rounded-lg shadow-2xl w-full h-full object-cover">--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <img src="{{asset("images/slider/slide_4.jpg")}}"--}}
{{--                             alt="Slider 4" class="rounded-lg shadow-2xl w-full h-full object-cover">--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </section>

    <!-- Discount Banner -->
    <section class="bg-black text-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8 flex flex-col md:flex-row items-center justify-between">
            <h3 class="text-2xl font-bold text-center md:text-left">Enjoy <span class="text-gray-300">20% OFF</span>
                Your First Order</h3>
            <a href="#"
               class="mt-4 md:mt-0 bg-white text-black font-bold px-6 py-2 rounded-full hover:bg-gray-200 transition-colors">Claim
                Offer</a>
        </div>
    </section>

    <!-- Featured Products -->
    <section class="py-16 sm:py-24 bg-gray-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center mb-12">Trending Products</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($trendingProducts as $trending)
                    <a href="{{route('client.view_product',$trending->slug)}}"
                        class="bg-white relative rounded-lg shadow-md overflow-hidden group transition-transform duration-300 hover:-translate-y-2 border cursor-pointer">
                        <!-- Discount Badge -->
                        @if($trending->discount > 0)
                            <div class="bg-red-600 px-3 text-white text-center py-1 absolute top-[20px] left-[20px] z-10 rounded">
                                -{{$trending->discount}}%
                            </div>
                        @endif
                        <!-- End Discount Badge -->

                        <div class="relative overflow-hidden">
                            <div
                                class="w-full h-64 bg-[var(--secondary-color)] group-hover:scale-105 transition-transform duration-300 background-image"
                                style="background-image: url('{{$trending->image}}')"
                            >

                            </div>
{{--                            <img src="https://www.machines.com.my/cdn/shop/products/iPhone_15_Pink_PDP_Image_Position-1__GBEN_411a5b11-e015-40c9-a8ea-72bfea91a4c1.jpg?v=1705480793"--}}
{{--                                 alt="the best"--}}
{{--                                 class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">--}}
                        </div>
                        <div class="p-4">
                            <h3 class="font-semibold text-lg">{{$trending->name}}</h3>
                            <p class="text-gray-500 text-sm">{{$trending->category->name}}</p>
                            <p class="mt-2 font-bold text-black">{{number_format($trending->price,0)}}៛</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $(".owl-carousel").owlCarousel({
                items:1,
                loop:true,
                dots:true,
                dotsEach:true,
                autoplay:true,
                margin:28,
            });
        });
    </script>
@endsection
