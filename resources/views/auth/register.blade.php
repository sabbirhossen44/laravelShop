@extends('auth.Layout.app')

@section('content')
    <div class="wpo-login-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form class="wpo-accountWrapper" action="{{ route('postRegister') }}" method="post">
                        @csrf
                        <div class="wpo-accountInfo">
                            <div class="wpo-accountInfoHeader">
                                <a href="{{ route('root') }}"><img src="{{ asset('web/assets/images/logo-2.svg') }}"
                                        alt=""></a>
                                <a class="wpo-accountBtn" href="{{ route('login') }}">
                                    <span class="">Log in</span>
                                </a>
                            </div>
                            <div class="image">
                                <img src="{{ asset('web/assets/images/login.svg') }}" alt="">
                            </div>
                            <div class="back-home">
                                <a class="wpo-accountBtn" href="{{ route('root') }}">
                                    <span class="">Back To Home</span>
                                </a>
                            </div>
                        </div>
                        <div class="wpo-accountForm form-style">
                            <div class="fromTitle">
                                <h2>SignUp</h2>
                                <p>Sign into your pages account</p>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-12 mb-3">
                                    <label for="name">Full Name</label>
                                    <input type="text" id="name" name="name" placeholder="Your name here.."
                                        value="{{ old('name') }}">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-lg-12 col-md-12 col-12 mb-3">
                                    <label>Email</label>
                                    <input type="text" id="email" name="email" placeholder="Your email here.."
                                        value="{{ old('email') }}">
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-lg-12 col-md-12 col-12 mb-3">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input class="pwd2" type="password" placeholder="Your password here.."
                                            name="password">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default reveal3" type="button"><i
                                                    class="ti-eye"></i></button>
                                        </span>
                                    </div>
                                    @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-lg-12 col-md-12 col-12 mb-3">
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input class="pwd3" type="password" placeholder="Your password here.."
                                            name="password_confirmation">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default reveal2" type="button"><i
                                                    class="ti-eye"></i></button>
                                        </span>
                                    </div>
                                    @error('password_confirmation')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <button type="submit" class="wpo-accountBtn">SignUp</button>
                                </div>
                            </div>

                            <p class="subText">Sign into your pages account <a href="{{ route('login') }}">Login</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('style')
<style>
    .form-style input {
        margin-bottom: 0 !important;
    }
</style>
@endpush
