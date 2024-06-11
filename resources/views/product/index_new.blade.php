@extends('main.layouts.master')
@section('title', 'Plantoys PIF')

@section('header_script')
    {{-- <style>
        .tag-container {
            display: flex;
            flex-flow: row wrap;
        }

        .tag_data{
            pointer-events: none;
            background-color: #1b00ff;
            color: white;
            padding: 6px;
            margin: 5px;
        }

        .tag_data::before {
            pointer-events: all;
            display: inline-block;
            content: 'x';  
            height: 20px;
            width: 20px;
            margin-right: 6px;
            text-align: center;
            color: #ccc;
            background-color: #1b00ff;
            cursor: pointer;
        }
    </style> --}}
@endsection

@section('content')

    @include('main.layouts.message')

  

    <form action="{{ URL::to('product_dinamic/fillter_data') }}" id="from_submit" method="get">
        @csrf

        <input type="hidden" id="chk_list" name="chk_list" value="{{ $chk_list }}">
        <input type="hidden" id="fillter_input" name="fillter_input" value="">        

        <div class="card-box pd-20 height-100-p mb-30">
            <div class="form-group row">
                <div class="col-sm-12 col-md-12">
                    
                    <button type="button"  class="btn btn-success" id="exportexcel" data-toggle="modal" data-target="#product-modal" >Fillter Data</button>
                    {{-- <button type="button"  class="btn btn-success" id="orderby" data-toggle="modal" data-target="#orderby-modal" >Order By</button>
                    <div class="tag-container">
                        @if(!empty($fillter_data))
                            <?php //$fillter = explode(",",$fillter_data); ?>
                            @if(count($fillter) > 0)
                                @foreach($fillter as $value )
                                    <p class="tag" >{{ $value }}</p>
                                @endforeach
                            @endif
                        @endif
                    </div> --}}
                </div>
            </div>
            <div class="form-group row">
                <table>
                    <thead>
                        <tr style="text-align: center;">
                            <th style="width:16.6%;">{{ "SKU" }}</th>
                            <th style="width:16.6%;">{{ "Product Year" }}</th>
                            <th style="width:16.6%;">{{ "Category" }}</th>
                            <th style="width:16.6%;">{{ "Catalog Status" }}</th>
                            <th style="width:16.6%;">{{ "Age" }}</th>
                            <th style="width:16.6%;">{{ "Award" }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="padding: 5px;">
                                {{ Form::select('list_sku[]',$list_sku,null, ['id'=>'list_sku[]','class'=>'custom-select2 form-control','multiple'=>'multiple']) }}
                            </td>
                            <td style="padding: 5px;"> 
                                {{ Form::select('list_product_year',$list_product_year,null, ['id'=>'list_product_year','class'=>'custom-select2 form-control']) }}
                            </td>
                            <td style="padding: 5px;"> 
                                {{ Form::select('list_category',$list_category,null, ['id'=>'list_category','class'=>'custom-select2 form-control']) }}
                            </td>
                            <td style="padding: 5px;"> 
                                {{ Form::select('list_catalog_status',$list_catalog_status,null, ['id'=>'list_catalog_status','class'=>'custom-select2 form-control']) }}
                            </td>
                            <td style="padding: 5px;"> 
                                {{ Form::select('list_age[]',$list_age,null, ['id'=>'list_age[]','class'=>'custom-select2 form-control','multiple'=>'multiple']) }}
                            </td>
                            <td style="padding: 5px;"> 
                                {{ Form::text('list_award',null, ['id'=>'list_award','class'=>'form-control', 'placeholder'=> 'Award']) }}
                            </td>
                        </tr>
                    </tbody>
                </table>  
                
                <button type="submit" class="btn btn-success" >Search</button>
            </div>

            <div class="row" style="overflow-x:auto;">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <?php  $source_data = explode(",",$chk_list); ?>
                            @foreach($source_data as $value)
                                <th>{{ $value }}</th>
                            @endforeach
                            {{-- <th class="sorting">SKU_CODE</th>
                            <th class="sorting">MAIN_IMAGE</th>
                            <th class="sorting">SKU_NAME</th>
                            <th class="sorting">PRODUCT_YEAR</th>
                            <th class="sorting">AGE</th>
                            <th class="sorting">CATEGORY</th>
                            <th class="sorting_asc">CATALOG_STATUS</th> --}}
                            <th class="sorting_asc">LAST_UPDATE_DATE</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $value)
                            <tr>
                                <td > <a class="text-hover" href='{{ URL("product/tosevendigit/" . Crypt::encrypt($value->sku_code)) }}'> {{ $value->sku_code }} </a> </td>
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
                </table>
                {{-- {!! $data->links() !!} --}}
            </div>
            <div class="row" style="margin-top: 10px;">
                {!! $data->links('product.pagination_custom',compact('chk_list','data_sku','data_product_year','data_category', 'data_catalog_status', 'data_age', 'data_award' )) !!}
            </div>
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
                <div class="modal-content" >
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">Fillter Product Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body" style="overflow:scroll; overflow-x:hidden; height: 300px; ">
                        <table>
                            <tbody>
                                {{-- <tr>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="All">
                                            <label class="custom-control-label" for="All">All</label>
                                        </div>
                                    </td>
                                    <td colspan="2" ></td>
                                </tr> --}}
                                    @foreach($list_data as $key => $value)
                                        <tr>
                                            <td></td>
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input main_data" id="{{ $key }}" value="{{ $key }}">
                                                    <label class="custom-control-label" for="{{ $key }}">{{ $key }}</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <div class="dis_lay" id="{{ $key."_filter"}}" style="display: none; margin-left: 35px;">
                                                    @foreach($value as $key_data => $value_data)
                                                        @if($value_data != "ALL_REVISION")
                                                            @if($value_data == "SKU_CODE" || $value_data == "LAST_REVISION")
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input second_data" checked rel="{{ $key }}" id="{{ $value_data }}" name="{{ $value_data }}" value="{{ $value_data }}">
                                                                    <label class="custom-control-label" for="{{ $value_data }}">{{ $value_data }}</label>
                                                                </div>
                                                            @else
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input second_data" rel="{{ $key }}" id="{{ $value_data }}" name="{{ $value_data }}" value="{{ $value_data }}">
                                                                    <label class="custom-control-label" for="{{ $value_data }}">{{ $value_data }}</label>
                                                                </div>
                                                            @endif
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
                        <button type="submit" class="btn btn-primary" id="btn_submit"  disabled>Submit</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Small modal -->


        <!-- Medium modal -->
        <div class="modal fade" id="orderby-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" >
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">Fillter Order By Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body" style="overflow:scroll; overflow-x:hidden; height: 300px; ">
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-4 col-form-label">Fillter : </label>
                            <div class="col-sm-8 col-md-8">
                                {{ Form::select('list_fillter',$list_fillter,' ', ['id'=>'list_fillter','class'=>'custom-select2 form-control','style'=>'text-align: center; width: 100%;']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-4 col-form-label">Order By : </label>
                            <div class="col-sm-4 col-md-4">
                                <select class='custom-select2 form-control' name="orderby_data" id="orderby_data">
                                    <option value="DESC">DESC</option>
                                    <option value="ACE">ACE</option>
                                  </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary text-left" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="btn_submit_fillter" >Submit</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Small modal -->
    </form>

@endsection

@section('footer_script')
<script src="{{ url('/public/src/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>

    <script type="text/javascript">
        
        $(document).ready( function () {

            // document.getElementById("alert_modal").innerHTML = "An error occurred while loading the data. Please refresh the screen.";
            // $.fn.dataTable.ext.errMode = () => $("#small-modal").modal('show');

            var sql_to = [];

            var countchk = 0
            $('.second_data').click(function (event) {

                // var inputElements = document.getElementsByClassName('second_data');
                // for(var i=0; inputElements[i]; ++i){
                //     if(inputElements[i].checked){

                //         if(sql_to.length > 0){

                //             const index = sql_to.indexOf(inputElements[i].value);

                //             sql_to.push(inputElements[i].value);

                //             if (index > -1) {
                //                 sql_to.splice(index, 1);
                //             }

                //         }else{
                //             sql_to.push(inputElements[i].value);
                //         }
                //     }
                // }
                
                if (this.checked) {
                    // if(countchk <= "5"){
                        var countCheckedCheckboxes = $(this).filter(':checked').length;
                        countchk = countchk + countCheckedCheckboxes;

                        if(sql_to.length > 0){

                            const index = sql_to.indexOf(this.value);

                            sql_to.push(this.value);

                            if (index > -1) {
                                sql_to.splice(index, 1);
                            }

                        }else{
                            sql_to.push(this.value);
                        }

                    // }else{
                    //     $(this).prop('checked',false);
                    // }

                    $("#chk_list").val( );
                    $("#chk_list").val(sql_to);
                    $("#fillter_input").val(sql_to);
                    

                    console.log(countchk , sql_to);

                }else{
                    if(this.value == "LAST_REVISION" || this.value == "SKU_CODE"){
                        $(this).prop('checked',true);
                    }else{

                        countchk = countchk - 1;
                        const index = sql_to.indexOf(this.value);

                        if (index > -1) {
                            sql_to.splice(index, 1);
                        }

                        $("#chk_list").val( );
                        $("#chk_list").val(sql_to);
                        $("#fillter_input").val(sql_to);

                        console.log(countchk , sql_to);

                        $(this).prop('checked',false);
                    }

                    console.log(sql_to);
                }
            });

            // $('#dataintable').DataTable( {
            //     order: [[7,'asc']],
            //     processing: true,
            //     retrieve: true,
            //     destroy: true,
            //     searching: false
            // });

            // $('#LAST_REVISION').click(function (event) {

            //     var last_revision = document.getElementById("LAST_REVISION");
            //     var all_revision = document.getElementById("ALL_REVISION");

            //     if (this.checked) {
            //         last_revision.checked = true;
            //         all_revision.checked = false;

            //         const index = sql_to.indexOf(all_revision);

            //         if (index > -1) {
            //             sql_to.splice(index, 1);
            //         }

            //         $("#chk_list").val( );
            //         $("#chk_list").val(sql_to);
            //         $("#fillter_input").val(sql_to);
            //         // $(this).prop('checked',false);
                    
            //     }else{
            //         last_revision.checked = false;
            //         all_revision.checked = true;
            //     }
            // });

            // $('#ALL_REVISION').click(function (event) {

            //     var last_revision = document.getElementById("LAST_REVISION");
            //     var all_revision = document.getElementById("ALL_REVISION");

            //     if (this.checked) {
            //         last_revision.checked = false;
            //         all_revision.checked = true;
            //     }else{
            //         last_revision.checked = true;
            //         all_revision.checked = false;
            //     }
            // });
            
            $('.main_data').click(function (event) {
                var inputElements = document.getElementsByClassName('second_data');
                for(var i=0; inputElements[i]; ++i){
                    if(inputElements[i].checked){

                        if(sql_to.length > 0){

                            const index = sql_to.indexOf(inputElements[i].value);

                            sql_to.push(inputElements[i].value);

                            if (index > -1) {
                                sql_to.splice(index, 1);
                            }

                        }else{
                            sql_to.push(inputElements[i].value);
                        }
                    }
                }
                console.log(sql_to);
                if (this.checked) {
                        
                        $('input[id='+this.value+']').each(function(index, element) {
                            document.getElementById(this.value + "_filter").style.display = "block";

                            // $('input[rel='+this.value+']').each(function(index, element) {                                
                            // });
                        });

                    document.getElementById("btn_submit").disabled = false;
                }else{
                    $('input[id='+this.value+']').each(function(index, element) {
                        $(this).prop('checked',false);
                        document.getElementById(this.value+"_filter").style.display = "none";
                        $('input[rel='+this.value+']').each(function(index, element) {
                            
                            if(element.value == "LAST_REVISION" || element.value == "SKU_CODE"){
                                $(this).prop('checked',true);
                            }else{
                                $(this).prop('checked',false);
                            }
                            
                        });
                    });
                    document.getElementById("btn_submit").disabled = true;
                }
            });


            $('#btn_submit').on('click', function(){

                $('input[type="checkbox"]').prop('checked', false);

                    var x = document.getElementsByClassName("dis_lay");
                    var i;
                    for (i = 0; i < x.length; i++) {
                        x[i].style.display = 'none';
                    }

                    $('.second_data').each(function(index, element) {
                        $(this).prop('checked',false);
                    });

                $("#product-modal").modal('hide');
                
            });
             
        });
    </script>
@endsection
