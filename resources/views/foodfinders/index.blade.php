@extends('layouts.adminindex')
@section('caption','Our Menu')
@section('content')

    <div class="container-fluid">

        <div class="col-md-12">

            <div class="row">

                <div class="col-md-11 mx-auto">

                    <div id="list-boxs">

                        <div class="d-flex justify-content-center mb-4">
                            {{-- <h3 class="fs-3 fw-bold">@yield('caption')</h3> --}}
                            <div class="fs-3 text-uppercase menutitles">@yield('caption')</div>
                        </div>

                        <div class="col-md-6 mx-auto mb-3">

                            <form id="foodfinders" class="foodfinders" action="" method="">
                                <div class="form-group">
                                    <input type="text" id="searchfood" class="form-control searchfoods" placeholder="Search...">
                                </div>
                            </form>

                        </div>
                        <div class="nodatas"></div>
                        <div class="row finder-displays">

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection

@section('css')
<style type="text/css">

    .menutitles{
        font-family: "Open Sans", sans-serif;
        color: rgb(246, 123, 107) !important;
        font-size: 40px !important;
    }

</style>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script type="text/javascript">

        $(document).ready(function(){

            $('.delete-btns').click(function(){

                var getidx = $(this).data('idx');
                // console.log(getidx);

                if(confirm(`Are you sure !!! you want to Delete ${getidx}`)){
                    $("#formdelete-"+getidx).submit();
                    return true;
                }else{
                    return false;
                }

            });

        })

        // Start Food Finder

            const getfoodform = document.getElementById('foodfinders');
            const getfooddisplay = document.querySelector('.finder-displays');
            const getfoodsearch = document.getElementById('searchfood');
            const getnodata = document.querySelector('.nodatas');

            getfoodsearch.focus();

            getfoodform.addEventListener('submit',searchfoods);

            function searchfoods(e){
                e.preventDefault();

                // clear display 1 results
                getfooddisplay.innerHTML = '';

                getval = getfoodsearch.value;

                if(getval.trim()){
                    const url = `https://www.themealdb.com/api/json/v1/1/search.php?s=${getval}`;

                    $.ajax({
                        method:"GET",
                        url:url,
                        dataType:'json'
                    }).done(data=>{
                        // console.log(data);
                        // console.log(typeof data);

                        // console.log(data.meals);

                        if(data.meals === null){
                            getnodata.innerHTML = `<p>There is no data. Try Again Sir</p>`;
                        }else{
                            getnodata.innerHTML = '';
                            getfooddisplay.innerHTML = data.meals.map(food=>`
                                <div class="col-md-3 mb-4">
                                    <div class="finder-flip-card">
                                        <div class="finder-flip-card-inner">
                                            <div class="finder-flip-card-front">
                                                <img src='${food.strMealThumb}' alt="${food.strMeal}">

                                            </div>
                                            <div class="finder-flip-card-back">
                                                <p class="finder-title mb-3">${food.strMeal}</p>
                                                <p>${food.strArea}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            `).join("")
                        }

                    }).fail(() => console.log("Error"));

                    getsearch.value = '';
                }
            }

        // End Food Finder

    </script>
@endsection
