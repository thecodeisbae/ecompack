@extends('back.layout')
@section('haut')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('content')
<main>
    <div class="container-fluid">
        <h3 class="mt-4">Trackings</h3>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Liste des trackings</li>
            </ol>
            @include('flash_message')
            
            <div class="card mb-4">
                <div class="card-header"><i class="fas fa-table mr-1"></i></div>
                    <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered btn-sm" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Utilisateur</th>
                                                <th>Localisation</th>
                                                <th>Date de connexion</th>
                                                {{-- <th>Actions</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                                @foreach($trackings as $key => $obj)
                                                    <tr>
                                                        <td>{{ $key+1 }}</td>
                                                        <td>{{ $obj->per_nom.' '.$obj->per_prenoms }}</td>
                                                        <td><strong style="color: #013c8be3">{{ $obj->pt_localisation }}</strong></td>
                                                        <td>{{ date('d-m-Y H:i:s',strtotime($obj->pt_date)) }}</td>
                                                        {{-- <td align="center">{{ date('d-m-Y',strtotime($obj->pay_date)) }}</td> --}}
                                                    </tr>
                                                @endforeach
                                        </tbody>
                                    </table>
                                </div>
                    </div>
            </div>
    </div>
</main>

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
