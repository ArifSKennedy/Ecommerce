@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <div class="row justify-conten-center">
        <div class="col-17">
            <h2 class="mb-2 page-title">
                Data Akun User
            </h2>
            <div class="row my-8">
                <div class="col-md 17">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <table class="table datatables table-bordered table-hover" id="dataTable">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                    </tr>
                                </thead>
                                <tbody >
                                    @if (count($users))
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>
                                                    <div class="d-flex">
                                                        {{ $loop->iteration }}
                                                    </div>
                                                </td>
                                                
                                                <td>
                                                    <div class="d-flex">
                                                        {{ $user->name }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        {{ $user->email }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex ">
                                                        {{ $user->role }}
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="3">
                                                <div class='alert alert-primary text-center'>
                                                    Tidak ada data
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection