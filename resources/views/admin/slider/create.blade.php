@extends('master.admin-base')

@section('style')
    <style>
        label[for="image-input"]{
            min-height: 430px;
            background: #e9e9e9;
            cursor: pointer;
            transition: all ease-in-out 150ms;

            &:not(.has-image):hover{
                background-color: #d8d8d8;
            }
        }

        label.has-image{
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            position: relative;

            &:hover:before{
                content: '\e09a';
                font-family: "Font Awesome 5 Free";
                width: 100%;
                height: 100%;
                position: absolute;
                top: 0;
                left: 0;
                background: rgba(0, 0, 0, 0.3);
            }

            & svg{
                display: none;
            }

        }
    </style>
@endsection

@section('content')
    <div class="row gy-6">

        <div class="col-12">
            <h3>Create New Slider</h3>
        </div>

        <div class="col-12">
            <form class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" id="title" class="form-control" placeholder="Enter Title" />
                    </div>

                    <div class="mb-3">
                        <label for="link" class="form-label">Link</label>
                        <input type="text" id="link" class="form-control" placeholder="Enter Link" />
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea id="description" rows="10" class="form-control" placeholder="Enter Link"></textarea>
                    </div>
                </div>

                <div class="col-6">
                    <div>
                        <label id="preview-image-label" for="image-input" class="rounded d-flex justify-content-center align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="height: 180px">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                            </svg>
                        </label>
                        <input class="d-none" type="file" id="image-input"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function(){

            const previewImage = document.querySelector("#preview-image-label");

            document.querySelector("#image-input").addEventListener('change', function(e){
                let file = e.target.files[0];
                if(file){
                    let reader = new FileReader();
                    reader.onload = function(){
                        const result = reader.result;
                        previewImage.classList.add('has-image')
                        previewImage.style.backgroundImage = 'url('+result+')';
                    }

                    reader.readAsDataURL(file);
                }
            });
        })
    </script>
@endsection
