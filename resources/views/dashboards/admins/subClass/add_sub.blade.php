@extends('layout.main')
@section('content')

<main class="bmd-layout-content">
    <div class="container-fluid">
        <form action="addSubject" method="post" id="exam-form">
            @csrf
            <div class="card" style="margin-top:40px;">
                <div class="card-header">اضافه کردن امتحان</div>
                <div class="row m-1 mb-2">
                    <div class="col-md-12">
                        <label for="" style="margin-top:20px;">نام امتحان</label>
                        <input type="text" name="sub_name" class="form-control" id="sub-name">
                    </div>
                    <div class="row col-md-12">
                        <div class="col-md-4 mt-4">
                            <label for="">زمان</label>
                            <input type="number" name="timer" class="form-control" id="timer">
                        </div>
                        <div class="col-md-4 mt-4">
                            <label for="">تعداد سوالات</label>
                            <input type="number" name="question_count" class="form-control" id="question-count">
                        </div>
                        <div class="col-md-4 mt-4">
                            <label for="">مجموعه نمرات</label>
                            <input type="number" name="total_score" class="form-control" id="total-score">
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-4">
                    <label>نام کتگوری</label>
                    <div class="col-md-12">
                        <select name="cat_id" class="form-control" id="cat-id">
                            @foreach($catagory as $cat)
                                <option value="{{$cat->cat_id}}">{{$cat->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <input type="submit" class="btn btn-primary" value='اضافه کردن' style="margin:20px;" onclick="return validateForm()">
                </div>
            </div>
        </form>
    </div>
</main>

<script>
    function validateForm() {
        var subName = document.getElementById("sub-name");
        var timer = document.getElementById("timer");
        var questionCount = document.getElementById("question-count");
        var totalScore = document.getElementById("total-score");
        var catId = document.getElementById("cat-id");

        var isValid = true;

        if (subName.value.trim() === "") {
            subName.style.border = "2px solid red";
            isValid = false;
        } else {
            subName.style.border = "";
        }

        if (timer.value.trim() === "") {
            timer.style.border = "2px solid red";
            isValid = false;
        } else {
            timer.style.border = "";
        }

        if (questionCount.value.trim() === "") {
            questionCount.style.border = "2px solid red";
            isValid = false;
        } else {
            questionCount.style.border = "";
        }

        if (totalScore.value.trim() === "") {
            totalScore.style.border = "2px solid red";
            isValid = false;
        } else {
            totalScore.style.border = "";
        }

        if (catId.value.trim() === "") {
            catId.style.border = "2px solid red";
            isValid = false;
        } else {
            catId.style.border = "";
        }

        return isValid;
    }
</script>

@endsection