@extends('layouts.main')
@section('content')
    <script>
        $(document).ready(function() {
            $("#sidebarCollapse").on('click', function() {
                $("#sidebar").toggleClass('active');
            });
        });
    </script>
 
@endsection
