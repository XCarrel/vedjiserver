@extends('layout')
@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="flex-center">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Modifier {{$data->lastName}} {{$data->firstName}}</h5>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="title">Nom</label>
                                <input type="text" class="form-control" name="updateLastname" placeholder='{{$data->lastName}}' style="margin-right: 200px;">
                            </div>
                            <div class="form-group">
                                <label for="title">Prénom</label>
                                <input type="text" class="form-control" name="updateFirstname" placeholder='{{$data->firstName}}'>
                            </div>
                            <div class="form-group">
                                <label for="title">Entreprise</label>
                                <input type="text" class="form-control" name="updateCompany" placeholder='{{$data->companyName}}'>
                            </div>
                            <div class="form-group">
                                <label for="description">Téléphone</label>
                                <input type="text" class="form-control" name="updatePhone" placeholder='{{$data->phone}}'>
                            </div>
                            <div class="form-group">
                                <label for="description">Adresse</label>
                                <input type="text" class="form-control" name="updateAddress" placeholder='{{$data->address}}'>
                            </div>
                            <div class="form-group">
                                <label for="description">Type de fournisseur</label>
                                <select class="form-control" name="updateProviderType">
                                    <option value='0'>Client</option>
                                    <option value='1'>Administrateur</option>
                                    <option value='2'>Livraison</option>
                                    <option value='3'>Fournisseur</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="/providers"> <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button> </a>
                            <form method="post" action="/providers/updateData">
                                <button type="submit" class="btn btn-primary" value="{{$data->id}}" name="btnUpdate">Modifier</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection