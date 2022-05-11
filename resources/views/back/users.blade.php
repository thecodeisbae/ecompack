@extends('back.layout')
@section('haut')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('content')
<main>
    <div class="container-fluid">
        <h3 class="mt-4">Utilisateurs</h3>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Liste des utilisateurs</li>
            </ol>
            @include('flash_message')
            
            <div class="card mb-4">
                <div class="card-header"><i class="fas fa-table mr-1"></i></div>
                    <div class="card-body">
                                <div class="table-responsive">
                                    {{-- <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#createPack">Créer un pack</button> --}}
                                    <table class="table table-bordered btn-sm" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nom prenoms</th>
                                                <th>Age</th>
                                                <th>Sexe</th>
                                                <th>Contact</th>
                                                <th>Email</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                @foreach($users as $key => $obj)
                                                    <tr>
                                                        <td>{{ $key+1 }}</td>
                                                        <td>{{ $obj->per_nom.' '.$obj->per_prenoms }}</td>
                                                        <td>{{ $obj->per_age }}</td>
                                                        <td>{{ $obj->per_sexe }}</td>
                                                        <td>{{ $obj->per_contact }}</td>
                                                        <td>{{ $obj->per_email }}</td>
                                                        <td align="center">
                                                            {{-- <a href="#" class="btn"><i class="text-primary fa fa-edit"></i></a> --}}
                                                            <a href="/admin/deleteUser/{{ $obj->per_id }}" onclick="return confirm('Supprimer cet utilisateur');" class="btn"><i class="text-danger fa fa-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                        </tbody>
                                    </table>
                                </div>
                    </div>
            </div>
    </div>
</main>

{{-- <div id="createPack" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Créer un pack</h5>
                    <button type="button" class="btn" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body m-2">
                    <div class="form-group">
                        <label for="nom">Articles</label>
                        <select multiple id="articles" class="form-control kt-selectpicker" name="articles[]">
                            @foreach($articles as $article)
                                <option value="{{ $article->article_id }}">{{ $article->article_nom.'( '.$article->article_prix.' XOF )' }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nom">Nom du pack</label>
                        <input id="nom" class="form-control" type="text" name="nomPack">
                    </div>
                    <div class="form-group">
                        <label for="nom">Montant par tranche</label>
                        <input id="montant" class="form-control" type="number" name="montant" min="0" step="0.01">
                    </div>
                    <div class="form-group">
                        <label for="nom">Nombre d'échéance</label>
                        <input id="nombre" class="form-control" type="number" name="nombre" min="0" step="1">
                    </div>
                    <div class="form-group">
                        <label for="nom">Montant total</label>
                        <input id="total" class="form-control" type="number" name="nombre" min="0" step="0.01">
                    </div>
                    <div class="row justify-content-between m-0">
                        <button type="button" class="btn btn-danger col-md-3" data-dismiss="modal" aria-label="Close">Fermer</button>
                        <button type="button" class="btn btn-primary col-md-3" onclick="savePack()" >Enregistrer</button>
                    </div>
                </div>
        </div>
    </div>
</div> --}}

 <script>

    $.ajaxSetup({

        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }

    });

    
    function savePack()
    {
        var form = new FormData();
        form.append('nom',$('#nom').val());
        form.append('montant',$('#montant').val());
        form.append('nombre',$('#nombre').val());
        form.append('total',$('#total').val());
        form.append('articles',$('#articles').val());

        $.ajax({
            url: '/storePack',
            type: 'post',
            data: form,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response != 0) {
                   toastr.success('Pack crée avec succès');
                   location.reload();
                } else {
                    toastr.error('Une erreur s\'est produite');
                }
            }
        });
    }


    $(document).ready(function()
    {

    });

</script>
@endsection
