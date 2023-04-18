@extends('layouts.main')

@section('main-section')
    {{-- @php
        echo '<pre>';
        print_r($customers);
    @endphp --}}

    <div class="container">
        <h1 class="m-4 text-center">Welcome to users index page...!</h1>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="row m-2">
            <form action="" class="col-9">
                <div class="form-group">
                    <input type="search" name="search" id="" class="form-control"
                        placeholder="Search by name or email" aria-describedby="helpId" value="{{ $search }}">
                </div>
                <button class="btn btn-primary" type="submit">Search</button>
                <a href="{{ url('/customer') }}" class="btn btn-primary">Reset</a>
            </form>
            <div class="col-3">
                <a href="{{ route('customer.create') }}">
                    <button class="btn btn-primary d-inline-block float-right">Add</button>
                </a>
            </div>
        </div>
        <table class="table align-middle mb-0 bg-white">
            <thead class="bg-light">
                <tr>
                    <th>Name/Email/Profile-Pic</th>
                    <th>Gender/DOB</th>
                    <th>Address</th>
                    {{-- <th>Status</th> --}}
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="/assets/img/uploads/{{ $customer->profile_pic }}" alt=""
                                    style="width: 45px; height: 45px" class="rounded-circle" />
                                <div class="ms-3">
                                    <p class="fw-bold mb-1">{{ $customer->name }}</p>
                                    <p class="text-muted mb-0">{{ $customer->email }}</p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">
                                @if ($customer->gender == 'M')
                                    {{ 'Male' }}
                                @elseif ($customer->gender == 'F')
                                    {{ 'Female' }}
                                @else
                                    {{ 'Other' }}
                                @endif
                            </p>
                            <p class="text-muted mb-0">{{ $customer->dob }}</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ $customer->address }}</p>
                            <p class="text-muted mb-0"> {{ $customer->city }}, {{ $customer->state }},
                                {{ $customer->country }}</p>
                        </td>
                        {{-- <td>
                            @if ($customer->status == 1)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-secondary">Inactive</span>
                            @endif

                        </td> --}}
                        <td>
                            <a href="{{ url('/customer') }}/{{ $customer->id }}/show"><button
                                    class="btn btn-primary">View</button></a>
                            <a href="/customer/{{ $customer->id }}/edit"><button class="btn btn-info">Edit</button></a>
                            <a href="{{ route('customer.trash', ['id' => $customer->id]) }}"><button
                                    class="btn btn-warning">Move to Trash</button></a>
                            {{-- <a href="{{ route('customer.destroy', ['id' => $customer->id]) }}"><button class="btn btn-danger">Delete</button></a> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
