@extends('back.layout')
@section('haut')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('content')
<main>
    <div class="container-fluid">
        <h3 class="mt-4">Retraits</h3>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Liste des retraits</li>
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
                                                <th>Montant</th>
                                                <th>Bénéficiaire</th>
                                                <th>Contact</th>
                                                <th>Email</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                @foreach($retraits as $key => $obj)
                                                    <tr>
                                                        <td>{{ $key+1 }}</td>
                                                        <td>{{ $obj->retrait_montant }}</td>
                                                        <td>{{ $obj->per_nom.' '.$obj->per_prenoms }}</td>
                                                        <td>{{ $obj->per_contact }}</td>
                                                        <td>{{ $obj->per_email }}</td>
                                                        <td align="center">
                                                            @if($obj->retrait_flag == 1)
                                                                <a onclick="return toastr.info('La demande de retrait a été validée')" href="#" class="btn"><i class="text-primary fa fa-check"></i></a>
                                                            @elseif($obj->retrait_flag == 0)
                                                                <a onclick="return toastr.error('La demande de retrait a été rejetée')" href="#" class="btn"><i class="text-danger fa fa-close"></i></a>
                                                            @else
                                                                <a onclick="updateStatus(1,{{ $obj->retrait_id }})" href="#" class="btn"><i class="text-success fa fa-thumbs-o-up"></i></a>
                                                                <a onclick="updateStatus(0,{{ $obj->retrait_id }})" href="#" class="btn"><i class="text-danger fa fa-thumbs-o-down"></i></a>
                                                            @endif
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


 <script>

    $.ajaxSetup({

        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }

    });

    function updateStatus(status,id)
    {
        $.ajax({
            type: "post",
            url: "/updateWithdrawStatus",
            data: {status:status,id:id},
            success: function (response) {
                if (response != 0) {
                   toastr.success('Statut de la demande mis à jour');
                   location.reload();
                } else {
                    toastr.error('Une erreur s\'est produite');
                }
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
