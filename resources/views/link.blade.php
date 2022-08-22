@extends('layout')
@section('content')
    <form method="post" action="{{ route('link.create') }}">
        {{csrf_field()}}
        <div class="link">
            <div class="container">
                <div class="form-group">
                    <label for="link">Link</label>
                    <input type="text" class="form-control" id="link" name="link"
                           aria-describedby="transfer_info"
                           placeholder="Enter link">
                </div>
                <div class="form-group">
                    <label for="transfer_limit">Transfer limit</label>
                    <input type="text" class="form-control" id="transfer_limit" name="transfer_limit"
                           aria-describedby="transfer_info"
                           placeholder="Enter transfer limit">
                    <small id="transfer_info" class="form-text text-muted">Maximum
                        the number of clicks on the link. 0 = unlimited</small>
                </div>
                <div class="form-group">
                    <label for="link_lifetime">Link lifetime</label>
                    <input type="datetime-local" class="form-control" id="link_lifetime" name="link_lifetime"
                           placeholder="Please enter hours"
                           min="{{\Illuminate\Support\Carbon::now()->format('Y-m-d\TH:i')}}"
                           max="{{\Illuminate\Support\Carbon::now()->addDays(1)->format('Y-m-d\TH:i')}}"
                    >
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
