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

                                @foreach($plant as $plant)
                                    <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12">
                                        <ul>
                                            <li>
                                                <div class="product-thumbnail">
                                                    <div class="product-img-head">
                                                        <div class="product-img">
                                                            <img class="d-block" src="{{ $plant["plantImg"] }}" width="300" height="300" alt="Image manquante">
                                                        </div>
                                                    </div>
                                                    <div class="product-content">
                                                        <div class="product-content-head">
                                                            <h3 class="product-title">{{ $plant["plantName"] }}</h3>
                                                            <h3 class="mb-3">{{ $plant["plantType"] }}</h3>
                                                            <h3 class="mb-3">{{ $plant["plantFamily"] }}</h3>
                                                            <h3 class="mb-3">{{ $plant["plantSeason"] }}</h3>
                                                            <h3 class="mb-3">{{ $plant["plantGroundType"] }}</h3>
                                                            <h3 class="mb-3">{{ $plant["plantDaysConservation"] }}</h3>
                                                            <h3 class="mb-3">{{ $plant["plantDescription"] }}</h3>
                                                            <h3 class="mb-3">{{ $plant["plantDifficulty"] }}</h3>
                                                            <h3 class="mb-3">{{ $plant["plantBestNeighbor"] }}</h3>
                                                        </div>
                                                        <div class="product-btn">
                                                            <a href="/api/edit/plant/{{ $plant["idPlant"] }}"   class="btn btn-primary">Edit</a>
                                                            <a href="/api/delete/plant/{{ $plant["idPlant"] }}" class="btn btn-primary">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                @endforeach       

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    
</div>
@endsection