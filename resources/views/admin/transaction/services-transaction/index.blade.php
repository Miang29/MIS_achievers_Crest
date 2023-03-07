@extends('layouts.admin')

@section('title', 'Service Transaction')

@section('content')

<div class="container-fluid px-2 px-lg-6 py-2 h-100 my-3">
    <div class="row">
        <div class="col-12 col-lg text-center text-lg-left">
            <h3 class="text-1">SERVICES TRANSACTION LIST</h3>
        </div>

        
		<div class="col-12 col-md-6 col-lg my-2 text-center text-md-left text-lg-right">
			<a href="{{route('transaction.service.create')}}" class="btn btn-info bg-1 btn-sm my-1"><i class="fas fa-plus-circle mr-2"></i>Create Transaction</a>
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
                        <th scope="col" class="hr-thick text-1">Service Name</th>
                        <th scope="col" class="hr-thick text-1">Reference No</th>
                        <th scope="col" class="hr-thick text-1">Mode of Payment</th>
                        <th scope="col" class="hr-thick text-1">Total</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>Consultation</td>
                        <td scope="row">#{{ str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT) }}</td>
                        <td>Gcash</td>
                        <td>₱{{ number_format(str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT), 2) }}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-info bg-1 btn-sm dropdown-toggle mark-affected" type="button" data-toggle="dropdown" id="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Action
                                </button>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown">
                                    <a href="{{route('transaction.service.view',[1]) }}" class="dropdown-item"><i class="fa-solid fa-eye mr-2"></i>View Transaction</a>
                                    <a href="javascript:void(0);" onclick="confirmLeave('{{ route('transaction.service.delete', [1]) }}', undefined, 'Are you sure you want to delete this transaction?');" class="dropdown-item"><i class="fa-solid fa-trash mr-2"></i>Delete Transaction</a>
                                </div>
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