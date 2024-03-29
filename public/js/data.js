var controller = new Vue({
    el: '#controller',
    data:{
        datas: [],
        data: {},
        actionUrl,
        apiUrl,
        editStatus: false
    },
    mounted: function(){
        this.datatable();
    },
    methods: {
        datatable(){
            const _this = this;
            _this.table = $('#datatable').DataTable({
                ajax: {
                    url: _this.apiUrl,
                    type: 'GET',
                },
                columns: columns,
                "dom": 'Bfrtip',
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            }).on('xhr', function() {
                _this.datas = _this.table.ajax.json().data;
            });
        },
        addData() {
            this.data = {};
            this.editStatus = false;
            $('#modal').modal();
        },
        editData(event, row) {
            this.data = this.datas[row];
            this.editStatus = true;
            $('#modal').modal();

        },
        deleteData(event, id) {

            if (confirm("Are you sure??")) {
                $(event.target).parent('tr').remove();
                axios
                .delete(this.actionUrl+'/'+id)
                .then(response => {
                    alert('data berhasil di hapus')
                this.table.ajax.reload();
                }).catch((error) => {
                    console.error('error Bos:', error);
                });
            }
        },
        submitForm(event, id){
            event.preventDefault();
            var actionUrl = ! this.editStatus ? this.actionUrl : this.actionUrl+'/'+id;
            axios.post(actionUrl, new FormData($(event.target)[0])).then(response => {
                $('#modal').modal('hide');
                this.table.ajax.reload();
            });
        }
    }
});