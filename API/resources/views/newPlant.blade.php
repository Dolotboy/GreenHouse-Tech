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
                                    <h2 class="mb-3"><input type="text" name='imgPlant' placeholder="imgPlant"></h2>
                                    <h3 class="mb-0 text-primary"><input type="text" name='name' placeholder="Nom"></h3>
                                    <h3 class="mb-0 text-primary"><input type="text" name='season' placeholder="Season"></h3>
                                    <h3 class="mb-0 text-primary"><input type="text" name='type' placeholder="Type"></h3>
                                    <h3 class="mb-0 text-primary"><input type="text" name='groundType' placeholder="Ground Type"></h3>
                                    <h3 class="mb-0 text-primary"><input type="text" name='daysConservation' placeholder="Days of conservation"></h3>
                                    <h3 class="mb-0 text-primary"><input type="text" name='functioning' placeholder="Functioning"></h3>  
                                    <h3 class="mb-0 text-primary"><input type="submit" name='submit' placeholder="Submit"></h3>                                     
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
        
        