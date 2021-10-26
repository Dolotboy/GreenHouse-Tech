@extends('layouts.app')
@section('title', 'Edit Fav Cond Date')
@section('pageContent')
@parent

<div id='mainContainer'>

    <div id="formContainer">
        <form id="form" method='POST'>
            @csrf

            <div class="row">
                <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 pl-xl-0 pl-lg-0 pl-md-0 border-left m-b-30">
                            <div class="product-details">
                                <h3>Edit a favorable condition date</h3>
                                <div class="border-bottom pb-3 mb-3">
                                    <h3 class="mb-3"> <input type="text" name='type' value="{{ $favorableCondition["type"] }}" required></h3>
                                    <h3 class="mb-3"> <input type="text" name='start' value=" {{ $favorableCondition["start"] }}" required></h3>
                                    <h3 class="mb-3"> <input type="text" name='end' value="{{ $favorableCondition["end"] }}" required></h3>  
                                    <h3 class="mb-3"> <input type="text" name='location' value="{{ $favorableCondition["location"] }}" required></h3>  
                                    <h3 class="mb-3"> <input type="submit" name='submit' placeholder="Submit" value="Submit"></h3>                                      
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <form id="delete" method='DELETE'>
            @csrf

            <div class="row">
                <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 pl-xl-0 pl-lg-0 pl-md-0 border-left m-b-30">
                            <div class="product-details">
                                <h3>Delete a favorable condition date</h3>
                                <div class="border-bottom pb-3 mb-3">
                                    <h3 class="mb-3"> <input type="text" name='type' value="{{ $favorableCondition["type"] }}" required></h3>
                                    <h3 class="mb-3"> <input type="text" name='start' value=" {{ $favorableCondition["start"] }}" required></h3>
                                    <h3 class="mb-3"> <input type="text" name='end' value="{{ $favorableCondition["end"] }}" required></h3>  
                                    <h3 class="mb-3"> <input type="text" name='location' value="{{ $favorableCondition["location"] }}" required></h3>  
                                    <h3 class="mb-3"> <input type="submit" name='submit' placeholder="Submit" onclick="Delete()" value="Delete"></h3>                                      
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    function Delete(){
        var favCondDate = "{{ $favorableCondition["idRangeDate"] }}";
        let form = document.getElementById("delete").action = '../../../../api/delete/condition/date/' + favCondDate;
    }
</script>
@endsection