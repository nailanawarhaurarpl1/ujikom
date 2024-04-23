@extends('layouts.member')

@section('content')

<style>
.action-icons {
  display: flex;
  align-items: center;
}
.card {
        border: 1px solid black; /* Add black border to the card */
    }
    .alert {
        position: fixed;
        bottom: 10px; /* jarak dari bawah */
        right: 10px; /* jarak dari kanan */
        z-index: 9999; 
        background-color: green;/* pastikan notifikasi berada di atas elemen lain */
    }
    .plus-button {
      width: 55px;
      height: 55px;
      background-color: green;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      position: fixed; /* Position the button */
      bottom: 20px; /* Distance from the bottom */
      right: 20px; /* Distance from the right */
    }
    .plus-button i {
      font-size: 45px;
      color: white;
    }
    .custom-card {
        height: 150px; /* Set tinggi card menjadi 150px */
        overflow: hidden; /* Sembunyikan overflow jika konten lebih panjang dari tinggi yang ditetapkan */
        position: relative; /* Tetapkan posisi relatif untuk card */
    }

    .custom-card .card-text {
        float: left; /* Posisikan teks catatan ke kiri */
        margin-right: 10px; /* Berikan jarak antara teks catatan dan tombol */
    }

    .custom-card .btn-lihat-selengkapnya {
        position: absolute; /* Tetapkan posisi absolut untuk tombol "Lihat Selengkapnya" */
        bottom: 10px; /* Atur jarak dari bagian bawah card */
        right: 10px; /* Atur jarak dari bagian kanan card */
    }
    .custom-card .btn-edit {
        position: absolute; /* Tetapkan posisi absolut untuk ikon edit */
        top: 10px; /* Atur jarak dari bagian atas card */
        right: 10px; /* Atur jarak dari bagian kanan card */
    }
        
</style>

{{-- tambah modal --}}
<div class="container">
    
  <!-- Trigger the modal with a button -->
  

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="background-color: #E1F0DA; color: black;">
        <div class="modal-header">
          <h3>Tambah Pengingat</h3>
          <button type="button" class="close" data-dismiss="modal">&times; &nbsp;&nbsp;</button>
          
        </div>
        <div class="modal-body">
          
          <form action="/member/pengingat/post" method="post">
            @csrf
          <table border="5" width="460px" style="color: black;">
            <table border="0" width="460px" style="color: black;">
              <tr>
                  <td><br> Tanggal <br><br></td>
                  <td>: <br></td>
                  <td style="width: 50px;" colspan="3">
                    <input type="date" class="form-control text-black" id="tambah_tanggal" name="tanggal" style="background-color: white; width: 100%;" required placeholder="masukkan tanggal">

                  </td>                          
              </tr>
              <tr>
                <td><br> Catatan <br><br></td>
                <td>: <br></td>
                <td style="width: 50px;" colspan="3">
                  <input type="text" class="form-control text-black" id="tambah_catatan" name="catatan" style="background-color: white; width: 100%;" required placeholder="masukkan catatan">

                </td>                          
            </tr>
              
              <tr>
                  <td colspan="4"></td>
                  <td align="right"><br><span>
                      <button type="submit" class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-green-400 to-blue-600 group-hover:from-green-400 group-hover:to-blue-600 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800">
                          <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0"
                          style="color: black;" 
                          onmouseover="this.style.color='#40A2E3';" 
                          onmouseout="this.style.color='black';">
                              Simpan Perubahan
                          </span>
                      </button>
                      
                      </span></td>
              </tr>
          </table>
        </form>
      
        </div>
      </div>
      
    </div>
  </div>
  
</div>
{{-- end tambah modal --}}
@if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="color: white;">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif




{{-- edit modal --}}
@foreach($pengingat as $item)
{{-- edit modal --}}
<div class="container">
    
    <!-- Trigger the modal with a button -->
    
  
    <!-- Modal -->
    <div class="modal fade" id="editModal{{ $item->id }}" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content" style="background-color: #E1F0DA; color: black;">
          <div class="modal-header">
            <h3>Edit Data</h3>
            <button type="button" class="close" data-dismiss="modal">&times; &nbsp;&nbsp;</button>
            
          </div>
          <div class="modal-body">
            <form action="/member/pengingat/{{ $item->id }}" method="POST">
                
                @csrf
                @method('PUT')

            <table border="0" width="460px" style="color: black;">
                <tr>
                    <td><br> Tanggal <br><br></td>
                    <td>: <br></td>
                    <td style="width: 50px;" colspan="3">
                        <input type="date" class="form-control text-black" id="tambah_tanggal" name="tanggal" value="{{ $item->tanggal }}" style="background-color: white; width: 100%;" required placeholder="masukkan tanggal">
                    </td>
                    
                </tr>
                <tr>
                  <td><br> Catatan <br><br></td>
                  <td>: <br></td>
                  <td style="width: 50px;" colspan="3">
                      <input type="text" class="form-control text-black" id="catatan" name="catatan" value="{{ $item->catatan }}" style="background-color: white; width: 100%;" required placeholder="masukkan catatan">
                  </td>
                  
              </tr>
                <tr>
                    <td colspan="4"></td>
                    <td align="right"><br><span>
                        <button type="submit" class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-green-400 to-blue-600 group-hover:from-green-400 group-hover:to-blue-600 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800">
                            <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0"
                            style="color: black;" 
                            onmouseover="this.style.color='#40A2E3';" 
                            onmouseout="this.style.color='black';">
                                Simpan Perubahan
                            </span>
                        </button>
                        
                        </span></td>
                </tr>
            </table>
        </form>
          </div>
        </div>
        
      </div>
    </div>
    
  </div>
  
  @endforeach

