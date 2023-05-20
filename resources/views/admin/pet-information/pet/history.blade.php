@extends('layouts.admin')

@section('title', 'Pet History')

@section('content')
<div class="container-fluid px-2 px-lg-6 py-2 h-100 my-3 print">
	<h3 class="mt-3"><a href="{{ route('pet-information.pet.show', [$pet->user->id]) }}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i>Pet List Information</a></h3>
	<hr class="hr-thick" style="border-color: #707070;">

	<div class="col-12 my-2 pb-5 mx-auto">
		<form class="card mx-auto"  enctype="multipart/form-data">
			{{ csrf_field() }}

			<h2 class="card-header text-center text-white bg-1 text-wrap">Nano Veterinary Medical History</h2>

			<div class="card-body">
				<div class="row mb-5">
					{{-- PET OWNER --}}
					<div class="col-12 form-group mx-auto my-2">
						<div class="input-group input-group-sm mb-1">
							<div class="input-group-prepend">
								<span class="input-group-text border border-white bg-white font-weight-bold" id="inputGroup-sizing-sm">Pet Owner</span>
							</div>

							<input type="text" class="form-control border-right-0 border-left-0 border-top-0 border-bottom border-secondary bg-white" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" readonly value="{{ $pet->user->getName() }}">
						</div>
					</div>

					{{-- EMAIL --}}
					<div class="col-12 form-group mx-auto my-2">
						<div class="input-group input-group-sm mb-1">
							<div class="input-group-prepend">
								<span class="input-group-text border border-white bg-white font-weight-bold" id="inputGroup-sizing-sm">Email</span>
							</div>

							<input type="text" class="form-control border-right-0 border-left-0 border-top-0 border-bottom border-secondary bg-white" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" readonly value="{{ $pet->user->email }}">
						</div>
					</div>

					{{-- ADDRESS --}}
					<div class="col-12 form-group mx-auto my-2">
						<div class="input-group input-group-sm">
							<div class="input-group-prepend">
								<span class="input-group-text border border-white bg-white font-weight-bold" id="inputGroup-sizing-sm">Address</span>
							</div>
							<input type="text" class="form-control border-right-0 border-left-0 border-top-0 border-bottom border-secondary bg-white" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" readonly value="{{ $pet->user->address }}">
						</div>
					</div>
				</div>

				{{-- PET INFORMATION --}}
				<div class="card mx-auto position-relative px-2 py-5 p-md-5 mb-5 w-lg-100 w-100 w-md-100">
					<div class="position-absolute bg-1 text-white text-center d-flex w-75 w-md-50 w-lg-50 text-wrap" style="top: -1.8rem; left:1.5rem; min-height:4rem; max-height: 4rem; border-radius:0.5rem;">
						<span class="h4 m-auto text-truncate">Pet Information</span>
					</div>

					<div class="w-lg-100 w-md-100 w-100 mx-auto">
						<div class="row">
							<div class="col-lg-9 mt-5 d-flex flex-column">
								<div class="row mt-auto">
									{{-- BIRTHDATE --}}
									<div class="col-lg-6 col-12 col-md-8 form-group">
										<div class="input-group input-group-sm mb-1">
											<div class="input-group-prepend">
												<span class="input-group-text border border-white bg-white font-weight-bold" id="inputGroup-sizing-sm">Birthdate</span>
											</div>

											<input type="text" class="form-control border-right-0 border-left-0 border-top-0 border-bottom border-secondary bg-white" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" readonly value="{{ \Carbon\Carbon::parse($pet->birthdate)->format('M d, Y') }}">
										</div>
									</div>

									{{-- GENDER --}}
									<div class="col-lg-6 col-12 col-md-8 form-group">
										<div class="input-group input-group-sm mb-1">
											<div class="input-group-prepend">
												<span class="input-group-text border border-white bg-white font-weight-bold" id="inputGroup-sizing-sm">Gender</span>
											</div>

											<input type="text" class="form-control border-right-0 border-left-0 border-top-0 border-bottom border-secondary bg-white" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" readonly value="{{ ucfirst($pet->gender) }}">
										</div>
									</div>
								</div>

								<div class="row">
									{{-- COLOR(S) --}}
									<div class="col-lg-6 col-12 col-md-8 form-group">
										<div class="input-group input-group-sm mb-1">
											<div class="input-group-prepend">
												<span class="input-group-text border border-white bg-white font-weight-bold" id="inputGroup-sizing-sm">Color/s</span>
											</div>

											<div class="text-wrap border-bottom border-secondary w-auto flex-grow-1">
												@foreach(explode(", ", $pet->colors) as $c)
												<span class="mx-1"><i class="fas fa-circle border" style="color: {{ $c }}; border-radius: 50%; border-width: 0.125rem!important;"></i></span>
												@endforeach
											</div>
										</div>
									</div>

									{{-- BREED --}}
									<div class="col-lg-6 col-12 col-md-8 form-group">
										<div class="input-group input-group-sm mb-1">
											<div class="input-group-prepend">
												<span class="input-group-text border border-white bg-white font-weight-bold" id="inputGroup-sizing-sm">Breed</span>
											</div>

											<input type="text" class="form-control border-right-0 border-left-0 border-top-0 border-bottom border-secondary bg-white" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" readonly value="{{ ucfirst($pet->breed) }}">
										</div>
									</div>
								</div>

								<div class="row mb-auto">
									{{-- SPECIES --}}
									<div class="col-lg-6 col-12 col-md-8 form-group">
										<div class="input-group input-group-sm mb-1">
											<div class="input-group-prepend">
												<span class="input-group-text border border-white bg-white font-weight-bold" id="inputGroup-sizing-sm">Species</span>
											</div>

											<input type="text" class="form-control border-right-0 border-left-0 border-top-0 border-bottom border-secondary bg-white" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" readonly value="{{ ucfirst($pet->species) }}">
										</div>
									</div>

									{{-- TYPES --}}
									<div class="col-lg-6 col-12 col-md-8 form-group">
										<div class="input-group input-group-sm mb-5">
											<div class="input-group-prepend">
												<span class="input-group-text border border-white bg-white font-weight-bold" id="inputGroup-sizing-sm">Type</span>
											</div>

											<input type="text" class="form-control border-right-0 border-left-0 border-top-0 border-bottom border-secondary bg-white" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" readonly value="{{ ucfirst($pet->types) }}">
										</div>
									</div>
								</div>
							</div>

							{{-- IMAGE --}}
							<div class="col-lg-3 col-md-4 d-flex flex-column mt-5">
								<img src="{{ $pet->getImage() }}" alt="Pet Image" class="img-thumbnail getImage mt-3">
								<span class="font-weight-bold mx-auto mt-2">{{ $pet->pet_name }}</span>
							</div>

						</div>
					</div>
				</div>

				{{-- CLINICAL HISTORY --}}
				<div class="card mx-auto position-relative px-2 py-5 p-md-5 mb-5 w-lg-100 w-100 w-md-100">
					<div class="position-absolute bg-1 text-white text-center d-flex w-75 w-md-50 w-lg-50 text-wrap" style="top: -1.8rem; left:1.5rem; min-height:4rem; max-height: 4rem; border-radius:0.5rem;">
						<span class="h4 m-auto text-truncate">Clinical History</span>
					</div>

					<div class="w-lg-100 w-md-100 w-100 mx-auto">
						@forelse ($pet->consultation()->orderBy('created_at')->get() as $h)
						<div class="card mx-auto position-relative px-2 py-2 p-md-5 mt-5 w-lg-100 w-100 w-md-100">
							<div class="position-absolute bg-1 text-white text-center d-flex w-75 w-md-50 w-lg-50 text-wrap" style="top: -1.8rem; left:1.5rem; min-height:4rem; max-height: 4rem; border-radius:0.5rem;">
								<span class="h5 m-auto text-wrap">Issued at {{ \Carbon\Carbon::parse($h->created_at)->timezone('Asia/Manila')->format('M d, Y h:i A') }}</span>
							</div>

							<div class="card-body px-1 px-md-2">
								<div class="row">
									{{-- WEIGHT --}}
									<div class="col-lg-6 col-12 my-2 order-0 form-group">
										<div class="input-group flex-nowrap">
											<div class="input-group-prepend">
												<span class="input-group-text border border-white bg-white font-weight-bold" id="addon-wrapping">Weight :</span>
											</div>
											
											<input value="{{ $h->weight }}" type="text" class="form-control border-right-0 border-left-0 border-top-0 border-bottom border-secondary" aria-describedby="addon-wrapping">
										</div>
									</div>

									{{-- TEMPERATURE --}}
									<div class="col-lg-6 col-12 my-2 order-1 form-group">
										<div class="input-group flex-nowrap">
											<div class="input-group-prepend">
												<span class="input-group-text border border-white bg-white font-weight-bold" id="addon-wrapping">Temperature :</span>
											</div>
											
											<input value="{{ $h->temperature }}" type="text" class="form-control border-right-0 border-left-0 border-top-0 border-bottom border-secondary" aria-describedby="addon-wrapping">
										</div>
									</div>

									{{-- FINDINGS --}}
									<div class="col-lg-6 col-12 my-2 order-2 form-group">
										<div class="input-group flex-nowrap">
											<div class="input-group-prepend">
												<span class="input-group-text border border-white bg-white font-weight-bold">Findings:</span>
											</div>

											<textarea readonly class="form-control border-right-0 border-left-0 bg-white border-top-0 border-bottom border-secondary not-resizable" aria-label="Findings" rows="3">{{ $h->findings }}</textarea>
										</div>
									</div>

									{{-- TREATMENT --}}
									<div class="col-lg-6 col-12 my-2 order-3 form-group">
										<div class="input-group flex-nowrap">
											<div class="input-group-prepend">
												<span class="input-group-text border border-white bg-white font-weight-bold">Treatment:</span>
											</div>

											<textarea readonly class="form-control border-right-0 border-left-0 bg-white border-top-0 border-bottom border-secondary not-resizable" aria-label="Treatment" rows="3">{{ $h->treatment }}</textarea>
										</div>
									</div>
								</div>
							</div>
						</div>
						@empty
						<div class="card">
							<div class="card-body">
								<h3 class="card-title text-center">No History Yet</h3>
							</div>
						</div>
						@endforelse
					</div>
				</div>
			</div>

			<div class="card-footer d-flex justify-content-center flex-wrap">
				<a href="{{ route('history.print', [$id, 'output' => 'print']) }}" target="_new" class="btn btn-outline-info btn-sm mx-2 my-1"><i class="fa-solid fa-print mr-2"></i>Print Report</a>
				<a href="{{ route('history.print', [$id, 'output' => 'pdf']) }}" target="_new" class="btn btn-outline-info btn-sm mx-2 my-1"><i class="fa-solid fa-file-pdf mr-2"></i>Download Report (PDF)</a>
			</div>
		</form>
	</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/util/disable-on-submit.js') }}"></script>
@endsection