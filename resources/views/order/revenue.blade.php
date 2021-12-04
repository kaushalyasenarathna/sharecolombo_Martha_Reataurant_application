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
            <h5 style="color: red;">Most famous Main Dish:
                {{-- //Most famous Main Dish --}}
                @foreach ($main as $main)
                    @if ($max_main_dish->main == $main->main)
                        <?php $x = $main->main_dish; ?>
                        @foreach ($data as $dt)
                            @if ($dt->id == $x)
                                {{ $dt->main_dish }}
                            @endif
                        @endforeach
                    @endif
                @endforeach
                <br>
                Most famous Side Dish:
                {{-- //Most famous Side Dish --}}
                @foreach ($side as $side)
                    @if ($max_side_dish->side == $side->side)
                        <?php $y = $side->side_dish; ?>
                        @foreach ($data as $dt)
                            @if ($dt->id == $y)
                                {{ $dt->side_dishes }}
                            @endif
                        @endforeach
                    @endif
                @endforeach

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
                                        *
                                    </div>
                                    <div class="iq-card-body">
                                        <div id="table" class="table-editable">

                                            <table class="table table-sm">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Date</th>
                                                        <th>Total</th>
                                                        <th>Genarate pdf</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 0; ?>

                                                    @foreach ($order as $order)

                                                        <tr style="font-size:10px" scope="row">
                                                            <?php $i++; ?>
                                                            <td>{{ $i }}</td>
                                                            <td>{{ $order->date }}</td>
                                                            <td>RS.{{ number_format($order->tot, 2) }}</td>
                                                            <td>
                                                                <form action="{{ route('pdf') }}">
                                                                    <input id="date" name="date" type="hidden"
                                                                        value="{{ $order->date }}">
                                                                    <input type="hidden" value="{{ $order->tot }}"
                                                                        id="tot" name="tot">
                                                                    <button type="submit" id="PDF"
                                                                        class="btn btn-danger   ">PDF</i></button>
                                                                </form>

                                                            </td>

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
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $(function() {
                $('#pdf').on('click', function() {
                    var date = $('#date').val();
                    var tot = $('#tot').val();
                    console.log(date);
                    console.log(tot);
                    window.open("pdf?date=" + date +
                        "&tot=" + tot);
                });
            });
        });
    </script> --}}
@endsection
