<x-app-layout>

    <x-slot name="title">create

    </x-slot>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">

                @if (session('status'))
                    <div class="alert alert-success">{{session('status')}}</div>
                @endif


                <div class="card">
                    <div class="card-header">
                        <h4>Students
                            <a href="{{url('crudStudent')}}"class="btn btn-primary float-end">back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{url ('crudStudent/createStudent')}}" method = "POST">
                            @csrf

                            <div class="mb-3">
                                <label>name</label>
                                <input type="text" name="name" class="form-control" value="{{old('name')}}"/>
                                @error('name') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label>age</label>
                                <input type="text" name="age" class="form-control" value="{{old('age')}}"/>
                                @error('age') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label>address</label>
                                <input type="text" name="address" class="form-control" value="{{old('address')}}"/>
                                @error('address') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label>course</label>
                                <input type="text" name="course" class="form-control" value="{{old('course')}}"/>
                                @error('course') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label>year</label>
                                <input type="text" name="year" class="form-control" value="{{old('year')}}"/>
                                @error('year') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label>continent</label>
                                <input type="text" name="continent" class="form-control" value="{{old('continent')}}"/>
                                @error('continent') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label>country name</label>
                                <input type="text" name="country_name" class="form-control" value="{{old('country_name')}}"/>
                                @error('country_name') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label>capital</label>
                                <input type="text" name="capital" class="form-control" value="{{old('capital')}}"/>
                                @error('capital') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class ="mb-3">
                                <button type ="submit" class = "btn btn-primary">Save</button> </a> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="scripts">
    </x-slot>

</x-app-layout>