@extends('layouts.public')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="alert alert-primary" role="alert">
              Vous naviguez dans toutes les inscriptions sur le site. Vous pouvez trier avec les options du menu ci-haut.
            </div>

            <div class="card-deck">
                @foreach(App\Place::all() as $place)
                <div class="card">
                    {{-- <img src="..." class="card-img-top" alt="..."> --}}
                    <div class="card-body">
                        <h5 class="card-title">{{ $place->name }}</h5>
                        
                        <p><address><i class="fas fa-map-marker-alt"></i> {{ $place->address }}, {{ $place->city }} {{ $place->postalCode }}</address></p>
                        @if($place->phoneNumber !== null)<p><i class="fas fa-phone"></i> {{ $place->phoneNumber }}</p>@endif
                        @if($place->additionnalPhoneNumber !== null)<p><i class="fas fa-phone"></i> {{ $place->additionnalPhoneNumber }}</p>@endif
                        @if($place->email !== null)<p><i class="fas fa-at"></i> {{ $place->email }}</p>@endif
                        @if($place->url !== null)<p><i class="fas fa-desktop"></i> {{ $place->url }}</p>@endif
                        <p class="card-text"><i class="fas fa-truck"></i> {{ $place->deliveryZone }}</p>
                        <p class="card-text"><i class="fas fa-info-circle"></i> {{ $place->instructions }}</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">{{ $place->region }}</small>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
