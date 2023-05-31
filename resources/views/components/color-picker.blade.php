 <div class="form-group">
    <label for="example-color-input" class="">{{ $title }}</label>
    <div class="">
     <input class="form-control" type="color" name="{{ $name }}"  value="{{ $value ?? old($name) }}" />
    </div>
</div>