<!-- pemasukan.blade.php -->

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
</style>
<script>
   setTimeout(function(){
        $(".alert").alert('close');
    }, 4000);
</script>

<!-- Modal Tambah Data -->
<div class="modal fade" id="tambahDataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content" style="background-color: #E1F0DA;">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel" style="color: black;">Tambah Data</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <!-- Form Tambah Data -->
              <form action="/member/pemasukan/post" method="post">
                  @csrf
                  <table border="0" width="460px" style="color: black;">
                      <tr>
                          <td><br> Keterangan <br><br></td>
                          <td>: <br></td>
                          <td style="width: 50px;" colspan="3">
                              <input type="text" class="form-control text-black" id="tambah_keterangan" name="nama" style="background-color: white; width: 100%;" required placeholder="masukkan keterangan">
                          </td>                          
                      </tr>
                      <tr>
                        <td><br> Jumlah <br><br></td>
                        <td>: <br></td>
                        <td style="width: 50px;" colspan="3">
                            <input type="text" class="form-control text-black" id="tambah_jumlah" name="jumlah_pemasukan" style="background-color: white; width: 100%;" required placeholder="masukkan jumlah uang">
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
<!-- End Modal Tambah Data -->

@if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="color: white;">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif







@foreach($pemasukan as $data)
{{-- edit modal --}}
<div class="container">
    
    <!-- Trigger the modal with a button -->
    
  
    <!-- Modal -->
    <div class="modal fade" id="myModal{{ $data->id }}" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content" style="background-color: #E1F0DA; color: black;">
          <div class="modal-header">
            <h3>Edit Data</h3>
            <button type="button" class="close" data-dismiss="modal">&times; &nbsp;&nbsp;</button>
            
          </div>
          <div class="modal-body">
            <form action="/member/pemasukan/{{ $data->id }}" method="POST">
                
                @csrf
                @method('PUT')

            <table border="0" width="460px" style="color: black;">
                <tr>
                    <td><br> Keterangan <br><br></td>
                    <td>: <br></td>
                    <td style="width: 50px;" colspan="3">
                        <input type="text" class="form-control text-black" id="tambah_nama" name="nama" value="{{ $data->nama }}" style="background-color: white; width: 100%;" required placeholder="masukkan keterangan">
                    </td>
                    
                </tr>
                <tr>
                  <td><br> Jumlah Pemasukan <br><br></td>
                  <td>: <br></td>
                  <td style="width: 50px;" colspan="3">
                      <input type="number" class="form-control text-black" id="jumlah_pemasukan" name="jumlah_pemasukan" value="{{ $data->jumlah_pemasukan }}" style="background-color: white; width: 100%;" required placeholder="masukkan jumlah pemasukan">
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

