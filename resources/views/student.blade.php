@extends('layouts.app')

@section('content')

<div class="container">
<form action="/addStudentInsert" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="title">Name</label>
            <input type="text" class="form-control" id="name"  name="name">
        </div>
        <div class="form-group">
            <label for="title">Age</label>
            <input type="number" class="form-control" id="age"  name="age">
        </div>
        <div class="form-group">
            <label for="description">Gender</label><br/>
            <label class="radio-inline"><input type="radio" name="gender" value="Male"> Male</label>
            <label class="radio-inline"><input type="radio" name="gender" value="Female"> Female</label>
        </div>
        <div class="form-group">
            <label for="description">Reporting Teacher</label>
            <select class="form-control" name="reporting_teacher">
                <option value="Katie">Katie</option>
                <option value="Max">Max</option>
                <option value="Sam">Sam</option>
            </select>
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
            <th scope="col">Age</th>
            <th scope="col">Gender</th>
            <th scope="col">Teacher</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($students as $key =>  $item)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$item->name}}</td>
                <td>{{$item->age}}</td>
                <td>{{$item->gender}}</td>
                <td>{{$item->reporting_teacher}}</td>
                <td><a href="/addStudentEdit/{{$item->id}}">Edit</a> / <a href="/addStudentDelete/{{$item->id}}">Delete</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>

@endsection
