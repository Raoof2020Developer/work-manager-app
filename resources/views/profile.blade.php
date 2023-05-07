@extends('layouts.app')

@section('title', 'الملـف الشخصـي')

@section('content')
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card p-5">
                <div class="text-center pt-2">
                    <img style="border: 2px solid black; border-radius: 50%;" src="{{asset('storage/images/users/default.png')}}" alt="user-avatar" width="82" height="82"/>
                    <h3 class="mt-4 font-weight-bold">
                        {{auth()->user()->name}}
                    </h3>
                </div>
                <div class="card-body" dir="rtl">
                    <form action="/profile" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="name">الإسـم</label>
                             <input type="text" id="name" name="name" class="form-control" value="{{auth()->user()->name}}" />

                             @error('name')
                                <div class="text-danger">
                                    <small>{{$message}}</small>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">البريـد الإلكنـرونـي</label>
                             <input type="email" id="email" name="email" class="form-control" value="{{auth()->user()->email}}" />

                             @error('email')
                                <div class="text-danger">
                                    <small>{{$message}}</small>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">كلمـة المرور</label>
                             <input type="password" id="password" name="password" class="form-control" />

                             @error('password')
                                <div class="text-danger">
                                    <small>{{$message}}</small>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password-confirmation">تأكيـد كلمـة المرور</label>
                             <input type="password" id="password-confirmation" name="password-confirmation" class="form-control" />

                             @error('password-confirmation')
                                <div class="text-danger">
                                    <small>{{$message}}</small>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="image">تغييـر الصـورة الشخصيـة</label>
                            <div class="custom-file">
                                 <input type="file" name="image" id="image" class="custom-file-input form-control" />
                                 <label for="image" class="custom-file-label text-left" id="image-label" data-browse="استعـرض"></label>

                                 @error('image')
                                    <div class="text-danger">
                                        <small>{{$message}}</small>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group d-flex mt-5 flex-row-reverse">
                            <button type="submit" class="btn btn-primary mr-2">حفظ التعديـلات</button>
                            <button type="submit" class="btn btn-light" form="logout">تسجيـل الخـروج</button>
                        </div>
                    </form>

                    <form action="/logout" method="POST" id="logout">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('image').onChange = uploadOnChange

        function uploadOnChange() {
            let filename = this.value
            let lastIndex = filename.lastIndexOf('\\')

            if (lastIndex >= 0) {
                filename = filename.substring(lastIndex + 1)
            }

            document.getElementById('image-label').innerHTML = filename
        }
    </script>
@endsection