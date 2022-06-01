<x-dashboard-layout>
    <div class="tab-pane fade show active py-4" id="account" role="tabpanel">
        <div class="row">
            <div class="col-6">
                <h1 class="h5">Information</h1>
                <form action="{{ route('dashboard.store') }}" method="POST">
                    @csrf
                    {{-- Input -> Title --}}
                    <div class="form-group mb-3">
                        <label class="text-gray py-2">Titre</label>
                        <x-inputs.select name="gender">
                            <option value="male" {{ auth()->user()->gender === 'male' ? 'selected' : '' }}>M.</option>
                            <option value="female" {{ auth()->user()->gender === 'female' ? 'selected' : '' }}>Mme</option>
                            <option value="other" {{ auth()->user()->gender === 'other' ? 'selected' : '' }}>Autre</option>
                        </x-inputs.select>
                    </div>

                    {{-- Input -> Firstname --}}
                    <div class="form-group mb-3">
                        <label class="text-gray py-2">Prénom</label>
                        <x-inputs.field type="text" name="firstname" value="{{ auth()->user()->firstname }}" />
                    </div>

                    {{-- Input -> Lastname --}}
                    <div class="form-group mb-3">
                        <label class="text-gray py-2">Nom</label>
                        <x-inputs.field type="text" name="lastname" value="{{ auth()->user()->lastname }}" />
                    </div>
                    
                    {{-- Input -> email --}}
                    <div class="form-group mb-3">
                        <label class="text-gray py-2">Adresse e-mail privée</label>
                        <x-inputs.field type="text" value="{{ auth()->user()->email }}" disabled />
                    </div>

                    <div class="from-group d-flex">
                        <input class="btn btn-primary btn-sm ms-auto" type="submit" value="Enregistrer">
                    </div>
                </form>
            </div>
            <div class="col-6">
                <div class="mt-5">
                    <strong>Sécurité des données</strong>
                    <p>La protection des données est une affaire de confiance, et votre confiance compte pour nous. Nous respectons votre personnalité et votre sphère privée. C'est la raison pour laquelle nous cherchons à garantir la protection de vos données personnelles et leur traitement conforme à la législation.</p>
                </div>
            </div>
        </div>
        
    </div>
</x-dashboard-layout>