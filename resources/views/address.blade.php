@extends('layouts.app')
@section('content')
<div class="container">
    <form action="/edit" method="post">
        {{csrf_field()}}
        <label for="郵便番号">郵便番号(半角ハイフンなし)</label><br>
        @if($errors->has('zip'))
            <span class="error" style="color:red">{{$errors->first('zip')}}</span><br>
        @endif
        <input type="text" name="zip" value="{{ old('zip') }}"><br>
        <label for="住所">住所</label><br>
        @if($errors->has('address'))
            <span class="error" style="color:red">{{$errors->first('address')}}</span><br>
        @endif
        <input type="text" name="address" value="{{ old('address') }}"><br>
        <input type="submit" value="変更" class="submit"><br>
    </form>
</div>
@endsection