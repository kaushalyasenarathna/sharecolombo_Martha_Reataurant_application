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
       <div id="content-page" class="content-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="iq-card">
                            <div class="iq-header-title">
                                <h4 class="card-title" align='center'> Add New Order </h4>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('order_form') }}" method="POST" class="form-card">
                                        @csrf

                                        <div class="form-group">
                                            <label>Main Dish :</label>
                                            <select name="main_dish" class="form-control" id="main_dish" placeholder="Select Main Dish">
                                                <option value=""></option>
                                                @foreach ($main_dish as $main_dish)
                                                    <option value="{{ $main_dish->id }}">{{ $main_dish->main_dish }}
                                                    </option>

                                                @endforeach
                                            </select>
                                            <input type="hidden" id="main_dish_price" name="main_dish_price" >
                                        </div>

                                        <div class="form-group">
                                            <label>Side Dish :</label>
                                            <select name="side_dish" id="side_dish" class="form-control" placeholder="Selet Side Dish">
                                                <option value=""></option>

                                                @foreach ($side_dish as $side_dish)
                                                    <option value="{{ $side_dish->id }}">{{ $side_dish->side_dish }}
                                                    </option>

                                                @endforeach
                                            </select>
                                            <input type="hidden" id="side_dish_price" name="side_dish_price" >

                                        </div>
                                        <div class="form-group">
                                            <label>Dessert :</label>
                                            <select name="desert" id="desert" class="form-control" placeholder="Select Dessert">
                                                <option value=""></option>
                                                @foreach ($dessert as $dessert)
                                                    <option value="{{ $dessert->id }}">{{ $dessert->desert }}</option>

                                                @endforeach
                                            <input type="hidden" id="desert_price" name="desert_price" >

                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary rounded-pill">Submit</button>
                                    </form>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $('#main_dish').on('change', function() {
            var main_dish_price = $(this).val();
            $('#main_dish_price').val('');
            // $('#Groups').val('');
            if (main_dish_price) {
                $.ajax({
                    url: "{{ url('main_dish_price') }}/" + main_dish_price,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#main_dish_price').empty();
                        $.each(data, function(r) {

                                $('#main_dish_price').val(  data[0]
                                .price);


                        });
                        $('#main_dish_price').trigger("chosen:updated");



                    },
                });
            } else {
                alert('main_dish_price');
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#desert').on('change', function() {
            var desert_price = $(this).val();
            $('#desert_price').val('');
            // $('#Groups').val('');
            if (desert_price) {
                $.ajax({
                    url: "{{ url('desert_price') }}/" + desert_price,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#desert_price').empty();
                        $.each(data, function(r) {

                                $('#desert_price').val(  data[0]
                                .price);


                        });
                        $('#desert_price').trigger("chosen:updated");



                    },
                });
            } else {
                alert('desert_price');
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#side_dish').on('change', function() {
            var side_dish_price = $(this).val();
            $('#side_dish_price').val('');
            // $('#Groups').val('');
            if (side_dish_price) {
                $.ajax({
                    url: "{{ url('side_dish_price') }}/" + side_dish_price,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#side_dish_price').empty();
                        $.each(data, function(r) {

                                $('#side_dish_price').val(  data[0]
                                .price);
                        });
                        $('#side_dish_price').trigger("chosen:updated");
                    },
                });
            } else {
                alert('side_dish_price');
            }
        });
    });
</script>
