@extends('layouts.main')

@section('content')
    <form class="p-5 mt-5 bg-white" action="/listing" method="post" novalidate>
        {{ csrf_field() }}

        <div class="form-group">
          <label for="name" class="form-control-label text-uppercase font-weight-bold">Name <span class="text-danger">*</span></label>
          <input name="name" type="text" class="form-control form-control-lg" id="name" placeholder="Your Name" value="{{Request::old('name')}}">
          @if ($errors->has('name'))
              <p class="form-text text-danger">{{$errors->first('name')}}</p>
          @endif
        </div>

<div class="form-row">
        <div class="form-group col">
            <label for="province" class="form-control-label text-uppercase font-weight-bold">Province <span class="text-danger">*</span></label>
        <select class="custom-select form-control form-control-lg" name="province">
            <option value="">Select your Province</option>
            <option value="Ontario" {{ (old("province") == 'Ontario' ? "selected":"") }}>Ontario</option>
            <option value="Québec" {{ (old("province") == 'Québec' ? "selected":"") }}>Québec</option>
            <option value="Nova Scotia" {{ (old("province") == 'Nova Scotia' ? "selected":"") }}>Nova Scotia</option>
            <option value="New Brunswick" {{ (old("province") == 'New Brunswick' ? "selected":"") }}>New Brunswick</option>
            <option value="Manitoba" {{ (old("province") == 'Manitoba' ? "selected":"") }}>Manitoba</option>
            <option value="British Columbia" {{ (old("province") == 'British Columbia' ? "selected":"") }}>British Columbia</option>
            <option value="Prince Edward Island" {{ (old("province") == 'Prince Edward Island' ? "selected":"") }}>Prince Edward Island</option>
            <option value="Saskatchewan" {{ (old("province") == 'Saskatchewan' ? "selected":"") }}>Saskatchewan</option>
            <option value="Alberta" {{ (old("province") == 'Alberta' ? "selected":"") }}>Alberta</option>
            <option value="Newfoundland and Labrador" {{ (old("province") == 'Newfoundland and Labrador' ? "selected":"") }}>Newfoundland and Labrador</option>
            <option value="Northwest Territories" {{ (old("province") == 'Northwest Territories' ? "selected":"") }}>Northwest Territories</option>
            <option value="Yukon" {{ (old("province") == 'Yukon' ? "selected":"") }}>Yukon</option>
            <option value="Nunavut" {{ (old("province") == 'Nunavut' ? "selected":"") }}>Nunavut</option>
        </select>
        @if ($errors->has('province'))
            <p class="form-text text-danger">{{$errors->first('province')}}</p>
        @endif
        </div>
        </div>

        <div class="form-row">
            <div class="form-group col-lg-6">
              <label for="telephone" class="col-form-label text-uppercase font-weight-bold">Telephone <span class="text-danger">*</span></label>
              <input name="telephone" type="tel" class="form-control form-control-lg" id="telephone" placeholder="123-456-7890" value="{{Request::old('telephone')}}">
              @if ($errors->has('telephone'))
                  <p class="form-text text-danger">{{$errors->first('telephone')}}</p>
              @endif
              </div>
             <div class="form-group col-lg-6">
                 <label for="postal" class="col-form-label text-uppercase font-weight-bold">Postal Code <span class="text-danger">*</span></label>
                 <input type="text" name="postal" class="form-control form-control-lg" id="postal" placeholder="ex. M5V 2T6" value="{{Request::old('postal')}}">
                 @if ($errors->has('postal'))
                     <p class="form-text text-danger">{{$errors->first('postal')}}</p>
                 @endif
            </div>
        </div>
        <div class="form-group">
          <label for="salary" class="form-control-label text-uppercase font-weight-bold">Salary ($)<span class="text-danger">*</span></label>
          <input name="salary" type="text" class="form-control form-control-lg" id="salary" placeholder="50,000.00" value="{{Request::old('salary')}}">
          @if ($errors->has('salary'))
              <p class="form-text text-danger">{{$errors->first('salary')}}</p>
          @endif
        </div>
        <div class="d-flex flex-row-reverse mt-4">
        <button type="submit" class="py-3 px-5 btn btn-primary btn-lg">SAVE</button></div>
    </form>

@endsection
