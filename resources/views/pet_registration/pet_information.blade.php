@extends('layouts.user')

@section('title', 'Pet Information')

@section('content')
<div class="container-fluid m-0">
    <div class="card col-12 col-lg-12 col-md-8 mx-auto my-5">
		<div class="card-body">
			<div class="row">
				@foreach($pets as $p)
				<div class="col-12 col-lg-6 d-flex">
					<div class="row my-3 mx-1 border rounded p-3 shadow flex-fill position-relative">
						{{-- PARTY POPPER --}}
						@if (Carbon\Carbon::parse($p->birthdate)->format("M d") === Carbon\Carbon::now()->timezone("Asia/Manila")->format("M d"))
						<span class="position-absolute" style="top: -2rem; left: -1.5rem; font-size: 2.5rem;" title="Birthday Today!" data-toggle="tooltip" data-placement="right">🎂</span>
						@endif

						<div class="col-12 col-lg-6 d-flex flex-column">
							{{-- IMAGE --}}
							<div class="text-center text-lg-right">
								<img src='{{ asset("uploads/clients/{$id}/pets/" . $p->pet_image) }}' class="img-fluid border mb-3 cursor-pointer" style="border-width: 0.25rem!important; max-height: 16.25rem;" alt="{{ $p->pet_name }}" data-toggle="modal" data-target='#{{ "{$p->pet_name}-{$p->id}" }}' id='img-{{ "{$p->pet_name }-{$p->id}" }}'>
							</div>
						</div>

						<div class="col-12 col-lg-6 d-flex flex-column text-center text-lg-left">
							{{-- NAME (BREED) --}}
							<span class="h2 my-0 text-wrap">{{ $p->pet_name }} ({{ $p->breed }})</span>
							{{-- BIRTHDAY --}}
							<span class="h4 mb-3">{{ Carbon\Carbon::parse($p->birthdate)->format("M d, Y") }}</span>

							{{-- SPECIES --}}
							<div>
								<span class="p font-weight-bold">Species:</span>
								<span class="mx-2">
									<i class="fas fa-{{ $p->species }} fa-lg mr-2"></i>{{ ucfirst($p->species) }}
								</span>
							</div>

							{{-- COLORS --}}
							<div class="text-wrap">
								<span class="p font-weight-bold">Colors: </span>
								@foreach(explode(", ", $p->colors) as $c)
								<span class="mx-2"><i class="fas fa-circle mr-2 border" style="color: {{ $c }}; border-radius: 50%; border-width: 0.125rem!important;"></i></span>
								@endforeach
							</div>

							{{-- GENDER --}}
							<div>
								<span class="p font-weight-bold">Gender: </span>
								<span class="mx-2">
									@if ($p->gender == "male")
									<i class="fas fa-mars fa-lg mr-2 text-primary"></i>{{ ucfirst($p->gender) }}
									@elseif ($p->gender == "female")
									<i class="fas fa-venus fa-lg mr-2" style="color: pink;"></i>{{ ucfirst($p->gender) }}
									@endif
								</span>
							</div>

							{{-- TYPES --}}
							<div>
								<span class="p font-weight-bold mr-2">Types: </span>
								<span class="p text-wrap">{{ ucfirst($p->types) }}</span>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
		<div class="d-flex">
			<div class="col-lg-6 col-md-6 col-12 mx-auto  text-center">
				<a href="{{route('profile',[$id])}}" class="btn btn-outline-primary btn-sm w-75 mb-3"><i class="fa-solid fa-backward mr-2"></i>back</a>
			</div>
		</div>
	</div>
</div>
@endsection