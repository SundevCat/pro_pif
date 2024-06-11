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

    @inject('Pt_inv_pif_fg', 'App\Models\\Pt_inv_pif_fg')

    <div class="page-header">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="title">
                    <h4>Product Info</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Product Info</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>



    <form action="{{ URL::to('product/export_excel') }}" id="from_submit" method="get">

        <input type="hidden" id="sku_code" name="sku_code" value="">


        <div class="card-box pd-20 height-100-p mb-30">
            <div class="form-group row">
                <div class="col-sm-12 col-md-12">
                    <button type="button"  class="btn btn-success" id="exportexcel" data-toggle="modal" data-target="#product-modal" disabled>Export Excel</button>
                </div>
            </div>

            <table class="table table-bordered" id="datatables-example">
                <thead>
                    <tr>
                        <th>
                            <div class="dt-checkbox">
                                <input type="checkbox" name="select_all" value="1" id="example-select-all">
                                <span class="dt-checkbox-label" style="margin: auto"></span>
                            </div>
                        </th>
                        <th>SKU</th>
                        <th>Main Image</th>
                        <th>Product Name</th>
                        <th>Product Year</th>
                        <th>AGE</th>
                        <th>Category</th>
                        <th>Catalog Status</th>
                        <th>Last Update</th>
                    </tr>
                </thead>
            </table>

            {{-- <table class="table table-bordered checkbox-datatable" id="dataintable">
                <thead>
                    <tr>
                        <th>
                            <div class="dt-checkbox">
                                <input type="checkbox" name="select_all" value="1" id="example-select-all">
                                <span class="dt-checkbox-label" style="margin: auto"></span>
                            </div>
                        </th>
                        <th>SKU</th>
                        <th>Main Image</th>
                        <th>Product Name</th>
                        <th>Product Year</th>
                        <th>AGE</th>
                        <th>Category</th>
                        <th>Category Status</th>
                        <th >Last Update</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $value)
                        <tr>
                            <td>
                                {{ $value->sku_code }}
                            </td>
                            <td> <a class="text-hover" href='{{ URL("product/tosevendigit/" . Crypt::encrypt($value->sku_code)) }}'> {{ $value->sku_code }} </a> </td>
                            <td>
                                @if($value->main_image != "N/A") 
                                    <img src="{{ $value->main_image }}" alt="{{ $value->sku_name }}" style="width: 100px;height: 100px;">
                                @else
                                    <img src="{{ url('/public/images/Image-Not-Available.png') }}" alt="{{ $value->sku_name }}" style="width: 80px;height: 100px;">
                                @endif
                            </td>
                            <td> {{ $value->sku_name }} </td>
                            <td> {{ $value->product_year }} </td>
                            <td> {{ $value->age }} </td>
                            <td> {{ $value->category }} </td>
                            <td> {{ $value->catalog_status }} </td>
                            <td>
                                {{ date_format(date_create($value->last_update_date), 'd-M-Y H:i:s') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table> --}}
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

        <!-- Medium modal -->
        <div class="modal fade" id="product-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">Export Product Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body" style="overflow:scroll; overflow-x:hidden; height: 300px; " >
                        <table>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="All">
                                            <label class="custom-control-label" for="All">All</label>
                                        </div>
                                    </td>
                                    <td colspan="2" ></td>
                                </tr>
                                    @foreach($list_data as $key => $value)
                                        <tr>
                                            <td></td>
                                            <td colspan="2">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input main_data" id="{{ $key }}" value="{{ $key }}">
                                                    <label class="custom-control-label" for="{{ $key }}">{{ $key }}</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"></td>
                                            <td>
                                                <div class="dis_lay" id="{{ $key."_filter"}}" style="display: none; margin-left: 35px;">
                                                    @foreach($value as $key_data => $value_data)
                                                        @if($value_data != "SKU_CODE" && $value_data != "SKU_7DIGIT" && $value_data != "SKU_NAME")
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input second_data" rel="{{ $key }}" id="{{ $value_data }}" name="{{ $value_data }}" value="{{ $value_data }}">
                                                                <label class="custom-control-label" for="{{ $value_data }}">{{ $list_data_export[$key][$value_data] }}</label>
                                                            </div>
                                                        @else
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input second_data" rel="{{ $key }}" id="{{ $value_data }}" name="{{ $value_data }}" value="{{ $value_data }}" onclick="return false" checked>
                                                                <label class="custom-control-label" for="{{ $value_data }}">{{ $list_data_export[$key][$value_data] }}</label>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                            </tbody>
                        </table>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary text-left" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="btn_submit"  disabled>Export</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Small modal -->
    </form>

@endsection

@section('footer_script')
    <script type="text/javascript">

        const items = [];      

        $(document).on('change', '#example-select-all', function () {
            
            if(this.checked){
                document.getElementById("exportexcel").disabled = false;
            }else{
                document.getElementById("exportexcel").disabled = true;
                items.length = 0;
                $("#sku_code").val(" ");
            }

        });

        $(document).on('click', '.chbox', function () {
            
            if(this.checked){
                document.getElementById("exportexcel").disabled = false;

                if(items.length > 0){

                    const index = items.indexOf(this.value);
                    
                    items.push(this.value);

                    if (index > -1) {
                        items.splice(index, 1);
                    }

                }else{
                    items.push(this.value);
                }

                $("#sku_code").val( );
                $("#sku_code").val(items);

                console.log(items);

            }else{

                var x = document.getElementsByClassName("chbox");
                var i;
                count = 0;
                for (i = 0; i < x.length; i++) {
                    if(x[i].type === "checkbox" && x[i].checked === true){
                        count++;
                    }
                }

                if(count > 0){
                    document.getElementById("exportexcel").disabled = false;
                }else{
                    document.getElementById("exportexcel").disabled = true;
                }

                const index = items.indexOf(this.value);
                
                if (index > -1) {
                    items.splice(index, 1);
                }

                $("#sku_code").val( );
                $("#sku_code").val(items);
            }

            console.log(items);

        });
        
        $(document).ready( function () {
            
            // document.getElementById("alert_modal").innerHTML = "An error occurred while loading the data. Please refresh the screen.";
            // $.fn.dataTable.ext.errMode = () => $("#small-modal").modal('show');

            $.fn.dataTable.ext.errMode = function ( settings, helpPage, message ) {
                oTable1.draw();
            };

            // $('#dataintable').DataTable( {
            //     processing: true,
            //     serverSide: true,
            //     order: [[8,'desc'],[1,'desc']],
            // });

            var oTable1 =
            $('#datatables-example').DataTable({
            processing: true,
            serverSide: true,
            // stateSave: true,
            order: [[8,'desc'],[1,'desc']],
            // order: [],
                ajax: {
                    url:'<?php echo url("product/getdatatablet") ?>',
                    type:'get',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: function(d){
                        d.input_status = $("#input_datepicker").val(),
                        d.sku_code = $("#sku_code").val()
                    }
                },
                columns: [
                    {data: 'chbox', name: 'chbox',orderable: false, searchable: false , sClass:'text-center'},
                    {data: 'sku_code', name: 'sku_code',orderable: true, searchable: true , sClass:'text-center '},
                    {data: 'main_image', name: 'main_image',orderable: false, searchable: false, sClass:'text-center'},
                    {data: 'sku_name', name: 'sku_name',orderable: true, searchable: true , sClass:'text-center'},
                    {data: 'product_year', name: 'product_year',orderable: true, searchable: true , sClass:'text-center'},
                    {data: 'age', name: 'age',orderable: true, searchable: true , sClass:'text-center'},
                    {data: 'category', name: 'category',orderable: true, searchable: true , sClass:'text-center'},
                    {data: 'catalog_status', name: 'catalog_status',orderable: true, searchable: true , sClass:'text-center'},
                    {data: 'last_update_date', name: 'last_update_date',orderable: true, searchable: false , sClass:'text-center'}
                ]
            });

            // $(document).on('change', '#input_datepicker', function () {
            //     oTable1.draw();
            // });

            $('#example-select-all').on('click', function(){
                var rows = oTable1.rows({ 'search': 'applied' }).nodes();
                $('input[type="checkbox"]', rows).prop('checked', this.checked);
            });

            $('.checkbox-datatable tbody').on('change', 'input[type="checkbox"]', function(){
                if(!this.checked){
                    var el = $('#example-select-all').get(0);
                    if(el && el.checked && ('indeterminate' in el)){
                        el.indeterminate = true;
                    }
                }
            });

            $('#exportexcel').click(function (event) {
                $('.main_data').each(function(index, element) {
                        $(this).prop('checked',true);

                    var x = document.getElementsByClassName("dis_lay");
                    var i;
                    for (i = 0; i < x.length; i++) {
                        x[i].style.display = 'block';
                    }

                    $('.second_data').each(function(index, element) {
                        // $(this).prop('checked',true);

                        if(element.value != "CARE_INSTRUCTION" && element.value != "ASSEMBLY_INSTRUCTION" 
                            && element.value != "CAUTION_SHEET" && element.value != "HOW_TO_PLAY"
                            && element.value != "PER_SET" && element.value != "DIMENSION_CM"
                            &&  element.value != "DIMENSION_INCH" &&  element.value != "LIFESTYLE_IMG_10"
                            && element.value != "PRODUCT_IMG_7" && element.value != "PRODUCT_IMG_8"
                            && element.value != "PRODUCT_IMG_9" && element.value != "PACKAGE_SHOT_3"
                            && element.value != "PACKAGE_SHOT_4" && element.value != "ALL_REVISION"){
                            $(this).prop('checked',true);
                        }
                    });
                });
                document.getElementById("btn_submit").disabled = false;
            });

            $('#All').click(function (event) {
                if (this.checked) {
                    $('.main_data').each(function(index, element) {
                        $(this).prop('checked',true);

                        var x = document.getElementsByClassName("dis_lay");
                        var i;
                        for (i = 0; i < x.length; i++) {
                            x[i].style.display = 'block';
                        }

                        $('.second_data').each(function(index, element) {

                            if(element.value != "ALL_REVISION"){
                                $(this).prop('checked',true);
                            }

                        });
                    });
                    document.getElementById("btn_submit").disabled = false;
                }else{
                    $('.main_data').each(function(index, element) {
                        $(this).prop('checked',false);

                        var x = document.getElementsByClassName("dis_lay");
                        var i;
                        for (i = 0; i < x.length; i++) {
                            x[i].style.display = 'none';
                        }

                        $('.second_data').each(function(index, element) {
                            
                            if(element.value != "ALL_REVISION"){
                                $(this).prop('checked',false);
                            }
                        });
                    });
                    document.getElementById("btn_submit").disabled = true;
                }
            });

            $('#LAST_REVISION').click(function (event) {

                var last_revision = document.getElementById("LAST_REVISION");
                var all_revision = document.getElementById("ALL_REVISION");

                if (this.checked) {
                    last_revision.checked = true;
                    all_revision.checked = false;
                }else{
                    last_revision.checked = false;
                    all_revision.checked = true;
                }
            });

            $('#ALL_REVISION').click(function (event) {

                var last_revision = document.getElementById("LAST_REVISION");
                var all_revision = document.getElementById("ALL_REVISION");

                if (this.checked) {
                    last_revision.checked = false;
                    all_revision.checked = true;
                }else{
                    last_revision.checked = true;
                    all_revision.checked = false;
                }
            });

            $('.main_data').click(function (event) {
                if (this.checked) {
                        
                        $('input[id='+this.value+']').each(function(index, element) {
                            $(this).prop('checked',true);
                            document.getElementById(this.value + "_filter").style.display = "block";
                            $('input[rel='+this.value+']').each(function(index, element) {

                                if(element.value != "CARE_INSTRUCTION" && element.value != "ASSEMBLY_INSTRUCTION" 
                                    && element.value != "CAUTION_SHEET" && element.value != "HOW_TO_PLAY"
                                    && element.value != "PER_SET" && element.value != "DIMENSION_CM"
                                    &&  element.value != "DIMENSION_INCH" &&  element.value != "LIFESTYLE_IMG_10"
                                    && element.value != "PRODUCT_IMG_7" && element.value != "PRODUCT_IMG_8"
                                    && element.value != "PRODUCT_IMG_9" && element.value != "PACKAGE_SHOT_3"
                                    && element.value != "PACKAGE_SHOT_4" && element.value != "ALL_REVISION"){
                                    $(this).prop('checked',true);
                                }

                            });
                        });
                    document.getElementById("btn_submit").disabled = false;
                }else{
                    $('input[id='+this.value+']').each(function(index, element) {
                        $(this).prop('checked',false);
                        document.getElementById(this.value+"_filter").style.display = "none";
                        $('input[rel='+this.value+']').each(function(index, element) {
                            $(this).prop('checked',false);
                        });
                    });
                    
                    $('.main_data').each(function(index, element) {
                        var x = document.getElementsByClassName("main_data");
                        var i;
                        count = 0;
                        for (i = 0; i < x.length; i++) {
                            if(x[i].type === "checkbox" && x[i].checked === true){
                                count++;
                            }
                        }

                        if(count > 0){
                            document.getElementById("btn_submit").disabled = false;
                        }else{
                            document.getElementById("btn_submit").disabled = true;
                        }
                    });
                }
            });

            $('#btn_submit').on('click', function(){
                $('#from_submit').submit();

                $('input[type="checkbox"]').prop('checked', false);
                $('#ALL').prop('checked',false);
                $('.main_data').each(function(index, element) {
                    $(this).prop('checked',false);

                    var x = document.getElementsByClassName("dis_lay");
                    var i;
                    for (i = 0; i < x.length; i++) {
                        x[i].style.display = 'none';
                    }

                    $('.second_data').each(function(index, element) {
                        $(this).prop('checked',false);
                    });
                });

                items.length = 0;
                $("#sku_code").val(" ");

                document.getElementById("btn_submit").disabled = true;
                document.getElementById("exportexcel").disabled = true;

                $("#product-modal").modal('hide');
                
            });
             
        });
    </script>
@endsection
