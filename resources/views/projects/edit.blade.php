@extends('layouts.app')

@section('title', 'تعديـل المشـروع - {{$project->id}}')

@section('content')

    <div class="row justify-content-center text-right">
        <div class="col-8">
            <div class="card p-5">
                <h3 class="text-center pb-5 font-weight-bold">
                    تعديـل المشـروع
                </h3>
    
                <form action="/projects/{{$project->id}}" method="POST" dir="rtl">
                    @method('PATCH')
                    @include('projects.form')
                    <br />
                    <div class="form-group d-flex flex-row-reverse gap-2">
                        <button type="submit" class="btn btn-primary">تعديـل</button>
                        <a href="/projects" class="btn btn-light">إلغـاء</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection