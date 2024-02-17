{{-- <form action="/register-member" method="post">
    @csrf
    <input type="text" name="name" placeholder="masukkan nama pengguna">
    <input type="email" name="email" placeholder="masukkan email">
    <input type="password" name="password" placeholder="masukkan password">
    <button>register</button>
</form> --}}

@extends('layouts.form')

@section('content')
<br>
  <!-- Sing in  Form -->
  <section class="sign-in">
    <div class="container">
        <div class="signin-content">
            <div class="signin-image">
                <figure>
                    <img src="{{ asset('image/signin-image.jpg') }}" >
                    </figure>
            </div>

            <div class="signin-form">
                <h2 class="form-title" >Daftar / <a style="text-decoration: none; color: #8B7E74;" href="/login-member">Masuk</a></h2>
                <h3 style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; margin-top: -30px; color: #747264;">Daftar untuk gunakan aplikasi ExpenseEase</h3><br>
                <form method="post" class="register-form" action="/register-member">
                    @csrf
                    <div class="form-group">
                        <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="text" name="name" id="your_name" placeholder="Nama Pengguna"/>
                    </div>
                    <div class="form-group">
                        <label for="email"><i class="zmdi zmdi-email"></i></label>
                        <input type="email" name="email" id="email" placeholder="Email" required/>
                    </div>
                    <div class="form-group">
                        <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                        <input type="password" name="password" id="your_pass" placeholder="Kata Sandi"/>
                    </div>
                    <div class="form-group form-button">
                        <button class="form-submit" style="border: none">Daftar</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</section>

@endsection