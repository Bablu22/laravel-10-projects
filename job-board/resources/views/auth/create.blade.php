<div>
    <x-layout class="min-h-screen flex items-center justify-center max-w-lg mx-auto ">
        <x-card class="mx-auto w-full mt-10">
            <h2 class="text-2xl font-semibold mb-6 text-center">Login</h2>
            <form action="{{ route('auth.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <x-label for="email" :required="true">Email</x-label>
                    <x-text-input type="email" name="email" />
                </div>
                <div class="mb-6">
                    <x-label for="password" :required="true">Password</x-label>
                    <x-text-input type="password" name="password" />
                </div>
                <div class="flex justify-between items-center mb-4 font-semibold">
                    <div class="flex items-center">
                        <input type="checkbox" id="remember" name="remember"
                            class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                        <label for="remember" class="ml-2 block text-sm text-gray-900">Remember Me</label>
                    </div>
                    <div class="text-sm text-gray-600 ">
                        <a href="#" class="hover:text-indigo-600">Forgot Password?</a>
                    </div>
                </div>
                <button type="submit"
                    class="w-full py-2 px-4 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Sign
                    In</button>
            </form>
        </x-card>
    </x-layout>
</div>
