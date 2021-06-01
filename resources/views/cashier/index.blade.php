@extends('layouts.app')

@section('content')
<div class="container">
<div class="row" id="table-detail"></div>
    <div class="row justify-content-center py5">
        <div class="col-md-5">
            <button class="btn btn-primary btn-block" id="btn-show-tables">View All Tables</button>
        </div>
        <div class="col-md-7">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    @foreach($categories as $category)
                        <a href="" class="nav-item nav-link" data-toggle="tab">{{$category->name}}</a>
                    @endforeach
                </div>
            </nav>
        </div>
    </div>
</div>
<script>
$("#table-detail").hide();
document.getElementById('btn-show-tables').addEventListener('click', () => {


    if($("#table-detail").is(":hidden")){
        $.get('/cashier/getTables', (data) => {
               $('#table-detail').html(data);
               $('#table-detail').slideDown('fast');
               $('#btn-show-tables').html('Hide Tables').removeClass('btn-primary').addClass('btn-warning')
        })

    } else {
        $("#table-detail").slideUp('fast');
        $('#btn-show-tables').html('See All Tables').removeClass('btn-warning').addClass('btn-primary')
    }
})
</script>
@endsection