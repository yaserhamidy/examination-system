@extends('layout.main')
@section('content')


<main class="bmd-layout-content">
			<div class="container-fluid ">

				<!-- content -->
				<!-- breadcrumb -->

				
             
				<form action="{{route('EditQuestion')}}" method="post">
				@csrf
                <input type="hidden" name="question_id"  value="{{$questions->question_id}}">
				<div class="card" style="margin-top:40px;">
				<div class="card-header">ویرایش کردن سوالات</div>
				<div class="row m-1 mb-2">
                   
					<div class="col-md-12">
						<label for="" style="margin-top:20px;">سوال</label>
                        <input type="text" value="{{$questions->question}}" name="question" class="form-control">
                    </div>
						
                    <div class="row col-md-12">
                        <div class="col-md-6 mt-4">
                            <label for="">  جواب اول  </label>
                            <input type="text" name="answerone" value="{{$questions->answerone}}" class="form-control">
                        </div>
                        
                    <div class="col-md-6 mt-4">
                        <label for=""> جواب دوم  </label>
                        <input type="text" name="answertwo" value="{{$questions->answertwo}}" class="form-control">
                  </div>
                    <div class="col-md-6 mt-4">
                        <label for=""> جواب سوم </label>
                        <input type="text" name="answerthree" value="{{$questions->answerthree}}" class="form-control">
                    </div>
                    <div class="col-md-6 mt-4 ">
                        <label for=""> جواب چهارم  </label>
                        <input type="text" name="answerfour" value="{{$questions->answerfour}}" class="form-control">
                    </div>
                    <div class="col-md-6 mt-4">
                        <label for=""> جواب درست </label>
                        <input type="text" name="finalanswer" value="{{$questions->finalanswer}}" class="form-control">
                    </div>
                    

                    
                    <div class="col-md-6 mt-4">
                    <label >نام امتحان </label>
        <div class="col-md-12">
         <select name="sub_classesses_id" class="form-control" id="">
              @foreach($subject as $sub)
            <option value="{{$sub->sub_classesses_id}}" @if($sub->sub_classesses_id == $questions->sub_classesses_id) selected   @endif
                > {{$sub->sub_name}} </option>
                @endforeach
         </select>
        </div>
                    </div>
                    </div>
				</div>

                
				 
               <div class="col-md-2">
			   <input type="submit" class="btn btn-primary" value='اضافه کردن'  style="margin:20px;">

			   </div>				 
				</div>
				</form>


                






				
				
				
				

				</div>


				





			</div>
		</main>


@endsection



