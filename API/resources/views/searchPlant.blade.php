@extends('layouts.app')
@section('title', 'Search Plant')
@section('pageContent')
@parent

<div id='mainContainer'>
        
        <form action='' method='GET'>
            @csrf

            <div class="row">
                <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 pl-xl-0 pl-lg-0 pl-md-0 border-left m-b-30">
                            <div class="product-details">
                            <h3>Search for a plant</h3>
                                <div class="border-bottom pb-3 mb-3">
                                <h2 class="mb-3"><input type="text" name='imgPlant' placeholder="image Plant" value=""></h2>
                                    <h3 class="mb-3"><input type="text" name='plantName' placeholder="Plant Name" value="{{ $plant["plantName"] }}"> </h3>
                                    <h3 class="mb-3"><input type="text" name='plantType' placeholder="Plant Type" value="{{ $plant["plantName"] }}"> </h3>
                                    <h3 class="mb-3"><input type="text" name='plantFamily' placeholder="Plant Family" value="{{ $plant["plantName"] }}" > </h3>
                                    <h3 class="mb-3"><input type="text" name='season' placeholder="Season" value="{{ $plant["plantName"] }}"> </h3>
                                    <h3 class="mb-3"><input type="text" name='groundType' placeholder="Ground Type" value="{{ $plant["plantName"] }}"></h3>
                                    <h3 class="mb-3"><input type="text" name='daysConservation' placeholder="Days of conservation" value="{{ $plant["plantName"] }}"></h3>
                                    <h3 class="mb-3"><input type="text" name='description' placeholder="Description" value="{{ $plant["plantName"] }}"></h3>  
                                    <h3 class="mb-3"><input type="text" name='tblPlantSowing_idSowing' placeholder="tblPlantSowing_idSowing" value="{{ $plant["plantName"] }}"></h3>                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection