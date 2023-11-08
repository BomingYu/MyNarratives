<div>
    {{-- @foreach ( as $item)
        
    @endforeach --}}
    @dump(Auth::user()->follows())
    @include('components.users.followNfollowerCard')
</div>