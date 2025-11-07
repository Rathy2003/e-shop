@extends('master.client-base')

@section('content')
    <div class="bg-gray-50 py-16">
        <div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-md border">
            <h2 class="text-3xl font-bold text-center mb-6">Create Account</h2>
            <p class="text-center text-gray-600 mb-5">
                Join now to save your favorites, unlock deals, and shop your way.
            </p>
            <form method="post" action="{{route('client.account.process_register')}}">
                @csrf

                <div class="space-y-4">
                    <div>
                        <label for="signup-name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" value="{{old('name')}}" id="signup-name" name="name"
                            class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-black focus:border-black @error('name') border-red-500 @enderror"
                            placeholder="Enter Name"
                        />
                        @error('name')
                        <div class="text-red-500 mt-2">{{$message}}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="signup-email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="text" value="{{old('email')}}" id="signup-email" name="email"
                            class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-black focus:border-black @error('email') border-red-500 @enderror"
                            placeholder="Enter Email  Address"
                        />
                        @error('email')
                        <div class="text-red-500 mt-2">{{$message}}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="signup-password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" id="signup-password" name="password"
                               class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-black focus:border-black @error('password') border-red-500 @enderror"
                               placeholder="Enter Password"
                        />
                        @error('password')
                        <div class="text-red-500 mt-2">{{$message}}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="signup-cfpassword" class="block text-sm font-medium text-gray-700">Confirm
                            Password</label>
                        <input type="password" id="signup-cfpassword" name="confirmation_password"
                            class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-black focus:border-black @error('confirmation_password') border-red-500 @enderror"
                            placeholder="Enter Confirm Password"
                        />
                        @error('confirmation_password')
                        <div class="text-red-500 mt-2">{{$message}}</div>
                        @enderror
                    </div>
                    <p class="text-red-500 text-sm"></p>
                    <button type="submit"
                            class="w-full bg-black text-white font-semibold px-4 py-3 rounded-lg shadow-md hover:bg-gray-800 transition-all">
                        Sign Up
                    </button>
                </div>
            </form>
            <p class="text-center mt-4 text-sm text-gray-600">
                Already have an account? <a href="{{route('client.account.login')}}"
                                            class="font-medium text-black hover:underline">Log in</a>
            </p>
        </div>
    </div>
@endsection
