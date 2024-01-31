@extends('layouts.admin')

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection

@section('content')
<div id="controller">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">      
                            <!-- Button trigger modal -->
                            <button @click="addData()" type="button" class="btn btn-primary">
                                Create New Author
                            </button>
                        </div>
                        <div class="card-body">
                            <table id="data-table" class="table table-responsive table-head-fixed text-nowrap">
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
                                    @forEach($authors as $key => $author)
                                    <tr>
                                        <td class="text-center">{{$key+1}}</td>
                                        <td>{{$author->name}}</td>
                                        <td class="text-center">{{$author->email}}</td>
                                        <td class="text-center">{{ $author->phone_number }}</td>
                                        <td class="text-center">{{ $author->address }}</td>
                                        <td class="text-center">
                                            <button @click="editData({{ $author }})" type="button" class="btn btn-warning">Edit</button>
                                            <button @click="deleteData({{ $author->id }})" type="button" class="btn btn-danger">Delete</button>
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

<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
            <form :action="actionUrl" method="POST">
                <div class="modal-body">
                    @csrf

                    <input type="hidden" name="_method" value="PUT" v-if="editStatus">

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input name="name" type="text" class="form-control" id="name" placeholder="Masukan Nama" :value="data.name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input name="email" type="text" class="form-control" id="email" placeholder="Masukan Email" :value="data.email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Phone Number</label>
                        <input name="phone_number" type="text" class="form-control" id="phone_number" placeholder="Masukan Phone Number" :value="data.phone_number" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input name="address" type="text" class="form-control" id="address" placeholder="Masukan Address" :value="data.address" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- ./ Modal -->
</div><!-- /controller -->

@endsection

@section('js')
<!-- DataTables  & Plugins -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset('assets/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

<!-- Page specific script -->
<script>
  $(function () {
    $("#data-table").DataTable({
        "dom": 'Bfrtip',
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": false,
    })
});
</script>

<script>
    var controller = new Vue({
        el: '#controller',
        data:{
            data: {},
            actionUrl: '{{ url('authors') }}',
            editStatus: false
        },
        methods: {
            addData() {
                this.actionUrl = '{{ url('authors') }}';
                this.editStatus = false;
                $('#modal').modal();
            },
            editData(data) {
                this.data = data;
                this.actionUrl = '{{ url('authors') }}'+'/'+data.id;
                this.editStatus = true;
                $('#modal').modal();

            },
            deleteData(id) {

                this.actionUrl = '{{ url('authors') }}'+'/'+id;

                if (confirm("Are you sure??")) {
                    axios
                    .delete(this.actionUrl)
                    .then(response => {location.reload();
                        });
                }
            }
        }
    });
</script>
@endsection

