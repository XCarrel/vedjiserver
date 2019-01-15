@extends('layout')
@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                Administration des fournisseurs
            </div>

            <div class="links">
                <a href="/">Accueil</a>
                <a href="/admin">Administration</a>
            </div>

            <table class="flex-center" style="padding-top: 20px;">
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Entreprise</th>
                    <th>Téléphone</th>
                </tr>

                @foreach($fournisseurs as $fournisseur)
                    <tr>
                        <td>{{$fournisseur->firstName}}</td>
                        <td>{{$fournisseur->lastName}}</td>
                        <td>{{$fournisseur->companyName}}</td>
                        <td>{{$fournisseur->phone}}</td>
                        <td>
                            <form method="post" action="/providers/del">
                                @csrf
                                <button name="del" value="{{$fournisseur->id}}" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                        <td>
                            <form method="post" action="/providers/update">
                            @csrf
                                <button name="update" value="{{$fournisseur->id}}" class="btn btn-warning">Modifier</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>

            <!-- Button trigger modal -->
            <button type="button" style="margin-top:20px" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
                Ajouter un fournisseur
            </button>

            <!-- Modal -->
            <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <form action="/providers/add" method="post">
                    @csrf
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter un fournisseur</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="title">Nom</label>
                                    <input type="text" class="form-control" name="lastname" required>
                                </div>
                                <div class="form-group">
                                    <label for="title">Prénom</label>
                                    <input type="text" class="form-control" name="firstname" required>
                                </div>
                                <div class="form-group">
                                    <label for="title">Entreprise</label>
                                    <input type="text" class="form-control" name="company" required>
                                </div>
                                <div class="form-group">
                                    <label for="description">Téléphone</label>
                                    <input type="text" class="form-control" name="phone" required>
                                </div>
                                <div class="form-group">
                                    <label for="description">Adresse</label>
                                    <input type="text" class="form-control" name="address" required>
                                </div>
                                <div class="form-group">
                                    <label for="description">Type de fournisseur</label>
                                    <select class="form-control" name="providerType" required>
                                        <option value='0'>Client</option>
                                        <option value='1'>Administrateur</option>
                                        <option value='2'>Livraison</option>
                                        <option value='3'>Fournisseur</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn btn-primary">Créer</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection