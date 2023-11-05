<form class="postForm" action="{{ route('user.loggingIn') }}" method="post">
    @csrf
    <h2>Login</h2>
    <input type="email" class="form-control" id="staticEmail2" placeholder="Email" name="email">
    @error('email')
        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
    @enderror
    <input type="password" class="form-control" id="inputPassword2" placeholder="Password" name="password">
    @error('password')
        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
    @enderror
    <button type="submit" class="btn btn-success">Login</button>
    <a href="{{route('user.signup')}}">Go To Signup</a>
</form>