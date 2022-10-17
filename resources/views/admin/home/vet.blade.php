@extends('layouts.admin')

@section('css')
@endsection

@section('title', 'Home')

@section('content')

<div class="d-flex flex-column min-vh-100 bg-white">
        <div class="content d-flex flex-column flex-grow-1 my-5 my-lg-10 align-items-center" id="content">
          <h1 class="title text-info font-weight-bold text-uppercase">Important Infectious Disease And Their Prevention</h1>
      <div class="row ">
            <div class="col-sm-6 mb-3">
              <div class="card border-primary bg-info">
                 <div class="card-body text-center">
                    <h5 class="card-title text-white">Dogs</h5>
                    <p class="card-text font-weight-bold">CANINE PARVOVIRUS (CPV) is a peracute viral infection, often
                        fatal in dogs below one year and causes severe gastroenteritis in older dogs.
                    </p>
                    <br>
                    <p class="card-text font-weight-bold">CANINE DISTEMPER (CD) is a highly contagious and highly fatal viral
                        disease of dogs and is widely spread that unvaccinated dogd rarely escape exposure.
                    </p>
                    <br>
                    <p class="card-text font-weight-bold">INFECTIOUS CANINE HEPATITIS (ICP) is a very contagious viral disease of dogs 
                        characterized by leukopenia and prolonged bleeding time. 
                    </p>
                    <br>
                    <p class="card-text font-weight-bold">LEFTOSPIROSIS(L) is an acute bacterial infection of dogs but is also
                        transmitted to man. The disease can severely cause severe damage to liver and the kidney leading to jaundice,
                         acute nephritis, uremia and death in most cases.
                    </p>
                    <br>
                    <p class="card-text font-weight-bold">
                    </p>
                 </div>
             </div>
           </div>

           <div class="col-sm-6 mb-3">
              <div class="card border-primary">
                 <div class="card-body bg-success text-center">
                   <h5 class="card-title text-white">Cats</h5>
                   <p class="card-text font-weight-bold"></p>
                </div>
            </div>
        </div>

</div>

   </div>
</div>

@endsection