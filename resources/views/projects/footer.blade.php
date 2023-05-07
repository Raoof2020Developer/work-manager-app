<div class="card-footer">
    <div class="d-flex justify-content-between">
        <div class="d-flex align-items-center">
            <img src="/images/clock.svg" alt="">
            <div class="mr-2">
                {{$project->created_at->diffForHumans()}}
            </div>
        </div>

        <div class="d-flex align-items-center mr-4">
            <img src="/images/list-check.svg" alt="">
            <div class="mx-2">
                {{ count($project->tasks)}}
            </div>
        </div>

        <div class="d-flex ">
            <form action="/projects/{{$project->id}}" method="POST">
                @method('DELETE')
                @csrf
                <input type="submit" value="" class="btn-delete" />
            </form>
        </div>
    </div>
</div>