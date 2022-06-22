<div>
    <div class="form-group">
        <form wire:submit.prevent="submit">

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="first_name" class="text-capitalize">نام کاربر</label>
                <input class="form-control" placeholder="نام کاربر را وارد کنید" wire:model="first_name" type="text" id="first_name">
                @error('first_name')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="last_name" class="text-capitalize">نام خانوادگی</label>
                <input class="form-control" placeholder="نام خانوادگی کاربر را وارد کنید" wire:model="last_name" type="text" id="last_name">
                @error('last_name')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group col-md-6">
                <label for="user_name" class="text-capitalize">نام کاربری</label>
                <input class="form-control" placeholder="نام کاربری کاربر را وارد کنید" wire:model="user_name" type="text" id="user_name">
                @error('user_name')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="email" class="text-capitalize">ایمیل کاربر</label>
                <input class="form-control" placeholder="ایمیل کاربر را وارد کنید" wire:model="email" type="text" id="email" disabled>
                @error('email')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group col-md-6">
                <label for="phone_number" class="text-capitalize">تلفن کاربر</label>
                <input class="form-control" placeholder="شماره تلفن کاربر را وارد کنید" wire:model="phone_number" type="text" id="phone_number">
                @error('phone_number')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <section class="form-group col-12">
                <input class="btn btn-primary mt-3" type="submit" value="ذخیره کاربر">
            </section>
        </div>
        </form>
    </div>

</div>
