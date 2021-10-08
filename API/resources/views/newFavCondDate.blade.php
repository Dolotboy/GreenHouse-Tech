@extends('layouts.app')
@section('title', 'Add Fav Cond Date')
@section('pageContent')
@parent

<div id='mainContainer'>
    <form action='{{route('addFavConditionDate')}}' method='POST'>
        @csrf

        <div class="row">
            <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 pl-xl-0 pl-lg-0 pl-md-0 border-left m-b-30">
                        <div class="product-details">
                        <h3>Add a favorite condition date</h3>
                            <div class="border-bottom pb-3 mb-3">
                                <h3 class="mb-3"><input type="text" name='type' placeholder="Type" value="" required></h3>
                                <h3 class="mb-3"><input type="text" name='start' placeholder="Start" value="" required></h3>
                                <h3 class="mb-3"><input type="text" name='end' placeholder="End" value="" required></h3>   
                                <h3 class="mb-3"><input type="text" name='location' placeholder="Location" value="" required></h3>                                 
                                <h3 class="mb-3"><input type="submit" name='submit' value="Submit"></h3>                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection