<x-layout title="Create listing">
    <div class="mt-5"><br><br><br></div>
    <div class="container mt-5 mb-5">
        <h2 class="text-center">CREATE A GIG</h2>
        <p class="text-center">Post a gig to find a developer</p>
        <form action="/listings" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="company" class="form-label">Company name</label>
                <input type="text" class="form-control" name="company" id="company" placeholder="Company name" value="{{ old('company') }}">
                @error('company')
                    <p class="mt-0 mb-0 text-danger"><small>{{ $message }}</small></p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Job title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Example: Senior Laravel Developer" value="{{ old('title') }}">
                @error('title')
                    <p class="mt-0 mb-0 text-danger"><small>{{ $message }}</small></p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="location" class="form-label">Job location</label>
                <input type="text" class="form-control" id="location" name="location" placeholder="Example: Remote, Boston MA, etc" value="{{ old('location') }}">
                @error('location')
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
                <label for="website" class="form-label">Website/Application URL</label>
                <input type="text" class="form-control" id="website" name="website" placeholder="Website/Application URL" value="{{ old('website') }}">
                @error('website')
                    <p class="mt-0 mb-0 text-danger"><small>{{ $message }}</small></p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tags" class="form-label">Tags (Comma separated)</label>
                <input type="text" class="form-control" id="tags" name="tags" placeholder="Example: Laravel, Backend, Postgres, etc." value="{{ old('tags') }}">
                @error('tags')
                    <p class="mt-0 mb-0 text-danger"><small>{{ $message }}</small></p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="logo" class="form-label">Company logo</label>
                <input type="file" class="form-control" id="logo" name="logo">
                @error('logo')
                    <p class="mt-0 mb-0 text-danger"><small>{{ $message }}</small></p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Job description</label>
                <textarea name="description" id="description" class="form-control" rows="4" placeholder="Include tasks, requirements, salary, etc.">{{ old('description') }}</textarea>
                @error('description')
                    <p class="mt-0 mb-0 text-danger"><small>{{ $message }}</small></p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Create Gig</button>
        </form>
    </div>
    <br><br>
</x-layout>