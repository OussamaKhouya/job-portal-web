@props(['source'])

@if($source)
<img class="image" src="{{$source}}" alt="">
@else
<img class="image" src="{{asset('frontend/dashboard/images/company-logo.png')}}" alt="">
@endif
