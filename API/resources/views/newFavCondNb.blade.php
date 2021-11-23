@extends('layouts.app')
@section('title', 'Add Fav Cond Nb')
@section('pageContent')
@parent

<div id='mainContainer'>
    <form action='{{route('addFavConditionNb')}}' method='POST'>
        @csrf

        <div class="row">
            <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 pl-xl-0 pl-lg-0 pl-md-0 border-left m-b-30">
                        <div class="product-details">
                        <h3>Add a favorite condition Nb</h3>
                            <div class="border-bottom pb-3 mb-3">
                                <h3 class="mb-3"> Type: 
                                    <select id="type" name='type' required>
                                        <option value="temperature">Temperature</option>
                                        <option value="humidity">Humidity</option>
                                        <option value="ph">PH</option>
                                        <option value="plantSpacing">Plant Spacing</option>
                                        <option value="exposureTime">Exposure Time</option>
                                    </select>
                                </h3>
                                <h3 class="mb-3">Min: <input type="text" name='min' placeholder="Min" value="" required></h3>
                                <h3 class="mb-3">Max: <input type="text" name='max' placeholder="Max" value="" required></h3>        
                                <h3 class="mb-3">Unit:
                                    <select id="unit" name='unit' required>
                                        <option value="°C">°C</option>
                                        <option value="%">%</option>
                                        <option value="ph">PH</option>
                                        <option value="cm">cm</option>
                                        <option value="°H">°H</option>
                                    </select>
                                </h3>                           
                                <h3 class="mb-3"> <input type="submit" name='submit' value="Submit"></h3>                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection