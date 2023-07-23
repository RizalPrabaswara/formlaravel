@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Halaman Create User</h1>
    </div>

    <div class="col-lg-6 justify-content-center">
        <form method="post" action="/dashboard/users" class="mb-5" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Posisi Anda</label>
                <select class="form-select @error('jobs_id') is-invalid @enderror" aria-label="Default select example"
                    name="jobs_id">
                    @foreach ($jabatans as $jabatan)
                        <option value="{{ $jabatan->id }}" {{ old('jobs_id') == $jabatan->id ? ' selected' : ' ' }}>
                            {{ $jabatan->name }} </option>
                    @endforeach
                </select>
                @error('jobs_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name') }}" required autofocus>
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                    name="email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                    name="password" value="{{ old('password') }}" required autofocus>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Telephone</label>
                <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone"
                    name="phone" value="{{ old('phone') }}" required autofocus>
                @error('phone')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="year" class="form-label">Year</label>
                <input type="text" class="form-control @error('year') is-invalid @enderror" name="year"
                    id="datepicker" value="{{ old('year') }}" required />
                @error('year')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Negara Anda</label>
                <select class="form-select @error('countries_id') is-invalid @enderror" aria-label="Default select example"
                    name="countries_id" id="country">
                    @foreach ($countries as $country)
                        <option value="{{ $country->id }}" {{ old('countries_id') == $country->id ? ' selected' : ' ' }}>
                            {{ $country->name }}
                        </option>
                    @endforeach
                </select>
                @error('countries_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Provinsi Anda</label>
                <select class="form-select @error('cities_id') is-invalid @enderror" aria-label="Default select example"
                    name="cities_id" id="city">
                    {{-- @foreach ($cities as $city)
                        <option value="{{ $city->id }}" {{ old('id_city') == $city->id ? ' selected' : ' ' }}>
                            {{ $city->name }}
                        </option>
                    @endforeach --}}
                </select>
                @error('cities_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Kota Anda</label>
                <select class="form-select @error('districts_id') is-invalid @enderror" aria-label="Default select example"
                    name="districts_id" id="district">
                    {{-- @foreach ($districts as $district)
                        <option value="{{ $district->id }}" {{ old('id_district') == $district->id ? ' selected' : ' ' }}>
                            {{ $district->name }}
                        </option>
                    @endforeach --}}
                </select>
                @error('districts_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Skill Anda</label>
                <br />
                <select class="js-example-basic-multiple @error('skill[]') is-invalid @enderror"
                    aria-label="Default select example" name="skill[]" id="skill" multiple="multiple"
                    style="width: 100%">
                    @foreach ($skills as $skill)
                        <option value="{{ $skill->id }}" {{ old('skill') == $skill->name ? ' selected' : ' ' }}>
                            {{ $skill->name }} </option>
                    @endforeach
                </select>
                @error('skill[]')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <div>
                    <img src="" class="img-preview img-fluid mb-3" id="frame"
                        style="max-height: 500px; overflow:hidden">
                </div>
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                    name="image" onchange="preview()">
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi Anda</label>
                @error('deskripsi')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <input id="deskripsi" type="hidden" name="deskripsi" value="{{ old('deskripsi') }}">
                <trix-editor input="deskripsi"></trix-editor>
            </div>

            <button type="submit" class="btn btn-primary">Create User</button>
        </form>
    </div>
    <script>
        $(document).ready(function() {
            $(".js-example-basic-multiple").select2({
                placeholder: "Select a Skill"
            });

            function onChangeSelect(url, id, name) {
                $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        id: id
                    },
                    success: function(data) {
                        // let select = $('#' + name);
                        // select.empty();
                        $('#' + name).empty();
                        $('#' + name).append('<option>== Pilih Salah Satu ==</option>');
                        $.each(data, function(key, value) {
                            $('#' + name).append('<option value="' + key + '">' + value +
                                '</option>');
                        });
                    }
                });
            }

            $("#country").change(function() {
                var id = $(this).val();
                var url = "{{ URL::to('kota-dropdown') }}";
                var name = "city";
                onChangeSelect(url, id, name);
            });

            $("#city").change(function() {
                var id = $(this).val();
                var url = "{{ URL::to('district-dropdown') }}";
                var name = "district";
                onChangeSelect(url, id, name);
            });

        });

        $(document).ready(function() {
            $("#datepicker").datepicker({
                format: " yyyy",
                viewMode: "years",
                minViewMode: 2,
                autoclose: true
            });
        })

        function preview() {
            frame.src = URL.createObjectURL(event.target.files[0]);
        }

        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })
    </script>
@endsection
