@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ajouter une nouvelle place</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="/places">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-right">Nom</label>

                            <div class="col-md-9">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="categories" class="col-md-3 col-form-label text-md-right">Catégories</label>

                            <div class="col-md-9">
                                @foreach(App\Category::all() as $categorie)
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" name="categories[]" type="checkbox" id="inlineCategoryCheckbox{{ $categorie->id }}" value="{{ $categorie->id }}">
                                  <label class="form-check-label" for="inlineCategoryCheckbox{{ $categorie->id }}">{{ $categorie->name }}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="placeType" class="col-md-3 col-form-label text-md-right">Type d'entreprise</label>

                            <div class="col-md-9">
                                @foreach(App\PlaceType::all() as $type)
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" name="placeType[]" type="checkbox" id="inlinePlaceTypeCheckbox{{ $type->id }}" value="{{ $type->id }}">
                                  <label class="form-check-label" for="inlinePlaceTypeCheckbox{{ $type->id }}">{{ $type->name }}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="deliveryType" class="col-md-3 col-form-label text-md-right">Modes de distribution</label>

                            <div class="col-md-9">
                                @foreach(App\DeliveryType::all() as $type)
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" name="deliveryType[]" type="checkbox" id="inlineDeliveryTypeCheckbox{{ $type->id }}" value="{{ $type->id }}">
                                  <label class="form-check-label" for="inlineDeliveryTypeCheckbox{{ $type->id }}">{{ $type->name }}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-3 col-form-label text-md-right">Addresse</label>

                            <div class="col-md-9">
                                <input type="search" id="address" class="form-control" placeholder="Rechercher une adresse" />

                                <div class="alert alert-info mt-3" role="alert">
                                    Addresse sélectionnée: <strong id="address-value">Aucune</strong>
                                </div>

                                <input type="hidden" id="address-data" name="addressData" />

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="region_id" class="col-md-3 col-form-label text-md-right">Région administrative</label>

                            <div class="col-md-9">
                                <select class="custom-select" name="region_id" id="region">
                                    @foreach(App\Region::all() as $region)
                                    <option value="{{ $region->id }}">{{ $region->name }}</option>
                                    @endforeach
                                </select>

                                @error('region')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="phoneNumber" class="col-md-3 col-form-label text-md-right">No. de tel.</label>

                            <div class="col-md-9">
                                <input id="phoneNumber" type="text" class="form-control @error('phoneNumber') is-invalid @enderror" name="phoneNumber" value="{{ old('phoneNumber') }}" autocomplete="phoneNumber" autofocus>

                                @error('phoneNumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="additionnalPhoneNumber" class="col-md-3 col-form-label text-md-right">No. de tel. add.</label>

                            <div class="col-md-9">
                                <input id="additionnalPhoneNumber" type="text" class="form-control @error('additionnalPhoneNumber') is-invalid @enderror" name="additionnalPhoneNumber" value="{{ old('additionnalPhoneNumber') }}" autocomplete="additionnalPhoneNumber" autofocus>

                                @error('additionnalPhoneNumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right">Courriel</label>

                            <div class="col-md-9">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="url" class="col-md-3 col-form-label text-md-right">Adresse web</label>

                            <div class="col-md-9">
                                <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') }}" autocomplete="url" autofocus>

                                @error('url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="secteurLivraison" class="col-md-3 col-form-label text-md-right">Secteur desservi pour la livraison</label>

                            <div class="col-md-9">
                                <textarea id="secteurLivraison" class="form-control @error('secteurLivraison') is-invalid @enderror" name="secteurLivraison" required>{{ old('secteurLivraison') }}</textarea>

                                @error('secteurLivraison')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="instructions" class="col-md-3 col-form-label text-md-right">Instructions</label>

                            <div class="col-md-9">
                                <textarea id="instructions" class="form-control @error('instructions') is-invalid @enderror" name="instructions" required>{{ old('instructions') }}</textarea>

                                @error('instructions')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <span class="col-md-5"></span>

                            <button type="submit" class="btn btn-primary">Envoyer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
