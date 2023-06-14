
<form method="POST" action="{{ route('profile.update') }}">
    @csrf

    <div class="form-group">
        <label for="business_name">Business Name</label>
        <input id="business_name" type="text" class="form-control" name="business_name" value="{{ old('business_name', $user->business_name) }}" required autofocus>
    </div>

    <div class="form-group">
        <label for="country">Country</label>
        <input id="country" type="text" class="form-control" name="country" value="{{ old('country', $user->country) }}" required>
    </div>

    <div class="form-group">
        <label for="state">State</label>
        <input id="state" type="text" class="form-control" name="state" value="{{ old('state', $user->state) }}" required>
    </div>

    <div class="form-group">
        <label for="city">City</label>
        <input id="city" type="text" class="form-control" name="city" value="{{ old('city', $user->city) }}" required>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Update Profile</button>
    </div>
</form>
