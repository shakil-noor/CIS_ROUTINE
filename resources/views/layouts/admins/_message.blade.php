@if(session()->has('message'))
    <div class="alert alert-success">{{ session('message') }}</div>
@endif

@if(session()->has('errorMessage'))
    <div class="alert alert-danger">{{ session('errorMessage') }}</div>
@endif