@extends('layouts.app')


@section('content')

<div class="container">
<form action="/addStudentMarkInsert" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="description">Student Name</label>
            <select class="form-control" name="student_id">
                @foreach($student_lists as $key => $item)
                <option value="{{$item}}">{{$key}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="description">Select Term</label>
            <select class="form-control" name="term">
                <option value="One">One</option>
                <option value="Two">Two</option>
            </select>
        </div>
        <label for="title">Subject</label>      
        <div class="form-group col-md-6">
            <label for="title">Maths</label>
            <input type="number" max="100" min='0' class="form-control" id="math"  name="math">
            <label for="title">Science</label>
            <input type="number" max="100" min='0' class="form-control" id="science"  name="science">
            <label for="title">History</label>
            <input type="number" max="100" min='0' class="form-control" id="history"  name="history">
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
    <div class="container">
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Math</th>
                <th scope="col">Science</th>
                <th scope="col">Term</th>
                <th scope="col">Total Marks</th>
                <th scope="col">Teacher</th>
                <th scope="col">Created On</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
           
            @foreach($student_results as $key => $item)
                <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>{{$item->student->name}}</td>
                    <td>{{$item->term}}</td>
                    <td>{{$item->math}}</td>
                    <td>{{$item->science}}</td>
                    <td>{{$item->history}}</td>
                    <td>{{$item->total_marks}}</td>
                    <td>{{$item->created_at}}</td>
                    <td><a href="/addStudentMarkEdit/{{$item->id}}">Edit</a> / <a href="/addStudentMarkDelete/{{$item->id}}">Delete</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection