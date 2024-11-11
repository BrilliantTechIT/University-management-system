<div>
  
    <div class="container">
        <div class="header">
            <div class="right">
                <p>الجمهورية اليمنية</p>
                <p>وزارة التربية والتعليم والبحث العلمي</p>
                <p>جامعة الحضارة</p>
            </div>

            <div class="center">
                <img src="{{ asset('assets/img/logo.png') }}" alt="شعار جامعة الحضارة">
            </div>

            <div class="left" style="text-align: left;">
                <p>Republic of Yemen</p>
                <p>Ministry of Education and Scientific Research</p>
                <p>University of Civilization</p>
            </div>
        </div>

        <div class="content">
            <h1>رقم الورقة الرسمية في النظام: {{ $peper->id }}</h1>
            <p>{!! $peper->contain !!}</p>
            <hr>
            <center>
                <h2>الردود</h2>
            </center>
            <table wire:poll.2s style="width: 100%;" class="table table-bordered table-striped">
                <tr>
                    <th>الاسم</th>
                    <th>الرد</th>
                </tr>
                @foreach ($replies ?? [] as $item)
                    <tr>
                        <td>{{ $item->user->name }}</td>
                        <td>{!! $item->response !!}</td>
                    </tr>
                @endforeach
            </table>
        </div>

        @if ($peper->id_sends != auth()->user()->id)
            <div class="form-card">
                <form wire:submit.prevent="submitReply" method="POST">

                    <label for="reply">الرد</label>
                    <textarea id="reply" wire:model="reply" name="reply" rows="4" required></textarea>

                    <button type="submit">إرسال الرد</button>
                </form>
            </div>

            <div class="form-card">
                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <form wire:submit.prevent="forword" method="POST">

                    <label for="reply">اعادة توجيه</label>
                    <select class="form-control" wire:model="user_id" name="user_id" id="user_id">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    <button wire:loading.attr="disabled" type="submit">اعادة توجيه</button>
                </form>
            </div>
        @endif
        {{--  --}}
    </div>

    <div class="form-card">
        <h2>مرفقات الورقة</h2>
        @foreach ($files as $file)
           <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>الاسم</th>
                    <th>نوع الملف</th>
                    <th>فتح</th>
                </tr>
            </thead>
            <tr>
                <td>{{ $file->name }}</td>
            </tr>
            <tbody>
                @foreach ($files as $file)
                    <tr>
                        <td>{{ $file->name }}</td>
                        <td>{{ substr($file->file, strrpos($file->file, '.') + 1) }}</td>
                        <td><a href="{{ asset('storage/' . $file->file) }}" target="_blank">فتح</a></td>
                    </tr>
                @endforeach

            </tbody>
           </table>
        @endforeach
    </div>
</div>
