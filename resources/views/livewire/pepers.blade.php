<div>
    <div class="card" wire:ignore>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('pepersstore') }}" method="post" enctype="multipart/form-data">
            @csrf

            <textarea required id="myeditor" name='text'>
                    {{-- {{$arts->art??""}} --}}
                   </textarea>
            @error('text')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror





            <div class="row p-2">
                <div class="col-md-6 col-12">
                    <label for="">الاسم</label>
                    <input type="text" name='name' class="form-control">
                    @error('name')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-6 col-12">
                    <label for="">الاشخاص المستلمين</label>
                    <select required name='users[]' style="width: 100%" class="js-multiple-select form-control"
                        multiple>
                        @foreach ($user as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @error('users')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror

                </div>
                <div class="col-md-6 col-12">
                    <label for="">الصور</label>
                    <input type="file" name='image[]' class="form-control" multiple>
                    @error('image')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

            </div>
            <button type="submit" class="btn btn-primary">حفظ</button>
        </form>
    </div>
    <div style="height: 10px">

    </div>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5>البحث و الفلترة</h5>
            </div>
            <div class="card-body">
                <div class="row p-4">
                    <div class="col-md-6 col-12">
                        <input type="text" wire:model.live='search' class="form-control" placeholder="البحث">
                    </div>
                    @if ($go_or_come == 'come')
                        <div class="col-md-6 col-12">
                            <select wire:model.live='filter_user' name="filter" class="form-control">
                                <option value="0">الكل</option>
                                @foreach ($user as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                    <div class="col-12 text-center p-3">
                        <input type="radio" checked wire:model.live='go_or_come' class="form-check-input"
                            name="go_or_come" id="go" value="go">
                        <label for="go">الصادر</label>
                        <input type="radio" wire:model.live='go_or_come' class="form-check-input" name="go_or_come"
                            id="come" value="come">
                        <label for="come">الوارد</label>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row p-3">
        @foreach ($pepers as $item)
            <div class="col-md-4 col-12">
                <a href="{{route('mainpeper',$item->uid)}}">
                    <div class="card p-2 m-2 text-center ">
                        <h5>{{ $item->name }}</h5>
                        <p>{{ \Carbon\Carbon::parse($item->created_at)->locale('ar')->diffForHumans() }}</p>
                    </div>
                </a>
            </div>
        @endforeach
    </div>


    <script src="ck24/ckeditor/ckeditor.js"></script>
    <script>
        window.onload = function() {
            CKEDITOR.replace('myeditor');
        };
    </script>
    @section('jscon')
        <script>
            // Add this to your blade file
            function dispatchCustomEvent(user) {
                alert('تم ارسال النص');
                const event = new CustomEvent('SendResultPepers', {
                    detail: user
                });
                console.log(event);
            }
        </script>
        <script>
            function a() {
                alert('تم ارسال النص');
            }
        </script>
        @if (session('success'))
            <script>
                console.log({!! json_encode(session('get_user')) !!});
                SocketIO.emit('send_pepers', {!! json_encode(Auth::user()) !!}, {!! json_encode(session('get_user')) !!});
            </script>
        @endif
    @endsection


    <script src="selection/jquery-3.3.1.min.js"></script>
    <script src="selection/popper.min.js"></script>
    <script src="selection/bootstrap.min.js"></script>
    <script src="selection/select2.min.js"></script>
    <script src="selection/main.js"></script>
</div>
