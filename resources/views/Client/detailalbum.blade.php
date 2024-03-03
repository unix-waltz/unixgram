@extends('Client.main')
@section('content')
<br><br><br>
<div class="w-full">
    <div class="w-[90%] mx-auto">
<h1 class="mb-4 text-2xl">Album {{$album}}</h1>
    </div>
    <div class="w-[90%] mx-auto grid grid-cols-4 gap-2">
        @foreach ($data as $d )
        <a href="/post/detail/{{$d->uuid}}">
        <img class=" w-full h-full transition-all duration-300 rounded-lg lg:rounded-none cursor-pointer filter grayscale hover:grayscale-0" src="{{asset('storage/'.$d->image)}}" alt="image description"></a>
      @endforeach
    </div>
</div>


@endsection