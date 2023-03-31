<x-layout>
<div>
@if (isset($_GET['exampleInputPassword1']))
    @php 
        $reason = $_GET['exampleInputPassword1'];
        echo "<p>$reason</p>"; 
    @endphp
@endif    
</div>
<div class="container">
    <div class="row justify-content-center my-5">
        <div class="col-12 col-md-8">
                <form action="{{route('become.revisor')}}" method="get">
                    @csrf
                    <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">{{__('ui.becameRevisor')}} </label>
                    <input name="exampleInputPassword1" type="text" class="form-control" >
                    </div>
                    <button type="submit" class="btn btn-primary">{{__('ui.submit')}} </button>
                </form>
        </div>
    </div>
</div>
</x-layout>
