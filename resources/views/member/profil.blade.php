<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>

    <!-- Custom Css -->
    <link rel="stylesheet" href="style.css">

    <!-- FontAwesome 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <style>
        /* Import Font Dancing Script */
        @import url(https://fonts.googleapis.com/css?family=Dancing+Script);

        * {
            margin: 0;
        }

        body {
            background-color: #e8f5ff;
            font-family: Arial;
            overflow: hidden;
        }

        /* NavbarTop */
        .navbar-top {
            background-color: #fff;
            color: #333;
            box-shadow: 0px 4px 8px 0px grey;
            height: 70px;
        }

        .title {
            font-family: 'Dancing Script', cursive;
            padding-top: 15px;
            position: absolute;
            left: 45%;
        }

        .navbar-top ul {
            float: right;
            list-style-type: none;
            margin: 0;
            overflow: hidden;
            padding: 18px 50px 0 40px;
        }

        .navbar-top ul li {
            float: left;
        }

        .navbar-top ul li a {
            color: #333;
            padding: 14px 16px;
            text-align: center;
            text-decoration: none;
        }

        .icon-count {
            background-color: #ff0000;
            color: #fff;
            float: right;
            font-size: 11px;
            left: -25px;
            padding: 2px;
            position: relative;
        }

        /* End */

        /* Sidenav */
        .sidenav {
            background-color: #fff;
            color: #333;
            border-bottom-right-radius: 25px;
            height: 86%;
            left: 0;
            overflow-x: hidden;
            padding-top: 20px;
            position: absolute;
            top: 70px;
            width: 250px;
        }

        .profile {
            margin-bottom: 20px;
            margin-top: -12px;
            text-align: center;
            position: relative; /* Tambahkan properti position */
        }

        .profile img {
            border-radius: 50%;
            box-shadow: 0px 0px 5px 1px grey;
            cursor: pointer; /* Menambahkan pointer cursor */
        }

        .name {
            font-size: 20px;
            font-weight: bold;
            padding-top: 20px;
        }

        .job {
            font-size: 16px;
            font-weight: bold;
            padding-top: 10px;
        }

        .url, hr {
            text-align: center;
        }

        .url hr {
            margin-left: 20%;
            width: 60%;
        }

        .url a {
            color: #818181;
            display: block;
            font-size: 20px;
            margin: 10px 0;
            padding: 6px 8px;
            text-decoration: none;
        }

        .url a:hover, .url .active {
            background-color: #e8f5ff;
            border-radius: 28px;
            color: #000;
            margin-left: 14%;
            width: 65%;
        }

        /* End */

        /* Main */
        .main {
            margin-top: 2%;
            margin-left: 29%;
            font-size: 28px;
            padding: 0 10px;
            width: 58%;
        }

        .main h2 {
            color: #333;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 24px;
            margin-bottom: 10px;
        }

        .main .card {
            background-color: #fff;
            border-radius: 18px;
            box-shadow: 1px 1px 8px 0 grey;
            height: auto;
            margin-bottom: 20px;
            padding: 20px 0 20px 50px;
            margin-right: 100px;
            margin-left: -100px;
        }

        .main .card table {
            border: none;
            font-size: 16px;
            height: 270px;
            width: 80%;
            margin-left: 120px;
            margin-right: 300px;
        }

        .edit {
            position: absolute;
            color: #e7e7e8;
            right: 14%;
        }

        .social-media {
            text-align: center;
            width: 90%;
        }

        .social-media span {
            margin: 0 10px;
        }

        .fa-facebook:hover {
            color: #4267b3 !important;
        }

        .fa-twitter:hover {
            color: #1da1f2 !important;
        }

        .fa-instagram:hover {
            color: #ce2b94 !important;
        }

        .fa-invision:hover {
            color: #f83263 !important;
        }

        .fa-github:hover {
            color: #161414 !important;
        }

        .fa-whatsapp:hover {
            color: #25d366 !important;
        }

        .fa-snapchat:hover {
            color: #fffb01 !important;
        }

        /* Profile Picture */
        .profile {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            overflow: hidden;
            position: relative;
            background-color: #ccc;
            right: 40px
        }

        .profile img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .upload-icon {
            position: absolute;
            bottom: 0; /* Menyesuaikan posisi */
            right: 0; /* Menyesuaikan posisi */
            transform: translate(-50%, -50%); /* Menyesuaikan posisi */
            cursor: pointer;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 5px;
            border-radius: 50%;
        }

        .upload-icon i {
            color: #333;
            font-size: 10px;
        }
        /* End */
    </style>
</head>
<body>
   

    <!-- Main -->
    <div class="main">
        <br>
        <div class="card">
            <div class="card-body">
                
                <table>
                    <i class="fa fa-pen fa-xs edit" style="margin-right: 100px"></i>
                    <center>
                        <br>
                        <div class="profile">
                            <img id="preview-image" src="#" alt="">
                            <input class="iconya" type="file" id="upload-image" accept="image/*" onchange="previewImage(event)">
                            
                        </div>
                        
                    </center>
                    <tbody>
                        <tr>
                            <td>Nama Pengguna</td>
                            <td>:</td>
                            <td>ImDezCode</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td>imdezcode@gmail.com</td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>:</td>
                            <td>Bali, Indonesia</td>
                        </tr>
                        <tr>
                            <td>Whatsapp</td>
                            <td>:</td>
                            <td>Diving, Reading Book</td>
                        </tr>
                        <tr>
                            <td>Instagram</td>
                            <td>:</td>
                            <td>Web Developer</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td></td>
                            <td></td>
                            <td align="right"><a href="/member/dashboard">
                                <i class="fa fa-sign-out-alt" style="font-size: 24px;"></i>

                            </a></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <!-- End -->
    <script>
        // Fungsi untuk menampilkan gambar yang dipilih sebelum diunggah
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('preview-image');
                output.src = reader.result;
    
                // Simpan URL gambar ke dalam Local Storage
                localStorage.setItem('profileImage', reader.result);
            };
            reader.readAsDataURL(event.target.files[0]);
        };
    
        // Tambahkan event listener ke gambar profil untuk memicu klik pada input file saat gambar profil diklik
        document.querySelector('.profile img').addEventListener('click', function() {
            document.getElementById('upload-image').click();
        });
    
        // Periksa apakah ada URL gambar yang disimpan di Local Storage saat halaman dimuat kembali
        window.onload = function() {
            var profileImage = localStorage.getItem('profileImage');
            if (profileImage) {
                document.getElementById('preview-image').src = profileImage;
            }
        };
    </script>
    
    
</body>
</html>
