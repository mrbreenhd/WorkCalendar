@extends('layouts.admin')
@section('content')

<center>
  <form action="{{ route('admin.update_user_calendar', $roster->id) }}" method="post">
    @csrf
    @method('PATCH')
    Agent Name: <input type="text" disabled value="{{$roster->user->name}}">
    <br/>
    <br/>
    <br/>
      Description:
    <br/>
      <input value=""  name="description">
    <br/>
    <br/>
      Select Shift Time
    <br/>
    <select name="shift" id="shift">
      @if(!$roster->user->isAdmin || $roster->user->name == "Ciaran Breen")
        <option value="early">Early</option>
        <option value="late">Late</option>
      @elseif($roster->user->isAdmin)
        <option value="tlearly">TL Early</option>
        <option value="tllate">TL Late</option>
      @endif
    </select>
    <br/>
    <br>
    Annual Leave
    <br>
    <select name="annualleave" id="annualleave">
      <option value="no">No</option>
      <option value="yes">Yes</option>
    </select>
    <br/>
      <input type="submit" value="Save" />
  </form>
</center>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
@endsection 
