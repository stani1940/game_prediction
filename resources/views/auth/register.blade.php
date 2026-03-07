<x-guest-layout>
    <section style="display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        width: 100%;
    ">
        <div class="form-box" style="
            position: relative;
            width: 400px;
            height: 450px;
            background: rgba(255, 255, 255, 0.1); /* Semi-transparent for contrast */
            border: 2px solid rgba(255,255,255,0.5);
            border-radius: 20px;
            backdrop-filter: blur(15px); /* Glassmorphism effect */
            display: flex;
            justify-content: center;
            align-items: center;
        ">
            <div class="form-value">
                <h2 style="font-size: 2em;
                    color: #fff;
                    text-align: center;">
                    Register
                </h2>
                <form method="POST" enctype="multipart/form-data" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Name')"/>
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                                      required autofocus autocomplete="name"/>
                        <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                    </div>

                    <!-- Username -->
                    <div>
                        <x-input-label for="username" :value="__('Username')"/>
                        <x-text-input id="username" class="block mt-1 w-full" type="text" name="username"
                                      :value="old('username')" required autofocus autocomplete="username"/>
                        <x-input-error :messages="$errors->get('username')" class="mt-2"/>
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')"/>
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                      :value="old('email')" required autocomplete="username"/>
                        <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                    </div>

                    <div class="mt-4">
                        <x-input-label for="avatar" :value="__('Avatar')"/>
                        <x-text-input id="avatar" class="block mt-1 w-full" type="file" name="avatar"
                                      :value="old('avatar')" required/>
                        <x-input-error :messages="$errors->get('avatar')" class="mt-2"/>
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')"/>

                        <x-text-input id="password" class="block mt-1 w-full"
                                      type="password"
                                      name="password"
                                      required autocomplete="new-password"/>

                        <x-input-error :messages="$errors->get('password')" class="mt-2"/>
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')"/>

                        <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                      type="password"
                                      name="password_confirmation" required autocomplete="new-password"/>

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                           href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>

                        <x-primary-button class="ml-4">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-guest-layout>
