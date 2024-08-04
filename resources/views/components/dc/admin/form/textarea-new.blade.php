<div class="form-group">
    @if(!isset($label))
        @php($label = __($attribute))
    @endif
    <label
        class="col-form-label"
        for="{{ $attribute }}">
        {{ $label }}
        {!! isset($required) ? "" : "<span class='form-label-annotation'>optional</span>" !!}
    </label>
    <textarea
        {{isset($required) ? "required" : "" }}
        class="form-control {{ $class ?? "" }}"
        name="{{ $attribute }}"
        id="{{ $attribute }}"
        rows=" {{ $rows ?? "5" }}"
        {{isset($style) ? "style=".$style : "" }}
        {{isset($onchange) ? "onchange=".$onchange : "" }}
        {{isset($oninput) ? "oninput=".$oninput : "" }}
    >{{ old($attribute, $model->$attribute ?? "") }}</textarea>

    @error($attribute)
    <div class="error-message">
        {{ $message }}
    </div>
    @enderror
</div>
