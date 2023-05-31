@props([
  'inputName',
  'label',
  'selectName',
  'id',
  'countries',
  'selectedOption' => null  ,
  'oldMobile' => old($inputName)
])
<div class="form-group">
    <label for="{{ $inputName }}">{{ $label }}<span class="text-danger">*</span></label>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <select name="{{ $selectName }}"  id="{{ $id }}">
                @foreach($countries as $country)
                    <option value="{{'+'.$country->phonecode}}" {{ $country->phonecode == ($selectedOption ?? '91') ? 'selected' : ''}}>{{ $country->sortname.' (+'.$country->phonecode.')' }}</option>
                @endforeach
            </select>
        </div>
        <input type="text" class="form-control" name="{{ $inputName }}" id="{{ $inputName }}" value="{{ $oldMobile ?? null }}"  required/>
    </div>
</div> 