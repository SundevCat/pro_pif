@extends('main.layouts.master')
@section('title', 'Plantoys PIF')

@section('header_script')

@endsection

@section('content')

    @include('main.layouts.message')
    <div class=" container-fluid ">
            <div class="card-box pd-20 height-100-p mb-30">
                <div class="row mb-2">
                    <div class="col p-2 ==">
                        <h4 for="" class="text-center text-primary"> user table </h4>
                    </div>
                </div>
                <div class="row pb-3">
                    <div class="col-12">
                        <a class="btn btn-success float-left text-white" href="{{ URL::to('createuser') }}"><i
                                class="icon-copy fi-plus"></i> Add
                            user</a>
                    </div>
                </div>
                <table class="table table-bordered" id="datatables" style="width: 100%">
                    <thead>
                        <tr class="text-center">
                            <th>name</th>
                            <th>email</th>
                            <th>roles</th>
                            <th>last_update</th>
                            <th>action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>



@endsection

@section('footer_script')
    <script>
        $(document).ready(function() {
            var table =
                $('#datatables').DataTable({
                    processing: true,
                    serverSide: true,
                    stateSave: true,
                    order: [],
                    ajax: {
                        url: "{{ route('getuserdatatable') }}",
                        type: 'GET',
                    },
                    columns: [{
                            data: 'name',
                            name: 'name',
                            orderable: true,
                            searchable: true
                        },
                        {
                            data: 'email',
                            name: 'email',
                            orderable: true,
                            searchable: true
                        },
                        {
                            data: 'is_admin',
                            name: 'is_admin',
                            orderable: true,
                            searchable: true
                        },
                        {
                            data: 'updated_at',
                            name: 'updated_at',
                            orderable: true,
                            searchable: true,
                            sClass: "text-center"
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false,
                            sClass: "text-center"
                        },
                    ]
                });
        });
    </script>
@endsection
