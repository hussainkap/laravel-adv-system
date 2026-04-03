

<style>
    :root {
  --bg-color: #f9fafb;
  --card-bg: #ffffff;
  --text-main: #111827;
  --text-muted: #6b7280;
  --accent: #000000; /* Minimalist black button */
  --border: #e5e7eb;
}

body {
  margin: 0;
  font-family: 'Inter', sans-serif;
  background-color: var(--bg-color);
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100vh;
}

.login-form {
  background: var(--card-bg);
  padding: 2.5rem;
  border-radius: 12px;
  box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
  width: 100%;
  max-width: 400px;
}

h2 {
  margin: 0 0 0.5rem;
  font-size: 1.5rem;
  font-weight: 600;
  color: var(--text-main);
}

.subtitle {
  color: var(--text-muted);
  margin-bottom: 2rem;
  font-size: 0.875rem;
}

.input-group {
  margin-bottom: 1.25rem;
}

label {
  display: block;
  font-size: 0.875rem;
  font-weight: 500;
  margin-bottom: 0.5rem;
  color: var(--text-main);
}

input {
  width: 100%;
  padding: 0.75rem;
  border: 1px solid var(--border);
  border-radius: 8px;
  font-size: 1rem;
  box-sizing: border-box;
  transition: border-color 0.2s;
}

input:focus {
  outline: none;
  border-color: var(--accent);
}

.login-btn {
  width: 100%;
  padding: 0.75rem;
  background: var(--accent);
  color: white;
  border: none;
  border-radius: 8px;
  font-size: 1rem;
  font-weight: 500;
  cursor: pointer;
  margin-top: 1rem;
}

.signup-link {
  text-align: center;
  font-size: 0.875rem;
  color: var(--text-muted);
  margin-top: 1.5rem;
}

.signup-link a, .forgot-pass {
  color: var(--accent);
  text-decoration: none;
  font-weight: 600;
}
</style>

{{-- <x-guest-layout> --}}
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-[#fbfbfb]">
        <div class="w-full sm:max-w-md mt-6 px-10 py-12 bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07)] rounded-2xl">
            
            <div class="mb-10 text-center">
                <h2 class="text-2xl font-semibold text-gray-900 tracking-tight">Create Account</h2>
                <p class="text-sm text-gray-500 mt-2">Join us by entering your details below.</p>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-5">
                    <x-input-label for="name" :value="__('Full Name')" class="text-xs uppercase tracking-widest text-gray-400 font-bold mb-1" />
                    <x-text-input id="name" class="block mt-1 w-full border-gray-200 focus:border-black focus:ring-0 rounded-lg py-3 px-4 transition-all" type="text" name="name" :value="old('name')" required autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-1" />
                </div>

                <div class="mb-5">
                    <x-input-label for="email" :value="__('Email Address')" class="text-xs uppercase tracking-widest text-gray-400 font-bold mb-1" />
                    <x-text-input id="email" class="block mt-1 w-full border-gray-200 focus:border-black focus:ring-0 rounded-lg py-3 px-4 transition-all" type="email" name="email" :value="old('email')" required />
                    <x-input-error :messages="$errors->get('email')" class="mt-1" />
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                    <div>
                        <x-input-label for="password" :value="__('Password')" class="text-xs uppercase tracking-widest text-gray-400 font-bold mb-1" />
                        <x-text-input id="password" class="block mt-1 w-full border-gray-200 focus:border-black focus:ring-0 rounded-lg py-3 px-4" type="password" name="password" required />
                    </div>
                    <div>
                        <x-input-label for="password_confirmation" :value="__('Confirm')" class="text-xs uppercase tracking-widest text-gray-400 font-bold mb-1" />
                        <x-text-input id="password_confirmation" class="block mt-1 w-full border-gray-200 focus:border-black focus:ring-0 rounded-lg py-3 px-4" type="password" name="password_confirmation" required />
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="col-span-2 mt-1" />
                </div>

                <div class="flex flex-col gap-4">
                    <x-primary-button class="w-full justify-center bg-black hover:bg-gray-800 text-white py-4 rounded-lg font-semibold transition-all">
                        {{ __('Sign Up') }}
                    </x-primary-button>

                    <div class="text-center">
                        <a class="text-sm text-gray-400 hover:text-black transition-colors" href="{{ route('login') }}">
                            {{ __('Already have an account?') }}
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
{{-- </x-guest-layout> --}}