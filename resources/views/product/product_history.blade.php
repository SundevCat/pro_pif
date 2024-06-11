@extends('main.layouts.master')
@section('title', 'Plantoys PIF')

@section('header_script')

@endsection

@section('content')

    @include('main.layouts.message')

    <div class="page-header">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="title">
                    <h4>Product History</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ URL::to('/product_detail') }}">Product Info</a></li>
						<li class="breadcrumb-item"><a href="javascript: history.go(-1)">Product Info 7 Digit</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Product History</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <input type="hidden" id="sku_id" name="sku_id" value="{{ $sku_id }}">
    <div class="card-box pd-20 height-100-p mb-30">
        <table class="table table-bordered" id="datatables">
            <thead>
                <tr>
                    <th>column name</th>
                    <th>old data</th>
                    <th>new data</th>
                    <th>update date</th>
                    <th>updated by</th>
                </tr>
            </thead>
        </table>
    </div>

    <div class="modal fade" id="small-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Alert modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <p id="alert_modal"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                </div>
            </div>
        </div>
    </div>
    
@endsection

@section('footer_script')
    <script>
        $(document).ready(function() {

            // document.getElementById("alert_modal").innerHTML = "An error occurred while loading the data. Please refresh the screen.";
            // $.fn.dataTable.ext.errMode = () => $("#small-modal").modal('show');

            $.fn.dataTable.ext.errMode = function ( settings, helpPage, message ) {
                oTable1.draw();
            };

            $('#datatables').DataTable({
                processing: true,
                serverSide: true,
                status: true,
                order: [['3','desc']],
                ajax: {
                    url: "{{ route('getlogproductdatatable') }}",
                    type: "GET",
                    data: function(d){
                        d.sku_id = $("#sku_id").val()
                    }
                },
                columns: [
                    {
                        data: "column_name",
                        name: "column_name"
                    },
                    {
                        data: "old_data",
                        name: "old_data"
                    },
                    {
                        data: "new_data",
                        name: "new_data"
                    },
                    {
                        data: "update_date",
                        name: "update_date",
                        orderable: true
                    },
                    {
                        data:"updated_by",
                        name:"updated_by"
                    }
                ]
            });
        });
    </script>

@endsection
