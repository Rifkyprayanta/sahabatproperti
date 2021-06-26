
<div class="popup" id="sign-popup">
    <h3>Sign In to your Account</h3>
    <div class="popup-form">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            @if(session('errors'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Something it's wrong:
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif
            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif
            @if (Session::has('error'))
                <div class="alert alert-danger">
                    {{ Session::get('error') }}
                </div>
            @endif
            <div class="form-field">
                <input type="text" name="username" placeholder="Username">
            </div>
            <div class="form-field">
                <input type="password" name="password" placeholder="Password">
            </div>
            <div class="form-cp">
                <div class="form-field">
                    <div class="input-field">
                        <input type="checkbox" name="ccc" id="cc1">
                        <label for="cc1">
                            <span></span>
                            <small>Remember me</small>
                        </label>
                    </div>
                </div>
                <a href="#" title="">Forgot Password?</a>
            </div><!--form-cp end-->
            <button type="submit" class="btn2">Sign In</button>
        </form>
        <a href="#" title="" class="fb-btn"> <i class="fa fa-facebook"></i>Sign In With Facebook</a>
    </div>
</div><!--popup end-->