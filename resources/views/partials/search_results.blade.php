@if(request()->has('s') && !empty(request()->get('s')))
    @if(strlen(request()->get('s'))>=3)
        <h4>{{__("Results for")}} <strong>'{{request()->get('s')}}'</strong></h4>
    @else
        <h4>{{__("Can't find results for")}} <strong>'{{request()->get('s')}}'</strong>. {{__("Please insert at least 3 chars")}}</h4>
    @endif
@endif
