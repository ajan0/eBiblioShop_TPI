<x-app-layout :showCategories="false" :fullwidth="true">

    <div class="row justify-content-center mt-5 mb-3">
        <div class="col-4">
            <h1 class="">Vérification du compte</h1>
        </div>
    </div>
    <div class="row justify-content-center my-3">
        <div class="col-4">
            <p>Merci de vous être inscrit(e) ! Avant de commencer, veuillez vérifier votre adresse e-mail en cliquant sur le lien que nous venons de vous envoyer. Si vous n'avez pas reçu cet e-mail, nous vous en enverrons un nouveau avec plaisir.</p>
            {{-- <p>Un nouveau lien de vérification a été envoyé à l'adresse e-mail que vous avez indiquée lors de votre inscription.</p> --}}
            <a class="btn btn-primary w-100" href="">Renvoyer l'e-mail de vérification</a>
        </div>
    </div>
    
</x-app-layout>