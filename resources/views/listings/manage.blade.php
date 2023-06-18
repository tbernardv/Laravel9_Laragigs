<x-layout title="Manage listings">
    <div class="mt-5"><br><br><br><br><br></div>
    <div class="container">
        <h5 class="text-center mb-5">MANAGE GIGS</h5>
        <hr>
        @unless ($listings->isEmpty())
            <table class="table table-hover">
                @foreach ($listings as $listing)
                    <tr>
                        <td>{{ $listing->title }}</td>
                        <td>
                            <a href="/listing/{{ $listing->id }}/edit" class="btn btn-link text-dark" style="text-decoration: none;"><i class="fa-solid fa-pen"></i>&nbsp;Edit</a>
                            <form action="/listing/{{ $listing->id }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link text-danger" style="text-decoration:none;" onclick="return confirm('Are you sure you want to delete this LISTING?')"><i class="fa-solid fa-trash-can"></i>&nbsp;Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        @else
            <div class="alert alert-warning" role="alert">
                No Listings found!
        </div>
        @endunless
    </div>
</x-layout>