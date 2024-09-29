<div {{ $attributes->class(['row']) }}>
    <div class="col-12 markdown_header">Vorschau:</div>
</div>
<div class="row">
    <div class="col-12">
        <div id="biography_parsed" class="markdown_preview"></div>
    </div>
</div>
<script>
    function update_markdown() {

        $('#biography_parsed').html(DOMPurify.sanitize(marked.parse($('#{{$source}}').val())));
    }
    update_markdown();
</script>
