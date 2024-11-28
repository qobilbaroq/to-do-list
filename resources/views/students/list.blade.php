@include('templates.header', ['title' => 'List Siswa'])


<div class="container mt-4">
    <div class="login-body">

        <div class="logo my-2 text-center">
            <h2>toto list</h2>
            <hr>
        </div>

        <div class="bottom">
            <h3 class="panel-title">add student</h3>
            @if (session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
            @endif
            <form method="POST" method="{{ route('list-siswa.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="input-group mb-25">
                            <span class="input-group-text"><i class="fa-regular fa-user"></i></span>
                            <input
                                type="text"
                                class="form-control"
                                placeholder="nama"
                                name="name"
                                value="{{old('name') }}">
                        </div>
                        @error ('name')
                        <div class="text-danger">
                            {{ $message}}
                        </div>
                        @enderror
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="input-group mb-25">
                            <span class="input-group-text"><i class="fa-regular fa-user"></i></span>
                            <input
                                type="text"
                                class="form-control"
                                placeholder="class"
                                name="classes"
                                value="{{old('classes') }}">
                        </div>
                        @error ('classes')
                        <div class="text-danger">
                            {{ $message}}
                        </div>
                        @enderror
                    </div>
                    <div class="col-lg-6 cal-12">
                        <div class="input-groub mb-25">
                            <span class="input-group-text"><i class="fa-regular fa-building"></i></span>
                            <select name="major" class="form-control">
                                <option value="">choose major</option>
                                <option value="PPLG">pplg</option>
                                <option value="TJKT">tjkt</option>
                                <option value="MPLB">mplb</option>
                                <option value="HOTEL">hotel</option>
                                <option value="DKV">dkv</option>
                                <option value="TSM">tsm</option>
                            </select>
                        </div>
                        @error ('major')
                        <div class="text-danger">
                            {{ $message}}
                        </div>
                        @enderror
                    </div>
                    <div class="col-lg-6 cal-12">
                        <div class="input-groub mb-25">
                            <span class="input-group-text"><i class="fa-regular fa-user"></i></span>
                            <input
                                type="date"
                                class="form-control"
                                placeholder="tambah activity"
                                name="birth_date"
                                value="{{old('birth_date') }}">
                        </div>
                        @error ('birth_date')
                        <div class="text-danger">
                            {{ $message}}
                        </div>
                        @enderror
                    </div>
                    <div class="col-lg-6 cal-12">
                        <div class="input-groub mb-25">
                            <span class="input-group-text"><i class="fa-regular fa-image"></i></span>
                            <input
                                type="file"
                                class="form-control"
                                name="photo_profile">
                        </div>
                        @error ('photo_profile')
                        <div class="text-danger">
                            {{ $message}}
                        </div>
                        @enderror
                    </div>
                    <div class="col-lg-6 cal-12">
                        <button class="btn btn-primary w-100 login-btn" type="submit">Tambah</button>
                    </div>
            </form>

            <div class="table table-responsive mt-5">
                <table class="table">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>name</th>
                            <th>class</th>
                            <th>major</th>
                            <th>profile picture</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $d)
                        <tr>
                            <td>{{ $loop->index + 1}}</td>
                            <td>{{ $d->name}}</td>
                            <td>{{ $d->classes}}</td>
                            <td>{{ $d->major}}</td>
                            <td>
                                <img width="250" height="250" src="{{$d->photo_profile}}" class="img-thumbnail w-">
                            </td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('list-siswa.show', $d->id) }}"
                                        class="btn ">
                                        <i class="fa-solid fa-edit"></i>
                                    </a>
                                    <form method="POST" action="{{ route('list-siswa.destroy', $d->id) }}">
                                        @csrf
                                        @method("delete")
                                        <button class="btn ml-3" type="submit">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@include('templates.footer')