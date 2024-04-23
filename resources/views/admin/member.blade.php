@extends('layouts.admin')

@section('content')
<!-- Modal  -->
<div class="modal fade" id="DataUsers" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: #E1F0DA;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="color: black;">Data Member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table border="0" width="460px" style="color: black;">
                    <tr>
                        <td><br> Nama Pengguna <br><br></td>
                        <td>: <span id="user-name"></span><br></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><br> Email <br><br></td>
                        <td>: <span id="user-email"></span><br></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- End Modal  -->

<div class="row">
    <div class="col-12 grid-margin">
        <div class="card" style=" background-color: #E1F0DA">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" border="5">
                        <thead>
                            <tr>
                                <th><p style="color: #114232; font-size: 17px"><b> No </b></p></th>
                                <th><p style="color: #114232; font-size: 17px"><b> Role </b></p></th>
                                <th><p style="color: #114232; font-size: 17px"><b> Nama Pengguna </b></p></th>
                                <th><p style="color: #114232; font-size: 17px"><b> Email </b></p></th>
                                <th><p style="color: #114232; font-size: 17px"><b> Aksi </b></p></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $number = 1;
                            @endphp
                            
                            @foreach($users as $user)
                                @if($user->roles == 'member')
                                    <tr>
                                        <td><p style="color: black; font-size: "><b>{{ $number }}</b></p></td>
                                        <td><p style="color: black; font-size: "><b>{{ $user->roles }}</b></p></td>
                                        <td id="user-name-{{ $loop->iteration }}"><p style="color: black; font-size: "><b>{{ $user->name }}</b></p></td>
                                        <td id="user-email-{{ $loop->iteration }}"><p style="color: black; font-size: "><b>{{ $user->email }}</b></p></td>
                                        <td> 
                                            <div class="action-icons">
                                                <p style="color: black; font-size: "><b>
                                                    <a href="#" class="user-detail" data-baris="{{ $loop->iteration }}" data-toggle="modal" data-target="#DataUsers">
                                                        &nbsp;&nbsp;<i class="bi bi-eye" style="font-size: 18px"></i>
                                                    </a>
                                                </b></p>
                                            </div>
                                        </td>
                                    </tr>
                                    @php
                                        $number++;
                                    @endphp
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>  
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.user-detail').click(function() {
            console.log('Klik berhasil');
            var nomorBaris = $(this).data('baris');
            var nama = $('#user-name-' + nomorBaris).text();
            var email = $('#user-email-' + nomorBaris).text();
            $('#user-name').text(nama);
            $('#user-email').text(email);
        });
    });
</script>
@endpush
