@extends('layouts.app')
@section('title', 'Edit Fav Cond Date')
@section('pageContent')
@parent

<div id='mainContainer'>

    <div id="formContainer">
        <form id="form" action="{{route('editFavCondDateSent', ['idCondition' => $favorableCondition['idRangeDate'] ])}}" method='POST'>
            @csrf
            @method('PUT')

            <div class="row">
                <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 pl-xl-0 pl-lg-0 pl-md-0 border-left m-b-30">
                            <div class="product-details">
                                <h3>{{__('interface.labelEditCondDate')}}</h3>
                                <div class="border-bottom pb-3 mb-3">
                                    <h3 class="mb-3">{{__('interface.labelCondDateType')}} <input type="text" name='type' value="{{ $favorableCondition["type"] }}" required></h3>
                                    <h3 class="mb-3">{{__('interface.labelCondDateStart')}} <input type="text" name='start' value=" {{ $favorableCondition["start"] }}" required></h3>
                                    <h3 class="mb-3">{{__('interface.labelCondDateEnd')}} <input type="text" name='end' value="{{ $favorableCondition["end"] }}" required></h3>  
                                    <h3 class="mb-3">{{__('interface.labelCondDateLocation')}} <input type="text" name='location' value="{{ $favorableCondition["location"] }}" required></h3>  
                                    <h3 class="mb-3"> <input type="submit" name='submit' placeholder="Submit" value="{{__('interface.submit')}}"></h3>                                      
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <form id="delete" action='{{route('deleteFavConditionDate', ['idCondition' => $favorableCondition['idRangeDate'] ])}}' method='post'>
            @csrf
            @method('delete')

            <div class="row">
                <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 pl-xl-0 pl-lg-0 pl-md-0 border-left m-b-30">
                            <div class="product-details">
                                <h3>{{__('interface.labelDeleteCondDate')}}</h3>
                                <div class="border-bottom pb-3 mb-3">
                                    <h3 class="mb-3"> <input type="submit" name='submit' placeholder="Submit" value="{{__('interface.delete')}}"></h3>                                      
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection