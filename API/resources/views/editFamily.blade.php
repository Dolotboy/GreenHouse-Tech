@extends('layouts.app')
@section('title', 'Edit Delete Family')
@section('pageContent')
@parent

<div id='mainContainer'>

    <div id="formContainer">
        <form id="edit" action='{{route('editFamilySent', ['idFamily' => $family['idFamily'] ])}}' method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 pl-xl-0 pl-lg-0 pl-md-0 border-left m-b-30">
                            <div class="product-details">
                                <h3>{{__('interface.labelAddFamily')}}</h3>
                                <div class="border-bottom pb-3 mb-3">
                                    <h3 class="mb-3">{{__('interface.labelFamilyName')}} <input type="text" name='familyName' value="{{ $family["familyName"] }}" required></h3>
                                    <h3 class="mb-3"> <input type="submit" name='submit' placeholder="Submit" value="{{__('interface.submit')}}"></h3>                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <form id="delete" action='{{route('deleteFamily', ['idFamily' => $family['idFamily'] ])}}' method='post'>
            @csrf
            @method('delete')

            <div class="row">
                <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 pl-xl-0 pl-lg-0 pl-md-0 border-left m-b-30">
                            <div class="product-details">
                                <h3>{{__('interface.labelDeleteFamily')}}</h3>
                                <div class="border-bottom pb-3 mb-3">
                                    <h3 class="mb-3"> <input type="submit" name='delete' placeholder="Delete" value="{{__('interface.delete')}}"></h3>                                  
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

