<x-layout title="Register">
    <div class="mt-5"><br><br><br><br><br></div>

    <div class="container">
        <h2 class="text-center">REGISTER</h2>
        <p class="text-center">Create an account to post gigs</p>
        <form action="/users" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name" value="{{ old('name') }}">
                @error('name')
                    <p class="mt-0 mb-0 text-danger"><small>{{ $message }}</small></p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Contact email</label>
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
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Password confirmation">
                @error('password_confirmation')
                    <p class="mt-0 mb-0 text-danger"><small>{{ $message }}</small></p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Sign Up</button>
            <p><small>Already have an account? <a href="/login">Login</a></small></p>
        </form>
    </div>
</x-layout>