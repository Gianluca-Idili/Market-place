<x-layout>
    <x-header>
        <h1 class="text-center mt-5 txtMain ">{{__('ui.insertHereYourArticle')}}</h1>
    </x-header>

    <div class="container">
        <div class="row justify-content-center my-5">
            <div class="col-12 col-md-8">
                @livewire('article-create-form')
            </div>
        </div>
    </div>
    

</x-layout>
