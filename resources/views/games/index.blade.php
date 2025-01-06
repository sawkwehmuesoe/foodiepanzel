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

                    <div class="map-containers bg-dark rounded mb-4">

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

                    <div class="d-flex justify-content-center mb-4">
                        <div class="fs-3 text-uppercase menutitles">Question and Answer</div>
                    </div>

                    <div id="quizandanswers" class="quizandanswers mx-auto">

                        <div class="fs-3 text-uppercase mb-3 text-light quizquestions">Question and Answer</div>

                        <div class="quizimageboxes text-center mb-3">
                            <input type="radio" name="answer" id="a" class="answer" hidden><label for="a" ><img src="{{asset('assets/dist/img/quizimage/shannoodle.jpg')}}" id="a_img" alt='a_img' /></label>
                            <input type="radio" name="answer" id="b" class="answer" hidden><label for="b" ><img src="{{asset('assets/dist/img/quizimage/crispypork.jpg')}}" id="b_img" alt='b_img' /></label>
                            <input type="radio" name="answer" id="c" class="answer" hidden><label for="c" ><img src="{{asset('assets/dist/img/quizimage/friedrice.jpg')}}" id="c_img" alt='c_img' /></label>
                            <input type="radio" name="answer" id="d" class="answer" hidden><label for="d" ><img src="{{asset('assets/dist/img/quizimage/chickenrice.jpg')}}" id="d_img" alt='d_img' /></label>
                        </div>

                        <button type="button" class="next-btns">Next</button>

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

    /* ---------------------------- */

    .quizandanswers{
        width: 600px;
        background: rgb(172, 18, 72);

        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;

        padding: 20px;
        border-radius: 10px;
        box-shadow: 3px 2px 5px #777;
    }

    .quizimageboxes img{
        width: 240px;
        height: 240px;
        object-fit: cover;
        cursor: pointer;
        border-radius: 5px;
        margin: 3px;

        transition: all .3s;
    }

    .quizimageboxes img:hover{
        opacity: .8;
        filter: blur(1.5px);
    }

    .quizimageboxes .answer:checked + label img{
        transform: scale(1.1);
    }

    .next-btns{
        width: 100%;
        color: #fff;
        font-size: 20px;
        font-weight: bold;
        border: none;
        background: rgb(93, 3, 3);
        padding: 10px 20px;
        opacity: 0.8;
        border-radius: 5px
    }

    .next-btns:hover{
        opacity: 1;
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

            if(e.target.classList.contains('map-clickers')){
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

            deletecircle(e);

        })

        function deletecircle(e){

            console.log(e.target.id);

            if(e.target.id > 0){
                e.target.remove();
            }

        }

        //UI
        const getquizcontainer = document.getElementById('quizandanswers');
        const getquestion = document.querySelector('.quizquestions');
        const getinputs = document.querySelectorAll('.answer');

        const getquizbtn = document.querySelector('.next-btns');


        let geta_img = document.getElementById('a_img'),
              getb_img = document.getElementById('b_img'),
              getc_img = document.getElementById('c_img'),
              getd_img = document.getElementById('d_img');

        // console.log(getd_img);

        let quizscore = 0 ;
        let quizidx = 0;

        const quizdatabase = [
            {
                question : "Choose The Shan Noodle ?",
                a : "assets/dist/img/quizimage/shannoodle.jpg",
                b : "assets/dist/img/quizimage/noddlefried.jpg",
                c : "assets/dist/img/quizimage/normalnoddle.jpg",
                d : "assets/dist/img/quizimage/normalegg.jpg",
                corranswer : "a"
            },
            {
                question : "Choose The Fried Rice ?",
                a : "assets/dist/img/quizimage/chickennoddle.jpg",
                b : "assets/dist/img/quizimage/noddleoil.jpg",
                c : "assets/dist/img/quizimage/friedrice.jpg",
                d : "assets/dist/img/quizimage/porkrice.jpg",
                corranswer : "c"
            },
            {
                question : "Choose The Crispy Pork ?",
                a : "assets/dist/img/quizimage/friedrice.jpg",
                b : "assets/dist/img/quizimage/shannoodle.jpg",
                c : "assets/dist/img/quizimage/chickenrice.jpg",
                d : "assets/dist/img/quizimage/crispypork.jpg",
                corranswer : "d"
            },
            {
                question : "Choose The Chicken Rice ?",
                a : "assets/dist/img/quizimage/crispypork.jpg",
                b : "assets/dist/img/quizimage/chickenrice.jpg",
                c : "assets/dist/img/quizimage/shannoodle.jpg",
                d : "assets/dist/img/quizimage/friedrice.jpg",
                corranswer : "b"
            },
        ]

        function startquiz(){

            removeselected();

            getquestion.textContent = quizdatabase[quizidx].question;
            geta_img.src = `http://127.0.0.1:8000/${quizdatabase[quizidx].a}`;
            getb_img.src = `http://127.0.0.1:8000/${quizdatabase[quizidx].b}`;
            getc_img.src = `http://127.0.0.1:8000/${quizdatabase[quizidx].c}`;
            getd_img.src = `http://127.0.0.1:8000/${quizdatabase[quizidx].d}`;

        }

        startquiz();

        function singlequiz(){

            let answer;

            getinputs.forEach(function(getinput){
                if(getinput.checked){
                    answer = getinput.id;
                }
            });

            return answer;

        }

        getquizbtn.addEventListener('click',function(){

            let getanswer = singlequiz();

            if(getanswer){
                if(getanswer === quizdatabase[quizidx].corranswer){
                    quizscore++;
                }

                quizidx++;

                if(quizidx < quizdatabase.length){

                    startquiz();

                }else{
                    getquizcontainer.innerHTML = `
                        <div class="fs-3 text-uppercase mb-3 text-light quizquestions">Total Score : ${quizscore*25}</div>
                        <div class="text-white"> You answerd correctly at ${quizscore}/${quizdatabase.length} questions.</div>
                    `
                }

            }

        })

        function removeselected(){
            getinputs.forEach(function(getinput){
                return getinput.checked = false;
            })
        }


    </script>
@endsection
