@extends('master.client-base')

@section('content')
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="max-w-lg mx-auto text-center">
            <h2 class="text-4xl font-extrabold text-black">Get In Touch</h2>
            <p class="mt-4 text-lg text-gray-600">Have a question or feedback? We'd love to hear from you. Reach out to
                us through any of the methods below.</p>
        </div>
        <div class="mt-16 grid md:grid-cols-2 gap-8 max-w-4xl mx-auto">
            <div class="bg-white p-8 rounded-lg shadow-md border">
                <h3 class="text-2xl font-bold mb-4">Contact Form</h3>
                <form>
                    <div class="space-y-4">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" id="name"
                                   class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-black focus:border-black">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" id="email"
                                   class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-black focus:border-black">
                        </div>
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                            <textarea id="message" rows="4"
                                      class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-black focus:border-black"></textarea>
                        </div>
                        <button type="submit"
                                class="w-full bg-black text-white font-semibold px-4 py-3 rounded-lg shadow-md hover:bg-gray-800 transition-all">
                            Send Message
                        </button>
                    </div>
                </form>
            </div>
            <div class="bg-white p-8 rounded-lg shadow-md border flex flex-col justify-center">
                <h3 class="text-2xl font-bold mb-4">Our Information</h3>
                <div class="space-y-4 text-gray-700">
                    <p class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="w-6 h-6 mr-3 text-black flex-shrink-0">
                            <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/>
                            <circle cx="12" cy="10" r="3"/>
                        </svg>
                        <span>123 Fashion Ave, Style City, 10101</span></p>
                    <p class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="w-6 h-6 mr-3 text-black flex-shrink-0">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                        </svg>
                        <span>(555) 123-4567</span></p>
                    <p class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="w-6 h-6 mr-3 text-black flex-shrink-0">
                            <rect x="2" y="4" width="20" height="16" rx="2"/>
                            <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>
                        </svg>
                        <span>hello@khmart.com</span></p>
                </div>
            </div>
        </div>
    </div>
@endsection
