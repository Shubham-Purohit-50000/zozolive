<div class="form-group">
  <label class="">{{ generateLabel($name) }}
  </label><br/>
  <div class="">
   <span class="switch switch-outline switch-icon switch-success">
    <label>
     <input type="checkbox" {{ $checked ?? null }} name="{{ $name }}" value="1" />
     <span></span>
    </label>
   </span>
  </div>
</div>