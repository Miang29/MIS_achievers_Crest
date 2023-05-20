@extends('layouts.admin')

@section('title', 'Pet Profile')

@section('content')
<div class="container-fluid px-2 px-lg-6 py-2 h-100 my-3">
    <h3 class="mt-3"><a href="{{route('pet-information')}}"
    class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i>Pet List Information</a></h3>
  <hr class="hr-thick" style="border-color: #707070;">
    <div class="row">
        <div class="col-12 col-lg-6 text-center text-lg-left">
            <h2 class="text-1 mr-3">Archived Pet List</h2>
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
                        <th scope="col" class="hr-thick text-1 text-center">Pet Owner</th>
                        <th scope="col" class="hr-thick text-1 text-center">Email</th>
                        <th scope="col" class="hr-thick text-1 text-center">Pet(s)</th>
                        <th scope="col" class="hr-thick text-1 text-center">Action</th>
                    </tr>
                </thead>

                <tbody>
                    {{-- @forelse ($clients as $c)
                    <tr>
                        <td class="text-center">{{ $c->name }}</td>
                        <td class="text-center">{{ $c->email }}</td>
                        <td class="text-center text-truncate">
                            @php
                            $arr = [];
                            foreach ($c->petsInformations as $p)
                            array_push($arr, $p->pet_name);

                            echo implode(', ', $arr);
                            @endphp
                        </td>

                        <td class="text-center">
                            
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">Nothing to show~</td>
                    </tr>
                    @endforelse --}}
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection