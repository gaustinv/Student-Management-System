@extends('layouts.app')

@section('content')

<div class="container">
<form action="/studentUpdate" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="title">Name</label>
            <input type="hidden" class="form-control" id="name" value="{{$students->id}}"  name="id">
            <input type="text" class="form-control" id="name" value="{{$students->name}}"  name="name">
        </div>
        <div class="form-group">
            <label for="title">Age</label>
            <input type="number" class="form-control" id="age" value="{{$students->age}}"  name="age">
        </div>
        <div class="form-group">
            <label for="description">Gender</label><br/>
            <label class="radio-inline"><input type="radio" name="gender" value="Male" @if($students->gender=='Male') checked @endif> Male</label>
            <label class="radio-inline"><input type="radio" name="gender" value="Female" @if($students->gender=='Female') checked @endif> Female</label>
        </div>
        <div class="form-group">
            <label for="description">Reporting Teacher</label>
            <select class="form-control" name="reporting_teacher">
                <option value="Katie" @if($students->name=='Katie') selected @endif>Katie</option>
                <option value="Max" @if($students->name=='Max') selected @endif">Max</option>
                <option value="Sam" @if($students->name=='Sam') selected @endif>Sam</option>
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
@endsection
