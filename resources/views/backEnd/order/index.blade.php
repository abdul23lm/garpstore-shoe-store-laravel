@extends('backEnd.layouts.master')
@section('title','List Orders')
@section('content')
    <div id="breadcrumb"> <a href="{{url('/admin')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{route('order.index')}}" class="current">Orders</a></div>
    <div class="container-fluid">
        @if(Session::has('message'))
            <div class="alert alert-success text-center" role="alert">
                <strong>Well done!</strong> {{Session::get('message')}}
            </div>
        @endif
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                <h5>List Orders</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered data-table">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Order ID</th>
                        <th>User Email</th>
                        <th>Mobile</th>
                        <th>Address</th>
                        <th>Order Status</th>
                        <th>Payment Method</th>
                        <th>Grand Total</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=0; ?>
                    @foreach($orders as $order)
                        <?php $i++; ?>
                        <tr class="gradeC">
                            <td>{{$i}}</td>
                            <td style="text-align: center; vertical-align: middle;">GSOFC1219-0{{$order->id}}</td>
                            <td style="vertical-align: middle;">{{$order->users_email}}</td>
                            <td style="text-align: center; vertical-align: middle;">{{$order->mobile}}</td>
                            <td style="text-align: center; vertical-align: middle;">{{$order->address}}</td>
                            <td style="text-align: center; vertical-align: middle;">
                                    {{$order->order_status==1?'Paid':'Unpaid'}}
                            <td style="text-align: center; vertical-align: middle;">{{$order->payment_method}}</td>
                            <td style="text-align: center; vertical-align: middle;">{{$order->grand_total}}</td>
                            </td>
                            <td style="text-align: center; vertical-align: middle;">
                                <a href="javascript:" rel="{{$order->id}}" rel1="delete-order" class="btn btn-danger btn-mini deleteRecord">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
@section('jsblock')
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/jquery.ui.custom.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery.uniform.js')}}"></script>
    <script src="{{asset('js/select2.min.js')}}"></script>
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/matrix.js')}}"></script>
    <script src="{{asset('js/matrix.tables.js')}}"></script>
    <script src="{{asset('js/matrix.popover.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

    <script>
        $(".deleteRecord").click(function () {
            var id=$(this).attr('rel');
            var deleteFunction=$(this).attr('rel1');
            swal({
                title:'Are you sure?',
                text:"You won't be able to revert this!",
                type:'warning',
                showCancelButton:true,
                confirmButtonColor:'#3085d6',
                cancelButtonColor:'#d33',
                confirmButtonText:'Yes, delete it!',
                cancelButtonText:'No, cancel!',
                confirmButtonClass:'btn btn-success',
                cancelButtonClass:'btn btn-danger',
                buttonsStyling:false,
                reverseButtons:true
            },function () {
                window.location.href="/admin/"+deleteFunction+"/"+id;
            });
        });

    </script>
@endsection
<script>let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
            elems.forEach(function(html) {
                let switchery = new Switchery(html,  { size: 'small' });
            });</script>
            <script>$(document).ready(function(){
                    $('.js-switch').change(function () {
                        let order_status = $(this).prop('checked') === true ? 1 : 0;
                        let id = $(this).data('id');
                        $.ajax({
                            type: "GET",
                            dataType: "json",
                            url: '{{ route('users.update.status') }}',
                            data: {'order_status': order_status, 'id': Id},
                            success: function (data) {
                                console.log(data.message);
                            }
                        });
                    });
                });
            </script>
