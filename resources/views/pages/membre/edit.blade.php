@extends("template.index")
@include("template.flash")
@section('content')
    <div class="container mx-auto">
        <form class="d-flex flex-column justify-content-center align-items-center" action="/membre/{{ $membre->id }}"
            method="post" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <input class="my-2" value="{{ $membre->img }}" type="file" name="img" id="">
            <input class="my-2" value="{{ $membre->name }}" type="text" name="name" id="">
            <input class="my-2" value="{{ $membre->age }}" type="number" name="age" id="">
            <select class="my-2" selected="{{ $membre->gender }}" name="gender" id="">
                @foreach ($genders as $gender)
                    <option value="{{ $gender->gender }}">{{ $gender->gender }}</option>
                @endforeach
            </select>
            <input class="my-2" type="submit" value="Sauver">
        </form>
    </div>
@endsection
