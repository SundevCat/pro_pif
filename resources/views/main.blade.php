@extends('main.layouts.master')
@section('title','Plantoys PIF')

@section('header_script')

@endsection

@section('content')

    @include('main.layouts.message')

    <div class="page-header">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="title">
                    <h4>Home</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Home</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection

@section('footer_script')

<script type="text/javascript">

</script>

@endsection