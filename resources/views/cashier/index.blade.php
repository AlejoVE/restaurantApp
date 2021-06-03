@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" id="table-detail"></div>
    <div class="row justify-content-center py5">
        <div class="col-md-5">
            <button class="btn btn-primary btn-block" id="btn-show-tables">View All Tables</button>
            <div id="selected-table"></div>
            <div id="order-detail"></div>
        </div>
        <div class="col-md-7">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    @foreach($categories as $category)
                    <a class="nav-item nav-link" data-id="{{$category->id}}" data-toggle="tab">{{$category->name}}</a>
                    @endforeach
                </div>
            </nav>
            <div id="list-menu" class="row mt-2">

            </div>
        </div>
    </div>
</div>
<script>
    $("#table-detail").hide();
    document.getElementById('btn-show-tables').addEventListener('click', () => {


        if ($("#table-detail").is(":hidden")) {
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

    // load menus by category
    $(".nav-link").click(function() {
        $.get("/cashier/getMenusByCategory/" + $(this).data("id"), function(data) {
            $("#list-menu").hide();
            $("#list-menu").html(data);
            $("#list-menu").fadeIn('fast');
        });
    })

    let selected_table_id = '';
    let selected_table_name = '';
    // detect click event on button to display table data
    $('#table-detail').on('click', '.btn-table', function(){
         selected_table_id = $(this).data('id');
         selected_table_name = $(this).data('name');

        $('#selected-table').html('<br /><h3>Table:'+selected_table_name+'</h3><hr>');
    })


    $('#list-menu').on('click', '.btn-menu', function(){
        if(selected_table_id == ''){
            alert('Please first select a table');
            return;
        }

        const menu_id = $(this).data('id');
        
       $.ajax({
           type: 'POST',
           data: {
            "_token": $('meta[name="csrf-token"]').attr('content'),
            "menu_id": menu_id,
            "table_id": selected_table_id,
            "table_name": selected_table_name,
            "quantity": 1
           },
           url: "/cashier/orderFood",
           success: function(data){
                $('#order-detail').html(data);
           }
       });
    })
</script>
@endsection