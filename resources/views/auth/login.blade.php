@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 bg-white p-6 rounded-lg">
            @if (session('status'))
               <div class="bg bg-red-400 p-2 rounded mb-2 text-white">
                   {{ session('status') }}
               </div>
            @endif
            <form action="{{ route('login') }}" method="post">
                @csrf 
               

                <div class="mb-4">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="email" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email') 
                    border border-red-500    @enderror"
                    placeholder="Enter Email">
                    @error('email')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') 
                    border border-red-500    @enderror" 
                    placeholder="Enter Password">
                    @error('password')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
                </div>

                <div class="mb-4">
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" class="mr-2">
                        <label for="remember">Remember Me</label>
                    </div>
                </div>

                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">
                        Login</button>
                </div>
            </form>
        </div>
    </div>
@endsection