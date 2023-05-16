@extends ('admin.appointment.mail.layout')

@section('title')
Hello!
@endsection

@section('content')

<p>
   Your appointment has been successfully accepted.
</p>

<p>Please come to our clinic on the scheduled date and time.</p>

<code style="font-size:large;">
    <span style="font-family: Arial;">Scheduled Date:</span> {{ $appointment->reserved_at }}<br>
    <span style="font-family: Arial;">Appointment Time:</span> {{ $appointment->getAppointedTime() }}
</code>

@endsection