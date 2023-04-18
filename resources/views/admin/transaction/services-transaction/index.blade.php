@extends('layouts.admin')

@section('title', 'Service Transaction')

@section('content')

<div class="container-fluid px-2 px-lg-6 py-2 h-100 my-3">
    <div class="row">
        <div class="col-12 col-lg text-center text-lg-left">
            <h3 class="text-1">SERVICES TRANSACTION LIST</h3>
        </div>

        <div class="dropdown">
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

    <div class="overflow-x-auto h-100 card">
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
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/util/confirm-leave.js') }}"></script>
@endsection