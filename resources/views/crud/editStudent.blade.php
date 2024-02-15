<x-app-layout>

    <x-slot name="title">edit

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
                        <form action="{{route('crud.update', ['student' => $student])}}" method = "POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label>name</label>
                                <input type="text" name="name" class="form-control" value="{{$student->name}}"/>
                                @error('name') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label>age</label>
                                <input type="text" name="age" class="form-control" value="{{$student->age}}"/>
                                @error('age') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label>address</label>
                                <input type="text" name="address" class="form-control" value="{{$student->address}}"/>
                                @error('address') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label>course</label>
                                <input type="text" name="course" class="form-control" value="{{$student->academics->course}}"/>
                                @error('course') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label>year</label>
                                <input type="text" name="year" class="form-control" value="{{$student->academics->year}}"/>
                                @error('year') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label>continent</label>
                                <input type="text" name="continent" class="form-control" value="{{$student->countries->continent}}"/>
                                @error('continent') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label>country name</label>
                                <input type="text" name="country_name" class="form-control" value="{{$student->countries->country_name}}"/>
                                @error('country_name') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label>capital</label>
                                <input type="text" name="capital" class="form-control" value="{{$student->countries->capital}}"/>
                                @error('capital') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class ="mb-3">
                                <button type ="submit" class = "btn btn-primary">Save</button>
                            </div>
                            <!-- <div class ="mb-3">
                                <button type ="submit" class = "btn btn-primary">Update</button>
                            </div> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="scripts">
    </x-slot>

</x-app-layout>