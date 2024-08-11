<div {{ $attributes->class(['icheck-primary']) }}>
    <input @if(isset($checked) && $checked) checked @endif type="checkbox" id="{{$name}}" name="{{$name}}"/>
    <label for="{{$name}}">{{$label ?? ""}}</label>
</div>
