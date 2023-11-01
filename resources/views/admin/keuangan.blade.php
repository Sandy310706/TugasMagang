@extends('layouts.admin.app')
@section('title', 'Halaman Keuangan')
@section('headerNav', 'Keuangan')
@section('keuangan')
    <div id="chart"></div>
    <script>
        var chart = c3.generate({
    bindto: '#chart',
    data: {
      columns: [
        ['data1', 30, 200, 100, 400, 150, 250],
        ['data2', 50, 20, 10, 40, 15, 25]
      ]
    }
});
    </script>
@endsection
