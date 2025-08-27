@extends('master.client-base')

@section('content')
    <div class="bg-gray-50 py-16">
        <div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-md border">
            <h2 class="text-3xl font-bold text-center mb-6">Login</h2>
            <form method="post" action="{{route('client.account.process_login')}}">
                @csrf
                <div class="space-y-4">
                    @if(session()->has('message'))
                        <div class="text-red-500">{{session()->get("message")}}</div>
                    @endif
                    <div>
                        <label for="login-email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input
                            type="email" value="{{old('email')}}"
                            id="login-email"
                            name="email"
                            class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-black focus:border-black @error('email') border-red-500 @enderror"
                            placeholder="Enter Email Address"
                        />
                        @error('email')
                        <div class="text-red-500 mt-2">{{$message}}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="login-password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input
                            type="password"
                            name="password"
                            id="login-password"
                            class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-black focus:border-black @error('password') border-red-500 @enderror"
                            placeholder="Enter Password"
                        />
                        @error('password')
                        <div class="text-red-500 mt-2">{{$message}}</div>
                        @enderror
                    </div>
                    <p class="text-red-500 text-sm"></p>
                    <button type="submit"
                            class="w-full bg-black text-white font-semibold px-4 py-3 rounded-lg shadow-md hover:bg-gray-800 transition-all">
                        Sign In
                    </button>
                </div>
            </form>
            <p class="text-center mt-4 text-sm text-gray-600">
                Don't have an account? <a href="{{route('client.account.register')}}"
                                          class="font-medium text-black hover:underline">Sign up</a>
            </p>
        </div>
    </div>
@endsection
