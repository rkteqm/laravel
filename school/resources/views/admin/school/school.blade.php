@extends('admin.layouts.main')

@section('main-section')
    <!-- main-panel start -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Schools Table</h4>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                Logo
                                            </th>
                                            <th>
                                                School Name
                                            </th>
                                            <th class="text-center">
                                                Username
                                            </th>
                                            <th class="text-center">
                                                Institution Type
                                            </th>
                                            <th>
                                                Located at
                                            </th>
                                            <th class="text-center">
                                                Status
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($schools as $school)
                                            <tr>
                                                <td class="py-1 text-center">
                                                    <img src="/assets/img/uploads/logo/{{ $school->logo }}"
                                                        alt="image" />
                                                </td>
                                                <td>
                                                    {{ $school->name }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $school->email }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $school->type == 'G' ? 'Government' : '' }}
                                                    {{ $school->type == 'P' ? 'Private' : '' }}
                                                </td>
                                                <td>
                                                    {{ $school->city }}
                                                </td>
                                                <td class="text-center">
                                                    <label class="badge badge-success">Active</label>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main-panel ends -->
@endsection
