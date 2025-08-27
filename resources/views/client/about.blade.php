@extends('master.client-base')

@section('content')
    <div class="bg-gray-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-4xl font-extrabold text-black">About KHMART</h2>
                <p class="mt-4 text-lg text-gray-600">We believe that fashion is more than just clothing; it's a form of
                    self-expression. Founded in 2024, KHMART was born from a desire to bring timeless, high-quality
                    fashion to everyone.</p>
            </div>
            <div class="mt-16 grid md:grid-cols-2 gap-16 items-center">
                <div>
                    <h3 class="text-2xl font-bold text-black">Our Mission</h3>
                    <p class="mt-4 text-gray-600">Our mission is to empower individuals to feel confident and stylish
                        through our thoughtfully curated collections. We focus on sustainable materials, ethical
                        production, and designs that last beyond the season.</p>
                    <h3 class="mt-8 text-2xl font-bold text-black">Our Values</h3>
                    <ul class="mt-4 space-y-2 text-gray-600 list-disc list-inside">
                        <li><strong>Quality First:</strong> We never compromise on the quality of our materials and
                            craftsmanship.
                        </li>
                        <li><strong>Customer-Centric:</strong> Your satisfaction is our top priority. We're here to help
                            you find your perfect style.
                        </li>
                        <li><strong>Sustainability:</strong> We are committed to reducing our environmental footprint
                            and promoting ethical practices.
                        </li>
                    </ul>
                </div>
                <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?q=80&w=2070&auto=format&fit=crop"
                     alt="Our creative workspace" class="rounded-lg shadow-xl w-full">
            </div>
        </div>
    </div>
@endsection
