@extends('master.client-base')

@section('content')
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <h2 class="text-3xl font-bold text-center mb-12">Your Orders</h2>
        <div v-if="orders.length === 0" class="text-center py-16 bg-white rounded-lg shadow-md border">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                 class="w-16 h-16 mx-auto text-gray-300">
                <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/>
                <circle cx="12" cy="10" r="3"/>
            </svg>
            <h3 class="mt-4 text-xl font-semibold text-black">No orders yet</h3>
            <p class="mt-2 text-gray-500">You haven't placed any orders with us. Let's change that!</p>
            <button class="mt-6 bg-black text-white font-semibold px-6 py-2 rounded-lg shadow-md hover:bg-gray-800 transition-all">
                Start Shopping
            </button>
        </div>
        <div v-else class="space-y-8">
            <div v-for="order in orders" :key="order.id" class="bg-white p-6 rounded-lg shadow-md border">
                <div class="flex flex-col sm:flex-row justify-between sm:items-center border-b pb-4 mb-4">
                    <div>
                        <p class="font-bold text-lg">Order #001</p>
                        <p class="text-sm text-gray-500">Placed on 23-4-2025</p>
                    </div>
                    <div class="mt-4 sm:mt-0">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                        Preparing
                    </span>
                    </div>
                </div>
                <div class="space-y-4">
                    <div v-for="item in order.items" class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <img src="https://www.machines.com.my/cdn/shop/products/iPhone_15_Pink_PDP_Image_Position-1__GBEN_411a5b11-e015-40c9-a8ea-72bfea91a4c1.jpg?v=1705480793"
                                 alt="iphone12" class="w-16 h-16 object-cover rounded-md border">
                            <div>
                                <p class="font-semibold">IP 16 Pro Max</p>
                                <p class="text-sm text-gray-500">2 x 1500$</p>
                            </div>
                        </div>
                        <p class="font-semibold">3000$</p>
                    </div>
                </div>
                <div class="text-right font-bold text-lg mt-4 pt-4 border-t">
                    Total: 3000$
                </div>
            </div>
        </div>
    </div>
@endsection
