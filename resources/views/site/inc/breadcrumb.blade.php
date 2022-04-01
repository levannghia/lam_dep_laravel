<div class="list-title">
    <ol class="breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList">
        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a itemprop="item"
                href="/">
                <span itemprop="name" class="{{empty(Str::ucfirst(__($param1))) ? 'title-name' : ''}}">Trang chủ</span>
                <meta itemprop="position" content="1">
            </a></li>

        @if (!empty(Str::ucfirst(__($param1))))
        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a itemprop="item"
            href="https://www.femina.in/beauty">
            <span itemprop="name" class="{{empty(Str::ucfirst(__($param2))) ? 'title-name' : ''}}">
                {{ Str::ucfirst(__($param1)) }}</span>
            <meta itemprop="position" content="2">
        </a></li>
        @endif
       

        @if (!empty(Str::ucfirst(__($param2))))
        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
            <a itemprop="item"
                href="https://www.femina.in/beauty/hair">
                <span itemprop="name" class="{{empty(Str::ucfirst(__($param3))) ? 'title-name' : ''}}">
                    {{ Str::ucfirst(__($param2)) }}
                </span>
                <meta itemprop="position" content="3">
            </a>
        </li>
        @endif
       

        @if (!empty(Str::ucfirst(__($param3))))
        <li class="active">
            <span class="title-name">
                {{ Str::ucfirst(__($param3)) }}</span>
        </li>
        @endif
        
    </ol>
</div>
