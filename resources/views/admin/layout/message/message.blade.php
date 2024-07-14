@extends('admin.index')
@section('title', 'Message List')
@section('content')
<div class="row">
    <div class="col-lg-12 px-4">
        <h1 class="mt-4">Message List Dashboard</h1>
        <div class="card">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Message List
            </div>
            <div class="card-body">
                <table id="datatablesSimple" class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($messages as $message)
                        <tr>
                            <td>{{ $message->name }}</td>
                            <td>{{ $message->email }}</td>
                            <td>{{ $message->subject }}</td>
                            <td>{{ $message->message }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
