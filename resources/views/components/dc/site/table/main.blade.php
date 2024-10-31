@props([
    'head',
    'body',
])

<div class="table-stack">
    <table class="table-main">
        <thead class="table-header">
            <tr>
                {!! $head !!}
            </tr>
        </thead>
        <tbody class="table-body">
            {!! $body !!}
        </tbody>
    </table>
    <div class="table-mobile">
        {!! $mobile !!}
    </div>
</div>
