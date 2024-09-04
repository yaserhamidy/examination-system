@extends('layout.main')
@section('content')

  <main class="bmd-layout-content">
    <div class="container-fluid">
      <form action="{{ route('addQuestion') }}" method="post" id="questionForm">
        @csrf
        <div class="card" style="margin-top:40px;">
          <div class="card-header">اضافه کردن سوال</div>
          <div class="row m-1 mb-2">
            <div class="col-md-12">
              <label for="" style="margin-top:20px;">سوال</label>
              <input type="text" name="question" class="form-control" id="question">
              <div class="invalid-feedback">Please enter a question.</div>
            </div>
            <div class="row col-md-12">
              <div class="col-md-6 mt-4">
                <label for="">  جواب اول  </label>
                <input type="text" name="answerone" class="form-control" id="answerone">
                <div class="invalid-feedback">Please enter the first answer.</div>
              </div>
              <div class="col-md-6 mt-4">
                <label for=""> جواب دوم  </label>
                <input type="text" name="answertow" class="form-control" id="answertwo">
                <div class="invalid-feedback">Please enter the second answer.</div>
              </div>
              <div class="col-md-6 mt-4">
                <label for=""> جواب سوم </label>
                <input type="text" name="answerthree" class="form-control" id="answerthree">
                <div class="invalid-feedback">Please enter the third answer.</div>
              </div>
              <div class="col-md-6 mt-4 ">
                <label for=""> جواب چهارم  </label>
                <input type="text" name="answerfour" class="form-control" id="answerfour">
                <div class="invalid-feedback">Please enter the fourth answer.</div>
              </div>
              <div class="col-md-6 mt-4">
                <label for=""> جواب درست </label>
                <select name="finalanswer" class="form-control" id="finalanswer">
                  <option value="">Select the correct answer</option>
                  <option value="1">Option 1</option>
                  <option value="2">Option 2</option>
                  <option value="3">Option 3</option>
                  <option value="4">Option 4</option>
                </select>
                <div class="invalid-feedback">Please select the correct answer.</div>
              </div>
              <div class="col-md-6 mt-4">
                <label>نام امتحان </label>
                <div class="col-md-12">
                  <select name="sub_classesses_id" class="form-control" id="subClassessesId">
                    <option value="">Select a subject</option>
                    @foreach($subject as $sub)
                    <option value="{{ $sub->sub_classesses_id }}"> {{ $sub->sub_name }} </option>
                    @endforeach
                  </select>
                  <div class="invalid-feedback">Please select a subject.</div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-2">
            <input type="submit" class="btn btn-primary" value='اضافه کردن' style="margin:20px;">
          </div>
        </div>
      </form>
    </div>
  </main>
  
  <script>
    document.getElementById('questionForm').addEventListener('submit', function(event) {
      var isValid = true;
      var questionInput = document.getElementById('question');
      var answerOneInput = document.getElementById('answerone');
      var answerTwoInput = document.getElementById('answertwo');
      var answerThreeInput = document.getElementById('answerthree');
      var answerFourInput = document.getElementById('answerfour');
      var finalAnswerInput = document.getElementById('finalanswer');
      var subClassessesInput = document.getElementById('subClassessesId');

      // Validate question input
      if (questionInput.value.trim() === '') {
        questionInput.classList.add('is-invalid');
        isValid = false;
      } else {
        questionInput.classList.remove('is-invalid');
      }

      // Validate answer 1 input
      if (answerOneInput.value.trim() === '') {
        answerOneInput.classList.add('is-invalid');
        isValid = false;
      } else {
        answerOneInput.classList.remove('is-invalid');
      }

      // Validate answer 2 input
      if (answerTwoInput.value.trim() === '') {
        answerTwoInput.classList.add('is-invalid');
        isValid = false;
      } else {
        answerTwoInput.classList.remove('is-invalid');
      }

      // Validate answer 3 input
      if (answerThreeInput.value.trim() === '') {
        answerThreeInput.classList.add('is-invalid');
        isValid = false;
      } else {
        answerThreeInput.classList.remove('is-invalid');
      }

      // Validate answer 4 input
      if (answerFourInput.value.trim() === '') {
        answerFourInput.classList.add('is-invalid');
        isValid = false;
      } else {
        answerFourInput.classList.remove('is-invalid');
      }

      // Validate final answer select
      if (finalAnswerInput.value === '') {
        finalAnswerInput.classList.add('is-invalid');
        isValid = false;
      } else {
        finalAnswerInput.classList.remove('is-invalid');
      }
      
      // Validate subject select
      if (subClassessesInput.value === '') {
        subClassessesInput.classList.add('is-invalid');
        isValid = false;
      } else {
        subClassessesInput.classList.remove('is-invalid');
      }

      if (!isValid) {
        event.preventDefault();
    }
    });
  </script>

@endsection