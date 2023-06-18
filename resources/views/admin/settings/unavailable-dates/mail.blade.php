@extends ('admin.layouts.emails.layout')

@section('title')
Hello!
@endsection

@section('content')

<p>
   Your appointment was cancelled.
</p>

<p>We would like to inform you that the scheduled date and time are not available</p>
<code style="font-size:large;">
    <span style="font-family: Arial;">Reason:</span> {{ $appointment->reason }}<br>
</code>

@endsection