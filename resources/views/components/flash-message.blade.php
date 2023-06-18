@if (session()->has('message'))
    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="alert alert-success mt-3 container-fluid" role="alert">
        {{ session('message') }}
    </div>
@endif