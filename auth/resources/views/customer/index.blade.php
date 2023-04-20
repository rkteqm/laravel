@extends('layouts.main')

@section('main-section')

    <div class="container">
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
                <a href="{{ route('dashboard') }}" class="btn btn-primary">Reset</a>
            </form>
            <div class="col-3">
                <a href="{{ route('create') }}">
                    <button class="btn btn-primary d-inline-block float-right">Add Customer</button>
                </a>
            </div>
        </div>
        <table class="table align-middle mb-0 bg-white">
            <thead class="bg-light">
                <tr>
                    <th>Sr no.</th>
                    <th>Name/Email/Profile-Pic</th>
                    <th>Gender/DOB</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1; @endphp
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $i }}</td>
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
                        <td>
                            <a href="{{ route('show', ['id' => $customer->id]) }}"><button
                                    class="btn btn-primary">View</button></a>
                            <a href="{{ route('edit', ['id' => $customer->id]) }}"><button class="btn btn-info">Edit</button></a>
                            <a href="{{ route('trash', ['id' => $customer->id]) }}"><button
                                    class="btn btn-warning">Move to Trash</button></a>
                        </td>
                    </tr>
                    @php $i++; @endphp
                @endforeach
            </tbody>
        </table>
        <div class="row">
            @if (!$search)
                {{ $customers->render('pagination::bootstrap-5') }}
            @endif
        </div>
    </div>
@endsection
