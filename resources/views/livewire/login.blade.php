
<div class="container" style="margin-top:80px">
    <div class="row">
        <div class="col-md-4 offset-md-4 ">
            <form action="" wire:submit.prevent="loginUser">
                <div>
                    @if (session()->has('message'))
                    <div class="alert alert-danger">
                        {{ session('message') }}
                    </div>
                    @endif
                </div>
                    <div class="form-group">
                        <label for="">Enter Email</label>
                        <input type="email" name="" id="" class="form-control" wire:model="form.email">
                    </div>
                    <div class="form-group">
                        <label for="">Enter Password</label>
                        <input type="password" name="" id="" class="form-control" wire:model="form.password">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="form-control btn btn-primary">Login</button>
                    </div>
            </form>
        </div>
    </div>
</div>
