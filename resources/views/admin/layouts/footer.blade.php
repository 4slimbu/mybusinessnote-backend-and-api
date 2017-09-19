<div class="container-fluid">
    <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>© 2017 Octomedia Pty Ltd. · <a href="#">Privacy</a> · <a href="#">Terms</a></p>

        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif
    </footer>
</div>

