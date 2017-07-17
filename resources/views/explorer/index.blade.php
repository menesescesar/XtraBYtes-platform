@extends('layouts.master-backoffice')

@section('content')
<div class="box box-primary">
    <div class="box-header">
        <div class="container col-md-12">

            <div class="row">
                <div class="col-md-12 text-center">
                    <h3>XtraBYtes Blockchain Explorer</h3>
                </div>
                <div class="col-md-6 form-inline">
                    <div class="form-group input-group input-group-sm">
                        <button class="btn btn-primary btn-sm" id="home" >Block Explorer Home</button>
                    </div>
                    <div class="form-group">
                        <p class="form-control-static">Search by Block Hash</p>
                    </div>
                    <div class="form-group input-group input-group-sm">
                        <input type="text" class="form-control" id="search" placeholder="block hash">
                    </div>
                    <div class="form-group input-group input-group-sm">
                        <button class="btn btn-primary btn-sm" id="btn" >Search</button>
                    </div>
                </div>
                <div class="col-md-6 form-inline">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <iframe width="100%" height="650px" id="blockexplorer" src="http://xbyblockchain.borzalom.hu/">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('extra_scripts')
<script>
    $("#btn").click(function(){
        if($("#search").val()!="")
        {
            $("#blockexplorer").attr('src','http://xbyblockchain.borzalom.hu?'+$("#search").val() );
        }
    });
    $("#home").click(function(){
        $("#blockexplorer").attr('src','http://xbyblockchain.borzalom.hu?');
    });
</script>
@endsection