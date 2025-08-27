@extends('master.client-base')

@section('content')
    <div class="p-4">
        <h1 class="uppercase text-4xl text-center font-bold">404 Not Found</h1>
        <div class="h-[500px] fit-contain bg-no-repeat bg-center mx-auto" style="background-image: url('{{asset("images/404.gif")}}')">
        </div>
        <a href="{{route('client.index')}}" class="block bg-black text-white px-4 py-3 w-fit rounded-md cursor-pointer mx-auto hover:bg-black/80">Go Home Page</a>
    </div>
@endsection
