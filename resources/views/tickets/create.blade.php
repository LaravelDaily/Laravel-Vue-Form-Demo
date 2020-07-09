@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add New Ticket</div>

                <div class="card-body">
                    <ticket-create></ticket-create>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
