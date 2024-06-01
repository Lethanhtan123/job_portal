@extends('fontend.layouts.master')
@section('contents')
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">Blog</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="index.html">Home</a></li>
                            <li>Blog</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pt-120 login-register">
        <div class="container">
            <div class="row">
                <div class="mx-auto col-lg-6 col-md-6 col-sm-12">
                    <div class="login-register-cover">
                        <div class="text-center">
                            <h2 class="mb-5 text-brand-1">Register</h2>
                            <p class="font-sm text-muted mb-30">Dont have account ? Create one.</p>
                        </div>
                        <form class="mt-20 login-register text-start" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label class="form-label" for="input-1">Full Name *</label>
                                        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                            id="input-1" type="text" required="" name="name"
                                            placeholder="Steven Job" value="{{ old('name') }}">
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label class="form-label" for="input-2">Email *</label>
                                        <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                            id="input-2" type="email" required="" name="email"
                                            placeholder="stevenjob@gmail.com" value="{{ old('email') }}">
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="form-group icon-side">
                                        <label class="form-label" for="input-4">Password *</label>
                                        <input class="input-4-re1 password1 form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                            id="input-4" type="password" required="" name="password"
                                            placeholder="************">



                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />

                                            <div class="input_but input_but_register1">
                                                <span class="fas fa-eye"></span>
                                            </div>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="form-group icon-side">
                                        <label class="form-label" for="input-5">Re-Password *</label>
                                        <input
                                            class="input-4-re2 password2 form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                                            id="input-4" type="password" required="" name="password_confirmation"
                                            placeholder="************">



                                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

                                            <div class="input_but input_but_register2">
                                                <span class="fas fa-eye"></span>
                                            </div>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <hr>
                                    <h6 for="" class="mb-2">Create Account For</h6>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="account_type"
                                            id="typeCandidate" value="candidate">
                                        <label class="form-check-label" for="typeCandidate">Candidate</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="account_type" id="typeCompany"
                                            value="company">
                                        <label class="form-check-label" for="typeCompany">Company</label>
                                    </div>

                                    @if ($errors->has('account_type'))
                                        <div class="invalid-feedback d-block">
                                            {{ $errors->first('account_type') }}
                                        </div>
                                    @endif

                                </div>
                                <div class="form-group">
                                    <button class="btn btn-default hover-up w-100" type="submit" name="login">Submit
                                        &amp;
                                        Register</button>
                                </div>
                                <div class="text-center text-muted">Already have an account?
                                    <a href="{{ route('login') }}">Sign in</a>
                                </div>
                        </form>
                        {{-- <div class="mt-20 text-center">
                            <div class="divider-text-center"><span>Or continue with</span></div>
                            <button class="mt-20 btn social-login hover-up"><img
                                    src="assets/imgs/template/icons/icon-google.svg" alt="joblist"><strong>Sign up with
                                    Google</strong></button>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="mt-120"></div>
@endsection



@push('scripts')
<script>
   window.addEventListener("DOMContentLoaded", function() {
    $('.input_but_register1').click(function() {
        if ($('.input-4-re1').val()) {
            if ($(this).hasClass('active')) {
                $(this).removeClass('active');
                $('.input-4-re1').attr('type', 'password');
            } else {
                $(this).addClass('active');
                $('.input-4-re1').attr('type', 'text');
            }
            $(this).find('span').toggleClass('fa-eye-slash');
        }
    });
    $('.input_but_register2').click(function() {
        if ($('.input-4-re2').val()) {
            if ($(this).hasClass('active')) {
                $(this).removeClass('active');
                $('.input-4-re2').attr('type', 'password');
            } else {
                $(this).addClass('active');
                $('.input-4-re2').attr('type', 'text');
            }
            $(this).find('span').toggleClass('fa-eye-slash');
        }
    });
});
</script>
@endpush
