@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="../images/iamsoftec-favicon.png" class="rounded-circle">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1>{{ $user->name }}</h1>
                <a href="#">Add New Post</a>
            </div>
            <div class="d-flex">
                <div class="pr-5"><strong>153</strong> Post</div>
                <div class="pr-5"><strong>23k</strong> Followers</div>
                <div class="pr-5"><strong>212k</strong> Following</div>
            </div>
            <div class="pt-3 font-weight-bold">{{ $profile->title }}</div>
            <div>{{ $profile->description }}</div>
            <div><a href="#">{{ $profile->url }}</a></div>
        </div>
    </div>
    <div class="row pt-5">
        <div class="col-4">
            <img src="https://instagram.fpat3-1.fna.fbcdn.net/v/t51.2885-15/e35/c0.126.1030.1030a/s480x480/132108303_387834418947654_9162973108623918750_n.jpg?_nc_ht=instagram.fpat3-1.fna.fbcdn.net&_nc_cat=106&_nc_ohc=UUr6Lx9oP6UAX8SdMpA&tp=1&oh=eba4eb396875081542b338aeaacbbbe9&oe=600D519C" class="w-100">
        </div>
        <div class="col-4">
            <img src="https://instagram.fpat3-1.fna.fbcdn.net/v/t51.2885-15/e35/c0.126.1030.1030a/s480x480/132108303_387834418947654_9162973108623918750_n.jpg?_nc_ht=instagram.fpat3-1.fna.fbcdn.net&_nc_cat=106&_nc_ohc=UUr6Lx9oP6UAX8SdMpA&tp=1&oh=eba4eb396875081542b338aeaacbbbe9&oe=600D519C" class="w-100">
        </div>
        <div class="col-4">
            <img src="https://instagram.fpat3-1.fna.fbcdn.net/v/t51.2885-15/e35/c0.126.1030.1030a/s480x480/132108303_387834418947654_9162973108623918750_n.jpg?_nc_ht=instagram.fpat3-1.fna.fbcdn.net&_nc_cat=106&_nc_ohc=UUr6Lx9oP6UAX8SdMpA&tp=1&oh=eba4eb396875081542b338aeaacbbbe9&oe=600D519C" class="w-100">
        </div>
    </div>
</div>
@endsection
