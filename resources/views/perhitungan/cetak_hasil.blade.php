<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('/plugins/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('/plugins/datatables/dataTables.bootstrap4.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('/dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<body>
    <div class="card">
        <div class="card-body">
            <table id="data-admin-2" class="table table-bordered">
            <thead>
                <tr>
                    <td>NISN</td>
                    @foreach (array_keys($hasil_1['kriteria']) as $head)
                    <td>{{$head}}</td>
                    @endforeach
                    <td>Hasil</td>
                    <td>Rangking</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($perangkingan as $key => $alt)
                <tr>
                <td>{{$alt['nisn']}}</td>
                @foreach ($alt['nilai'] as $val)
                @foreach ($val as $val2)
                <td>{{round($val2, 2)}}</td>
                @endforeach
                @endforeach
                <td>{{round($alt['hasil'], 2)}}</td>
                <td>{{$alt['rangking']}}</td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>
</body>
</html>