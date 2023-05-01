@extends('layouts.admin')

@section('title', 'Service Transaction')

@section('content')

<div class="container-fluid px-2 px-lg-6 py-2 h-100 my-3">
    <div class="row">
        <div class="col-12 col-lg text-center text-lg-left">
            <h3 class="text-1">SERVICES TRANSACTION LIST</h3>
        </div>

        <div class="dropdown mx-auto">
            <button class="btn btn-info dropdown-toggle bg-1 btn-sm mt-3" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-plus-circle mr-2"></i>New Transaction
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <a href="{{ route('transaction.consultation.create') }}" class="dropdown-item" type="button"><i class="fa-solid fa-stethoscope mr-2"></i>Consultation</a>
                <a  href="{{ route('transaction.vaccination.create') }}" class="dropdown-item" type="button"><i class="fa-solid fa-syringe mr-2"></i>Vaccination</a>
                <a href="{{ route('transaction.grooming.create') }}" class="dropdown-item" type="button"><i class="fa-solid fa-scissors mr-2"></i>Grooming</a>
                <a href="{{ route('transaction.boarding.create') }}" class="dropdown-item" type="button"><i class="fa-solid fa-paw mr-2"></i>Boarding</a>
            </div>
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

    <div class="overflow-x-auto h-100 card w-lg-100 w-100 w-md-100">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="consultation-tab" data-toggle="tab" href="#consultation" role="tab" aria-controls="consultation" aria-selected="true">Consultation Table</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="vaccination-tab" data-toggle="tab" href="#vaccination" role="tab" aria-controls="vaccination" aria-selected="false">Vaccination Table</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="grooming-tab" data-toggle="tab" href="#grooming" role="tab" aria-controls="grooming" aria-selected="false">Grooming Table</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="boarding-tab" data-toggle="tab" href="#boarding" role="tab" aria-controls="boarding" aria-selected="false">Boarding Table</a>
            </li>
        </ul>

         <div class="tab-content" id="myTabContent">
            {{-- CONSULTATION --}}
            <div class="tab-pane fade show active" id="consultation" role="tabpanel" aria-labelledby="consultation-tab">
                <div class=" card-body h-100 px-0 pt-0">
                    
                    <table class="table table-striped text-center" id="table-content">
                        
                        <thead>
                            <tr>
                                <th scope="col" class="hr-thick text-1">Reference No</th>
                                <th scope="col" class="hr-thick text-1">Service Name</th>
                                <th scope="col" class="hr-thick text-1">Pet Name</th>
                                <th scope="col" class="hr-thick text-1">Total Amount</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($consultService as $cs)
                           <tr class="{{ $cs->isVoided() ? "bg-danger text-white" : "" }}">
                                <td>{{ $cs->reference_no }}</td>
                                <td>Consultation</td>
                                <td>
                                @php($len = 0)
                                @php($pn = "")
                                @foreach ($cs->petsInformations as $p)
                                    @if ($len >= 2)
                                        @break
                                    @endif

                                    @php($pn .= " {$p->pet_name},")
                                    @php($len++)
                                @endforeach
                                {{ substr($pn, 1, strlen($pn)-2)  }}{{ $len <= 2 ? "" : "..." }}
                                </td>
                                
                                <td>₱{{ number_format($cs->consultation()->sum("total"), 2) }}</td>
                                
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a class="btn btn-info btn-sm" href="#"><i class="fa-solid fa-eye"></i></a>
                                        @if (!$cs->isVoided())
                                        <button class="btn btn-outline-danger btn-sm" onclick="confirmLeave('{{ route('transaction.consultation.void', [$cs->id]) }}', undefined, 'Are you sure you want to void the transaction?');"><i class="fa-solid fa-ban"></i></button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                 <td colspan="5">~Nothing to show~</td>
                            </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>
            </div>
            {{-- END OF CONSULTATION --}}
            {{-- VACCINATION --}}
            <div class="tab-pane fade" id="vaccination" role="tabpanel" aria-labelledby="vaccination-tab">
                <div class=" card-body h-100 px-0 pt-0 ">
                    <table class="table table-striped text-center" id="table-content">
                        <thead>
                            <tr>
                                <th scope="col" class="hr-thick text-1">Reference No</th>
                                <th scope="col" class="hr-thick text-1">Service Name</th>
                                <th scope="col" class="hr-thick text-1">Mode of Payment</th>
                                <th scope="col" class="hr-thick text-1">Total Amount</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a class="btn btn-info btn-sm" href="{{--route ('transaction.service.view', [id]) --}}"><i class="fa-solid fa-eye"></i></a>
                                        {{-- @if (!$po->isVoided()) --}}
                                        <button class="btn btn-outline-danger btn-sm" onclick="confirmLeave('{{-- route('transaction.product.order.void', [id]) --}}', undefined, 'Are you sure you want to void the transaction?');"><i class="fa-solid fa-ban"></i></button>
                                        {{-- @endif --}}
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- END OF VACCINATION --}}

            {{-- GROOMING --}}
             <div class="tab-pane fade" id="grooming" role="tabpanel" aria-labelledby="grooming-tab">
                    <div class=" card-body h-100 px-0 pt-0 ">
                    <table class="table table-striped text-center" id="table-content">
                        <thead>
                            <tr>
                                <th scope="col" class="hr-thick text-1">Reference No</th>
                                <th scope="col" class="hr-thick text-1">Service Name</th>
                                <th scope="col" class="hr-thick text-1">Mode of Payment</th>
                                <th scope="col" class="hr-thick text-1">Total Amount</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a class="btn btn-info btn-sm" href="{{--route ('transaction.service.view', [id]) --}}"><i class="fa-solid fa-eye"></i></a>
                                        {{-- @if (!$po->isVoided()) --}}
                                        <button class="btn btn-outline-danger btn-sm" onclick="confirmLeave('{{-- route('transaction.product.order.void', [id]) --}}', undefined, 'Are you sure you want to void the transaction?');"><i class="fa-solid fa-ban"></i></button>
                                        {{-- @endif --}}
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
             </div>
            {{-- END OF GROOMING --}}

            {{-- BOARDING --}}
            <div class="tab-pane fade" id="boarding" role="tabpanel" aria-labelledby="boarding-tab">
                <div class=" card-body h-100 px-0 pt-0 ">
                    <table class="table table-striped text-center" id="table-content">
                        <thead>
                            <tr>
                                <th scope="col" class="hr-thick text-1">Reference No</th>
                                <th scope="col" class="hr-thick text-1">Service Name</th>
                                <th scope="col" class="hr-thick text-1">Mode of Payment</th>
                                <th scope="col" class="hr-thick text-1">Total Amount</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a class="btn btn-info btn-sm" href="{{--route ('transaction.service.view', [id]) --}}"><i class="fa-solid fa-eye"></i></a>
                                        {{-- @if (!$po->isVoided()) --}}
                                        <button class="btn btn-outline-danger btn-sm" onclick="confirmLeave('{{-- route('transaction.product.order.void', [id]) --}}', undefined, 'Are you sure you want to void the transaction?');"><i class="fa-solid fa-ban"></i></button>
                                        {{-- @endif --}}
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
             </div>
            {{-- END OF BOARDING --}}
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/util/confirm-leave.js') }}"></script>
@endsection