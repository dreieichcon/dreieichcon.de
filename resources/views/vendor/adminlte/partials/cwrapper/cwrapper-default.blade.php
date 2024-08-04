@inject('layoutHelper', 'JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper')
@inject('preloaderHelper', 'JeroenNoten\LaravelAdminLte\Helpers\preloaderHelper')

@if($layoutHelper->isLayoutTopnavEnabled())
    @php( $def_container_class = 'container' )
@else
    @php( $def_container_class = 'container-fluid' )
@endif

{{-- Default Content Wrapper --}}
<div class="{{ $layoutHelper->makeContentWrapperClasses() }}">

    {{-- Preloader Animation (cwrapper mode) --}}
    @if($preloaderHelper->isPreloaderEnabled('cwrapper'))
        @include('adminlte::partials.common.preloader')
    @endif

    {{-- Content Header --}}
    @hasSection('content_header')
        <div class="content-header">
            <div class="{{ config('adminlte.classes_content_header') ?: $def_container_class }}">
                @yield('content_header')
            </div>
        </div>
    @endif

    {{--    Operation Result Area --}}
    @if (session()->has('success'))
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header bg-success">
                                {{ session('success') }}
                            </div>
                        </div>
                    </div>
                </div>

        </section>
    @endif

    @if (session()->has('error'))
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header bg-gradient-warning">

                                Fehler: {{ session('error') }}
                                <p>
                                    {!!   session('error_details') ?? "" !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

        </section>
    @endif

    @if ($errors->any())
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-danger">
                            <h3>Bei der Überprüfung wurden folgende Fehler gefunden:</h3>
                            <ul>
                                @php($messages = "")
                                @foreach($errors->all() as $message)
                                    @php($messages.=$message."\n")
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>


                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- Main Content --}}
    <div class="content">
        <div class="{{ config('adminlte.classes_content') ?: $def_container_class }}">
            @stack('content')
            @yield('content')
        </div>
    </div>

</div>
