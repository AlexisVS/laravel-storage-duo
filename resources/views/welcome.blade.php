@extends("template.index")
@include("template.flash")
@section('content')
    <div class="d-flex py-5">
        <div class="w-50 d-flex flex-column  align-items-center">
            <h2 class="text-center">Genre</h2>
            <form action="/genre" method="post">
                @csrf
                <input type="text" name="gender" id="">
                <input type="submit" value="Sauver">
            </form>
        </div>
        <div class="w-50 d-flex flex-column  align-items-center">
            <h2 class="text-center">Membre</h2>
            <form class="d-flex flex-column justify-content-center align-items-center" action="/membre" method="post"
                enctype="multipart/form-data">
                @csrf
                <input class="my-2" type="file" name="img" id="">
                <input class="my-2" type="text" name="name" id="">
                <input class="my-2" type="number" name="age" id="">
                <select class="my-2" name="gender" id="">
                    @foreach ($genders as $gender)
                        <option value="{{ $gender->gender }}">{{ $gender->gender }}</option>
                    @endforeach
                </select>
                <input class="my-2" type="submit" value="Sauver">
            </form>
        </div>
    </div>
    <hr>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Nom</th>
                <th scope="col">Age</th>
                <th scope="col">Genre</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($members as $member)
                <tr
                    class="{{ ($member->gender == 'Homme') | ($member->gender == 'homme') ? 'table-danger' : (($member->gender == 'Femme') | ($member->gender == 'femme') ? 'table-primary' : null) }}">
                    <th scope="row">{{ $member->id }}</th>
                    <td><img
                        style=" {{ !Str::contains($member->gender, ['Homme', "homme", "Femme", "femme"]) ? "border-radius: 100%" : null }}"
                        width="320" height="180" src="storage/img/{{ $member->img }}" alt=""></td>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->age }}</td>
                    <td>{{ $member->gender }}</td>
                    <td><a class="btn btn-primary text-white" href="/membre/{{ $member->id }}/download">Download</a></td>
                    <td><a class="btn btn-primary text-white" href="/membre/{{ $member->id }}/edit">Editer</a></td>
                    <td>
                        <form action="/member/{{ $member->id }}" method="POST">
                            @csrf
                            @method("DELETE")
                            <input class="btn btn-danger text-white" type="submit" value="X">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
