@extends('master.client-base')

@section('style')
    <style>
        .cart-button {
            position: relative;
            padding: 10px;
            width: 100%;
            height: 45px;
            border: 0;
            border-radius: 10px;
            background-color: black;
            outline: none;
            cursor: pointer;
            color: #fff;
            transition: .3s ease-in-out;
            font-size: 15px;
            overflow: hidden;
        }

        .cart-button:disabled{
            opacity: 0.8;
            cursor: not-allowed;
            user-select: none;
        }

        .cart-button:not(:disabled):hover {
            opacity: 0.8;
        }

        .cart-button:not(:disabled):active {
            transform: scale(.9);
        }

        .cart-button .fa-shopping-cart {
            position: absolute;
            z-index: 2;
            top: 50%;
            left: -10%;
            font-size: 1.5em;
            transform: translate(-50%,-50%);
        }
        .cart-button .fa-box {
            position: absolute;
            z-index: 3;
            top: -20%;
            left: 52%;
            font-size: 1em;
            transform: translate(-50%,-50%);
        }
        .cart-button span {
            position: absolute;
            z-index: 3;
            left: 50%;
            top: 50%;
            font-size: 1.2em;
            color: #fff;
            transform: translate(-50%,-50%);
        }
        .cart-button span.add-to-cart {
            opacity: 1;
        }
        .cart-button span.added {
            opacity: 0;
        }

        .cart-button.clicked .fa-shopping-cart {
            animation: cart 1.5s ease-in-out forwards;
        }
        .cart-button.clicked .fa-box {
            animation: box 1.5s ease-in-out forwards;
        }
        .cart-button.clicked span.add-to-cart {
            animation: txt1 1.5s ease-in-out forwards;
        }
        .cart-button.clicked span.added {
            animation: txt2 1.5s ease-in-out forwards;
        }
        @keyframes cart {
            0% {
                left: -10%;
            }
            40%, 60% {
                left: 50%;
            }
            100% {
                left: 110%;
            }
        }
        @keyframes box {
            0%, 40% {
                top: -20%;
            }
            60% {
                top: 40%;
                left: 52%;
            }
            100% {
                top: 40%;
                left: 112%;
            }
        }
        @keyframes txt1 {
            0% {
                opacity: 1;
            }
            20%, 100% {
                opacity: 0;
            }
        }
        @keyframes txt2 {
            0%, 80% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        .cart-container {
            position: relative;
        }

        .plus-one {
            position: absolute;
            top: -10px;
            right: 5px;
            background: black;
            color: white;
            font-size: 14px;
            padding: 4px 6px;
            border-radius: 50%;
            opacity: 0;
            transform: translateY(0);
            pointer-events: none;
        }

        .cart-container.added .plus-one {
            animation: floatUp 0.8s ease forwards;
        }

        @keyframes floatUp {
            0% {
                opacity: 1;
                transform: translateY(0);
            }
            100% {
                opacity: 0;
                transform: translateY(-30px);
            }
        }

    </style>
@endsection

@section('content')
    <div class="container mx-auto px-4 sm:px-6 lg:px-4 py-8" id="detail-product-app">
        {{-- Start Login Required Dialog --}}
        <dialog class="m-auto mx-5 sm:mx-auto p-4 md:p-8  rounded max-w-[500px]" id="login-required-dialog">
            <button @click="closeModal()" type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>

            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 min-w-fit">
                    To add items to your cart, please sign in to your account. This helps us save your selections and offer a smoother checkout experience
                </h3>
                <a href="{{route('client.account.login')}}" type="button" class="text-white bg-black hover:bg-black/80 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                    Yes, Go Login
                </a>
                <button @click="closeModal()" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:z-10">No, cancel</button>
            </div>
        </dialog>
        {{-- End Login Required Dialog --}}

        {{-- Start Back To Shop Button (Mobile) --}}
        <a href="{{route('client.shop')}}" class="flex md:hidden text-sm text-gray-500 hover:text-black mb-4 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                 class="w-4 h-4 mr-2">
                <path d="m15 18-6-6 6-6"/>
            </svg>
            Back to Shop
        </a>
        {{-- End Back To Shop Button (Mobile) --}}

        <div class="grid md:grid-cols-2 gap-8 lg:gap-16">
            <!-- Product Image Gallery -->
            <div>
                <div
                    class="bg-gray-100 rounded-lg flex items-center justify-center p-4 mb-4 h-96 background-image"
                    style="background-image: url('{{$product->image}}');"
                >
{{--                    <img src="{{$product->image}}" alt="s{{$product->name}}"--}}
{{--                         class="w-full h-full object-contain rounded-lg">--}}
                </div>
                {{--                <div class="grid grid-cols-5 gap-2">--}}
                {{--                    <div v-for="(image, index) in selectedProduct.imageUrls" :key="index" @click="setActiveImage(index)" class="bg-gray-100 rounded-md flex items-center justify-center p-1 cursor-pointer" :class="{ 'thumbnail-active': index === activeImageIndex }">--}}
                {{--                        <img :src="image" :alt="`${selectedProduct.name} thumbnail ${index + 1}`" class="w-full h-20 object-cover rounded-md">--}}
                {{--                    </div>--}}
                {{--                </div>--}}
            </div>
            <!-- Product Details -->
            <div>
                <a href="{{route('client.shop')}}" class="hidden md:flex text-sm text-gray-500 hover:text-black mb-4 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="w-4 h-4 mr-2">
                        <path d="m15 18-6-6 6-6"/>
                    </svg>
                    Back to Shop
                </a>
                <h2 class="text-xl md:text-4xl font-extrabold text-black">{{ $product->name }}</h2>

                {{-- Start Category and Discount Badge --}}
                <div class="flex gap-3 mt-3 items-center max-md:justify-between">
                   <div class="flex items-center gap-3">
                       <div class="text-white flex items-center justify-center max-md:text-sm bg-black px-3 py-[5px] rounded">{{ $product->category->name }}</div>
                       @if($product->discount > 0)
                           <div class="text-white flex items-center max-md:text-sm justify-center bg-red-500 px-3 py-[5px] rounded">-{{ $product->discount }}%</div>
                       @endif
                   </div>

                    <div class="hidden max-md:flex gap-3 ">
                        {{-- Start Quantity --}}
                        <div class="flex items-center border rounded-md">
                            <button @click="decreaseQuantity()" class="w-10 h-10 text-xl font-bold hover:bg-gray-100 rounded-l-md">-</button>
                            <span class="w-12 text-center text-lg font-semibold">[[quantity]]</span>
                            <button @click="increaseQuantity()" class="w-10 h-10 text-xl font-bold hover:bg-gray-100 rounded-r-md">+</button>
                        </div>
                        {{-- End Quantity --}}

                        {{-- Start Add To Cart Button (Mobile) --}}
                        @if(!Auth::check())
                            <button @click="openModal()" class="text-sm px-4 text-white py-3 bg-black rounded cursor-pointer hover:bg-black/50 text-white">
                                <i class="fa-solid fa-cart-plus"></i>
                            </button>
                        @else
                            <div class="cart-container" :class="{'added':is_adding}" id="cart">
                                <div class="plus-one">+[[quantity]]</div>
                                <button @click="addToCart()" class="text-sm px-4 text-white py-3 bg-black rounded cursor-pointer hover:bg-black/50 text-white" :disabled="is_adding">
                                    <i class="fa-solid fa-cart-plus"></i>
                                </button>
                            </div>

                        @endif

                        {{-- End Add To Cart Button (Mobile) --}}
                    </div>
                </div>
                {{-- End Category and Discount Badge --}}

                {{-- Start Product Price --}}
                @php
                    $discountPrice = 0;
                    if($product->discount > 0){
                        $discountPrice = $product->price * $product->discount / 100;
                    }
                @endphp

                @if($product->discount > 0)
                    <div class="flex gap-2 items-end mt-2">
                        <p class="mt-2 font-bold text-black text-xl md:text-2xl">${{number_format($product->price - $discountPrice,2)}}</p>
                        <del class="mt-2 text-[12px] md:text-[15px] font-bold pb-[2px] text-black">${{number_format($product->price,2)}}</del>
                    </div>
                @else
                    <p class="mt-5 font-bold text-black">${{$product->price}}</p>
                @endif
                {{-- End Product Price --}}

                {{-- Start To Cart (Desktop) --}}
                <div class="mt-5 hidden md:flex items-center space-x-4">
                    {{-- Start Quantity --}}
                    <div class="flex items-center border rounded-md">
                        <button @click="decreaseQuantity()" class="w-10 h-10 text-xl font-bold hover:bg-gray-100 rounded-l-md">-</button>
                        <span class="w-12 text-center text-lg font-semibold">[[quantity]]</span>
                        <button @click="increaseQuantity()" class="w-10 h-10 text-xl font-bold hover:bg-gray-100 rounded-r-md">+</button>
                    </div>
                    {{-- End Quantity --}}

                    {{--  if user not login show login modal other wise add to cart --}}
                    @if(!Auth::check())
                        <button @click="openModal()" class="flex-1 bg-black text-white font-semibold px-6 py-3 rounded-lg shadow-md hover:bg-gray-800 transition-all" type="button">
                            Add to Cart
                        </button>
                    @else
                        {{--                        <button @click="addToCart()" class="flex-1 bg-black text-white font-semibold px-6 py-3 rounded-lg shadow-md hover:bg-gray-800 transition-all">--}}
                        {{--                            Add to Cart--}}
                        {{--                        </button>--}}
                        <button @click="addToCart()" class="cart-button" :class="{'clicked': is_adding}" :disabled="is_adding" id="cart-button">
                            <span class="add-to-cart">Add to cart</span>
                            <span class="added">Added</span>
                            <i class="fas fa-shopping-cart"></i>
                            <i class="fas fa-box"></i>
                        </button>
                    @endif
                </div>
                {{-- End Add To Cart (Desktop) --}}

                {{-- Start Product Description --}}
                <p class="text-gray-700 leading-relaxed mt-5 text-sm md:text-lg">{{ $product->description }}</p>
                {{-- End Product Description --}}
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        const { createApp } = Vue
        createApp({
            delimiters: ['[[', ']]'],
            created(){
                if("{{$product}}"){
                    this.product_id = "{{$product->id}}"
                }
            },
            data() {
                return {
                    user_id: @json(Auth::check() ? Auth::user()->id : null),
                    product_id: null,
                    quantity: 1,
                    is_adding:false,
                }
            },
            methods: {
                addToCart(){
                    this.is_adding = true;
                    let data = {
                        user_id: this.user_id,
                        quantity: this.quantity,
                        product_id: this.product_id,
                    }
                    axios.post("{{route('client.cart.add-to-cart')}}",data).then(res => {
                        if(res.status === 201){
                            if (window.NavApp) {
                                window.NavApp.fetchTotalCart();
                                setTimeout(()=>{
                                    this.is_adding = false;
                                    this.quantity = 1;
                                },2000)
                            }
                        }
                    })
                },
                openModal(){
                    document.querySelector("#login-required-dialog").showModal();
                },
                closeModal(){
                    document.querySelector("#login-required-dialog").close();
                },
                decreaseQuantity(){
                    if(this.quantity > 1){
                        this.quantity--;
                    }
                },
                increaseQuantity(){
                    this.quantity++;
                },
            }
        }).mount('#detail-product-app')
    </script>
@endsection
