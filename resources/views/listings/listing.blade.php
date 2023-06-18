

<x-layout title="Listing" >

<div class="mt-5"><br><br><br><br><br></div>
<div class="container">
    <a href="/" class="btn btn-link text-dark" style="text-decoration: none; font-size:17px;"><i class="fa-solid fa-arrow-left"></i>&nbsp;Back</a>
    <div class="card">
        <div class="card-header">
            <p class="text-center"><img src="{{ $listing->logo ? asset('storage/'.$listing->logo) : asset('images/no-image.png') }}" alt=""></p>
            <h3 class="text-center">{{ $listing->title }}</h3>
            <h5 class="text-center"><b>{{$listing->company}}</b></h5></p>
            @php
                $vtags = explode(', ', $listing->tags);
            @endphp
            <h3 class="text-center">
                <span class="badge text-bg-dark"><a href="/?tag={{$vtags[0]}}" class="text-white" style="text-decoration: none;">{{ $vtags[0] }}</a></span>
                <span class="badge text-bg-dark"><a href="/?tag={{$vtags[1]}}" class="text-white" style="text-decoration: none;">{{ $vtags[1] }}</a></span>
                <span class="badge text-bg-dark"><a href="/?tag={{$vtags[2]}}" class="text-white" style="text-decoration: none;">{{ $vtags[2] }}</a></span>
            </h3>
            <h5 class="text-center mt-3"><i class="fa-solid fa-location-dot"></i>&nbsp;{{ $listing->location }}</h5></p>
        </div>
        <div class="card-body">
            <h2 class="card-title text-center"><b>Job Description</b></h2>
            <p class="card-text text-center">{{ $listing->description }}</p>
            <p>
                <a href="mailto:{{$listing->email}}" class="btn btn-primary w-100"><i class="fa-solid fa-envelope"></i>&nbsp;&nbsp;Contact Employer</a>
            </p>
            <p>
                <a href="{{$listing->website}}" target="_blank" class="btn btn-dark w-100"><i class="fa-solid fa-globe"></i>&nbsp;&nbsp;Visit Website</a>
            </p>
            @if (auth()->id() == $listing->user_id)
                <a href="/listing/{{ $listing->id }}/edit" class="btn btn-link text-dark" style="text-decoration: none;"><i class="fa-solid fa-pen"></i>&nbsp;Edit</a>
                <form action="/listing/{{ $listing->id }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-link text-danger" style="text-decoration:none;" onclick="return confirm('Are you sure you want to delete this LISTING?')"><i class="fa-solid fa-trash-can"></i>&nbsp;Delete</button>
                </form>
            @endif
        </div>
    </div>
</div>
<br><br><br>
</x-layout>

