<div class="popup" id="register-popup">
    <h3>Register</h3>
    <div class="popup-form">
        <form action="{{ route('register') }}" method="post">
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
        <div class="form-field">
                <input type="text" name="name" placeholder="Nama">
            </div>
            <div class="form-field">
                <input type="text" name="username" placeholder="Username">
            </div>
            <div class="form-field">
                <input type="text" name="email" placeholder="Email">
            </div>
            <div class="form-field">
                <input type="text" name="phone" placeholder="Phone">
            </div>
            <div class="form-field">
                <input type="password" name="password" placeholder="Password">
            </div>
            <div class="form-field">
                <input type="password" name="password_confirmation" placeholder="Password">
            </div>
            <div class="form-cp">
                <div class="form-field">
                    <div class="input-field">
                        <input type="checkbox" name="ccc" id="cc2">
                        <label for="cc2">
                            <span></span>
                            <small>I agree with terms</small>
                        </label>
                    </div>
                </div>
                <a href="#" title="" class="signin-op">Have an account?</a>
            </div><!--form-cp end-->
            <button type="submit" class="btn2">Register</button>
        </form>
    </div>
</div><!--popup end-->