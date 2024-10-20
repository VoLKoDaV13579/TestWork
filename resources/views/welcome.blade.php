@extends('app')
@section('content')
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <input type="file" class="form-control" name="excel_file" placeholder="Excel file">
        </div>
        <div class="mb3">
            <button type="submit" name="submit" class="btn btn-success">
                Submit
            </button>
        </div>
    </form>
@endsection
