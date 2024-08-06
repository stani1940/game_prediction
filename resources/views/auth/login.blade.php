<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <section style="display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    width: 100%;

    background: url('/storage/images/background_section.jpg') no-repeat center;
    background-size: cover;">
    <div class="form-box" style="
    position: relative;
    width: 400px;
    height: 450px;
    background: transparent;
    border: 2px solid rgba(255,255,255,0.5);
    border-radius: 20px;
    backdrop-filter: blur(15px);
    display: flex;
    justify-content: center;
    align-items: center;
">
        <div class="form-value">
            <h2 style=" font-size: 2em;
    color: #fff;
    text-align: center;">Login</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="inputbox" style=" position: relative;
    margin: 30px 0;
    width: 310px;
    border-bottom: 2px solid #fff;">
            <x-input-label for="email" :value="__('Email')" style="  position: absolute;
    top: 50%;
    left: 5px;
    transform: translateY(-50%);
    color: #fff;
    font-size: 1em;
    pointer-events: none;
    transition: .5s;"/>
            <x-text-input id="email" style=" width: 100%;
    height: 50px;
    background: transparent;
    border: none;
    outline: none;
    font-size: 1em;
    padding:0 35px 0 5px;
    color: #fff;" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div  class="inputbox" style=" position: relative;
    margin: 30px 0;
    width: 310px;
    border-bottom: 2px solid #fff;">
            <x-input-label for="password" :value="__('Password')" style="  position: absolute;
    top: 50%;
    left: 5px;
    transform: translateY(-50%);
    color: #fff;
    font-size: 1em;
    pointer-events: none;
    transition: .5s;" />

            <x-text-input id="password" style=" width: 100%;
    height: 50px;
    background: transparent;
    border: none;
    outline: none;
    font-size: 1em;
    padding:0 35px 0 5px;
    color: #fff;"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-black border-gray-300 dark:border-gray-700 text-black-50 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ml-2 text-xl text-black-50 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

            <x-primary-button style="width: 100%;
    height: 40px;
    border-radius: 40px;
    background: #fff;
    border: none;
    outline: none;
    cursor: pointer;
    font-size: 1em;
    font-weight: 600;
    text-align: center">
                {{ __('Log in') }}
            </x-primary-button>
            <div class="register" style=" font-size: .9em;
    color: #fff;
    text-align: center;
    margin: 25px 0 10px;">
                <p>Don't have a account <a href="#" style=" text-decoration: none;
    color: #fff;
    font-weight: 600;">Register</a></p>
            </div>

    </form>
        </div>
    </div>
    </section>
</x-guest-layout>
