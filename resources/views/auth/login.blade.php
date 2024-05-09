<style>
.container {
    display: flex;
    justify-content: center; 
    align-items: center; 
    height: 100vh; 
}

.card {
    width: 500px; 
    border: 2px solid #ccc; 
    border-radius: 15px; 
}

.card-header {
    background-color: #FFFAF0; 
    color: black; 
    border-bottom: none; 
    border-top-left-radius: 15px; 
    border-top-right-radius: 15px; 
    height: 30px;
    text-align: left;
    padding-top: 10px;
    padding-left: 10px; 
    font-size: 20px; 
    font-weight: bold;
}

.card-body {
    padding: 30px; 
}

.form-label {
    font-weight: bold; 
}

.invalid-feedback {
    color: #dc3545; 
}

.btn-primary {
    background-color: #FFFAF0; 
    border-color: #FDF5E6; 
    transition: background-color 0.3s ease, border-color 0.3s ease; 
    border-radius: 5px; 
    margin-top: 30px;
    padding: 10px 20px;
    font-size: 15px;
}

.btn-primary:hover {
    background-color: #FFFAF0; 
    border-color: #FDF5E6; 
}

.btn-link {
    color: #007bff; 
}

.btn-link:hover {
    color: #0056b3; 
}

input.form-control {
    border-radius: 5px; 
    border: 1px solid #ccc; 
    padding: 12px; 
    font-size: 16px; 
    background-color: #FFFAF0; 
    margin-top: 10px;
    margin-bottom: 10px;
}

label.col-form-label {
    font-weight: bold; 
    font-size: 16px; 
   
}
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Окно авторизации') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="login" class="col-md-4 col-form-label text-md-end">{{ __('Логин') }}</label>

                            <div class="col-md-6">
                            <input id="login" type="text" class="form-control @error('login') is-invalid @enderror" name="login" value="{{ old('login') }}" required autocomplete="login" autofocus>

                                @error('login')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                      
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Пароль') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Оставаться в системе') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Авторизоваться') }}
                                </button>

                              
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

