@php
    $userPanel = \Admin\Classes\UserPanel::forUser();
@endphp
<li class="nav-item dropdown">
    <a href="#" class="nav-link" data-bs-toggle="dropdown">
        <img
            class="rounded-circle"
            src="{{ $userPanel->getAvatarUrl().'&s=64' }}"
        >
    </a>
    <div class="dropdown-menu">
        <div class="d-flex flex-column w-100 align-items-center">
            <div class="pt-4 px-4 pb-2">
                <img class="rounded-circle" src="{{ $userPanel->getAvatarUrl().'&s=64' }}">
            </div>
            <div class="pb-3 text-center">
                <div class="text-uppercase">{{ $userPanel->getUserName() }}</div>
                <div class="text-muted">{{ $userPanel->getRoleName() }}</div>
            </div>
        </div>
        <div role="separator" class="dropdown-divider"></div>
        @foreach ($item->options() as $item)
            <a class="dropdown-item {{ $item->cssClass }}" {!! Html::attributes($item->attributes) !!}>
                <i class="{{ $item->iconCssClass }}"></i><span>@lang($item->label)</span>
            </a>
        @endforeach
    </div>
</li>
