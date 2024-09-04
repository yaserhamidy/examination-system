@extends('layout.main')
@section('content')

<main class="bmd-layout-content">
    <div class="container-fluid ">
        <form action="addCatagory" method="post" id="catagoryForm">
            @csrf
            <div class="card" style="margin-top:40px;">
                <div class="card-header">اضافه کردن کتگوری</div>
                <div class="row m-1 mb-2">
                    <div class="col-md-12">
                        <label for="" style="margin-top:20px;">نام کتگوری</label>
                        <input type="text" name="name" class="form-control" id="nameInput">
                       @error('name')
                       <div class="text-danger">{{ $message }}</div>
                       @enderror
                    </div>
                    <div class="col-md-12 mt-4">
                        <label for="">معلومات </label>
                        <input type="text" name="description" class="form-control" id="descriptionInput">
                        @error('description')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-2">
                    <input type="submit" class="btn btn-primary" value='اضافه کردن' style="margin:20px;" onclick="validateForm(event)">
                </div>
            </div>
        </form>
    </div>
</main>



@endsection