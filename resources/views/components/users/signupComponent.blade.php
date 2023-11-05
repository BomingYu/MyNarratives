<form enctype="multipart/form-data" class="postForm" action="{{ route('user.register') }}" method="POST">
    @csrf
    @method('post')
    <h2>Signup</h2>
    <label>Avatar: <input class="form-control" type="file" name="image"></label>
    @error('image')
        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
    @enderror
    <input type="text" class="form-control" placeholder="Name" name="name">
    @error('name')
        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
    @enderror
    <input type="email" class="form-control" placeholder="Email" name="email">
    @error('email')
        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
    @enderror
    <input type="password" class="form-control" placeholder="Password" name="password">
    @error('password')
        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
    @enderror
    <input type="password" class="form-control" placeholder="Re-Password" name="password_confirmation">
    <textarea class="form-control" placeholder="Bio..." rows="2" name="bio"></textarea>
    <button type="submit" class="btn btn-success">Signup</button>
    <a href="{{ route('user.login') }}">Go To Login</a>
</form>
