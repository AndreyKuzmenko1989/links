@extends('layout')
@section('content')
    <div class="container">
        <a href="{{ route('link.add') }}" class="btn btn-primary mt-3 mb-3">Add new</a>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Link</th>
                <th scope="col">Fast Link</th>
                <th scope="col">Transfer Limit</th>
                <th scope="col">Expired at</th>
            </tr>
            </thead>
            <tbody>
            @foreach($links as $link)
                <tr>
                    <th scope="row">{{$link->id}}</th>
                    <td>{{$link->link}}</td>
                    <td><a href="/{{$link->short_link}}">{{$link->short_link}}</a></td>
                    <td>{{ $link->transfer_limit == -1 ? 'Transfer limit was reached' : $link->transfer_limit}}</td>
                    <td>{{$link->expired_at}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
