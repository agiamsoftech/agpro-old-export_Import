@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            @if(!empty($post->image))
            <img src="/storage/{{ $post->image }}" class="w-100">
            @else
            <img src="{{ $noimage }}" class="rounded-circle w-100">
            @endif
        </div>
        <div class="col-4">
            <div>
                <div class="d-flex align-items-center">
                    <div class="pr-3">
                        <img src="{{ $profile->image }}" class="rounded-circle w-100" style="max-width: 30px;">
                    </div>
                    <div>
                        <div class="font-weight-bold">
                            <a href="/profile/{{ $user->id }}">
                                <span class="text-dark">{{ $user->name }}</span>
                            </a> |
                            <a href="#" class="pl-3">Follow</a>
                        </div>
                    </div>
                </div>            
                <hr>
                <p>
                    <span class="font-weight-bold">
                        <a href="/profile/{{ $user->id }}">
                            <span class="text-dark"> {{ $user->username }}</span>
                        </a>
                    </span> 
                    {{ $post->caption }}
                </p>
            </div>            
        </div>
    </div>
    
</div>
@endsection
