@extends('layouts.app')

@section('title')المشروع {{$project->id}}@endsection

@section('content')
    <header class="d-flex justify-content-between align-items-center my-5" dir="rtl">
        <div class="h6 text-dark">
            <a href="/projects">المشـاريـع - {{$project->title}}</a>
        </div>

        <div>
            <a href="/projects/{{$project->id}}/edit" role="btn" class="btn btn-primary font-weight-bold">تعديـل المشـروع</a>
        </div>
    </header>

    <section class="row text-right" dir="rtl">
        <div class="col-lg-4">
            {{-- Project Details --}}
            <div class="card">
                <div class="card-body">
                    <div class="status" style="font-weight: bold;">
                        @switch($project->status)
                            @case(1)
                                <span class="text-success">مكتمل</span>
                                @break
                            @case(2)
                                <span class="text-danger">ملغى</span>
                                @break
                            @default
                                <spaan class="text-warning">قيد الإنجـاز</spaan>
                        @endswitch
                        <h5 class="font-weight-bold card-title">
                            <a href="/projects/{{$project->id}}">{{$project->title}}</a>
                        </h5>

                        <div class="card-text mt-4">
                            {{ $project->description }}
                        </div>
                    </div>
                </div>
                @include('projects.footer')
            </div>

            <div class="card mt-4">
                <div class="card-body">
                    <h5 class="font-weight-bold">تغييـر حالة المشروع</h5>
                    <form action="/projects/{{$project->id}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <select name="status" class="custom-select" onchange="this.form.submit()">
                            <option value="0" {{ ($project->status == 0) ? 'selected' : '' }}>قيد الإنجاز</option>
                            <option value="1" {{ ($project->status == 1) ? 'selected' : '' }}>مكتمـل</option>
                            <option value="2" {{ ($project->status == 2) ? 'selected' : '' }}>ملغـي</option>
                        </select>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            {{-- Tasks --}}
            @foreach ($project->tasks as $task)
                <div class="card p-4 d-flex mt-3 justify-content-between align-items-center flex-row">
                    <div class="{{$task->done ? 'checked muted': ''}}">
                        {{$task->body}}
                    </div>

                    <div class="d-flex gap-2 align-items-center">
                        <div class="d-flex mr-auto align-items-center gap-2">
                            <form action="/projects/{{$project->id}}/tasks/{{$task->id}}" method="POST">
                                @method('PATCH')
                                @csrf
                                <input type="checkbox" {{ ($task->done) ? 'checked' : ''}} name="done" onchange="this.form.submit()" />
                            </form>                   
                        </div>
                        <div class="d-flex align-items-center">
                            <form action="/projects/{{$task->project_id}}/tasks/{{$task->id}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <input type="submit" value="" class="btn-delete mt-3" />
                            </form>
                        </div>
                    </div>
                </div>
                <br>
            @endforeach

            <div class="card">
                <form action="/projects/{{$project->id}}/tasks" class="p-3 d-flex gap-2" method="POST">
                    @csrf
                    <input type="text" name="body" class="form-control border-0 p-2 ml-2" placeholder="أضـف صنـفا جديـدا" />
                    <button type="submit" class="btn btn-primary">إضــافـة</button>
                </form>
            </div>
        </div>
    </section>
@endsection