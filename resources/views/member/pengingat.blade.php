@extends('layouts.member')

@section('content')

<style>
  /* Your custom styles here */
  .circle {
    position: fixed;
    bottom: 70px;
    right: 30px;
    width: 55px;
    height: 55px;
    background-color: #337357;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 35px;
    cursor: pointer;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
  }
</style>

<!-- Circle with button -->
<!-- Circle with button -->
<div class="circle">
    <button >+</button>
  </div>
  
  

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

@endsection
