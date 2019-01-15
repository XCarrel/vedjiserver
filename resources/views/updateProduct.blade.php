@extends('layout')
@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="flex-center">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <form method="post" action="/products/updateDataProducts">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Modifier {{$data->productName}}</h5>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="title">Produit</label>
                                    <input type="text" class="form-control" name="updateName"  value='{{$data->productName}}' style="margin-right: 200px;">
                                </div>
                                <div class="form-group">
                                    <label for="title">Stock</label>
                                    <input type="text" class="form-control" name="updateStok" value='{{$data->stock}}'>
                                </div>
                                <div class="form-group">
                                    <label for="title">Prix</label>
                                    <input type="text" class="form-control" name="updatePrice" value='{{$data->price}}'>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a href="/products"> <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button> </a>
                                    <button type="submit" class="btn btn-primary" value="{{$data->id}}" name="btnUpdate">Modifier</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection