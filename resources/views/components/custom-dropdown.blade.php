<div class="dropdown">
 <a href="#" class="btn font-weight-bold dropdown-toggle" data-toggle="dropdown">
  {{ $title ?? null }}
  <i class="la la-tasks"></i>
 </a>
 <div class="dropdown-menu dropdown-menu-sm">
  <ul class="navi navi-bolder">
   {{ $slot }}
  </ul>
 </div>
</div>