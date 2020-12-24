@extends('template')

@section('content')
    <div class="white-box">
        <div class="crud-grid">
            <div class="crud-image">
                <img src="{{asset('/storage/'.$pizza->image)}}" alt="">
            </div>

            <div class="crud-description">
                <div class="crud-pizza-title">
                    <h2> <strong>Edit Pizza Details</strong> </h2>
                </div>

                <form method="POST" action="{{ url('/pizza/update/'.$pizza->id) }}" enctype="multipart/form-data" role="form">
                    {{ csrf_field() }}
                    <div class="grid-layout thirty-seventy-column">    

                        <div class="crud-pizza-label">Pizza Name :</div>
                        <div class="input">
                            <input type="text" name="pizzaName" id="" class="text-box">
                        </div>

                        <div class="crud-pizza-label">Pizza Price :</div>
                        <div class="input">
                            <input type="number" name="pizzaPrice" id="" class="text-box">
                        </div>

                        <div class="crud-pizza-label">Pizza Description :</div>
                        <div class="input">
                            <input type="text" name="pizzaDescription" id="" class="text-box">
                        </div>

                        <div class="crud-pizza-label">Pizza Image :</div>
                        <div class="input">
                            <input type="text" name="" id="" class="text-box">
                            <input type="file" name="pizzaImage" value="imageUpload" accept=".jpg,.jpeg,.png" id="" class="input-file">
                        </div>

                        <div class="input second-column">
                            <button class="btn btn-primary" value="Edit Pizza Detail" type="submit">Edit Pizza</button>
                        </div>
                    </div>
                </form>

                @if($errors->any())
                {{$errors->first()}}
                @endif
            </div> 
        </div>
    </div>
@endsection