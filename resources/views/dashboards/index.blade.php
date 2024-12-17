@extends('layouts.adminindex')

@section('content')
<div class="container-fluid">

    <div class="col-md-12">

        <div class="row">

            <div class="col-md-11 mx-auto">

                <div id="list-boxs">
                    <div class="d-flex justify-content-center mb-4">
                        <div class="fs-3 text-uppercase menutitles">World Cooking Map</div>
                    </div>

                    <div class="map-containers bg-dark rounded">

                        <div>
                            <select name="smallcolor" id="smallcolor" class="smallcolor">
                                <option selected disabled>Small color</option>
                                <option value="red">Red</option>
                                <option value="green">Green</option>
                                <option value="blue">Blue</option>
                                <option value="white">White</option>
                                <option value="skyblue">Skyblue</option>
                                <option value="violet">Violet</option>
                                <option value="pink">Pink</option>
                                <option value="yellow">Yellow</option>
                                <option value="steelblue">Steelblue</option>
                                <option value="cyan">Cyan</option>
                            </select>

                            <select name="mediumcolor" id="mediumcolor" class="mediumcolor">
                                <option selected disabled>Medium color</option>
                                <option value="red">Red</option>
                                <option value="green">Green</option>
                                <option value="blue">Blue</option>
                                <option value="white">White</option>
                                <option value="skyblue">Skyblue</option>
                                <option value="violet">Violet</option>
                                <option value="pink">Pink</option>
                                <option value="yellow">Yellow</option>
                                <option value="steelblue">Steelblue</option>
                                <option value="cyan">Cyan</option>
                            </select>

                            <select name="largecolor" id="largecolor" class="largecolor">
                                <option selected disabled>Large color</option>
                                <option value="red">Red</option>
                                <option value="green">Green</option>
                                <option value="blue">Blue</option>
                                <option value="white">White</option>
                                <option value="skyblue">Skyblue</option>
                                <option value="violet">Violet</option>
                                <option value="pink">Pink</option>
                                <option value="yellow">Yellow</option>
                                <option value="steelblue">Steelblue</option>
                                <option value="cyan">Cyan</option>
                            </select>
                        </div>

                        <div class="map-clickers">
                            {{-- <span class="circles"></span> --}}
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
@endsection

@section('css')
<style type="text/css">

    :root{
        --small-color: #f8f8f8;
        --medium-color: #f4f4f4;
        --large-color: #f1f1f1;
    }

    .menutitles{
        font-family: "Open Sans", sans-serif;
        color: rgb(246, 123, 107) !important;
        font-size: 40px !important;
    }

    .map-clickers{
        width: 100%;
        height: 600px;
        background-image: url('{{ asset("assets/dist/img/dashboard/map.png") }}');

        position: relative;
    }

    .map-clickers .circles{
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background: var(--small-color);

        position: absolute;
        left: 50%;
        top: 50%;

        transform: translate(-50%,-50%);

        animation: small 2.5s infinite;
    }

    .map-clickers .circles::before{
        content: '';
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background: var(--medium-color);

        position: absolute;
        left: 50%;
        top: 50%;

        transform: translate(-50%,-50%);

        animation: medium 2.5s infinite;
    }

    .map-clickers .circles::after{
        content: '';
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background: var(--large-color);

        position: absolute;
        left: 50%;
        top: 50%;

        transform: translate(-50%,-50%);

        animation: large 2.5s infinite;
    }

    @keyframes small{
        to{
            transform: translate(-50%,-50%) scale(1);
            opacity: 0;
        }
    }

    @keyframes medium{
        to{
            transform: translate(-50%,-50%) scale(2);
            opacity: 0;
        }
    }

    @keyframes large{
        to{
            transform: translate(-50%,-50%) scale(3);
            opacity: 0;
        }
    }

</style>
@endsection

@section('scripts')
    <script type="text/javascript">

        // UI
        const getsmallcolor = document.getElementById('smallcolor'),
              getmediumcolor = document.getElementById('mediumcolor'),
              getlargecolor = document.getElementById('largecolor');
        const getmap = document.querySelector('.map-clickers')

        let curidx = 0;
        getmap.addEventListener('click',function(e){

            curidx++;

            if(getmap.classList.contains('map-clickers')){
                const newspan = document.createElement('span');
                newspan.classList.add('circles');
                newspan.id = curidx;

                const offx = e.offsetX;
                const offy = e.offsetY;

                newspan.style.left = `${offx}px`;
                newspan.style.top = `${offy}px`;

                if(getsmallcolor.selectedIndex > 0 && getmediumcolor.selectedIndex > 0 && getlargecolor.selectedIndex > 0  ){
                    newspan.style.setProperty('--small-color',getsmallcolor.value);
                    newspan.style.setProperty('--medium-color',getmediumcolor.value);
                    newspan.style.setProperty('--large-color',getlargecolor.value);
                }

                this.appendChild(newspan);

            }

        })

    </script>
@endsection
