<x-layout title="Create listing">
    <div class="mt-5"><br><br><br></div>
    <div class="container mt-5 mb-5">
        <x-flash-message />
        <h2 class="text-center">EDIT A GIG</h2>
        <p class="text-center">Edit: {{ $listing->title }}</p>
        <form action="/listing/{{ $listing->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="company" class="form-label">Company name</label>
                <input type="text" class="form-control" name="company" id="company" placeholder="Company name" value="{{ $listing->company }}">
                @error('company')
                    <p class="mt-0 mb-0 text-danger"><small>{{ $message }}</small></p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Job title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Example: Senior Laravel Developer" value="{{ $listing->title }}">
                @error('title')
                    <p class="mt-0 mb-0 text-danger"><small>{{ $message }}</small></p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="location" class="form-label">Job location</label>
                <input type="text" class="form-control" id="location" name="location" placeholder="Example: Remote, Boston MA, etc" value="{{ $listing->location }}">
                @error('location')
                    <p class="mt-0 mb-0 text-danger"><small>{{ $message }}</small></p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Contact email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="example@email.com" value="{{ $listing->email }}">
                @error('email')
                    <p class="mt-0 mb-0 text-danger"><small>{{ $message }}</small></p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="website" class="form-label">Website/Application URL</label>
                <input type="text" class="form-control" id="website" name="website" placeholder="Website/Application URL" value="{{ $listing->website }}">
                @error('website')
                    <p class="mt-0 mb-0 text-danger"><small>{{ $message }}</small></p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tags" class="form-label">Tags (Comma separated)</label>
                <input type="text" class="form-control" id="tags" name="tags" placeholder="Example: Laravel, Backend, Postgres, etc." value="{{ $listing->tags }}">
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
                <img src="{{ $listing->logo ? asset('storage/'.$listing->logo) : asset('images/no-image.png') }}" class="img-fluid rounded-start mt-3" alt="...">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Job description</label>
                <textarea name="description" id="description" class="form-control" rows="4" placeholder="Include tasks, requirements, salary, etc.">{{ $listing->description }}</textarea>
                @error('description')
                    <p class="mt-0 mb-0 text-danger"><small>{{ $message }}</small></p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Edit Gig</button> &nbsp;
            <a href="/listing/{{ $listing->id }}" class="btn btn-link text-dark" style="text-decoration: none;"><i class="fa-solid fa-arrow-left"></i>&nbsp;Back</a>
        </form>
    </div>
    <br><br>
</x-layout>