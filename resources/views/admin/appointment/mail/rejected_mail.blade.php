@extends ('admin.appointment.mail.layout')

@section('title')
Hello!
@endsection

@section('content')

<p>
   Your appointment has been rejected.
</p>

<p>We would like to inform you that the scheduled date and time are not available</p>
<code style="font-size:large;">
    <span style="font-family: Arial;">Reason:</span> {{ $appointment->reason }}<br>
</code>

@endsection