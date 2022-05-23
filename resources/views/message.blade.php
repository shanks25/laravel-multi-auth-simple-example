@if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <strong>{{ $message }}</strong>
    </div>
@endif

@if (session()->has('error'))
    <p class="alert alert-danger">{{ session('error') }}</p>
@endif
@if (count($errors) > 0)
    @foreach ($errors->all() as $error)
        <p class="alert alert-danger">{{ $error }}</p>
    @endforeach
@endif
