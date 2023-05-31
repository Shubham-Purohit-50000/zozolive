<div class="form-group">
    <label for="password">
        Password
        @isset ($required)
            <span class="text-danger">
                *
            </span>
        @endisset
    </label>
    <div class="input-group">
        <input class="form-control" id="password" name="password" {{ $required ?? '' }} type="password"
            value="{{ old('password') }}" placeholder="Enter Password" />
        <div class="input-group-append">
            <span class="input-group-text" id="toggle_password" style="cursor:pointer">
                <i class="fas fa-eye eye" id="eye">
                </i>
            </span>
        </div>
    </div>
</div>
