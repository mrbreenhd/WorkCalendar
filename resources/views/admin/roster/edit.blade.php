@extends('layouts.admin')
@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card text-center">
        <div class="card-header">
            Edit {{$roster->user->name}}s Roster On {{\Carbon\Carbon::createFromTimestamp(strtotime($roster->shift_start))->format('d/m/Y')}}
        </div>
        <div class="card-body">
        <form action="{{ route('admin.update_user_calendar', $roster->id) }}" method="post">
          @csrf
          @method('PATCH')
            Agent Name:<br>
            <input type="text" disabled value="{{$roster->user->name}}">
            <br>
            <br>
              Description:<br>
              <input value=""  name="description">
            <br>
            <br>
              Select Shift Time
            <br>
          <select name="shift" id="shift">
            @foreach($timings as $timing)
              @if(!$roster->user->isAdmin && $timing->user_type == "Agent")
                <option value="{{$timing->name}}">{{$timing->name}}</option>
              @elseif($roster->user->isAdmin && $timing->user_type == "Teamlead")
                <option value="{{$timing->name}}">{{$timing->name}}</option>
              @endif
            @endforeach
          </select>
          <br>
          <br>
            Annual Leave
          <br>
          <select name="annualleave" id="annualleave">
              @if($roster->annual_leave == 1)
                <option value="yes">Yes</option>
                <option value="no">No</option>
              @elseif($roster->annual_leave == 0)
                <option value="no">No</option>
                <option value="yes">Yes</option>
              @endif
            </select>
          <br>
          <br>
            <input type="submit" class="btn btn-success" value="Save"/>
        </form>
        <br>
        <form action="{{ route('admin.delete_day_from_user_calendar', $roster->id) }}" method="post">
          @csrf
          @method('PATCH')

            <input onclick="return confirm('Are you sure you want to delete this day?')" type="submit" class="btn btn-danger" value="Delete Day">
        </form>
      </div>
    </div>
   </div>
  </div>
</div> 
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
@endsection 
