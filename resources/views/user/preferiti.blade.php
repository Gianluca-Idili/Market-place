<x-layout>
    <div class="container-fluid">
        <div class="row justify-content-between">
            <div class="col-12 justify-content-between d-flex flex-column">
                  <h1 class="text-center txtSecond bgAccent bold display-4 border border-5 p-2 mt-2">{{__('ui.favouritesArticle')}}</h1>
                    @if (isset($favourites) && count($favourites) > 0)
                        <table>
                            
                            <tbody>
                                @foreach ($favourites as $favourite)
                                    @if ($favourite->user_id == auth()->id())
                                        <tr class="text-center">
                                            <td class=" text-center mx-5 fw-bold">{{ $favourite->article->name }}</td>
                                            <td class=" justify-content-start "><a class="ms-5 btn-addArt text-decoration-none " href="{{ route('article.show',  $favourite->article->id) }}">{{__('ui.viewMore')}}</a></td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>Non hai articoli preferiti</p>
                    @endif
            </div>
        </div>
      
    </div>
</x-layout>