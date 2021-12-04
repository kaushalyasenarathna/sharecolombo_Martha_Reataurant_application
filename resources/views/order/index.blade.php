@extends('layouts.main')
@section('content')
<script>
    $(document).ready(function() {
        $("#sidebarCollapse").on('click', function() {
            $("#sidebar").toggleClass('active');
        });
    });
    </script>
    <div class="backgroundpadding">


        <div class="iq-header-title">
            <h4 class="card-title" align='center'> Order Data</h4>
        </div>
        <div class="card">
            <div class="card-body">
                <div id="content-page" class="content-page">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="iq-card">
                                    <div class="iq-card-header d-flex justify-content-between">
                                        <div class="iq-header-title">
                                            <h4 class="card-title"></h4>
                                        </div>
                                    </div>
                                    <div class="iq-card-body">
                                        <div id="table" class="table-editable">

                                            <table class="table table-sm">
                                                <thead>
                                                    <tr>
                                                        <th>Order Id</th>
                                                        <th>Main Dish</th>
                                                        <th>Side Dish</th>
                                                        <th>Dessrt</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($order as $order )
                                                    <tr>
                                                        <td>{{ $order->id }}</td>
                                                        <td>{{ $order->main_dish }}</td>
                                                        <td>{{ $order->side_dish }}</td>
                                                        <td>{{ $order->desert }}</td>

                                                    </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
