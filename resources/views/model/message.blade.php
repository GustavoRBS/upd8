<section class="secao-padding" id="secao_erro">
    @if ($message = Session::get('success') || $message = Session::get('alert') || $message = Session::get('error') || count($errors) > 0)
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow">
                @if ($message = Session::get('success'))
                <div class="alert alert-info alert-block">
                    <button type="button" class="close" data-bs-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif

                @if ($message = Session::get('alert'))
                <div class="alert alert-warning alert-block">
                    <button type="button" class="close" data-bs-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif

                @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-bs-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
        </div>
    </div>
    @endif
</section>