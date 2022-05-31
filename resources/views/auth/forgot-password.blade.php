<x-app-layout :showCategories="false" :fullwidth="true">

    <div class="row justify-content-center mt-5 mb-3">
        <div class="col-4">
            <h1 class="">Réinitialiser le mot de passe</h1>
        </div>
    </div>
    <div class="row justify-content-center my-3">
        <div class="col-4">
            <p>Veuillez indiquer l’adresse e-mail rattachée à votre compte. Vous recevez alors immédiatement un message contenant un lien pour modifier votre mot de passe.</p>
                <form method="POST" action="{{ url('forgot-password') }}">
                @csrf        
                <!-- Email Address -->
                <x-inputs.field type="email" name="email" placeholder="Adresse e-mail" />
                {{-- <input id="email" class="form-control d-block mt-1 w-100" type="email" name="email" value="{{ old('email') }}" placeholder="Adresse e-mail" required autofocus/> --}}
                
                <div class="my-3">
                    <button class="btn btn-primary w-100" type="submit">
                        Réinitialiser
                    </button>
                </div>
            </form>
        </div>
    </div>
    
</x-app-layout>