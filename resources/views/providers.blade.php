@extends('layout')
@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                Administration des fournisseurs
            </div>

            <div class="links" style="padding-bottom: 30px;">
                <a href="/">Accueil</a>
                <a href="/admin">Administration</a>
            </div>

            <table class="table table-striped table-hover">
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Entreprise</th>
                    <th>Téléphone</th>
                    <th colspan="2">Actions</th>
                </tr>

                @foreach($fournisseurs as $fournisseur)
                    <tr>
                        <td>{{$fournisseur->firstName}}</td>
                        <td>{{$fournisseur->lastName}}</td>
                        <td>{{$fournisseur->companyName}}</td>
                        <td>{{$fournisseur->phone}}</td>
                        <td>
                            <form method="post" action="/providers/delete">
                                @csrf
                                <button name="del" value="{{$fournisseur->id}}" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                        <td>
                            <a name="update" href="/providers/getProviders/{{$fournisseur->id}}" class="btn btn-warning">Modifier</a>
                        </td>
                    </tr>
                @endforeach
            </table>

            <a href="/providers/showAdd" style="margin-top:20px" class="btn btn-primary">Ajouter un produit</a>
        </div>
    </div>
@endsection