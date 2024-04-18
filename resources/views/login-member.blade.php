@extends('layouts.form')

@section('content')
    <br>
    <div class="container">
        <div class="signup-content">
            <div class="signup-form">
                <h2 class="form-title">Masuk</h2>
                <h3 style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; margin-top: -30px; color: #747264;">Masuk untuk gunakan aplikasi Bangdul</h3><br>
                <form method="POST" class="register-form" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        @if (session('error'))
                            <div id="error-message" class="alert alert-danger" role="alert" style="color: red">
                                {{ session('error') }}
                            </div>
                            <script>
                                setTimeout(function(){
                                    document.getElementById('error-message').style.display = 'none';
                                }, 3000); // 3000 milliseconds = 3 seconds
                            </script>
                        @endif
                    </div>
                    

                    <div class="form-group">
                        <label for="email"><i class="zmdi zmdi-email"></i></label>
                        <input type="email" name="email" id="email" placeholder="Email" required/>
                    </div>

                    <div class="form-group">
                        <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                        <input type="password" name="password" id="pass" placeholder="Kata Sandi" required/>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="form-submit" style="border: none">Masuk</button>
                    </div>
                </form>
            </div>
            <div class="signup-image">
                <figure>
                    <img src="{{ asset('image/signup-image.jpg') }}" >
                </figure>
            </div>
        </div>
    </div>
    
@endsection

