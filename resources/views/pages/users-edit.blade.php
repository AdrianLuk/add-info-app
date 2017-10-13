@extends('layouts.main')

@section('content')

    <h2 class="text-center">Editing {{$user->name}}'s Listing</h2>

    <form class="p-5 mt-5 bg-white" action="/listing/{{$user->id}}" method="post">
        {{ csrf_field() }}

    <input type="hidden" name="_method" value="PATCH">

        <div class="form-group">
          <label for="name" class="form-control-label text-uppercase font-weight-bold">Name <span class="text-danger">*</span></label>
          <input name="name" type="text" class="form-control form-control-lg" id="name" value="{{$user->name}}">
        </div>

<div class="form-row">
        <div class="form-group col">
            <label for="province" class="form-control-label text-uppercase font-weight-bold">Province <span class="text-danger">*</span></label><br>
        <select class="custom-select form-control form-control-lg" name="province">
            <option value="">Select your Province</option>
            <option value="Ontario">Ontario</option>
            <option value="Québec">Québec</option>
            <option value="Nova Scotia">Nova Scotia</option>
            <option value="New Brunswick">New Brunswick</option>
            <option value="Manitoba">Manitoba</option>
            <option value="British Columbia">British Columbia</option>
            <option value="Prince Edward Island">Prince Edward Island</option>
            <option value="Saskatchewan">Saskatchewan</option>
            <option value="Alberta">Alberta</option>
            <option value="Newfoundland and Labrador">Newfoundland and Labrador</option>
            <option value="Northwest Territories">Northwest Territories</option>
            <option value="Yukon">Yukon</option>
            <option value="Nunavut">Nunavut</option>
        </select>
        </div>
        </div>

        <div class="form-row">
            <div class="form-group col-lg-6">
              <label for="telephone" class="col-form-label text-uppercase font-weight-bold">Telephone <span class="text-danger">*</span></label>
              <input name="telephone" type="tel" class="form-control form-control-lg" id="telephone" value="{{$user->telephone}}">
              </div>
             <div class="form-group col-lg-6">
                 <label for="postal" class="col-form-label text-uppercase font-weight-bold">Postal Code <span class="text-danger">*</span></label>
                 <input type="text" name="postal" class="form-control form-control-lg" id="postal" value="{{$user->postal}}">
            </div>
        </div>
        <div class="form-group">
          <label for="salary" class="form-control-label text-uppercase font-weight-bold">Salary <span class="text-danger">*</span></label>
          <input name="salary" type="text" class="form-control form-control-lg" id="salary" value="{{$user->salary}}">
        </div>
        <div class="d-flex flex-row-reverse mt-4">
        <button type="submit" class="py-3 px-5 btn btn-primary btn-lg">Update</button></div>
    </form>

@endsection
