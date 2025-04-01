@php
    $route = Route::currentRouteName();
@endphp
<div class="list-group panel list-group-flush">
    <ul class="nav nav-pills flex-column">
        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link {{ $route == 'dashboard' ? 'custom-active' : '' }} "
                data-parent="#sidebar" data-toggle="tooltip" data-placement="top" title="Dashboard">
                <i class="material-icons">
                    dashboard
                </i>

            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('donors.create') }}" data-toggle="tooltip" data-placement="top" title="Create Donor"
                class="nav-link {{ $route == 'donors.create' ? 'custom-active' : '' }}" data-parent="#sidebar">
                <i class="material-icons">
                    create
                </i>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('donors.view') }}" class="nav-link {{ $route == 'donors.view' ? 'custom-active' : '' }}"
                data-parent="#sidebar" data-toggle="tooltip" data-placement="top" title="View Details">
                <i class="material-icons">
                    list
                </i>
            </a>
        </li>

    </ul>
</div>
