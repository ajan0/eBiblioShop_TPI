<x-app-layout :showCategories="false" :fullwidth="true">

    <div class="row justify-content-center my-5">
        <div class="col-4">
            <h1 class="">Inscription en toute simplicité.</h1>
        </div>
    </div>
    <div class="row justify-content-center my-3">
        <div class="col-4">
            <h2 class="h3 fw-normal mb-4">Créer votre premier compte client</h2>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Titre*</label>
                    <x-inputs.select name="gender">
                        <option value="male">M.</option>
                        <option value="female">Mme</option>
                        <option value="other">Autre</option>
                    </x-inputs.select>
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <label class="form-label">Nom*</label>
                        <x-inputs.field type="text" name="lastname" />
                    </div>
                    <div class="col-6">
                        <label class="form-label">Prénom*</label>
                        <x-inputs.field type="text" name="firstname" />
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Adresse E-mail*</label>
                    <x-inputs.field type="text" name="email" />
                </div>
                <div class="mb-3">
                    <label class="form-label">Mot de passe*</label>
                    <x-inputs.field type="password" name="password">
                        <x-slot name="description">
                            Au moins 8 caractères, une majuscule et une minuscule, un chiffre ou un caractère spécial
                        </x-slot>
                    </x-inputs.field>
                </div>
                <div class="mb-3">
                    <label class="form-label">Confirmation du mot de passe*</label>
                    <x-inputs.field type="password" name="password_confirmation" />
                </div>
                <div class="mb-3">
                    <x-inputs.checkbox name="conditions">
                        J'accepte les conditions générales de vente et la réception d'informations.*
                    </x-inputs.checkbox>
                </div>
                <input class="btn btn-primary w-100 my-2" type="submit" value="inscription">
                <span class="text-muted small">* Champs obligatoires</span>
            </form>
        </div>
    </div>
    
</x-app-layout>