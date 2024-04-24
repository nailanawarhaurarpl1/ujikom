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
                        <td><br> Role <br><br></td>
                        <td>: <span id="user-roles"></span><br></td>
                    </tr>
                    <tr>
                        <td><br> Nama Pengguna <br><br></td>
                        <td>: <span id="user-name"></span><br></td>
                    </tr>
                    <tr>
                        <td><br> Email <br><br></td>
                        <td>: <span id="user-email"></span><br></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="text-align: right;"><span id="user-created-at" style="font-size: 10px;"></span><br></td>
                    </tr>
                    
                </table>
            </div>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-12 grid-margin">
        <div class="card" style=" background-color: #E1F0DA">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" border="5">
                        <thead>
                            <tr>
                                <th><p style="color: #114232; font-size: 17px"><b> No </b></p></th>
                                <th><p style="color: #114232; font-size: 17px"><b> Tanggal Daftar </b></p></th>
                                <th><p style="color: #114232; font-size: 17px"><b> Role </b></p></th>
                                <th><p style="color: #114232; font-size: 17px"><b> Nama Pengguna </b></p></th>
                                <th><p style="color: #114232; font-size: 17px"><b> Email </b></p></th>
                                <th><p style="color: #114232; font-size: 17px"><b> Aksi </b></p></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $number = 0; // Ubah inisialisasi $number menjadi 0
                            @endphp
                           @foreach($users as $user)
                           @if($user->roles == 'member')
                               @php
                                   $number++; // Increment $number for each member user
                                   $formattedDate = \Carbon\Carbon::parse($user->created_at)->format('d-m-Y');
                               @endphp
                               <tr>
                                   <td><p style="color: black; font-size: "><b>{{ $number }}</b></p></td>
                                   <td id="user-created-at-{{ $loop->iteration }}"><p style="color: black; font-size: "><b>{{ $formattedDate }}</b></p></td>
                                   <td id="user-roles-{{ $loop->iteration }}"><p style="color: black; font-size: "><b>{{ $user->roles }}</b></p></td>
                                   <td id="user-name-{{ $loop->iteration }}"><p style="color: black; font-size: "><b>{{ $user->name }}</b></p></td>
                                   <td id="user-email-{{ $loop->iteration }}"><p style="color: black; font-size: "><b>{{ $user->email }}</b></p></td>
                                   <td> 
                                       <div class="action-icons">
                                           <p style="color: black; font-size: "><b>
                                               <a href="#" class="user-detail" data-number="{{ $number }}" data-baris="{{ $loop->iteration }}" data-toggle="modal" data-target="#DataUsers">
                                                   <i class="bi bi-eye" style="font-size: 18px; margin-left: 10px"></i>
                                               </a>
                                           </b></p>
                                       </div>
                                   </td>
                               </tr>
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
<!-- Perubahan pada script JavaScript -->
<script>
    $(document).ready(function() {
        $('.user-detail').click(function() {
            console.log('Klik berhasil');
            var nomorBaris = $(this).data('baris');
            var nomorUrut = $(this).data('number');
            var nama = $('#user-name-' + nomorBaris).text();
            var roles = $('#user-roles-' + nomorBaris).text();
            var email = $('#user-email-' + nomorBaris).text();
            var created_at = $('#user-created-at-' + nomorBaris).text();
            $('#user-name').text(nama);
            $('#user-roles').text(roles);
            $('#user-email').text(email);
            $('#user-created-at').text(created_at);
            $('#user-number').text(nomorUrut); // Tampilkan nomor urut di modal
        });
    });
</script>
@endpush
