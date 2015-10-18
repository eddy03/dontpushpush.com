<ul class="nav navbar-nav top-left-nav topnavigation">
    <li><a href="{{ route('administrator.article.index')  }}"><i class="fa fa-file-text-o fa-fw"></i> Artikel</a></li>
    <li><a href="{{ route('administrator.document.index') }}"><i class="fa fa-files-o fa-fw"></i> Dokumen</a></li>
    <li><a href="{{ route('listtag')  }}"><i class="fa fa-tags fa-fw"></i> Tags</a></li>
</ul>
<ul class="nav navbar-nav navbar-right">
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Edi Abdul Rahman <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href=""><i class="fa fa-user fa-fw"></i> Profil</a></li>
            <li role="separator" class="divider"></li>
            <li class="dropdown-header">External Detail</li>
            <li><a href="https://forge.laravel.com/" target="_blank"><i class="fa fa-file-code-o fa-fw"></i> Laravel Forge</a></li>
            <li><a href="https://cloud.digitalocean.com/login" target="_blank"><i class="fa fa-server fa-fw"></i> DigitalOcean</a></li>
            <li><a href="https://sso.godaddy.com/" target="_blank"><i class="fa fa-globe fa-fw"></i> GoDaddy</a></li>
            <li><a href="https://www.cloudflare.com/a/login" target="_blank"><i class="fa fa-exchange fa-fw"></i> Cloud Flare</a></li>
            <li><a href="https://mailgun.com/sessions/new" target="_blank"><i class="fa fa-envelope-o fa-fw"></i> MailGun</a></li>
            <li><a href="https://www.google.com/analytics/web/?hl=en" target="_blank"><i class="fa fa-area-chart fa-fw"></i> Google Analytics</a></li>
            <li><a href="https://disqus.com/" target="_blank"><i class="fa fa-comments-o fa-fw"></i> Disqus</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="{{ route('logout')  }}"><i class="fa fa-sign-out fa-fw"></i> Log Keluar</a></li>
        </ul>
    </li>
</ul>