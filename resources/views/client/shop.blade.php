@extends('master.client-base')

@section("style")
    <style>
        .product-title {
            overflow: hidden;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
        }
    </style>
@endsection

@section('content')
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <h2 class="text-3xl font-bold text-center mb-4">Our Collection</h2>
        <p class="text-center text-gray-600 mb-12">Browse our curated selection of high-quality fashion items.</p>

        <!-- Start Category Filters -->
        <div class="flex justify-center space-x-2 sm:space-x-4 mb-12">
            <a href="{{route('client.shop')}}"
               class="px-4 py-2 rounded-full font-semibold shadow-sm hover:bg-black hover:text-white transition-colors @if(Request::routeIs('client.shop')) bg-black text-white @endif">
                All
            </a>

            @foreach ( $categories as $category)
                <a href="{{route('client.category',strtolower($category->name))}}"
                   class="px-4 py-2 rounded-full font-semibold shadow-sm hover:bg-black hover:text-white cursor-pointer transition-colors @if(isset($activeCategory) && (strtolower($activeCategory) == strtolower($category->name))) bg-black text-white @endif">
                    {{ $category->name }}</a>
            @endforeach
        </div>
        <!-- End Category Filters -->

        {{-- Products Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            @foreach($products as $product)
                <a href="{{route('client.view_product',$product->slug)}}"
                   class="bg-white rounded-lg shadow-md relative overflow-hidden group transition-transform duration-300 hover:-translate-y-2 border cursor-pointer">
                    <!-- Discount Badge -->
                    @if($product->discount > 0)
                        <div class="bg-red-600 px-3 text-white text-center py-1 absolute top-[20px] left-[20px] z-10 rounded">
                            -{{$product->discount}}%
                        </div>
                    @endif
                    <!-- End Discount Badge -->
                    <div class="relative overflow-hidden">
                        <div
                            class="w-full h-72 object-cover group-hover:scale-105 bg-[var(--secondary-color)] transition-transform duration-300 background-image"
                            style="background-image: url('{{$product->image}}')"
                        >

                        </div>
{{--                        <img src="{{$product->image}}" alt="{{$product->name}}"--}}
{{--                             class="w-full h-72 object-cover group-hover:scale-105 transition-transform duration-300">--}}
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-lg product-title">{{$product->name}}</h3>
                        <p class="text-gray-500 text-sm">{{$product->category->name}}</p>
                        @php
                            $discountPrice = 0;
                            if($product->discount > 0){
                                $discountPrice = $product->price * $product->discount / 100;
                            }
                        @endphp

                        @if($product->discount > 0)
                            <div class="flex gap-2 items-end">
                                <p class="mt-2 font-bold text-black">${{number_format($product->price - $discountPrice,2)}}</p>
                                <del class="mt-2 text-[12px] font-bold pb-[2px] text-black">${{number_format($product->price,2)}}</del>
                            </div>
                        @else
                            <p class="mt-2 font-bold text-black">${{$product->price}}</p>
                        @endif
                    </div>
                </a>
            @endforeach
        </div>
        {{-- End Products Grid --}}

        {{--  Pagination  --}}
        <div class="mt-[65px]">
            {{$products->links()}}
        </div>
        {{--  End Pagination  --}}

        {{-- No Product Error Message --}}
        @if(count($products) <= 0)
            <div class="text-center col-span-full py-16">
                <h3 class="text-xl font-semibold">No Products Found</h3>
                <p class="text-gray-500 text-lg mt-2">Try adjusting your search or category filters.</p>
            </div>
        @endif
        {{-- End No Product Error Message --}}
    </div>
@endsection
