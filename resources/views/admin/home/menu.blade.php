@extends('layouts.admin')

@section('css')
@endsection

@section('title', 'Home')

@section('content')
<div class="d-flex flex-column min-vh-100 bg-white ">
        <div class="content d-flex flex-column flex-grow-1 my-5 my-lg-10 align-items-center" id="content">
          <h1 class="title text-info font-weight-bold text-uppercase">Important Infectious Disease And Their Prevention</h1>
    
          <div class="row ">

            <div class="col-sm-6 mb-3">
              <div class="card border-info">

                 <div class="card-body text-center">
                    <h5 class="card-titlefont-weight-bold text-info">Dogs</h5>
                    <p class="card-text text-justify">CANINE PARVOVIRUS (CPV) is a peracute viral infection, often
                        fatal in dogs below one year and causes severe gastroenteritis in older dogs.
                    </p>
                    <br>
                    <p class="card-text  text-justify ">CANINE DISTEMPER (CD) is a highly contagious and highly fatal viral
                        disease of dogs and is widely spread that unvaccinated dogd rarely escape exposure.
                    </p>
                    <br>
                    <p class="card-text  text-justify">INFECTIOUS CANINE HEPATITIS (ICP) is a very contagious viral disease of dogs 
                        characterized by leukopenia and prolonged bleeding time. 
                    </p>
                    <br>
                    <p class="card-text  text-justify">LEFTOSPIROSIS(L) is an acute bacterial infection of dogs but is also
                        transmitted to man. The disease can severely cause severe damage to liver and the kidney leading to jaundice,
                         acute nephritis, uremia and death in most cases.
                    </p>
                    <br>
                    <p class="card-text  text-justify">CORONA VIRUS (CV) is highly contagious disease of puppies that can cause 
                        gastrointestinal illness.
                    </p>

                    <br>
                    <p class="card-text  text-justify"> RABIES is the most dreaded zoonotic disease. affecting all warm-blooded
                        animals including man.
                    </p>
                 </div>
             </div>
         </div>

           <div class="col-sm-6 mb-3">
              <div class="card border-info">
                 <div class="card-body text-center">
                   <h5 class="card-title font-weight-bold text-info">Cats</h5>
                   <p class="card-text text-justify "> FELINE PANLEUKOPENIA (FPL) is a very serious and highly contagious disease 
                    of cats, very widely spread and is characterized by lethargy, inappetance fever, vomiting of yellow fluid, diarrhea,
                    dehydration and death especially among kittens. The virus attacks rapidly replicating cells of the small intestine
                     and the bone marrow.
                   </p>

                   <br>
                    <p class="card-text text-justify"> FELINE VIRAL RHINOTRACHEITIS (FVR) and FELINE CALCIVIRUS (FVC) the two are the most 
                        damaging widespread respiratory disease of cats commonly referred to as FELINE FLUE. They are highly contagious and often
                        cause prolonged discomfort and sometimes death.
                    </p>

                </div>
            </div>
        </div>

</div>

   </div>
</div>

@endsection