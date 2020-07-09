@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tickets List') }}</div>

                <div class="card-body">
                    <a class="btn btn-primary" href="{{ route('tickets.create') }}">Add new ticket</a>
                    <br /><br />
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Category</th>
                                <th>Time</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($tickets as $ticket)
                            <tr>
                                <td>{{ $ticket->name }}</td>
                                <td>{{ $ticket->email }}</td>
                                <td>{{ $ticket->category->name }}</td>
                                <td>{{ $ticket->created_at }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">{{ __('No tickets found') }}</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
