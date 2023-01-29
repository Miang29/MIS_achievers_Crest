@extends('layouts.admin')

@section('title', 'Pet Profile')

@section('content')

<div class="container-fluid px-2 px-lg-6 py-2 h-100 my-3">
	<div class="row border-bottom border-secondary">
		<div class="col-12 col-lg-6 text-center text-lg-left ">
			<h3 class="mt-3"><a href="{{route('pet-information')}}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i>Pet Information</a></h3>
		</div>

		<div class=" col-12 col-md-6 col-lg-6 my-2 text-center text-lg-right">
			<div class="input-group">
				<input type="text" class="form-control" name="search" placeholder="Search..." />
				<div class="input-group-append">
					<button type="submit" class="btn btn-secondary"><i class="fas fa-search"></i></button>
				</div>
			</div>
		</div>
	</div>
	<div class="card mx-auto mt-4">
		<h5 class="card-header text-center text-white bg-1 font-weight-bold text-justify" style=" word-spacing: 3px;">P E T  <p>L I S T  I N F O R M A T I O N</h5>
		<div class="position-absolute border rounded input m-0" style="top: -1rem; right: -1rem;">
			<a href="{{ route('pet-information.pet.add')}}" class="btn btn-md bg-white border-light"><i class="fa-solid fa-plus text-black"></i></a>

		</div>
		<div class="card-body">
			<div class="row">
				@foreach($pets as $p)
				<div class="col-12 col-lg-6 d-flex">
					<div class="row my-3 mx-1 border rounded p-3 shadow flex-fill position-relative">
						{{-- PARTY POPPER --}}
						@if (Carbon\Carbon::parse($p->birthdate)->format("M d") === Carbon\Carbon::now()->timezone("Asia/Manila")->format("M d"))
						<span class="position-absolute" style="top: -2rem; left: -1.5rem; font-size: 2.5rem;" title="Birthday Today!" data-toggle="tooltip" data-placement="right">🎂</span>
						@endif

						{{-- MODIFIERS --}}
						<div class="position-absolute border rounded input m-0" style="top: -1rem; right: -1rem;">
							<div class="input-group">
								<div class="input-group-prepend bg-white border-right">
									<a href="{{ route("pet-information.pet.edit", [$id, $p->id]) }}" class="btn btn-white"><i class="fas fa-pencil text-black"></i></a>
								</div>

								<div class="input-group-append bg-white border-left">
									<a href="javascript:void(0);" onclick="confirmLeave(`{{route('pet-information.pet.show', [1])}}`, undefined, `Are you sure you want to remove this pet?`);" class="btn btn-white"><i class="fas fa-trash text-danger"></i></a>
								</div>
							</div>
						</div>

						<div class="col-12 col-lg-6 d-flex flex-column">
							{{-- IMAGE --}}
							<div class="text-center text-lg-right">
								<img src='{{ asset("uploads/clients/{$id}/pets/" . $p->pet_image) }}' class="img-fluid border mb-3 cursor-pointer" style="border-width: 0.25rem!important; max-height: 16.25rem;" alt="{{ $p->pet_name }}" data-toggle="modal" data-target='#{{ "{$p->pet_name}-{$p->$id}" }}" id="img-{{ "{$p->pet_name}-{$p->$id}" }}'>
							</div>
						</div>

						<div class="col-12 col-lg-6 d-flex flex-column text-center text-lg-left">
							{{-- NAME (BREED) --}}
							<span class="h2 my-0 text-wrap">{{ $p->pet_name }} ({{ $p->breed }})</span>
							{{-- BIRTHDAY --}}
							<span class="h4 mb-3">{{ Carbon\Carbon::parse($p->birthdate)->format("M d, Y") }}</span>

							{{-- SPECIES --}}
							<div>
								<span class="p font-weight-bold">Species: </span>
								<span class="mx-2">
									@if ($p->species == "Dog")
									<i class="fas fa-dog fa-lg mr-2"></i>{{ $p->species }}
									@elseif ($p->species == "Cat")
									<i class="fas fa-cat fa-lg mr-2"></i>{{ $p->species }}
									@endif
								</span>
							</div>

							{{-- COLORS --}}
							<div class="text-wrap">
								<span class="p font-weight-bold">Colors: </span>
								@foreach(explode(", ", $p->colors) as $c)
								<span class="mx-2"><i class="fas fa-circle mr-2 border" style="color: {{ $c }}; border-radius: 50%; border-width: 0.125rem!important;"></i>{{ ucfirst($c) }}</span>
								@endforeach
							</div>

							{{-- GENDER --}}
							<div>
								<span class="p font-weight-bold">Gender: </span>
								<span class="mx-2">
									@if ($p->gender == "Male")
									<i class="fas fa-mars fa-lg mr-2 text-primary"></i>{{ $p->gender }}
									@else
									<i class="fas fa-venus fa-lg mr-2" style="color: pink;"></i>{{ $p->gender }}
									@endif
								</span>
							</div>

							{{-- TYPES --}}
							<div>
								<span class="p font-weight-bold">Types: </span>
								<span class="p text-wrap">{{ ucfirst($p->types) }}</span>
							</div>

							{{-- HISTORY --}}
							<div class="mt-2">
								<button type="button" class="btn btn-info btn-sm bg-1"><i class="fa-regular fa-eye mr-2"></i>View History</button>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/util/confirm-leave.js') }}"></script>

@foreach($pets as $p)
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="img-{{ "{$p['name']}-{$p['id']}" }}" aria-hidden="true" id="{{ "{$p['name']}-{$p['id']}" }}">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">{{ $p["name"] }} ({{ $p["breed"] }})</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body text-center">
				<img src="{{ asset("uploads/clients/{$id}/pets/" . $p["img"]) }}" class="img-fluid border mb-3 h-100" style="border-width: 0.25rem!important;" alt="{{ $p["name"] }}">
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>
@endforeach
@endsection