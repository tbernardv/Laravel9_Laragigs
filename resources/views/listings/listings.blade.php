
<x-layout title="Listings">

<div class="mt-5"><br><br><br><br><br></div>
@include('partials._hero')
@include('partials._search')
<div class="container-fluid">
    <x-flash-message />
</div>
<div class="container-fluid mt-3">
    @unless (count($listings) == 0)
    <div class="row">
    @foreach ($listings as $listing)
        <div class="col-sm-6">
            <div class="card mb-3" style="">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ $listing->logo ? asset('storage/'.$listing->logo) : asset('images/no-image.png') }}" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><a href="/listing/{{$listing->id}}">{{$listing->title}}</a></h5>
                            @php
                                $tags = explode(', ', $listing->tags);
                            @endphp
                            <span class="badge rounded-pill text-bg-dark"><a href="/?tag={{$tags[0]}}" class="text-white" style="text-decoration: none;">{{ $tags[0] }}</a></span>
                            <span class="badge rounded-pill text-bg-dark"><a href="/?tag={{$tags[1]}}" class="text-white" style="text-decoration: none;">{{ $tags[1] }}</a></span>
                            <span class="badge rounded-pill text-bg-dark"><a href="/?tag={{$tags[2]}}" class="text-white" style="text-decoration: none;">{{ $tags[2] }}</a></span>
                            <p class="card-text mt-2"><small class="text-dark"><b><i class="fa-solid fa-location-dot"></i> {{ $listing->location }}</b></small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </div>
    @endunless
</div>
<div class="mt-3 container-fluid">
    {{ $listings->links() }}
</div>
<div class="mt-5"><br><br><br></div>

</x-layout>

