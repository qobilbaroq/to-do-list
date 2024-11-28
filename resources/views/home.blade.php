@include('templates.header', ['title' => 'ADD pages'])

<div class="main-content login-panel">
        <div class="login-body">
            <a href="/add" class="p-3"><i class="fa-duotone fa-plus"></i></a>
            
            <div class="logo my-2 text-center">
                <h2>to do list</h2>
                    <hr>
                </div>
            <div class="bottom">
                @if (session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
                @endif
                <h3 class="panel-title">todolist</h3>
                <ul>

                    @foreach($data as $d)
                    <li class="d-flex justify-content-between my-2">
                        <span>{{ $d->activity_name}}</span>
                        <div class="d-flex ">

                            <a href="/update/{{ $d->id}}" class="btn ">
                                <i class="fa-solid fa-edit"></i>
                            </a>

                            <form method="POST" action="{{ route ('delete', ['id' => $d->id]) }}">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn ">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>

                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>

@include('templates.footer')
