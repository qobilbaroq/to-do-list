@include('templates.header', ['title' => 'ADD pages'])


<div class="main-content login-panel">
        <div class="login-body">
            
                <div class="logo my-2 text-center">
                    <h2>to to list</h2>
                    <hr>
                </div>

            <div class="bottom">
                <h3 class="panel-title">tambah activity</h3>
                <form method="POST" action="/add">
                    @csrf
                    <div class="input-group mb-25">
                        <span class="input-group-text"><i class="fa-regular fa-user"></i></span>
                        <input 
                            type="text" 
                            class="form-control" 
                            placeholder="tambah activity" 
                            name="activity_name"
                            value="{{old('activity_name') }}"
                            >
                            
                    </div>
                    @error('activity_name')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <button class="btn btn-primary w-100 login-btn">Tambah</button>
                </form>
            </div>
        </div>


@include('templates.footer')
