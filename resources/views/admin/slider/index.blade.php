@extends('master.admin-base')

@section('style')
    <style>
        #slider-wrapper{
            display: flex;
            flex-direction: column;
            gap: 25px;
            .slider-card{
                padding: 15px;
                border-radius: 10px;
                display: flex;
                align-items: start;
                gap: 15px;
                box-shadow: 0px 0px 3px #ddd;
                position: relative;

                & > #slider-img > img{
                    width: 300px;
                    aspect-ratio: 1/0.6;
                    object-fit: cover;
                    border-radius: 5px;
                }

                & > #slider-information{
                    display: flex;
                    flex-direction: column;
                    gap: 8px;
                }

                & #slider-move-wrapper{
                    position: absolute;
                    top: 50%;
                    transform: translateY(-50%);
                    right: 25px;
                    display: flex;
                    flex-direction: column;
                    gap: 25px;
                    width: 200px;

                    & button{
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        cursor: pointer;
                        background: transparent;
                        border: 1px solid white;
                        border-radius: 10px;
                        transition: all ease-in-out 200ms;
                        padding: 5px 5px;
                        &:disabled{
                            cursor: not-allowed;
                        }

                        &:not(:disabled){
                            &:hover{
                                background: white;
                                color: black;
                            }
                        }

                        & > svg{
                            height: 40px;
                        }
                    }
                }
            }
        }
        .btn-remove{
            color:red;
            border: none;
            outline: none;
            background: transparent;
            &:hover{
                color: #dc0303;
            }
        }

    </style>
@endsection

@section('content')
    <div class="row gy-6">
        <!-- Start Header -->
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h3>Slider Listing</h3>
            <a href="{{route('admin.slider.create')}}" class="btn btn-primary d-flex align-items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="height: 20px;">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                New Slider
            </a>
        </div>
        <!-- End Header -->

        <div class="col-12">
            <div id="slider-wrapper">
                @foreach($sliders as $slider)
                    <div class="slider-card">
                        <div id="slider-img">
                            <img src="{{$slider->image}}">
                        </div>
                        <div id="slider-information">
                            <h3>{{$slider->title}}</h3>
                            <p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium dolorem eum eveniet fugiat impedit minus nemo, provident quasi. Asperiores commodi eius esse exercitationem fugiat nisi nobis nulla odit saepe voluptates!</span><span>Accusamus asperiores, eaque id impedit nisi saepe soluta? Aperiam blanditiis consectetur dolorum, eaque eius esse expedita, ipsum labore minima obcaecati, sequi tempore tenetur? Ab aliquid esse neque, pariatur quos vero?</span></p>
                            <div class="flex items-center gap-5">
                                <button class="btn-remove" data-id="1">Remove</button>
                                <a href="" class="text-blue-500 text-sm hover:text-blue-600">Edit</a>
                            </div>
                        </div>

                        <!-- Move Button -->
                        <form id="slider-move-wrapper" action="" method="POST">
                            {{-- if it is the first slider (slider 1) make it can't move up --}}
                            <button type="button" name="move_up" disabled>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                                </svg>
                            </button>
                            {{--                        <button type="submit" name="move_up">--}}
                            {{--                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-2">--}}
                            {{--                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />--}}
                            {{--                            </svg>--}}
                            {{--                        </button>--}}

                            <button type="button" name="move_down" disabled>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                </svg>
                            </button>
                            {{--                        <button type="submit" name="move_down">--}}
                            {{--                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-2">--}}
                            {{--                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />--}}
                            {{--                            </svg>--}}
                            {{--                        </button>--}}
                        </form>
                        <!-- End Move Button -->
                    </div>
                @endforeach

            </div>
        </div>


    </div>

    <!--Start No Slider Message -->
{{--    <div class="position-absolute d-flex flex-column align-items-center" style="top: 50%;left: 50%;transform: translate(-50%,-50%)">--}}
{{--        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="height: 182px">--}}
{{--            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />--}}
{{--        </svg>--}}
{{--        <p class="fs-large fw-bold">No Slider Founded</p>--}}
{{--    </div>--}}
    <!--End No Slider Message -->

@endsection
