<div>
   <div class="card p-2">
        <form wire:submit='Save' method="post">
            <div class="row">
                <div class="col-md-6 co-12">
                    <label for="">اسم الاجازة</label>
                    <input required type="text" wire:model='name' class="form-control" name="" id="">
                </div>
                <div class="col-md-6 co-12">
                    <label for=""> عدد الايام</label>
                    <input required type="number" wire:model='num' class="form-control" name="" id="">
                </div>
                <div class="col-12 p-2">
                    <center>
                        <button type="submit" class="btn btn-primary">حفظ</button>
                    </center>
                </div>
            </div>
        </form>
        <div class="table-responsive p-0">
            <table class="table align-items-center mb-0" id="S_table">
                <thead>
                    <tr>

                        <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                            #
                        </th>
                        <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                            اسم الاجازة
                        </th>

                        <th class="text-center text-uppercase text-primary text-md font-weight-bolder">
                            عدد ايام الاجازة
                        </th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($types as $key=> $item)
                        <tr>
                            <td class="text-center text-uppercase  text-md ">
                                {{$key+1}}
                            </td>
                            <td class="text-center text-uppercase  text-md ">
                                {{$item->name}}
                            </td>
                            <td class="text-center text-uppercase  text-md ">
                                {{$item->num}}
                            </td>
                            <td>
                                @if ($item->stute)
                                    
                                <button wire:click='editestute({{$item->id}})' class="btn btn-danger">تعطيل</button>
                                @else
                                    
                                <button wire:click='editestute({{$item->id}})' class="btn btn-info">تفعيل</button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
   </div>
</div>
