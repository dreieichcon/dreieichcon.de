@extends("layouts.main")


@section("content")

    @dump($programm)

    <?php
        $prog = new \App\Models\Programm();
        foreach($prog->getAttributes() as $key => $value){
            echo __($key);
        }
        ?>
@endsection
