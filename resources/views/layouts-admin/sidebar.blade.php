        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Peserta">
          <a class="nav-link" href="{{ route('peserta.index') }}">
            <i class="fa fa-fw fa-group"></i>
            <span class="nav-link-text">Peserta</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Soal">
          <a class="nav-link" href="{{ route('soal.index') }}">
            <i class="fa fa-fw fa-superscript"></i>
            <span class="nav-link-text">Soal</span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Hasil">
          <a class="nav-link" href="{{ route('admin.hasil') }}">
            <i class="fa fa-fw fa-list-ol"></i>
            <span class="nav-link-text">Hasil</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Live Score">
          <a class="nav-link" href="{{ route('admin.live') }}">
            <i class="fa fa-fw fa-sort-numeric-asc"></i>
            <span class="nav-link-text">Live Score</span>
          </a>
        </li>