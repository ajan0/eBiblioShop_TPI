<x-app-layout :showCategories="false">

<div class="row justify-content-center my-5">
    <div class="col-7">
        <h1>Commander maintenant</h1>
    </div>
</div>
<div class="row justify-content-center my-3">
    <div class="col-3">
        <h2 class="h3 fw-normal mb-4">Se connecter avec un compte client</h2>
        <form action={{ route('login') }} method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Adresse E-mail</label>
                <x-input type="email" name="email" placeholder="nom@exemple.com" required autofocus />
            </div>
            <div class="mb-3">
                <label class="form-label">Mot de passe</label>
                <x-input type="password" name="password" required />
                <a href="{{ route('password.request') }}">Avez-vous oublié votre mot de passe ?</a>
            </div>
            <input class="btn btn-primary w-100 my-2" type="submit" value="Se connecter">
        </form>
    </div>

    {{-- Spacer --}}
    <div class="col-1"></div>

    <div class="col-3">
        <h2 class="h3 fw-normal mb-4">Vous n'avez pas encore de compte?</h2>
        <h3 class="h5 fw-normal mb-2">Vous souhaitez ouvrir un compte client et profiter des avantages clients?</h3>
        <p class="mb-4">Créez un compte en quelques étapes seulement et profitez des offres des livres gratuits.</p>
        
        <a href="{{ route('register') }}" class="btn btn-primary w-100 my-2">S'inscrire</a>
    </div>
</div>

</x-app-layout>