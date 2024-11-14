<!-- Add icons to the links using the .nav-icon class
with font-awesome or any other icon font library -->
<li class="nav-header"></li>
<li class="nav-item">
  <a href="{{ aurl('') }}" class="nav-link {{ active_link(null,'active') }}">
    <i class="nav-icon fas fa-home"></i>
    <p>
      {{ trans('admin.dashboard') }}
    </p>
  </a>
</li>
@if(admin()->user()->role('settings_show'))
<li class="nav-item">
  <a href="{{ aurl('settings') }}" class="nav-link  {{ active_link('settings','active') }}">
    <i class="nav-icon fas fa-cogs"></i>
    <p>
      {{ trans('admin.settings') }}
    </p>
  </a>
</li>
@endif
@if(admin()->user()->role("admins_show"))
<li class="nav-item {{ active_link('admins','menu-open') }}">
  <a href="#" class="nav-link  {{ active_link('admins','active') }}">
    <i class="nav-icon fas fa-users"></i>
    <p>
      {{trans('admin.admins')}}
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('admins')}}" class="nav-link {{ active_link('admins','active') }}">
        <i class="fas fa-users nav-icon"></i>
        <p>{{trans('admin.admins')}}</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('admins/create') }}" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}}</p>
      </a>
    </li>
  </ul>
</li>
@endif
@if(admin()->user()->role("admingroups_show"))
<li class="nav-item {{ active_link('admingroups','menu-open') }}">
  <a href="#" class="nav-link  {{ active_link('admingroups','active') }}">
    <i class="nav-icon fas fa-users"></i>
    <p>
      {{trans('admin.admingroups')}}
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('admingroups')}}" class="nav-link {{ active_link('admingroups','active') }}">
        <i class="fas fa-users nav-icon"></i>
        <p>{{trans('admin.admingroups')}}</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('admingroups/create') }}" class="nav-link ">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}}</p>
      </a>
    </li>
  </ul>
</li>
@endif
@if(admin()->user()->role("sendemails_show"))
<li class="nav-item {{active_link('sendemails','menu-open')}} ">
  <a href="#" class="nav-link {{active_link('sendemails','active')}}">
    <i class="nav-icon fab fa-facebook-messenger"></i>
    <p>
      {{trans('admin.sendemails')}} 
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('sendemails')}}" class="nav-link  {{active_link('sendemails','active')}}">
        <i class="fab fa-facebook-messenger nav-icon"></i>
        <p>{{trans('admin.sendemails')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('sendemails/create') }}" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}} </p>
      </a>
    </li>
  </ul>
</li>
@endif



@if(admin()->user()->role("homepagemain_show"))
<li class="nav-item {{active_link('homepagemain','menu-open')}} ">
  <a href="#" class="nav-link {{active_link('homepagemain','active')}}">
    <i class="nav-icon fa fa-home"></i>
    <p>
      {{trans('admin.homepagemain')}} 
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    {{-- <li class="nav-item">
      <a href="{{aurl('homepagemain')}}" class="nav-link  {{active_link('homepagemain','active')}}">
        <i class="fa fa-home nav-icon"></i>
        <p>{{trans('admin.homepagemain')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('homepagemain/create') }}" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}} </p>
      </a>
    </li> --}}
   
    
@if(admin()->user()->role("servedindustries_show"))
<li class="nav-item {{active_link('servedindustries','menu-open')}} ">
  <a href="#" class="nav-link {{active_link('servedindustries','active')}}">
    <i class="nav-icon fa fa-icons"></i>
    <p>
      {{trans('admin.servedindustries')}} 
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('servedindustries')}}" class="nav-link  {{active_link('servedindustries','active')}}">
        <i class="fa fa-icons nav-icon"></i>
        <p>{{trans('admin.servedindustries')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('servedindustries/create') }}" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}} </p>
      </a>
    </li>
  </ul>
</li>
@endif

@if(admin()->user()->role("clientsays_show"))
<li class="nav-item {{active_link('clientsays','menu-open')}} ">
  <a href="#" class="nav-link {{active_link('clientsays','active')}}">
    <i class="nav-icon fa fa-icons"></i>
    <p>
      {{trans('admin.clientsays')}} 
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('clientsays')}}" class="nav-link  {{active_link('clientsays','active')}}">
        <i class="fa fa-icons nav-icon"></i>
        <p>{{trans('admin.clientsays')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('clientsays/create') }}" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}} </p>
      </a>
    </li>
  </ul>
</li>
@endif
  </ul>
</li>
@endif


@if(admin()->user()->role("categories_show"))
<li class="nav-item {{active_link('categories','menu-open')}} ">
  <a href="#" class="nav-link {{active_link('categories','active')}}">
    <i class="nav-icon fa fa-certificate"></i>
    <p>
      {{trans('admin.categories')}} 
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('categories')}}" class="nav-link  {{active_link('categories','active')}}">
        <i class="fa fa-certificate nav-icon"></i>
        <p>{{trans('admin.categories')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('categories/create') }}" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}} </p>
      </a>
    </li>
  </ul>
