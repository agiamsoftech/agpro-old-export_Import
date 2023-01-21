@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />

<div class="container">
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h1>Upload Excel Sheet</h1></div>
                @if(count($errors) > 0)
                <div class="alert alert-danger"> 
                
                    @foreach($errors->all() as $error)
                        <h4>{{ $error }}</h4>
                    @endforeach
                
                </div>
                @endif

                @if($message = Session::get('success'))
                    <div class="alert alert-success"> 
                        <h4>{{ $message }}</h4>
                    </div>
                @endif
                <div class="card-body">
                    <form action="{{ url('import_excel/import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <input type="file" name="select_file" class="form-control">
                        <br>
                        <center><button class="btn btn-success" name="upload">Import User Data</button></center>
                        <br>
                    </form>
                    <center><a class="btn btn-warning" href="{{ url('export') }}">Export User Data</a></center>
                </div>

            </div>
        </div>
    </div>
</div>

<script src="/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

<script>

</script>
@endsection
