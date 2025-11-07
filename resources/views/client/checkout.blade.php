@extends('master.client-base')

@section('content')
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <h2 class="text-3xl font-bold text-center mb-12">Checkout</h2>
        <div v-if="cart_item_listing.length === 0" class="text-center py-16 bg-white rounded-lg shadow-md border">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                 class="w-16 h-16 mx-auto text-gray-300">
                <circle cx="9" cy="21" r="1"/>
                <circle cx="20" cy="21" r="1"/>
                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/>
            </svg>
            <h3 class="mt-4 text-xl font-semibold text-black">Your cart is empty</h3>
            <p class="mt-2 text-gray-500">Looks like you haven't added anything to your cart yet.</p>
            <button class="mt-6 bg-black text-white font-semibold px-6 py-2 rounded-lg shadow-md hover:bg-gray-800 transition-all">
                Start Shopping
            </button>
        </div>

        <div v-else class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Column: Cart & Payment -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Cart Items -->
                <div class="bg-white p-6 rounded-lg shadow-md border">
                    <h3 class="text-xl font-semibold border-b pb-4 mb-4">Your Items ([[ cart_item_listing.length
                        ]])</h3>
                    <div v-for="item in cart_item_listing" :key="item.id"
                         class="flex items-center justify-between py-4 border-b last:border-b-0">
                        <div class="flex items-center space-x-4">
                            {{--                        <img :src="item.imageUrl" :alt="item.name" class="w-20 h-20 object-cover rounded-md border">--}}
                            <div>
                                <p class="font-semibold">[[ item.name ]]</p>
                                <p class="text-sm text-gray-500">$[[item.price]]</p>
                                <button class="text-xs text-red-500 hover:underline mt-1">Remove</button>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3">
                            <button class="w-7 h-7 rounded-full border hover:bg-gray-100">-</button>
                            <span>[[ item.quantity ]]</span>
                            <button class="w-7 h-7 rounded-full border hover:bg-gray-100">+</button>
                        </div>
                        <p class="font-semibold w-20 text-right">$[[item.price * item.quantity]]</p>
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
                        <!-- KHQR -->
{{--                        <label class="flex items-center p-4 border rounded-lg cursor-pointer transition-all"--}}
{{--                               :class="{ 'bg-gray-100 border-black': selectedPaymentMethod === 'cod' }">--}}
{{--                            <input type="radio" v-model="selectedPaymentMethod" value="cod"--}}
{{--                                   class="h-4 w-4 text-black focus:ring-black">--}}
{{--                            <span class="ml-3 font-semibold">--}}
{{--                                <div>--}}
{{--                                    <img src="{{asset("images/KHQR_Logo.png")}}"/>--}}
{{--                                </div>--}}
{{--                            </span>--}}
{{--                        </label>--}}
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
                            <p>1500</p>
                        </div>
                        <div class="flex justify-between">
                            <p>Shipping</p>
                            <p>Free</p>
                        </div>
                        <div class="flex justify-between font-bold text-lg border-t pt-4 mt-2">
                            <p>Total</p>
                            <p>1500</p>
                        </div>
                    </div>
                    <button @click="placeOrder"
                            class="mt-6 w-full bg-black text-white font-semibold px-4 py-3 rounded-lg shadow-md hover:bg-gray-800 transition-all">
                        Place Order
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
