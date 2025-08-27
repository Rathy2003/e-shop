@extends('master.client-base')

@section('content')
    <div id="cart-app" class="py-8 " :class="cart_items.length > 0 ? 'min-h-[100dvh]': ''">
        {{-- Start Remove Cart Dialog --}}
        <transition name="fade">
            <div v-if="open_remove_modal" class="fixed top-0 left-0 w-full h-full bg-black/50 z-[40]">
                <div class="fixed p-10 bg-white top-1/2 max-w-[500px] mr-5  left-1/2 translate-x-[-50%] translate-y-[-50%] rounded shadow relative z-[50]">
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
                        <h3 class="my-8 text-lg font-normal text-gray-500 min-w-fit">Are you sure you want to remove this cart?</h3>
                        <button @click="onConfirmRemove()" data-modal-hide="remove-cart-popup-modal" type="button" class="text-white bg-black hover:bg-black/80 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                            Yes, Sure
                        </button>
                        <button @click="closeModal()" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:z-10 focus:ring-4 focus:ring-gray-100">No, cancel</button>
                    </div>
                </div>
            </div>
        </transition>
        {{-- End Remove Cart Dialog --}}

        {{-- Cart Page --}}
        <transition>
            <div v-if="page_index == 0">
                <div v-if="cart_items.length > 0" class="hidden md:block container min-h-[100dvh] 0 mx-auto px-8">
                    {{-- Start Cart Item Listing --}}
                    <div class="w-full p-9 shadow">
                        {{-- Start Cart Item Header --}}
                        <div class="flex justify-between border-b pb-3">
                            <h1 class="text-xl font-bold">Your Cart Item</h1>
                            <h1 class="text-xl font-bold">[[cart_items.length]] Items</h1>
                        </div>
                        {{-- End Cart Item Header --}}

                        {{-- Start Cart Item Body --}}
                        <div class="my-5">
                            <table class="w-full">
                                <thead class="text-left uppercase text-gray-600">
                                <tr>
                                    <th class="min-w-[64px] text-center">#</th>
                                    <th>Product Detail</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="min-w-[100px] text-center">Price</th>
                                    <th class="min-w-[100px] text-center">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(item,index) in cart_items" :key="'cart_item'+index">
                                    <td class="text-center">
                                        {{-- Start Item Select Button --}}
                                        <button @click="onSelectedToggle(item)"
                                                class="w-[18px] h-[18.4px] rounded-full border border-gray-600 mx-auto flex items-center justify-center"
                                                :class="item.selected ? 'bg-black text-white': 'bg-transparent text-transparent'"
                                        >
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-3">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                            </svg>
                                        </button>
                                        {{-- End Item Select Button --}}
                                    </td>
                                    <td class="py-[20px]">
                                        <div class="flex gap-3 px-3">
                                            {{-- Start Item Image --}}
                                            <div class="bg-[var(--secondary-color)] min-w-[80px] w-[80px] h-[80px] shadow rounded background-image"
                                                 :style="{backgroundImage: 'url('+item.product.image+')'}"
                                            >
                                            </div>
                                            {{-- End Item Image --}}

                                            {{-- Start Item Info --}}
                                            <div>
                                                <h1
                                                    style="overflow: hidden;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 1;"
                                                >
                                                    [[item.product.name]]
                                                </h1>
                                                <h2 class="mt-1 text-gray-600">[[item.product.category.name]]</h2>
                                                <button @click="removeCart(item)" class="mt-1 text-red-500 cursor-pointer">Remove</button>
                                            </div>
                                            {{-- End Item Info --}}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="flex items-center gap-3 justify-center">
                                            <button @click="decreaseQuantity(item)" class="font-bold text-xl cursor-pointer select-none">-</button>
                                            <span class="px-5  py-1 border select-none">[[item.quantity]]</span>
                                            <button @click="increaseQuantity(item)" class="font-bold text-xl cursor-pointer select-none">+</button>
                                        </div>
                                    </td>
                                    <td class="text-center">$[[item.product.price]]</td>
                                    <td class="text-center">$[[(item.product.price * item.quantity).toFixed(2)]]</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        {{-- End Cart Item Body --}}
                    </div>
                    {{-- End Cart Item Listing --}}
                </div>

                <div v-if="cart_items.length > 0" class="block md:hidden">
                    <h1 class="text-center font-bold text-2xl">Your Cart Item</h1>
                </div>

                {{-- Start Mobile Cart List and Checkout --}}
                <div v-if="cart_items.length > 0" class="px-8 flex flex-col gap-5 my-8 md:hidden">
                    <div
                        v-for="(item,index) in cart_items" :key="'cart_item'+index"
                        class="flex gap-5 shadow p-3 rounded relative"
                    >
                        <div class="flex items-center gap-4">
                            {{-- Start Item Select Button --}}
                            <button @click="onSelectedToggle(item)"
                                    class="w-[18px] h-[18.4px] rounded-full border border-gray-600 flex items-center justify-center"
                                    :class="item.selected ? 'bg-black text-white': 'bg-transparent text-transparent'"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                </svg>
                            </button>
                            {{-- End Item Select Button --}}

                            {{-- Start Item Image --}}
                            <div class="bg-[var(--secondary-color)] min-w-[80px] w-[85px] h-[85px] shadow rounded background-image"
                                 :style="{backgroundImage: 'url('+item.product.image+')'}"
                            >
                            </div>
                            {{-- End Item Image --}}
                        </div>

                        <div>
                            {{-- Start Title --}}
                            <h1
                                style="overflow: hidden;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 1;"
                            >
                                [[item.product.name]]
                            </h1>
                            {{-- End Title --}}

                            {{-- Start Category --}}
                            <h2 class="text-sm text-gray-600">[[item.product.category.name]]</h2>
                            {{-- End Category --}}

                            <div class="flex gap-5 items-center mt-3">
                                {{-- Start Product Price --}}
                                <h2 class="font-bold">$[[item.product.discount > 0 ? formatPrice(item.product.price *  item.product.discount / 100) : formatPrice(item.product.price)]]</h2>
                                {{-- End Product Price --}}

                                {{-- Start Quantity Adjustment --}}
                                <div class="flex items-center gap-3">
                                    <button @click="decreaseQuantity(item)" class="font-bold text-xl cursor-pointer select-none">-</button>
                                    <span class="block !min-w-[50px] px-5 py-[2px] text-sm border select-none">[[item.quantity]]</span>
                                    <button @click="increaseQuantity(item)" class="font-bold text-xl cursor-pointer select-none">+</button>
                                </div>
                                {{-- End Quantity Adjustment --}}

                            </div>
                        </div>

                        {{-- Start Remove Cart Button --}}
                        <button @click="removeCart(item)" class="absolute right-[15px] top-1/2 translate-y-[-50%] hover:text-red-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </button>
                        {{-- End Remove Cart Button --}}

                    </div>
                </div>

                {{-- End Mobile Cart List  --}}

                {{-- Start Select Item and Checkout Button --}}
                <div
                    v-if="cart_items.length > 0"
                    class="fixed h-[120px] sm:h-[100px] py-2 w-full flex flex-col sm:flex-row items-center px-5 sm:px-8 justify-between bottom-0 left-0 bg-white border-t border-gray-200 z-10">
                    <div class="select-none w-full flex flex-row sm:flex-col justify-between sm:justify-start gap-2">
                        <h3 class="font-bold text-md sm:text-lg">([[getSelectedCartItem.length]]) Selected Item</h3>
                        <h4 class="font-bold text-md sm:text-lg text-gray-600">Total : [[getTotalSelectedCartItem]]$</h4>
                    </div>
                    <button @click="processCheckout()" class="btn btn-primary w-full sm:w-auto" :disabled="getSelectedCartItem == 0">Process To Checkout</button>

                </div>
                {{-- End Select Item and Checkout Button --}}


                {{-- Start No Cart Message --}}
                <div v-else class="text-center min-h-[500px] py-10 bg-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="w-16 h-16 mx-auto text-gray-300">
                        <circle cx="9" cy="21" r="1"></circle>
                        <circle cx="20" cy="21" r="1"></circle>
                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                    </svg>
                    <h3 class="mt-4 text-xl font-semibold text-black">Your cart is empty</h3>
                    <p class="mt-2 text-gray-500">Looks like you haven't added anything to your cart yet.</p>
                    <a href="{{route('client.shop')}}"
                       class="mt-6 block w-fit mx-auto bg-black text-white font-semibold px-6 py-2 rounded-lg shadow-md hover:bg-gray-800 transition-all">
                        Start Shopping
                    </a>
                </div>
                {{-- End No Cart Message --}}
            </div>
        </transition>
        {{-- End Cart Page --}}

        {{-- Start Checkout Page --}}
        <transition>
            <div v-if="page_index == 1" class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <h2 class="text-3xl font-bold text-center mb-4">Checkout</h2>

                {{-- Start Back To Cart Button --}}
                <button @click="page_index = 0" class="flex text-sm text-gray-500 hover:text-black mb-4 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="w-4 h-4 mr-2">
                        <path d="m15 18-6-6 6-6"/>
                    </svg>
                    Back to Cart
                </button>
                {{-- End Back To Shop Button --}}

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Left Column: Cart & Payment -->
                    <div class="lg:col-span-2 space-y-8">
                        <!-- Cart Items -->
                        <div class="bg-white p-6 rounded-lg shadow-md border">
                            <h3 class="text-xl font-semibold border-b pb-4 mb-4">Your Items ([[ getSelectedCartItem.length
                                ]])</h3>
                            <div v-for="item in getSelectedCartItem" :key="item.id"
                                 class="flex items-center justify-between py-4 border-b last:border-b-0">
                                <div class="flex items-center space-x-4">
                                    {{-- Start Item Image --}}
                                    <div class="bg-[var(--secondary-color)] min-w-[80px] w-[85px] h-[85px] shadow rounded background-image"
                                         :style="{backgroundImage: 'url('+item.product.image+')'}"
                                    >
                                    </div>
                                    {{-- End Item Image --}}
                                    <div>
                                        <p class="font-semibold">[[ item.product.name ]]</p>
                                        {{-- Start Quantity and Total --}}
                                        <div class="flex gap-3 items-center mt-3">
                                            <p class="text-sm w-fit bg-[var(--secondary-color)] py-1 px-3 rounded text-gray-500">x[[item.quantity]]</p>
                                            <p class="text-sm text-gray-500">$[[item.product.discount > 0 ? Number((item.product.price - (item.product.price  * item.product.discount / 100)) * item.quantity ).toFixed(2) : Number(item.product.price * item.quantity).toFixed(2)]]</p>
                                        </div>
                                        {{-- End Quantity and Total --}}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Payment Method -->
                        <div class="bg-white p-6 rounded-lg shadow-md border">
                            <h3 class="text-xl font-semibold mb-4">Payment Method</h3>
                            <div class="space-y-4">
                                <!-- Credit Card -->
                                <label class="flex items-center p-4 border rounded-lg cursor-pointer transition-all"
                                       :class="{ 'bg-gray-100 border-black': selectedPaymentMethod === 'creditCard' }">
                                    <input type="radio" v-model="selectedPaymentMethod" value="creditCard"
                                           class="h-4 w-4 text-black focus:ring-black">
                                    <span class="ml-3 font-semibold">Credit Card</span>
                                </label>
                                <div v-if="selectedPaymentMethod === 'creditCard'" class="p-4 space-y-4 border-t">
                                    <div>
                                        <label for="cardNumber" class="block text-sm font-medium text-gray-700">Card
                                            Number</label>
                                        <input type="text" id="cardNumber" placeholder="•••• •••• •••• ••••"
                                               class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-black focus:border-black">
                                    </div>
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label for="expiryDate" class="block text-sm font-medium text-gray-700">Expiry
                                                Date</label>
                                            <input type="text" id="expiryDate" placeholder="MM / YY"
                                                   class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-black focus:border-black">
                                        </div>
                                        <div>
                                            <label for="cvc" class="block text-sm font-medium text-gray-700">CVC</label>
                                            <input type="text" id="cvc" placeholder="•••"
                                                   class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-black focus:border-black">
                                        </div>
                                    </div>
                                </div>
                                <!-- PayPal -->
                                <label class="flex items-center p-4 border rounded-lg cursor-pointer transition-all"
                                       :class="{ 'bg-gray-100 border-black': selectedPaymentMethod === 'paypal' }">
                                    <input type="radio" v-model="selectedPaymentMethod" value="paypal"
                                           class="h-4 w-4 text-black focus:ring-black">
                                    <span class="ml-3 font-semibold">PayPal</span>
                                </label>
                                <!-- Cash on Delivery -->
                                <label class="flex items-center p-4 border rounded-lg cursor-pointer transition-all"
                                       :class="{ 'bg-gray-100 border-black': selectedPaymentMethod === 'cod' }">
                                    <input type="radio" v-model="selectedPaymentMethod" value="cod"
                                           class="h-4 w-4 text-black focus:ring-black">
                                    <span class="ml-3 font-semibold">Cash on Delivery</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column: Order Summary -->
                    <div class="lg:col-span-1">
                        <div class="bg-white p-6 rounded-lg shadow-md border h-fit sticky top-24">
                            <h3 class="text-xl font-semibold border-b pb-4 mb-4">Order Summary</h3>
                            <div class="space-y-2">
                                <div class="flex justify-between">
                                    <p>Subtotal</p>
                                    <p>$[[getTotalSelectedCartItem]]</p>
                                </div>
                                <div class="flex justify-between">
                                    <p>Shipping</p>
                                    <p>Free</p>
                                </div>
                                <div class="flex justify-between font-bold text-lg border-t pt-4 mt-2">
                                    <p>Total</p>
                                    <p>$[[getTotalSelectedCartItem]]</p>
                                </div>
                            </div>
                            <button @click="processOrder"
                                    class="mt-6 w-full bg-black text-white font-semibold px-4 py-3 rounded-lg shadow-md hover:bg-gray-800 transition-all">
                                Place Order
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </transition>
        {{-- End Checkout Page --}}

        {{-- Start Success Checkout --}}
        <transition name="fade">
            <div v-if="page_index == 2" class="p-4 flex flex-col items-center">
                <div class="w-[80px] h-[80px] rounded-full mx-auto bg-green-500 text-white flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-7">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                    </svg>
                </div>
                <h1 class="text-2xl mt-5 font-bold">Thank you for you purchase</h1>

                {{-- Start Order Summary --}}
                <div class="shadow min-w-[530px] py-4 px-8 mt-5">
                    <h1 class="font-bold text-xl">Order Summary</h1>
                    <div class="mt-5 flex flex-col gap-4">
                        <div
                            class="flex justify-between items-center"
                            v-for="item in getSelectedCartItem" :key="item.id"
                        >
                            <div class="flex items-start gap-3">
                                <div
                                    class="min-w-[60px] background-image h-[60px] rounded bg-[var(--secondary-color)]"
                                    :style="{backgroundImage: 'url('+item.product.image+')'}"
                                >
                                </div>
                                <h1 style="overflow: hidden;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 2;">[[item.product.name]]</h1>
                            </div>
                            <div class="flex gap-3 items-center">
                                <div class="text-sm px-4 py-2 rounded bg-[var(--secondary-color)]">
                                    x[[item.quantity]]
                                </div>
                                <h1 class="font-bold text-lg">$[[item.product.price]]</h1>
                            </div>
                        </div>
                    </div>

                </div>
                {{-- End Order Summary --}}

                <a href="{{route('client.shop')}}" class="btn btn-primary block mt-5 mx-auto">Back To Shop</a>
            </div>
        </transition>
        {{-- End Success Checkout --}}
    </div>
