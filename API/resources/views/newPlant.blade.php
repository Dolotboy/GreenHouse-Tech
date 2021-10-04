@extends('layouts.app')
@section('title', 'Add Plant')
@section('pageContent')
@parent
    <div id='mainContainer'>
        
        <form action='{{route('addPlant')}}' method='PUT'>
            @csrf
            @method('PUT')

            <div class="row">
                <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 pl-xl-0 pl-lg-0 pl-md-0 border-left m-b-30">
                            <div class="product-details">
                            <h3>Add a plant</h3>
                                <div class="border-bottom pb-3 mb-3">
                                    <h2 class="mb-3"><input type="text" name='imgPlant' placeholder="image Plant" value=""></h2>
                                    <h3 class="mb-3"><input type="text" name='plantName' placeholder="Plant Name" value=""></h3>
                                    <h3 class="mb-3"><input type="text" name='plantType' placeholder="Plant Type" value=""></h3>
                                    <h3 class="mb-3"><input type="text" name='plantFamily' placeholder="Plant Family" value=""></h3>
                                    <h3 class="mb-3"><input type="text" name='plantSeason' placeholder="Plant Season" value=""></h3>
                                    <h3 class="mb-3"><input type="text" name='plantGroundType' placeholder="Plant Ground Type" value=""></h3>
                                    <h3 class="mb-3"><input type="text" name='plantdaysConservation' placeholder="Days of conservation" value=""></h3>
                                    <h3 class="mb-3"><input type="text" name='plantDescription' placeholder="Plant Description" value=""></h3>  
                                    <h3 class="mb-3"><input type="text" name='plantState' placeholder="Plant State" value=""></h3>
                                    <h3 class="mb-3"><input type="text" name='plantDifficulty' placeholder="Plant Difficulty" value=""></h3>
                                    <h3 class="mb-3"><input type="text" name='lifeTime' placeholder="Life Time" value=""></h3>
                                    <h3 class="mb-3"><input type="text" name='plantBestNeighbor' placeholder="Plant Best Neighbor" value=""></h3>  
                                    <h3 class="mb-3"><input type="submit" name='submit' placeholder="Submit"></h3>                                     
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
        
        