</li>
@endif



@if(admin()->user()->role("products_show"))
<li class="nav-item {{active_link('products','menu-open')}} ">
  <a href="#" class="nav-link {{active_link('products','active')}}">
    <i class="nav-icon fa fa-icons"></i>
    <p>
      {{trans('admin.products')}} 
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('products')}}" class="nav-link  {{active_link('products','active')}}">
        <i class="fa fa-icons nav-icon"></i>
        <p>{{trans('admin.products')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('products/create') }}" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}} </p>
      </a>
    </li>
    @if(admin()->user()->role("ingredients_show"))
<li class="nav-item {{active_link('ingredients','menu-open')}} ">
  <a href="#" class="nav-link {{active_link('ingredients','active')}}">
    <i class="nav-icon fa fa-wine-bottle"></i>
    <p>
      {{trans('admin.ingredients')}} 
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('ingredients')}}" class="nav-link  {{active_link('ingredients','active')}}">
        <i class="fa fa-wine-bottle nav-icon"></i>
        <p>{{trans('admin.ingredients')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('ingredients/create') }}" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}} </p>
      </a>
    </li>
  </ul>
</li>
@endif
  </ul>
  
</li>
@endif



@if(admin()->user()->role("orders_show"))
<li class="nav-item {{active_link('orders','menu-open')}} ">
  <a href="#" class="nav-link {{active_link('orders','active')}}">
    <i class="nav-icon fa fa-business-time"></i>
    <p>
      {{trans('admin.orders')}} 
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('orders')}}" class="nav-link  {{active_link('orders','active')}}">
        <i class="fa fa-business-time nav-icon"></i>
        <p>{{trans('admin.orders')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('orders/create') }}" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}} </p>
      </a>
    </li>
  </ul>
</li>
@endif

@if(admin()->user()->role("blogs_show"))
<li class="nav-item {{active_link('blogs','menu-open')}} ">
  <a href="#" class="nav-link {{active_link('blogs','active')}}">
    <i class="nav-icon fa fa-bullhorn"></i>
    <p>
      {{trans('admin.blogs')}} 
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('blogs')}}" class="nav-link  {{active_link('blogs','active')}}">
        <i class="fa fa-bullhorn nav-icon"></i>
        <p>{{trans('admin.blogs')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('blogs/create') }}" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}} </p>
      </a>
    </li>
  </ul>
</li>
@endif

@if(admin()->user()->role("galleries_show"))
<li class="nav-item {{active_link('galleries','menu-open')}} ">
  <a href="#" class="nav-link {{active_link('galleries','active')}}">
    <i class="nav-icon fa fa-photo-video"></i>
    <p>
      {{trans('admin.galleries')}} 
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('galleries')}}" class="nav-link  {{active_link('galleries','active')}}">
        <i class="fa fa-photo-video nav-icon"></i>
        <p>{{trans('admin.galleries')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('galleries/create') }}" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}} </p>
      </a>
    </li>
  </ul>
</li>
@endif

@if(admin()->user()->role("abouts_show"))
<li class="nav-item {{active_link('abouts','menu-open')}} ">
  <a href="#" class="nav-link {{active_link('abouts','active')}}">
    <i class="nav-icon fa fa-phone-volume"></i>
    <p>
      {{trans('admin.abouts')}} 
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('abouts')}}" class="nav-link  {{active_link('abouts','active')}}">
        <i class="fa fa-phone-volume nav-icon"></i>
        <p>{{trans('admin.abouts')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('abouts/create') }}" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}} </p>
      </a>
    </li>
  </ul>
</li>
@endif

@if(admin()->user()->role("branches_show"))
<li class="nav-item {{active_link('branches','menu-open')}} ">
  <a href="#" class="nav-link {{active_link('branches','active')}}">
    <i class="nav-icon fa fa-icons"></i>
    <p>
      {{trans('admin.branches')}} 
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('branches')}}" class="nav-link  {{active_link('branches','active')}}">
        <i class="fa fa-icons nav-icon"></i>
        <p>{{trans('admin.branches')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('branches/create') }}" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}} </p>
      </a>
    </li>
  </ul>
</li>
@endif

{{-- @if(admin()->user()->role("careers_show"))
<li class="nav-item {{active_link('careers','menu-open')}} ">
  <a href="#" class="nav-link {{active_link('careers','active')}}">
    <i class="nav-icon fa fa-allergies"></i>
    <p>
      {{trans('admin.careers')}} 
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('careers')}}" class="nav-link  {{active_link('careers','active')}}">
        <i class="fa fa-allergies nav-icon"></i>
        <p>{{trans('admin.careers')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('careers/create') }}" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}} </p>
      </a>
    </li>
  </ul>
</li>
@endif --}}


