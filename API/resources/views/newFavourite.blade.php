@extends('layouts.app')
@section('title', 'New Favourite')
@section('pageContent')
@parent

<div id='mainContainer'>
        
        <!--<form id="form" action='{{route('addFavorite')}}' method='PUT'>-->
        <form id="form" action='/api/new/favorite/1/1' method='POST'>
            @csrf

            <div class="row">
                <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 pl-xl-0 pl-lg-0 pl-md-0 border-left m-b-30">
                            <div class="product-details">
                            <h3>Add your favourite plant below</h3>
                                <div class="border-bottom pb-3 mb-3">
                                    <h3 class="mb-0 text-primary"><input type="text" name='TblPlant_idPlant' placeholder="Id Plant" value=""></h3>
                                    <h3 class="mb-0 text-primary"><input type="text" name='TblProfile_idProfile' placeholder="Id Profile" value=""></h3>    
                                    <h3 class="mb-0 text-primary"><input type="submit" name='submit' onclick="click()" placeholder="Submit"></h3> 
                                    <!--<button><a href='http://apitestenv.pcst.xyz/api/new/favorite/1/1'>CLIQUE ICI MON AMI</a></button>-->                       
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
        function click(){
            let form = document.querySelector("#form");
            form.action = form.action + '/1/1';
        }
    </script>
@endsection