<div>
   <div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1>لارصدة السنوية</h1>
        </div>
        <form action="" method="post" wire:submit="updateAllUsers">
            <label for="">تعديل رصيد سنوي لكل المستخدمين</label>
            <input type="number" wire:model="max_balance" name="all_users" id="all_users">
            <button type="submit" class="btn btn-primary">تعديل</button>
        </form>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="">البحث عن مستخدم</label>
                        <input type="text" wire:model.live="search" class="form-control" id="search" name="search">
                    </div>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>الاسم</th>
                                <th>الرصيد السنوي</th>
                                <th>الرصيد المتبقي</th>
                                <th>الاجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->max_balance }}</td>
                                <td>{{ $user->max_balance-$user->year_balance }}</td>
                                <td>
                                    <button 
                                     wire:click="editYearBalance({{ $user->id }})" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">تعديل</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
   </div>
   <div wire:ignore.self class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">تعديل رصيد سنوي</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" wire:submit="updateYearBalance">
            <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="max_balance">الرصيد السنوي</label>
                        <input type="number" wire:model="max_balance" class="form-control" id="max_balance" name="max_balance">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                    <button type="submit" class="btn btn-primary">حفظ</button>
                </div>
            </form>
        </div>
    </div>
   </div>
</div>
