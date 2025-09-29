<x-guest-layout>
    <style>
        {{---- Include your provided CSS ----}}
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: "Poppins", sans-serif; }
        :root {
            --primary-color: #520000;
            --secondary-color: #8f0002;
            --accent-color: #ffc107;
            --light-bg: #f9f5db;
            --text-light: #ffffff;
            --text-dark: #333333;
            --error-color: #dc3545;
            --border-radius: 8px;
            --box-shadow: 0 0 30px rgba(0, 0, 0, .2);
        }
        body {
            display: flex; justify-content: center; align-items: center;
            min-height: 100vh;
            background: linear-gradient(135deg, var(--light-bg) 0%, #e8f4f8 100%);
        }
        .container {
            position: relative;
            width: 420px; padding: 40px;
            background: #fff;
            border-radius: 20px;
            box-shadow: var(--box-shadow);
            text-align: center;
        }
        .container h1 {
            font-size: 28px;
            color: var(--primary-color);
            margin-bottom: 10px;
        }
        .college-logo {
            width: 80px; height: 80px;
            border-radius: 50%;
            background: white;
            padding: 8px; margin: 0 auto 15px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.15);
        }
        .input-box {
            margin: 20px 0;
            text-align: left;
        }
        .input-box input {
            width: 100%;
            padding: 12px 15px;
            border-radius: var(--border-radius);
            border: 1px solid #ddd;
            background: #f9f9f9;
            font-size: 14px;
            outline: none;
            transition: border .3s, box-shadow .3s;
        }
        .input-box input:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 2px rgba(255,193,7,.2);
        }
        .forgot-link {
            text-align: right;
            margin: -5px 0 15px;
        }
        .forgot-link a {
            font-size: 13px; color: var(--primary-color);
            transition: .3s;
        }
        .forgot-link a:hover { color: var(--secondary-color); }
        .btn {
            width: 100%; height: 46px;
            background: var(--primary-color);
            color: var(--text-light);
            border: none; border-radius: var(--border-radius);
            font-size: 15px; font-weight: 600;
            cursor: pointer;
            transition: background .3s, transform .2s;
        }
        .btn:hover { background: var(--secondary-color); transform: translateY(-2px); }
        .remember {
            display: flex; align-items: center; gap: 8px;
            font-size: 13px; color: #666;
            margin-bottom: 15px;
        }
        .alert {
            font-size: 13px;
            margin-bottom: 10px;
            color: var(--error-color);
        }
    </style>

    <div class="container">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="college-logo">
        <h1>Login</h1>

        <!-- Session Status -->
        <x-auth-session-status class="alert" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="input-box">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" type="email" name="email"
                    :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="alert" />
            </div>

            <!-- Password -->
            <div class="input-box">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="alert" />
            </div>

            <!-- Remember Me -->
            <div class="remember">
                <input id="remember_me" type="checkbox" name="remember">
                <label for="remember_me">{{ __('Remember me') }}</label>
            </div>

            <!-- Forgot + Login -->
            <div class="forgot-link">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
                @endif
            </div>

            <button type="submit" class="btn">{{ __('Log in') }}</button>
        </form>
    </div>
</x-guest-layout>
