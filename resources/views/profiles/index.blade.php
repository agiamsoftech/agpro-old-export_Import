@extends('layouts.app')

@section('content')
<style>
    .w-h-100 {
        width: 70% !important;
        height: 100px;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
        
            <img src="{{ $profile->image }}" class="rounded-circle w-100">
        
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex">
                    <h1>{{ $user->name }}</h1>
                    <!-- <button class="btn btn-primary ml-3" @click="followUser">Fllows</button> -->
                    <div class="follow">
                    @csrf
                    
                    @if(!empty($followers->title))
                    <?php
                    if($followers->title == "Follow"){
                        $title="Unfollow";
                    }else{
                        $title="Follow";
                    }
                    ?>
                    <button class="btn btn-primary ml-3" value="{{ $user->id }}" id="follow" onclick="followUser(this.value)">{{ $title }}</button>
                    @else
                        <button class="btn btn-primary ml-3" value="{{ $user->id }}" id="follow" onclick="followUser(this.value)">Follow</button>
                    @endif
                    </div>
                    
                    
                </div>
                @if($user->id == $C_userId )              
                <a href="/post/create">Add New Post</a>
                @endif
            </div>
            @if($user->id == $C_userId )
            <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
            @endif
            <div class="d-flex pt-2">
                <div class="pr-5"><strong>{{ count($post) }}</strong> Post</div>
                <div class="pr-5"><strong>23k</strong> Followers</div>
                <div class="pr-5"><strong>212k</strong> Following</div>
            </div>
            <div class="pt-3 font-weight-bold">{{ $profile->title }}</div>
            <div>{{ $profile->description }}</div>
            <div><a href="#">{{ $profile->url }}</a></div>
        </div>
    </div>
    <div class="row pt-5">

        @foreach($post as $ps)

            <div class="col-4">
                <a href="/p/{{  $ps->id }}">
                    @if(!empty($ps->image))
                    <img src="/storage/{{ $ps->image }}" class="w-h-100">
                    @else
                    <img src="{{ $noimage }}" class="rounded-circle w-100">
                    @endif
                </a>
            </div>

        @endforeach     

    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
console.clear();
function followUser(UserId) {
    var tkn=document.getElementsByName('csrf-token')[0].getAttribute('content');
    var text = document.getElementById('follow').innerText;
    $.ajax({
        url: "/follow/" + UserId,        
        type: "POST",
        data:{ 
            _token:tkn
        },
        cache: false,
        dataType: 'json',
        success: function(result){
        // alert(result);exit;
            if(result == 1)
            {
                if(text == 'Follow'){
                    var res = text.replace(text, 'Unfollow');
                }
                else if(text == 'Unfollow'){
                    var res = text.replace(text, 'Follow');
                }
                
            }
            else if(result == 'true')
            {
                // var res = document.getElementById("follow").innerHTML = this.responseText;
                var res = text.replace(text, 'Unfollow');
            }
            document.getElementById('follow').innerText = res;
        }
    });
    // if(text == 'Follow'){
    //     var res = text.replace(text, 'Unfollow');
    // }else if(text == 'Unfollow'){
    //     var res = text.replace(text, 'Follow');
    // }    
    // document.getElementById('follow').innerText = res;
}
</script>
<script>
var tkn=document.getElementsByName('csrf-token')[0].getAttribute('content');
$.ajax({
    url: "/fetchCountries",
    type: "POST",
    data:{ 
        _token:tkn
    },
    cache: false,
    dataType: 'json',
    success: function(dataResult){
        $('#country').empty();
        $.each(dataResult,function(index,row){
            if(row['sortname']=="IN"){
                $('#country').append('<option value="' + row['id'] + '" selected="">' + row['name'] + '</option>');
            }else{
                $('#country').append('<option value="' + row['id'] + '">' + row['name'] + '</option>');
            }
        });
        var country=$("#country").val();
        fetchStates(country);
    }
});
</script>
@endsection
