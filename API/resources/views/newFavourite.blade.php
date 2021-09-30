@extends('layouts.app')
@section('title', 'New Favourite')
@section('pageContent')
@parent

<div id='mainContainer'>

        <form id="form" method='POST'>

            <div class="row">
                <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 pl-xl-0 pl-lg-0 pl-md-0 border-left m-b-30">
                            <div class="product-details">
                            <h3>Add your favourite plant below</h3>
                                <div class="border-bottom pb-3 mb-3">
                                    <h3 class="mb-0 text-primary"><input type="text" id='v1' name='TblPlant_idPlant' placeholder="Id Plant" value=""></h3>
                                    <h3 class="mb-0 text-primary"><input type="text" id='v2' name='TblProfile_idProfile' placeholder="Id Profile" value=""></h3>    
                                    <h3 class="mb-0 text-primary"><button type='submit' onclick="myFunction()">Envoyer</button></h3>              
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <script>
            function myFunction() {
                let v1 = document.getElementById('v1').value;
                let v2 = document.getElementById('v2').value;
                let form = document.getElementById("form").action = '/api/new/favorite/' + v1 + '/' + v2;
            }
        </script>
</div>



@endsection
