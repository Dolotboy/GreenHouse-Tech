@extends('layouts.app')
@section('title', 'Delete Favorite')
@section('pageContent')
@parent

<div id='mainContainer'>

    <form id="delete" method='post'>
        @csrf
        @method('delete')

        <div class="row">
            <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 pl-xl-0 pl-lg-0 pl-md-0 border-left m-b-30">
                        <div class="product-details">
                        <h3>Delete a favorite</h3>
                            <div class="border-bottom pb-3 mb-3">
                                <h2 class="mb-3"> <input type="text" id="v1"  name='tblPlant_idPlant' placeholder="tblPlant_idPlant" value="" required></h2> 
                                <h2 class="mb-3"> <input type="text" id="v2" name='tblProfile_idProfile' placeholder="tblProfile_idProfile" value="" required></h2>     
                                <h2 class="mb-3"> <input type="submit" name='submit' placeholder="Delete" onclick="Delete()" value="Delete"></h2>                             
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>

<script>
    function Delete(){
        var idPlant = document.getElementById("v1").value;
        var idProfile = document.getElementById("v2").value;
        let form = document.getElementById("delete").action = '/api/delete/favorite/' + idPlant + "/" + idProfile + "/";
    }
</script>

@endsection