<x-layout>
<div class="auth-page">
    <div class="container page">
        <div class="row">
            <div class="col-md-6 offset-md-3 col-xs-12">
                <h1 class="text-xs-center">Sign in</h1>
                <p class="text-xs-center">
                    <a href="{{ route('register') }}">Need an account?</a>
                </p>

                <ul class="error-messages">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <fieldset class="form-group">
                        <input class="form-control form-control-lg" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus autocomplete="username" />
                    </fieldset>

                    <fieldset class="form-group">
                        <input class="form-control form-control-lg" type="password" name="password" placeholder="Password" required autocomplete="current-password" />
                    </fieldset>

                    <div class="form-group">
                        <label class="form-check-label">
                            <input type="checkbox" name="remember" class="form-check-input" /> Remember me
                        </label>
                    </div>

                    <button class="btn btn-lg btn-primary pull-xs-right" type="submit">Sign in</button>
                </form>

                @if (Route::has('password.request'))
                    <a class="text-xs-center" href="{{ route('password.request') }}">
                        Forgot password?
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>
</x-layout>
