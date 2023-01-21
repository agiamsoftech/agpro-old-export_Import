@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<div class="container">
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <!-- <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    
                    <div class="modal-content">
                        <div class="modal-header bg-info">
                            <h3 style="color:white;">Pincode Summary</h3>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div style="display:none;" id="data_pincodes"></div>
                        <div class="modal-body" id="dv_pincodes">
                            <div class="selectgroup selectgroup-pills" id="dv_pincode_data">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            
                <div class="card-header"><h1>Edit Profile</h1></div>

                <div class="card-body">
                    <form method="POST" action="/profile" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $user->id }}">

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>

                            <div class="col-md-6">
                                <input id="title" 
                                type="text" 
                                class="form-control @error('title') is-invalid @enderror" 
                                name="title" value="{{ old('title') ?? $profile->title }}" 
                                autocomplete="title" autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                            <div class="col-md-6">
                                <input id="description" 
                                type="text" 
                                class="form-control @error('description') is-invalid @enderror" 
                                name="description" value="{{ old('description') ?? $profile->description }}" 
                                autocomplete="description" autofocus>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="url" class="col-md-4 col-form-label text-md-right">Url</label>

                            <div class="col-md-6">
                                <input id="url" 
                                type="text" 
                                class="form-control @error('url') is-invalid @enderror" 
                                name="url" value="{{ old('url') ?? $profile->url }}" 
                                autocomplete="url" autofocus>

                                @error('url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="url" class="col-md-4 col-form-label text-md-right">Country <?php echo "hello".$profile->country;?></label>

                            <div class="col-md-6">
                                <select id="country"
                                onChange="fetchStates(this.value);"
                                class="form-control @error('country') is-invalid @enderror" 
                                name="country" value="{{ old('country') ?? $profile->country }}" 
                                autocomplete="country" autofocus
                                >
                                    <option value="">Select Country</option>
                                    
                                </select>                                
                                @error('url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row" id="forstate">
                            <label for="url" class="col-md-4 col-form-label text-md-right">State</label>

                            <div class="col-md-6">
                                <select id="state"
                                onChange="fetchCities(this.value);"
                                class="form-control @error('state') is-invalid @enderror" 
                                name="state" value="{{ old('state') ?? $profile->state }}" 
                                autocomplete="state" autofocus
                                >
                                    <option value="">Select State</option>
                                    
                                </select>                                
                                @error('url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pincode" class="col-md-4 col-form-label text-md-right">Pincode</label>

                            <div class="col-md-6">
                                <input id="pincode" 
                                type="text"
                                maxlength="6" minlength="6"
                                onChange="fillAddress(this.value);"
                                class="form-control @error('pincode') is-invalid @enderror" 
                                name="pincode" value="{{ old('pincode') ?? $profile->pincode }}" 
                                autocomplete="pincode" autofocus>
                                
                                @error('pincode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <button type="button" class="btn btn-primary d-flex" data-toggle="modal" data-target="#exampleModal" style="display: none !important;">
                                    <i id="pincode_look">Load</i>
                                </button>
                                <small id="address" class="form-text text-right"></small>
                                <span class="input-icon-addon" id="pincode_look">
                                    <i style="cursor: pointer;font-size:20px;" data-toggle="modal" data-target="#myModal" class="icon-location-pin"></i>
                                </span>
                            </div>
                        </div>

                        <input type="hidden" id="post" name="post">
                        <input type="hidden" id="district" name="district">
                        <input type="hidden" id="state" name="state">

                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">Profile Image</label>

                            <div class="col-md-6">
                                <input id="image" 
                                type="file" 
                                class="form-control @error('image') is-invalid @enderror" 
                                name="image" value="{{ old('image') ?? $profile->image }}" 
                                autocomplete="image">

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">Save Profile</button>                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Select Address</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div style="display:none;" id="data_pincodes"></div>
      <div class="modal-body" id="dv_pincodes">
        <div class="selectgroup selectgroup-pills" id="dv_pincode_data">
                                
        </div>
      </div>
      <div class="modal-footer" style="display: none;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<script src="/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

<script>
window.onload = function () {
    // alert('params');
    fetchCountries();
}

// $(document).ready(function () {
//     fetchCountries();
// });
function fetchCountries() {    
    var tkn=document.getElementsByName('csrf-token')[0].getAttribute('content');
    // alert(tkn);
    $.ajax({
        url: "/fetchCountries",
        type: "POST",
        data:{ 
            _token:tkn
        },
        cache: false,
        dataType: 'json',
        success: function(result){            
            $('#country').empty();
            $.each(result,function(index,row){
                if(row['country_name']=="India"){
                    $('#country').append('<option value="' + row['id'] + '" selected="">' + row['country_name'] + '</option>');
                }else{
                    $('#country').append('<option value="' + row['id'] + '">' + row['country_name'] + '</option>');
                }
            });
            var country=$("#country").val();
            fetchStates(country);
        }
    });
}
function fetchStates(country) {
    var tkn=document.getElementsByName('csrf-token')[0].getAttribute('content');
    $.ajax({
        url: "/fetchStates",
        type: "POST",
        data:{ 
            _token:tkn,
            country:country
        },
        cache: false,
        dataType: 'json',
        success: function(result){
            // console.log(result);
            $('#state').empty();
            // $view.='<label for="url" class="col-md-4 col-form-label text-md-right">State</label><div class="col-md-6"><select id="state" name="state" class="form-control" onChange="fillCity(this.value);">';
            $.each(result,function(index,row){
            
                $('#state').append('<option value="' + row['id'] + '" selected="">' + row['state_name'] + '</option>');
                // $view.='<option value="' + row['id'] + '">' + row['state_name'] + '</option>';
                // $('#state').append('<label for="url" class="col-md-4 col-form-label text-md-right">State</label><div class="col-md-6"><select id="state" name="state" class="form-control" onChange="fillCity(this.value);"> <option value="' + row['id'] + '">' + row['state_name'] + '</option></select></div>');

            });
            // document.getElementsByTagName('div').style.display = "block";
            // $view.='</select></div>';
            var state=$("#state").val();
            // fetchCities(state);
        }
    });
}

function fillAddress(str) {
            document.getElementById("address").innerHTML = "";
            if (str.length == 0) {
                document.getElementById("address").innerHTML = "";
                $("#post").val("");
                $("#district").val("");
                $("#state").val("");
                document.getElementById("data_pincodes").innerHTML = "";
                var abc = document.getElementById("dv_pincodes").innerHTML = "No data available!";
                console.log(abc);
                // $('#pincode_look').addClass('text-danger');
                // $('#pincode_look').removeClass('text-success');
                // $('#pincode_look').show();
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        var myObj = JSON.parse(this.responseText);
                        if(myObj[0]['Status']=="Error" || myObj[0]['Status']=="404"){
                            $("#pincode").val("");
                            // $('#pincode_look').addClass('text-danger');
                            // $('#pincode_look').removeClass('text-success');
                            // $('#pincode_look').show();
                            document.getElementById("data_pincodes").innerHTML = "";
                            document.getElementById("dv_pincodes").innerHTML = "No data available!";
                            document.getElementById("address").innerHTML = "No data available!";
                            var content2 = {};
                            content2.message = myObj[0]['Message'];
                            content2.title = 'Error!';
                            content2.icon = 'fas fa-times';
                            content2.url = '#';
                            content2.target = '';
                            $.notify(content2,{
                                type: "danger",
                                placement: {
                                    from: "bottom",
                                    align: "right"
                                },
                                time: 1000,
                                delay: 5000
                            });
                        }
                        else if(myObj[0]['Status']=="Success"){
                            var totData=parseInt(myObj[0]['PostOffice'].length);
                            var data="";
                            var postOffice="";
                            while(totData>0){
                                totData-=1;
                                postOffice=myObj[0]['PostOffice'][totData]["Name"];
                                data+='<label class="selectgroup-item col-lg-12">';
                                data+='<input type="radio" name="data_Pincode" value="' + totData + '" class="selectgroup-input" data-dismiss="modal" onClick="fillPostOffice(this.value);">';
                                data+='<span class="selectgroup-button">' + postOffice + '</span>';
                                data+='</label>';
                            }
                            document.getElementById("dv_pincodes").innerHTML = data;
                            $('#pincode_look').click();
                            var address=myObj[0]['PostOffice'][0]["Name"] + ", " + myObj[0]['PostOffice'][0]["District"] + ", " + myObj[0]['PostOffice'][0]["State"];
                            // document.getElementById("address").innerHTML = address;

                            // $("#post").val(myObj[0]['PostOffice'][0]["Name"]);
                            // $("#district").val(myObj[0]['PostOffice'][0]["District"]);
                            // $("#state").val(myObj[0]['PostOffice'][0]["State"]);
                            // $('#pincode_look').addClass('text-success');
                            // $('#pincode_look').removeClass('text-danger');
                            // $('#mbrno_look').show();
                            document.getElementById("data_pincodes").innerHTML = this.responseText;
                        }
                        else{
                            document.getElementById("address").innerHTML = "";
                            $("#post").val("");
                            $("#district").val("");
                            $("#state").val("");
                            // $('#pincode_look').addClass('text-danger');
                            // $('#pincode_look').removeClass('text-success');
                            // $('#pincode_look').show();
                            document.getElementById("data_pincodes").innerHTML = "";
                            document.getElementById("dv_pincodes").innerHTML = "No data available!";
                        }
                    }
                    else{
                        document.getElementById("address").innerHTML = "";
                        $("#post").val("");
                        $("#district").val("");
                        $("#state").val("");
                        // $('#pincode_look').addClass('text-danger');
                        // $('#pincode_look').removeClass('text-success');
                        // $('#pincode_look').show();
                        document.getElementById("data_pincodes").innerHTML = "";
                        document.getElementById("dv_pincodes").innerHTML = "No data available!";
                    }
                };
                xmlhttp.open("GET", "https://api.postalpincode.in/pincode/" + str, true);
                xmlhttp.send();
            }
        }
        function fillPostOffice(data){
            
            var myObj = JSON.parse(document.getElementById("data_pincodes").innerHTML);
            var address=myObj[0]['PostOffice'][data]["Name"] + ", " + myObj[0]['PostOffice'][data]["District"] + ", " + myObj[0]['PostOffice'][data]["State"];
            console.log(data_pincodes);
            document.getElementById("address").innerHTML = address;
            // $("#post").val(myObj[0]['PostOffice'][data]["Name"]);
            // $("#district").val(myObj[0]['PostOffice'][data]["District"]);
            // $("#state").val(myObj[0]['PostOffice'][data]["State"]);
        }
</script>
@endsection
