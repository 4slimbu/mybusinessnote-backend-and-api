@if(Session::has('success'))
    <div class="alert alert-success no-border">
        <span>{{ Session::get('message') }}</span>
    </div>
@endif
@if(Session::has('error'))
    <div class="alert alert-danger no-border">
        <span>{{ Session::get('error') }}</span>
    </div>
@endif
@if (count($errors) > 0)
    <div class="alert alert-danger no-border">
        <span class="text-semibold">Something went wrong!</span> Change a few things up and try submitting again.
    </div>
@endif