<div class="row">
    
    <div class="col-12 grid-margin">
      <span>
        <button type="button" class="btn btn-outline-light get-started-btn" style="border-radius: 5px; background: #3C6255;" data-toggle="modal" data-target="#tambahDataModal">&nbsp;&nbsp; Tambah Data &nbsp;&nbsp;</button>
      </span><br><br>
      <div class="card" style=" background-color: #E1F0DA">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table" border="5">
              <thead>
                <tr>
                  <th><p style="color: #114232; font-size: 17px"><b> No </b></p></th>
                  <th><p style="color: #114232; font-size: 17px"><b> Tanggal </b></p></th>
                  <th><p style="color: #114232; font-size: 17px"><b> Keterangan </b></p></th>
                  <th><p style="color: #114232; font-size: 17px"><b> Jumlah </b></p></th>
                  <th><p style="color: #114232; font-size: 17px"><b> Aksi </b></p></th>
                </tr>
              </thead>
              <tbody>
                @php
                $no = 1;
                @endphp
                @foreach ($pemasukan as $data)
                <tr>
                    <td> <p style="color: black; font-size: "><b>{{ $no++ }}</b></p></td>
                    <td><p style="color: black; font-size: "><b>{{ $data->created_at }}</b></p></td> 
                    <td><p style="color: black; font-size: "><b>{{ $data->nama }}</b></p></td>
                    <td><p style="color: black; font-size: "><b>{{ $data->jumlah_pemasukan }}</b></p></td> <!-- Assuming 'jumlah_pemasukan' is the field for Jumlah -->
                    
                    <td> 
                      <div class="action-icons">
                          <a href="#" data-toggle="modal" data-target="#myModal{{ $data->id }}" data-id="{{ $data->id }}" data-nama="{{ $data->nama }}" >
                              <img style="width: 20px; height: 20px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAAA/UlEQVR4nO2UQU7DQAxFfQVUVfLPgntUQtQmVwB1AWskiM0Jisglyo4TcAfEJbrhEoDEjgrQpJkh+xhW+ZI1URbv+1ueIZpERGq8FsebWLUKH4g6WnV8pxLHbml8EQ83fKrhMX+HJNFh58YP3b9iwq8hcHHs1PGVKpl0SfYG6xC4OM71Bpe9SU5zNxqugzmns0+SDNqwzomIls6neSwhnct/wU+MzyZ4m9dOjW/ztpQ9H7MtSXVTzcRw3xu8JJMweNaR87yk+K1x8PQS1k21KCZXhwclSUTn6tiI4X1oUjfVLGwsanjeXxx86DUfh0CHEsNWDE9dkv5STaK/1g+yob8KbkTEywAAAABJRU5ErkJggg==">
                          </a>
                          
                          <form action="/member/hapus-pemasukan/{{ $data->id }}" method="POST">
                              <div class="action-icons">
                             @csrf
                             @method('DELETE')
                             <button type="submit" class="btn btn-sm"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0,0,256,256"
                            style="fill:#000000;"><g fill="red" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(4,4)"><path d="M28,11c-1.105,0 -2,0.895 -2,2v1h-13c-1.104,0 -2,0.896 -2,2c0,1.104 0.896,2 2,2h1.16016l2.54102,30.49805c0.256,3.085 2.88447,5.50195 5.98047,5.50195h18.63672c3.096,0 5.72347,-2.41695 5.98047,-5.50195l2.54102,-30.49805h1.16016c1.104,0 2,-0.896 2,-2c0,-1.104 -0.896,-2 -2,-2h-13v-1c0,-1.105 -0.895,-2 -2,-2zM18.17383,18h27.6543l-2.51562,30.16602c-0.086,1.028 -0.96019,1.83398 -1.99219,1.83398h-18.63867c-1.033,0 -1.90914,-0.80598 -1.99414,-1.83398z"></path></g></g></svg></button>
                              </div>
                         </form>
                      </div>
                  </td>

                    {{-- <td> --}}
                        <!-- Action buttons -->
                        {{-- <a href="/pemasukan/{{ $data->id }}/edit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                <!-- Edit icon -->
                            </svg>
                        </a> --}}


                        <!-- Assuming you have a route for delete action -->
                        {{-- <form action="/member/hapus-pemasukan/{{ $data->id }}" method="POST">
                          <div class="action-icons">
                         @csrf
                         <a href="#" data-toggle="modal" data-target="#myModal{{ $data->id }}" data-id="{{ $data->id }}" data-nama="{{ $data->nama }}" ><img style="width: 20px; height: 20px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAAA/UlEQVR4nO2UQU7DQAxFfQVUVfLPgntUQtQmVwB1AWskiM0Jisglyo4TcAfEJbrhEoDEjgrQpJkh+xhW+ZI1URbv+1ueIZpERGq8FsebWLUKH4g6WnV8pxLHbml8EQ83fKrhMX+HJNFh58YP3b9iwq8hcHHs1PGVKpl0SfYG6xC4OM71Bpe9SU5zNxqugzmns0+SDNqwzomIls6neSwhnct/wU+MzyZ4m9dOjW/ztpQ9H7MtSXVTzcRw3xu8JJMweNaR87yk+K1x8PQS1k21KCZXhwclSUTn6tiI4X1oUjfVLGwsanjeXxx86DUfh0CHEsNWDE9dkv5STaK/1g+yob8KbkTEywAAAABJRU5ErkJggg=="></a>
                         @method('DELETE')
                         <button type="submit" class="btn btn-sm"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0,0,256,256"
                        style="fill:#000000;"><g fill="red" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(4,4)"><path d="M28,11c-1.105,0 -2,0.895 -2,2v1h-13c-1.104,0 -2,0.896 -2,2c0,1.104 0.896,2 2,2h1.16016l2.54102,30.49805c0.256,3.085 2.88447,5.50195 5.98047,5.50195h18.63672c3.096,0 5.72347,-2.41695 5.98047,-5.50195l2.54102,-30.49805h1.16016c1.104,0 2,-0.896 2,-2c0,-1.104 -0.896,-2 -2,-2h-13v-1c0,-1.105 -0.895,-2 -2,-2zM18.17383,18h27.6543l-2.51562,30.16602c-0.086,1.028 -0.96019,1.83398 -1.99219,1.83398h-18.63867c-1.033,0 -1.90914,-0.80598 -1.99414,-1.83398z"></path></g></g></svg></button>
                          </div>
                     </form>
                    </td> --}}
                </tr>
                @endforeach
            </tbody>
            
              <tfoot>
                <tr>
                  <td></td>
                  <td colspan="2"><p style="color: black; font-size: "><b>Total Pemasukan</b></p></td>
                  <td colspan="2"><p style="color: black; font-size: "><b>{{ $totalPemasukan }}</b></p></td> <!-- Menampilkan total pemasukan -->
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>  
@endsection
