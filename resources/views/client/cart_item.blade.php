@extends('master.client-base')

@section('content')
    <div id="cart-app">
        {{-- Start Remove Cart Dialog --}}
        <dialog class="p-8 m-auto rounded shadow relative" id="remove-cart-modal">
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
                <h3 class="mb-5 text-lg font-normal text-gray-500 min-w-fit">Are you sure you want to remove this cart?</h3>
                <button @click="onConfirmRemove()" data-modal-hide="remove-cart-popup-modal" type="button" class="text-white bg-black hover:bg-black/80 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                    Yes, Sure
                </button>
                <button @click="closeModal()" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:z-10 focus:ring-4 focus:ring-gray-100">No, cancel</button>
            </div>
        </dialog>
        {{-- End Remove Cart Dialog --}}


        <div v-if="cart_items.length > 0" class="container flex sm:flex-col xl:flex-row sm:gap-8 xl:gap-0 mx-auto px-4 sm:px-6 lg:px-8 py-16">
            {{-- Start Cart Item Listing --}}
            <div class="w-full xl:w-[70%] p-9 shadow">
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
                                <input @click="onSelectedToggle(item)" type="radio" class="bg-[#F2F5F6] shadow cursor-pointer" :checked="item.selected"/>
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
                                            style="overflow: hidden;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 2;"
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

            {{-- Start Order Summary --}}
            <div class="w-full xl:w-[30%] p-9 shadow">
                <h1 class="text-center font-bold text-xl border-b pb-3">Order Summary</h1>
                <div class="flex justify-between mt-5">
                    <h2>ITEMS [[getSelectedCartItem.length]]</h2>
                    <h2>$[[getTotalSelectedCartItem]]</h2>
                </div>

                {{-- Start No Cart Selected Message --}}
                <div v-if="getSelectedCartItem == 0" class="text-center font-bold text-md my-4">
                    No Cart Item Selected.
                </div>
                {{-- End No Cart Selected Message --}}

                <div class="border-t pt-3 mt-5">
                    <div class="flex items-center justify-between">
                        <h1>TOTAL COST</h1>
                        <h1>$[[getTotalSelectedCartItem]]</h1>
                    </div>
                    <button class="btn btn-primary block mx-auto mt-5" :disabled="getSelectedCartItem == 0">Process To Checkout</button>
                </div>
            </div>
            {{-- End Order Summary --}}
        </div>


        {{-- Start No Cart Message --}}
        <div v-else class="text-center py-16 bg-white rounded-lg shadow-md border w-full">
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
                        total += item.product.price * item.quantity
                    })
                    return total.toFixed(2)
                }
            },
            data() {
                return {
                    user_id:"{{Auth::check() ? Auth::user()->id : null}}",
                    selected_cart_id:null,
                    cart_items: [],
                }
            },
            methods: {
                fetchCartItems(){
                    if(this.user_id){
                        axios.post("{{route('client.cart.get-cart-items')}}",{user_id:this.user_id})
                            .then((response) => {
                                console.log(response.data);
                                this.cart_items = response.data;
                                this.cart_items.map(x => {
                                    x.selected = false;
                                    return x
                                })
                                console.log(this.cart_items)
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
                    document.querySelector("#remove-cart-modal").close();
                },
                removeCart(item){
                    this.selected_cart_id = item.id;
                    document.querySelector("#remove-cart-modal").showModal();
                },
                decreaseQuantity(item) {
                    let cartItem = this.cart_items.find(x => x.id === item.id);
                    if (cartItem) {
                        if(cartItem.quantity > 1){
                            cartItem.quantity--;
                            this.updateCartQuantity(cartItem.id, cartItem.quantity);
                        }else{
                            this.selected_cart_id = cartItem.id;
                            document.querySelector("#remove-cart-modal").showModal();
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
                                }
                            })
                    }else{
                        this.closeModal()
                    }
                }
            }
        }).mount('#cart-app')
    </script>
@endsection
