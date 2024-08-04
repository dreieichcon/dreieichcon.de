@props([
    /** @var \App\Models\Section */
    'section'
])

<form action="/admin/section/{{$section->id}}/image_new" method="POST" enctype="multipart/form-data">
    @csrf

    <x-dc.admin.form.input
            name="alt"
            label="Alternativ-Text"
            required
    />
    <x-dc.admin.form.input
            name="copyright"
            label="Copyright (ohne (c) )"
    />

    <x-dc.admin.form.input
            name="file"
            type="file"
            required
    />

    <x-dc.admin.form.submit/>
</form>