@if(admin()->user()->role("partners_show"))
<li class="nav-item {{active_link('partners','menu-open')}} ">
  <a href="#" class="nav-link {{active_link('partners','active')}}">
    <i class="nav-icon fa fa-icons"></i>
    <p>
      {{trans('admin.partners_and_careers')}} 
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('partners')}}" class="nav-link  {{active_link('partners','active')}}">
        <i class="fa fa-icons nav-icon"></i>
        <p>{{trans('admin.partners_and_careers')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('partners/create') }}" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}} </p>
      </a>
    </li>
    
@if(admin()->user()->role("partnerstype_show"))
<li class="nav-item {{active_link('partnerstype','menu-open')}} ">
  <a href="#" class="nav-link {{active_link('partnerstype','active')}}">
    <i class="nav-icon fa fa-fist-raised"></i>
    <p>
      {{trans('admin.partnerstype')}} 
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('partnerstype')}}" class="nav-link  {{active_link('partnerstype','active')}}">
        <i class="fa fa-fist-raised nav-icon"></i>
        <p>{{trans('admin.partnerstype')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('partnerstype/create') }}" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}} </p>
      </a>
    </li>
  </ul>
</li>
@endif

  </ul>
</li>
@endif

@if(admin()->user()->role("banners_show"))
<li class="nav-item {{active_link('banners','menu-open')}} ">
  <a href="#" class="nav-link {{active_link('banners','active')}}">
    <i class="nav-icon fa fa-icons"></i>
    <p>
      {{trans('admin.banners')}} 
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('banners')}}" class="nav-link  {{active_link('banners','active')}}">
        <i class="fa fa-icons nav-icon"></i>
        <p>{{trans('admin.banners')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('banners/create') }}" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}} </p>
      </a>
    </li>
  </ul>
</li>
@endif




    @if(admin()->user()->role("distributors_show"))
<li class="nav-item {{active_link('distributors','menu-open')}} ">
  <a href="#" class="nav-link {{active_link('distributors','active')}}">
    <i class="nav-icon fa fa-icons"></i>
    <p>
      {{trans('admin.distributors')}} 
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('distributors')}}" class="nav-link  {{active_link('distributors','active')}}">
        <i class="fa fa-icons nav-icon"></i>
        <p>{{trans('admin.distributors')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('distributors/create') }}" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}} </p>
      </a>
    </li>
  </ul>
</li>
@endif
{{-- @if(admin()->user()->role("distributorsbanners_show"))
<li class="nav-item {{active_link('distributorsbanners','menu-open')}} ">
  <a href="#" class="nav-link {{active_link('distributorsbanners','active')}}">
    <i class="nav-icon fa fa-icons"></i>
    <p>
      {{trans('admin.distributorsbanners')}} 
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('distributorsbanners')}}" class="nav-link  {{active_link('distributorsbanners','active')}}">
        <i class="fa fa-icons nav-icon"></i>
        <p>{{trans('admin.distributorsbanners')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('distributorsbanners/create') }}" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}} </p>
      </a>
    </li>
  </ul>
</li>
@endif --}}



@if(admin()->user()->role("footersocials_show"))
<li class="nav-item {{active_link('footersocials','menu-open')}} ">
  <a href="#" class="nav-link {{active_link('footersocials','active')}}">
    <i class="nav-icon fa fa-icons"></i>
    <p>
      {{trans('admin.footersocials')}} 
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('footersocials')}}" class="nav-link  {{active_link('footersocials','active')}}">
        <i class="fa fa-icons nav-icon"></i>
        <p>{{trans('admin.footersocials')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('footersocials/create') }}" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}} </p>
      </a>
    </li>
  </ul>
</li>
@endif

@if(admin()->user()->role("bepartners_show"))
<li class="nav-item {{active_link('bepartners','menu-open')}} ">
  <a href="#" class="nav-link {{active_link('bepartners','active')}}">
    <i class="nav-icon fa fa-globe-europe"></i>
    <p>
      {{trans('admin.bepartners')}} 
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('bepartners')}}" class="nav-link  {{active_link('bepartners','active')}}">
        <i class="fa fa-globe-europe nav-icon"></i>
        <p>{{trans('admin.bepartners')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('bepartners/create') }}" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}} </p>
      </a>
    </li>
  </ul>
</li>
@endif

@if(admin()->user()->role("pcpbs_show"))
<li class="nav-item {{active_link('pcpbs','menu-open')}} ">
  <a href="#" class="nav-link {{active_link('pcpbs','active')}}">
    <i class="nav-icon fa fa-icons"></i>
    <p>
      {{trans('admin.pcpbs')}} 
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('pcpbs')}}" class="nav-link  {{active_link('pcpbs','active')}}">
        <i class="fa fa-icons nav-icon"></i>
        <p>{{trans('admin.pcpbs')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('pcpbs/create') }}" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}} </p>
      </a>
    </li>
  </ul>
</li>
@endif
