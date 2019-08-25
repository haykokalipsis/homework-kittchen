<div class="lang-window">
    <button class="btn btn-info" title="выберите язык" data-toggle="dropdown"><i class="fa fa-language" aria-hidden="true"></i></button>
    <div class="dropdown-menu">

        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            <a  hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" class="dropdown-item">
                {{ $properties['native'] }}
            </a>
        @endforeach
    </div>
</div>