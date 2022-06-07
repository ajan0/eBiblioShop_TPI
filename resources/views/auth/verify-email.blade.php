<x-app-layout :showCategories="false" :fullwidth="true">
    @if (session('status') == 'verification-link-sent')
        <div class="alert alert-success">
            Un nouveau mail de vérification a été envoyé à votre adresse email.
        </div>
    @endif
    <div class="row justify-content-center mt-5 mb-3">
        <div class="col-4">
            <h1 class="">Vérification du compte</h1>
        </div>
    </div>
    <div class="row justify-content-center my-3">
        <div class="col-4">
            <p>Merci de vous être inscrit(e) ! Avant de commencer, veuillez vérifier votre adresse e-mail en cliquant sur le lien que nous venons de vous envoyer. Si vous n'avez pas reçu cet e-mail, nous vous en enverrons un nouveau avec plaisir.</p>
            {{-- <p>Un nouveau lien de vérification a été envoyé à l'adresse e-mail que vous avez indiquée lors de votre inscription.</p> --}}
            <form action="{{ url('/email/verification-notification') }}" method="post">
                @csrf
                <button class="btn btn-primary w-100" type="submit">
                    Renvoyer l'e-mail de vérification
                </button>
            </form>
        </div>
    </div>
    
</x-app-layout>