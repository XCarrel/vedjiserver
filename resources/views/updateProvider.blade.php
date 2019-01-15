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
                        <form method="post" action="/providers/updateDataProvider">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="title">Nom</label>
                                    <input type="text" class="form-control" name="updateLastname" value='{{$data->lastName}}' style="margin-right: 200px;">
                                </div>
                                <div class="form-group">
                                    <label for="title">Prénom</label>
                                    <input type="text" class="form-control" name="updateFirstname" value='{{$data->firstName}}'>
                                </div>
                                <div class="form-group">
                                    <label for="title">Entreprise</label>
                                    <input type="text" class="form-control" name="updateCompany" value='{{$data->companyName}}'>
                                </div>
                                <div class="form-group">
                                    <label for="description">Téléphone</label>
                                    <input type="text" class="form-control" name="updatePhone" value='{{$data->phone}}'>
                                </div>
                                <div class="form-group">
                                    <label for="description">Adresse</label>
                                    <input type="text" class="form-control" name="updateAddress" value='{{$data->address}}'>
                                </div>
                                <div class="form-group">
                                    <label for="description">Type de fournisseur</label>
                                    <select class="form-control" name="updateProviderType">
                                        @foreach($userTypes as $userType)
                                            <option value='{{$userType->id}}' {{$data->userType_id == $userType->id ? "selected" : "" }}>{{$userType->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <a href="/providers"> <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button> </a>
                                    <button type="submit" class="btn btn-primary" value="{{$data->id}}" name="btnUpdate">Modifier</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection