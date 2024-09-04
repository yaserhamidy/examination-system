@extends('layout.main')
@section('content')


<main class="bmd-layout-content">
			<div class="container-fluid ">

				<!-- content -->
				<!-- breadcrumb -->

				
             
				<form action="{{route('EditCatagory')}}" method="post">
				@csrf
                <input type="hidden" name="cat_id"  value="{{$catagory->cat_id}}">
				<div class="card" style="margin-top:40px;">
				<div class="card-header">اضافه کردن کتگوری</div>
				<div class="row m-1 mb-2">
					<div class="col-md-12 ">
						<label for="" style="margin-top:20px;">نام کتگوری</label>
                        <input type="text"   value="{{$catagory->name}}"  name="name" class="form-control">
                    </div>
					<div class="col-md-12 mt-4">
						<label for="">معلومات </label>
                        <input type="text"  value="{{$catagory->description}}"   name="description" class="form-control">
                    </div>
				</div>
				 
               <div class="col-md-2">
			   <input type="submit" class="btn btn-primary" value='اضافه کردن' style="margin:20px;">

			   </div>				 
				</div>
				</form>

			


				
				

                

                
				

				</div>


				




			</div>
		</main>


@endsection



