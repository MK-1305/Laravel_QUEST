{{-- <x-guest-layout> --}}
<x-layout>
    <div class="auth-page">
        <div class="container page">
            <div class="row">
                <div class="col-md-6 offset-md-3 col-xs-12">
                    <h1 class="text-xs-center">Sign up</h1>
                    <p class="text-xs-center">
                        <a href="{{ route('login') }}">Have an account?</a>
                    </p>

                    <ul class="error-messages">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <fieldset class="form-group">
                            <input class="form-control form-control-lg" type="text" name="name" placeholder="Username" value="{{ old('name') }}" required autofocus autocomplete="name" />
                        </fieldset>

                        <fieldset class="form-group">
                            <input class="form-control form-control-lg" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="username" />
                        </fieldset>

                        <fieldset class="form-group">
                            <input class="form-control form-control-lg" type="password" name="password" placeholder="Password" required autocomplete="new-password" />
                        </fieldset>

                        <fieldset class="form-group">
                            <input class="form-control form-control-lg" type="password" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password" />
                        </fieldset>

                        <button class="btn btn-lg btn-primary pull-xs-right" type="submit">Sign up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
{{-- </x-guest-layout> --}}
