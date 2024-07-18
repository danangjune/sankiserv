@include('frontlayout.header')
@include('frontlayout.navbar')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center mt-4 mb-4">
                <h3><b>FORM PENDAFATARAN</b></h3>
            </div>
            <div class="card">
                <div class="card-header" style="background-image: url({{asset('logos')}}/nap.png);"></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nama') }}</label>
                
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                
                        <div class="row mb-3">
                            <label for="jabatan_pemohon" class="col-md-4 col-form-label text-md-end">{{ __('Jabatan') }}</label>
                
                            <div class="col-md-6">
                                <input id="jabatan_pemohon" type="text" class="form-control @error('jabatan_pemohon') is-invalid @enderror" name="jabatan_pemohon" value="{{ old('jabatan_pemohon') }}" required autocomplete="jabatan_pemohon">
                
                                @error('jabatan_pemohon')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                
                        <div class="row mb-3">
                            <label for="opd_pemohon" class="col-md-4 col-form-label text-md-end">{{ __('Asal OPD') }}</label>
                
                            <div class="col-md-6">
                                <input id="opd_pemohon" type="text" class="form-control @error('opd_pemohon') is-invalid @enderror" name="opd_pemohon" value="{{ old('opd_pemohon') }}" required autocomplete="opd_pemohon">
                
                                @error('opd_pemohon')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                
                        <div class="row mb-3">
                            <label for="no_telepon" class="col-md-4 col-form-label text-md-end">{{ __('Nomer Telepon') }}</label>
                
                            <div class="col-md-6">
                                <input id="no_telepon" type="text" class="form-control @error('no_telepon') is-invalid @enderror" name="no_telepon" value="{{ old('no_telepon') }}" required autocomplete="no_telepon">
                
                                @error('no_telepon')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>
                
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                
                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn" style="background-image: url({{asset('logos')}}/nap.png);">
                                    <b>{{ __('Daftar') }}</b>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                
                <div class="card-footer" style="background-image: url({{asset('logos')}}/nap.png);"></div>
            </div>
        </div>
    </div>
</div>
@include('frontlayout.footer')