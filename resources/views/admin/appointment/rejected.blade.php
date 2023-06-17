@extends('layouts.admin')

@section('title', 'Pet Profile')

@section('content')
<div class="container-fluid px-2 px-lg-6 py-2 h-100 my-3">
    <h3 class="mt-3"><a href="{{route('appointments.index')}}"
    class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i>Appointment List</a></h3>
  <hr class="hr-thick" style="border-color: #707070;">
    <div class="row">
        <div class="col-12 col-lg-6 text-center text-lg-left">
            <h2 class="text-1 mr-3">Rejected Appointment</h2>
        </div>

        <div class=" col-12 col-md-6 col-lg my-2 text-center text-lg-right">
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Search..." />
                <div class="input-group-append">
                    <button type="submit" class="btn btn-secondary"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </div>
    </div>

    <div class="overflow-x-auto h-100 card">
        <div class=" card-body h-100 px-0 pt-0">
            <table class="table table-striped text-center" id="table-content">
                <thead>
                    <tr>
                       <th scope="col" class="hr-thick text-1 text-center">Appointment #</th>
                        <th scope="col" class="hr-thick text-1 text-center">Client Name</th>
                        <th scope="col" class="hr-thick text-1 text-center">Appointment Date</th>
                        <th scope="col" class="hr-thick text-1 text-center">Service Type</th>
                        <th scope="col" class="hr-thick text-1 text-center">Status</th>
                        <th scope="col" class="hr-thick text-1 text-center">Action</th>
                    </tr>
                </thead>

               <tbody>
                    @forelse ($appointment as $ap)
                    <tr>
                        <td class="text-center">{{ $ap->appointment_no }}</td>
                        <td class="text-center">{{ $ap->user->getName() }}</td>
                        <td class="text-center">{{ \Carbon\Carbon::parse($ap->reserved_at)->format("M d, Y") }} ({{ $ap->getAppointedTime() }})</td>
                        <td class="text-center">{{ $ap->service->service_name }}</td>
                        <td class="text-center">
                            @if ($ap->status == 0)
                            <i class="fas fa-circle text-warning mr-2"></i>Pending
                            @elseif ($ap->status == 1)
                            <i class="fas fa-circle text-success mr-2"></i>Accepted
                            @elseif ($ap->status == 2)
                            <i class="fas fa-circle text-danger mr-2"></i>Rejected
                            @elseif ($ap->status == 3)
                            <i class="fas fa-check text-success mr-2"></i>Done
                            @else
                            <i class="fas fa-circle text-secondary mr-2"></i>Unknown
                            @endif
                        </td>

                        <td class="text-center">
                            <a href="{{ route('restore.appointment',[$ap->id])}}" type="button" class="btn btn-success btn-sm">Restore</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">Nothing to show~</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection