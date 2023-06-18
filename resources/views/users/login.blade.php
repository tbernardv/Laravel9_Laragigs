<x-layout title="Login form" >
    <div class="mt-5"><br><br><br><br><br></div>

    <div class="container">
        <h2 class="text-center">LOGIN</h2>
        <p class="text-center">Log into your account to post gigs</p>
        <form action="/users/authenticate" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="example@email.com" value="{{ old('email') }}">
                @error('email')
                    <p class="mt-0 mb-0 text-danger"><small>{{ $message }}</small></p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" value="{{ old('password') }}">
                @error('password')
                    <p class="mt-0 mb-0 text-danger"><small>{{ $message }}</small></p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Sing in</button>
            <p><small>Don't have an account? <a href="/register">Register</a></small></p>
        </form>
    </div>
</x-layout>