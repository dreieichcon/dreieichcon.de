@extends("layouts.main")



@section("content")
    <div style="height:2rem">&nbsp;</div>
    <div
        class="mt-4"

        style="
        /*border: 1px solid white;*/
        height:50vH;
        display: flex;
        justify-content: space-around;
        align-content: space-around;
        align-items: center;
        flex-direction: row;
        ">
        <div style="
        /*border: 1px solid green;*/
        display: flex;
        flex-direction: column;
        width:100%;
        justify-content: space-around;
        align-content: space-around;
        align-items: center;
        ">
            <div class="content-page-title">
                Seite nicht gefunden
            </div>
            <div>
                Die von Ihnen aufgerufene Seite konnte leider nicht gefunden werden
            </div>
            <img
                src="{{asset("/assets/resources/img/error.png")}}"
                alt="Ein kleiner Zwerg"
                style="
                /*border: 1px solid red;*/
                width:30%;
                height:100%;
                object-fit: cover;
                overflow: hidden;
             "
            >
        </div>
    </div>

@endsection
