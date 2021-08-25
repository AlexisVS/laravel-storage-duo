{{--message en cas de succes--}}
@if($message = Session::get("success"))
    <div class="alert alert-success alert-block">
        <strong>{{$message}}</strong>
    </div>
@endif

{{--message en cas de warning--}}
@if($message = Session::get("warning"))
    <div class="alert alert-warning alert-block">
        <strong>{{$message}}</strong>
    </div>
@endif    

{{--message en cas de errors--}}
@if($errors->any())
    <div class="alert alert-warning alert-block">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif 