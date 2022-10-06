@if (session('success'))
    <div class="alert alert-card alert-success" role="alert">
        <strong class="text-capitalize">{{ session('success') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
@endif
@if (session('error'))
    <div class="alert alert-card alert-danger" role="alert">
        <strong class="text-capitalize">{{ session('error') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
@endif
@if(count($errors))
    <div class="alert alert-card alert-danger" role="alert">
        <div class="row">
            <div class="col-md-10">
                <strong class="text-capitalize">
                <ul>
                    @foreach ($errors->all() as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                    </ul>
                </strong>
            </div>
            <div class="col-md-2">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        </div>
    </div>
@endif