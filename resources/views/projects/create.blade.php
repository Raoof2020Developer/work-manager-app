@extends('layouts.app')

@section('title', 'إنشـاء مشـروع جديـد')

@section('content')

    <div class="row justify-content-center text-right">
        <div class="col-8">
            <div class="card p-5">
                <h3 class="text-center pb-5 font-weight-bold">
                    مشـروع جديـد
                </h3>
    
                <form action="/projects" method="POST" dir="rtl">
                    @include('projects.form', ['project' => new App\Models\Project()])
                    <br />
                    <div class="form-group d-flex flex-row-reverse gap-2">
                        <button type="submit" class="btn btn-primary">إنشـاء</button>
                        <a href="/projects" class="btn btn-light">إلغـاء</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection