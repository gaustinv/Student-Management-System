@extends('layouts.app')


@section('content')

<div class="container">
<form action="/studentMarkUpdate" method="post">
        {{ csrf_field() }}
        <input type="hidden" class="form-control" id="id" value="{{$student_mark->id}}"  name="id">
        <div class="form-group">
            <label for="description">Student Name</label>
            <select class="form-control" name="student_id">
                @foreach($student_lists as $key => $item)
                <option value="{{$item}}" @if($student_mark->student_id==$item) selected @endif >{{$key}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="description">Select Term</label>
            <select class="form-control" name="term">
                <option value="One"  @if($student_mark->term=='One') selected @endif>One</option>
                <option value="Two"  @if($student_mark->term=='Two') selected @endif>Two</option>
            </select>
        </div>
        <label for="title">Subject</label>      
        <div class="form-group col-md-6">
            <label for="title">Maths</label>
            <input type="number" max="100" min='0' class="form-control" id="math"  name="math" value="{{$student_mark->math}}">
            <label for="title">Science</label>
            <input type="number" max="100" min='0' class="form-control" id="science"  name="science" value="{{$student_mark->science}}">
            <label for="title">History</label>
            <input type="number" max="100" min='0' class="form-control" id="history"  name="history" value="{{$student_mark->history}}">
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
  

@endsection