{{-- end edit modal --}}


@if($pengingat->isEmpty())
    <p>Tidak ada pengingat yang tersimpan.</p>
@else
    <ul>
      
    
      <div class="container">
        <div class="row">
            @foreach($pengingat as $item)
            @php
            $catatan = $item->catatan;
            $showButton = false;
    
            // Cek apakah panjang catatan melebihi tinggi card
            if(strlen($catatan) > 100) {
                // Jika ya, potong catatan menjadi 100 karakter dan tambahkan "Lihat Selengkapnya"
                $catatan = substr($catatan, 0, 100) . '...';
                $showButton = true;
            }
            @endphp
            <div class="col-md-4">
                <div class="card custom-card" style="margin-bottom: 20px">
                    <div class="card-body">
                      <table border="0" class="btn-edit">
                        <tr>
                          <td>
                            <a href="#" data-toggle="modal" data-target="#editModal{{ $item->id }}" data-id="{{ $item->id }}" data-catatan="{{ $item->catatan }}"  >
                              <img style="width: 20px; height: 20px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAAA/UlEQVR4nO2UQU7DQAxFfQVUVfLPgntUQtQmVwB1AWskiM0Jisglyo4TcAfEJbrhEoDEjgrQpJkh+xhW+ZI1URbv+1ueIZpERGq8FsebWLUKH4g6WnV8pxLHbml8EQ83fKrhMX+HJNFh58YP3b9iwq8hcHHs1PGVKpl0SfYG6xC4OM71Bpe9SU5zNxqugzmns0+SDNqwzomIls6neSwhnct/wU+MzyZ4m9dOjW/ztpQ9H7MtSXVTzcRw3xu8JJMweNaR87yk+K1x8PQS1k21KCZXhwclSUTn6tiI4X1oUjfVLGwsanjeXxx86DUfh0CHEsNWDE9dkv5STaK/1g+yob8KbkTEywAAAABJRU5ErkJggg==">
                          </a>
                          </td>
                          <td>
                            <form action="/member/hapus-pengingat/{{ $item->id }}" method="POST">
                              <div class="action-icons">
                             @csrf
                             @method('DELETE')
                             <button type="submit" class="btn btn-sm"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0,0,256,256"
                            style="fill:#000000;"><g fill="red" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(4,4)"><path d="M28,11c-1.105,0 -2,0.895 -2,2v1h-13c-1.104,0 -2,0.896 -2,2c0,1.104 0.896,2 2,2h1.16016l2.54102,30.49805c0.256,3.085 2.88447,5.50195 5.98047,5.50195h18.63672c3.096,0 5.72347,-2.41695 5.98047,-5.50195l2.54102,-30.49805h1.16016c1.104,0 2,-0.896 2,-2c0,-1.104 -0.896,-2 -2,-2h-13v-1c0,-1.105 -0.895,-2 -2,-2zM18.17383,18h27.6543l-2.51562,30.16602c-0.086,1.028 -0.96019,1.83398 -1.99219,1.83398h-18.63867c-1.033,0 -1.90914,-0.80598 -1.99414,-1.83398z"></path></g></g></svg></button>
                              </div>
                         </form>
                          </td>
                        </tr>
                      </table>


                      

                    


                     



                        <h5 class="card-title">{{ $item->tanggal }}</h5>
                        <p class="card-text">{{ $catatan }}</p>
                        @if($showButton)
                        <button type="button" class="btn btn-link btn-lihat-selengkapnya" data-toggle="modal" data-target="#exampleModal{{ $item->id }}">
                            Lihat Selengkapnya
                        </button>
                        @endif
                    </div>
                </div>
            </div>
    
            <!-- Modal -->
            <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Catatan Lengkap</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{ $item->catatan }}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>


    </ul>
@endif


<p style="color: black; font-size: "><b>
  <div class="plus-button" data-toggle="modal" data-target="#myModal">
    <i class="bi bi-plus"></i> 
  </div>
</b></p>


@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.1/dist/js.cookie.min.js"></script>
<script>
    var datauser = Cookies.get('userData');
    if (datauser) {
        var userDataObject = JSON.parse(datauser);
        if (userDataObject.roles != 'member') {
            window.location = '/login';
        }
    } else {
        window.location = '/login';
    }
</script>
<script>
  function redirectToEdit(id) {
      window.location = '/member/pengingat/' + id + '/edit';
  }
</script>
<script>
  function openEditModal(route) {
      // Lakukan AJAX request untuk mengambil data pengingat
      $.get(route, function (data) {
          $('#edit_tanggal').val(data.tanggal); // Isi tanggal
          $('#edit_catatan').val(data.catatan); // Isi catatan
      });

      $('#editModal form').attr('action', route); // Set action form edit modal
      $('#editModal').modal('show'); // Tampilkan modal edit
  }
</script>

@endsection
