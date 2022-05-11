@extends('back.layout')
@section('haut')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('content')
<main>
    <div class="container-fluid">
        <h3 class="mt-4">Articles</h3>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Liste des articles</li>
            </ol>
            @include('flash_message')
            
            <div class="card mb-4">
                <div class="card-header"><i class="fas fa-table mr-1"></i></div>
                    <div class="card-body">
                                <div class="table-responsive">
                                    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#createPack">Ajouter un article</button>
                                    <table class="table table-bordered btn-sm" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Image</th>
                                                <th>Nom</th>
                                                <th>Prix</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                @foreach($articles as $key => $obj)
                                                    <tr>
                                                        <td>{{ $key+1 }}</td>
                                                        <td style="width:200px" align="center"><img width="100%" src="{{ asset("storage/fichiers/$obj->article_file") }}" alt=""></td>
                                                        <td>{{ $obj->article_nom }}</td>
                                                        <td>{{ $obj->article_prix }}</td>
                                                        <td align="center">
                                                            <a href="#" data-toggle="modal" onclick="getItem({{ $obj->article_id }})" data-target="#updateItem" class="btn"><i class="text-primary fa fa-edit"></i></a>
                                                            <a href="/admin/deleteItem/{{ $obj->article_id }}" onclick="return confirm('Supprimer cet article');"  class="btn"><i class="text-danger fa fa-trash"></i></a>
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

<div id="createPack" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter un article</h5>
                    <button type="button" class="btn" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body m-2">
                    <div class="form-group">
                        <label for="nom">Nom de l'article</label>
                        <input id="nom" class="form-control" type="text" name="nomPack">
                    </div>
                    <div class="form-group">
                        <label for="nom">Prix</label>
                        <input id="montant" class="form-control" type="number" name="montant" min="0" step="0.01">
                    </div>
                    <div class="form-group mb-4">
                        <label for="nom">Image</label>
                        <input id="image" class="form-control-file" type="file" name="image">
                    </div>
                    <div class="row justify-content-between m-0">
                        <button type="button" class="btn btn-danger col-md-3" data-dismiss="modal" aria-label="Close">Fermer</button>
                        <button type="button" class="btn btn-primary col-md-3" onclick="saveItem()" aria-label="Enregistrer">Enregistrer</button>
                    </div>
                </div>
        </div>
    </div>
</div>

<div id="updateItem" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modifier un article</h5>
                    <button type="button" class="btn" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body m-2">
                    <input id="eid" class="form-control" hidden type="number" name="eid">
                    <div class="form-group">
                        <label for="nom">Nom de l'article</label>
                        <input id="enom" class="form-control" type="text" name="nomPack">
                    </div>
                    <div class="form-group">
                        <label for="nom">Prix</label>
                        <input id="emontant" class="form-control" type="number" name="montant" min="0" step="0.01">
                    </div>
                    <div class="form-group mb-4">
                        <label for="nom">Image</label>
                        <input id="eimage" class="form-control-file" type="file" name="image">
                    </div>
                    <div class="row justify-content-between m-0">
                        <button type="button" class="btn btn-danger col-md-3" data-dismiss="modal" aria-label="Close">Fermer</button>
                        <button type="button" class="btn btn-primary col-md-3" onclick="updateItem()" aria-label="Mettre à jour">Mettre à jour</button>
                    </div>
                </div>
        </div>
    </div>
</div>

 <script>

    $.ajaxSetup({

        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }

    });

    
    function getItem(id)
    {
        $.ajax({
            type: "post",
            url: "/getItem",
            data: {id:id},
            success: function (response) {
                var response = JSON.parse(response);
               
                $('#eid').val(response.article_id);
                $('#enom').val(response.article_nom);
                $('#emontant').val(response.article_prix);
            }
        });
    }

    function saveItem()
    {
        var form = new FormData();
        var files = $('#image')[0].files;
        form.append('nom',$('#nom').val());
        form.append('montant',$('#montant').val());
        form.append('file',files[0]);

        $.ajax({
            url: '/storeItem',
            type: 'post',
            data: form,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response != 0) {
                   toastr.success('Article ajouté avec succès');
                   setTimeout(() => {
                    location.reload();
                   }, 1000);
                } else {
                    toastr.error('Une erreur s\'est produite');
                }
            }
        });
    }

    function updateItem()
    {
        var form = new FormData();
        var files = $('#eimage')[0].files;
        form.append('id',$('#eid').val());
        form.append('nom',$('#enom').val());
        form.append('montant',$('#emontant').val());
        form.append('file',files[0]);

        $.ajax({
            url: '/updateItem',
            type: 'post',
            data: form,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response != 0) {
                toastr.success('Article modifié avec succès');
                setTimeout(() => {
                    location.reload();
                   }, 1000);
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
