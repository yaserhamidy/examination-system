@extends('layout.main')
@section('content')


<main class="bmd-layout-content">
			<div class="container-fluid ">

				<!-- content -->
				<!-- breadcrumb -->

				
             
				<form action="../EditSubject" method="post">
				@csrf
                <input type="hidden" name="sub_classesses_id"  value="{{$subject->sub_classesses_id}}">
				<div class="card" style="margin-top:40px;">
				<div class="card-header">ویرایش کردن امتحان</div>
				<div class="row m-1 mb-2">
                <div class="col-md-12">
						<label for="" style="margin-top:20px;">نام امتحان</label>
                        <input type="text" name="sub_name" value="{{$subject->sub_name}}" class="form-control">
                    </div>
						
                    
                    <div class="row col-md-12 mt-4">
                        <div class="col-md-4">
                            <label for="">  زمان  </label>
                            <input type="number" name="timer" value="{{$subject->timer}}"  class="form-control">
                        </div>
                         
                    <div class="col-md-4">
                        <label for=""> تعداد سوالات </label>
                        <input type="number" name="question_count" value="{{$subject->question_count}}"  class="form-control">
                  </div>
                    <div class="col-md-4">
                        <label for=""> مجموعه نمرات </label>
                        <input type="number" name="total_score" value="{{$subject->total_score}}"  class="form-control">
                    </div>
                    
				</div>
                <div class="col-md-12 mt-4">
                <label >نام امتحان</label>
    <div class="col-md-12">
    <select name="cat_id" class="form-control" id="">
          @foreach($catagory as $cat)
        <option value="{{$cat->cat_id}}"  @if($cat->cat_id == $subject->cat_id) selected   @endif
            > {{$cat->name}} </option>
            @endforeach
     </select>
    </div>

    <div class="col-md-2">
        <input type="submit" class="btn btn-primary" value='اضافه کردن' style="margin:20px;">
    </div>				 
				</form>

			


				
				

                

                
				

				</div>


				




			</div>
		</main>


@endsection



