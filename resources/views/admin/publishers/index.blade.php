@extends('layouts.admin')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Publisher</h1>
                </div><!-- /.col -->
                <div class="col-sm-6"></div>
            </div><!-- /.row -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ url('publishers/create') }}" class="btn btn-primary">Create New Publishers</a>
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body table-responsive p-0" style="height: 300px;">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">phone_number</th>
                                        <th class="text-center">Address</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forEach($publishers as $key => $publisher)
                                    <tr>
                                        <td class="text-center">{{$key+1}}</td>
                                        <td>{{$publisher->name}}</td>
                                        <td class="text-center">{{$publisher->email}}</td>
                                        <td class="text-center">{{ $publisher->phone_number }}</td>
                                        <td class="text-center">{{ $publisher->address }}</td>
                                        <td class="text-center">
                                            <a href="{{ url('publishers/'.$publisher->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ url('publishers',['id' => $publisher->id]) }}" method="post">
                                                <input class="btn btn-danger" href="" type="submit" value="delete" onclick="return confirm('Are you sure?')">
                                                @method('delete')
                                                @csrf
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div><!-- /row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

</div>
<!-- /.content-wrapper -->
@endsection