<h3 class="text-center h2 m_t-20 m_b-20">Правовые документы</h3>

@if(!empty($house->documents) && count($house->documents) > 0)
<div class="cell m_b-30 m_t-10">
    @foreach($house->documents as $document)
        <div class="cell6 cell-md-6 cell-sm">
            <a href="{{ Helpers::getImage($document->image, '1024x0') }}" class="under-link black js-fancybox">
                <img src="/img/pdf.png" alt="{{ $document->title }}" class="p_r-15">{{ $document->title }}
            </a>
        </div>
    @endforeach
</div>
@endif

<div class="cell m_b-30 m_t-10">
    <div class="cell6 cell-md-6 cell-sm m_b-30">
        <a href="/img/act/razreshenie.jpg" class="under-link black js-fancybox">
            <img class="p_r-15" src="/img/pdf.png" alt="Акт на землю">Разрешение на строительство
        </a>
    </div>

    <div class="cell6 cell-md-6 cell-sm m_b-30">
        <a href="/img/act/akt_na_zemlu.jpg" class="under-link black js-fancybox">
            <img class="p_r-15" src="/img/pdf.png" alt="Разрешение на строительство">Ввод в эксплуатацию
        </a>
    </div>

    <div class="cell6 cell-md-6 cell-sm m_b-30">
        <a href="/kvartiry-pod-kievom" class="under-link black">
            <img class="p_r-15" src="/img/pdf.png" alt="Больше документов">Больше документов
        </a>
    </div>
</div>
