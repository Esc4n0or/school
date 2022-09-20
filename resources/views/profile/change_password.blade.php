
@extends('layouts.master')
@section('css')
    @livewireStyles
@section('title')
    تعديل كلمة المرور
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        Change Password 
    </div> 
    <div class="card-body">
        <form action="{{route('update_password')}}" id="" method="post">
            @csrf
            <div class="form-group">
                <label for="old_password">{{trans('setting.Old Password')}}</label>
                <input type="password" name="old_password" class="form-control" id="old_password"> 
            </div>

            @if($errors->any('old_password'))
                <span class="text-danger">{{$errors->first('old_password')}}</span>
            @endif

            <div class="form-group">
                <label for="password">{{trans('setting.New Password')}}</label>
                <input type="password" name="new_password" class="form-control" id="new_password">
            </div>

            @if($errors->any('new_password'))
                <span class="text-danger">{{$errors->first('new_password')}}</span>
            @endif

            <div class="form-group">
                <label for="confirm_password">{{trans('setting.Confirm Password')}}</label>
                <input type="password" name="confirm_password" class="form-control" id="confirm_password">
            </div>

            @if($errors->any('confirm_password'))
                <span class="text-danger">{{$errors->first('confirm_password')}}</span>
            @endif

            <button type="submit" class="btn btn-primary">{{trans('setting.Update Password')}}</button>
        </form>

  
  </div>
</div>

@endsection