@endsection

@section("script")
    <script>
        const { createApp } = Vue
        createApp({
            delimiters: ['[[', ']]'],
            created(){
                this.fetchCartItems()
            },
            computed:{
                getSelectedCartItem(){
                    return this.cart_items.filter(item => item.selected)
                },
                getTotalSelectedCartItem(){
                    let selectedItem =  this.cart_items.filter(item => item.selected)
                    let total = 0;
                    selectedItem.forEach(item => {
                        total += item.product.discount > 0 ? (item.product.price - (item.product.price * item.product.discount / 100)) * item.quantity : item.product.price * item.quantity;
                    })
                    return total.toFixed(2)
                },
            },
            data() {
                return {
                    user_id:"{{Auth::check() ? Auth::user()->id : null}}",
                    selected_cart_id:null,
                    cart_items: [],
                    open_remove_modal:false,
                    page_index:0,
                }
            },
            methods: {
                // Cart
                fetchCartItems(){
                    if(this.user_id){
                        axios.post("{{route('client.cart.get-cart-items')}}",{user_id:this.user_id})
                            .then((response) => {
                                this.cart_items = response.data;
                                this.cart_items.map(x => {
                                    x.selected = false;
                                    return x
                                })
                            })
                    }
                },
                updateCartQuantity(cart_id,quantity){
                    axios.post("{{route('client.cart.update-cart-quantity')}}",{
                        cart_id:cart_id,
                        quantity:quantity,
                    })
                        .then((response) => {
                            // console.log(response.data);
                        })
                },
                closeModal(){
                    this.selected_cart_id = null;
                    this.open_remove_modal = false
                },
                removeCart(item){
                    this.selected_cart_id = item.id;
                    this.open_remove_modal = true;
                },
                decreaseQuantity(item) {
                    let cartItem = this.cart_items.find(x => x.id === item.id);
                    if (cartItem) {
                        if(cartItem.quantity > 1){
                            cartItem.quantity--;
                            this.updateCartQuantity(cartItem.id, cartItem.quantity);
                        }else{
                            this.selected_cart_id = cartItem.id;
                            this.open_remove_modal = true;
                        }
                    }
                },
                increaseQuantity(item) {
                    let cartItem = this.cart_items.find(x => x.id === item.id);
                    if (cartItem) {
                        cartItem.quantity++;
                        this.updateCartQuantity(cartItem.id, cartItem.quantity);
                    }
                },
                onSelectedToggle(item){
                    let exist_item = this.cart_items.find(x => x.id === item.id);
                    if (exist_item) {
                        exist_item.selected = !exist_item.selected;
                    }
                },
                onConfirmRemove(){
                    if(this.selected_cart_id){
                        axios.post("{{route('client.cart.remove-cart-item')}}",{
                            cart_id:this.selected_cart_id
                        })
                            .then((response) => {
                                if(response.status === 200){
                                    let ind = this.cart_items.findIndex(x => x.id === this.selected_cart_id)
                                    this.cart_items.splice(ind, 1);
                                    this.closeModal()
                                    if (window.NavApp) {
                                        window.NavApp.fetchTotalCart();
                                    }
                                }
                            })
                    }else{
                        this.closeModal()
                    }
                },
                formatPrice(price){
                    return Number(price).toFixed(2)
                },
                processCheckout(){
                    this.page_index=1;
                },
                // Checkout
                processOrder(){
                    // this.page_index=2;
                    let carts = this.cart_items.filter(x => x.selected)
                    let data = {
                        user_id:"{{Auth::user()->id}}",
                        total_price:0,
                        items: [],
                        cart_items: [],
                    }
                    carts.forEach(item => {
                        let price = item.product.discount ? (item.product.price - (item.product.price * item.product.discount / 100)) * item.quantity : item.product.price * item.quantity;
                        const cart_item = {
                            product_id: item.product.id,
                            quantity: item.quantity,
                            price: item.product.price,
                        }
                        data.items.push(cart_item)
                        data.cart_items.push(item.id)
                        data.total_price+=price
                    })

                    axios.post("{{route('client.checkout.process-checkout')}}",data).then(res => {
                        if(res.status === 201){
                            this.page_index=2;
                        }
                    })
                }
            }
        }).mount('#cart-app')
    </script>
@endsection
