<div class="container" style="margin-top:80px">
    <div class="row">
        <div class="col-md-4 offset-md-4 ">
            <form action="" wire:submit.prevent="addUser">
                <div>
                    @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Enter Email</label>
                    <input type="email" name="" class="form-control" wire:model="email">
                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="">Enter Name</label>
                    <input type="text" name="" class="form-control" wire:model="name">
                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="">Enter Password</label>
                    <input type="password" name="" class="form-control" wire:model="password">
                    @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="">Confirm Password</label>
                    <input type="password" name="" class="form-control" wire:model="confirmPassword">
                </div>
                <div class="form-group">
                    <button type="submit" class="form-control btn btn-primary">Add User</button>
                </div>
            </form>
        </div>
    </div>
</div>
