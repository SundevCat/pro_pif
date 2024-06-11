@extends('main.layouts.master')
@section('title', 'Plantoys PIF')

@section('header_script')
<style>
    tbody .text-hover{
        color:#5474ad;
    }
    tbody .text-hover:hover{
        color:#123e89;
        text-decoration: underline;
    }
</style>
@endsection

@section('content')

    @include('main.layouts.message')

    <div class="page-header">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="title">
                    <h4>Product Info 7 Digit</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ URL::to('/product_detail') }}">Product Info</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Product Info 7 Digit</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>



    <input type="hidden" id="sku_code" name="sku_code" value="{{ $sku_code }}">

    <div class="card-box pd-20 height-100-p mb-30">
        <table class="table table-bordered" id="datatables-example">
            <thead>
                <tr>
                    <th>7 Digit</th>
                    <th>Name</th>
                    <th>Last Update</th>
                    <th>Data History</th>
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
    <script type="text/javascript">

        // $(function(){
        //     $( "input[name=input_datepicker]" ).daterangepicker({
        //         autoUpdateInput: false,
        //     });

        //     $('input[name="input_datepicker"]').on('apply.daterangepicker', function(ev, picker) {
        //         $(this).val(picker.startDate.format('DD-MM-YYYY') + '/' + picker.endDate.format('DD-MM-YYYY'));
        //     });

        //     $('input[name="input_datepicker"]').on('cancel.daterangepicker', function(ev, picker) {
        //         $(this).val('');
        //     });
        // });
        
        $(document).ready( function () {
            
            // document.getElementById("alert_modal").innerHTML = "An error occurred while loading the data. Please refresh the screen.";
            // $.fn.dataTable.ext.errMode = () => $("#small-modal").modal('show');

            $.fn.dataTable.ext.errMode = function ( settings, helpPage, message ) {
                oTable1.draw();
            };
            
            var oTable1 =
            $('#datatables-example').DataTable({
            processing: true,
            serverSide: true,
            stateSave: true,
            order: [[2,'desc'],[0,'desc']],
                ajax: {
                    url: "{{ route('getdatatablet7digit') }}",
                    type:'get',
                    data: function(d){
                        d.sku_code = $("#sku_code").val()
                    }
                },
                columns: [
                    {data: 'sku_7digit', name: 'sku_7digit',orderable: true, searchable: true , sClass:'text-center'},
                    {data: 'sku_name', name: 'sku_name',orderable: true, searchable: true , sClass:'text-center'},
                    {data: 'last_update_date', name: 'last_update_date',orderable: true, searchable: true , sClass:'text-center'},
                    {data: 'data_history', name: 'data_history',orderable: true, searchable: true , sClass:'text-center'}
                ]
            });

            $(document).on('change', '#input_datepicker', function () {
                oTable1.draw();
            });
            
        });

    </script>
@endsection
