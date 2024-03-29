@extends('school.layouts.main')

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
                                            <th>
                                                Name
                                            </th>
                                            <th class="text-center">
                                                Username
                                            </th>
                                            <th class="text-center">
                                                Status
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($staffs as $staff)
                                            <tr>
                                                <td>
                                                    {{ $staff->name }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $staff->email }}
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
