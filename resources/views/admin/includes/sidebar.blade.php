
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark"> <!--begin::Sidebar Brand-->
    <div class="sidebar-brand"> <!--begin::Brand Link--> <a href="{{ route('admin.index') }}" class="brand-link"> <!--begin::Brand Image--> <img src="{{ asset('../../dist/assets/img/AdminLTELogo.png') }}" alt="" class="brand-image opacity-75 shadow"> <!--end::Brand Image--> <!--begin::Brand Text--> <span class="brand-text fw-light">AdminBlog</span> <!--end::Brand Text--> </a> <!--end::Brand Link--> </div> <!--end::Sidebar Brand--> <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper" data-overlayscrollbars="host"><div class="os-size-observer os-size-observer-appear"><div class="os-size-observer-listener ltr"></div></div><div data-overlayscrollbars-viewport="scrollbarHidden" style="margin-right: -16px; margin-bottom: -16px; margin-left: 0px; top: -8px; right: auto; left: -8px; width: calc(100% + 16px); padding: 8px; overflow-y: scroll;">
        <nav class="mt-2"> <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item"> <a href="{{ route('admin.user.index') }}" class="nav-link"> <i class="fa-solid fa-users pt-1"></i>
                    <p>Users</p>
                </a> </li>
                <li class="nav-item"> <a href="{{ route('admin.category.index') }}" class="nav-link"> <i class="fa-solid fa-list pt-1"></i>
                    <p>Categories</p>
                </a> </li>
                <li class="nav-item"> <a href="{{ route('admin.tag.index') }}" class="nav-link"> <i class="bi bi-tags"></i>
                    <p>Tags</p>
                </a> </li>
                <li class="nav-item"> <a href="{{ route('admin.post.index') }}" class="nav-link"> <i class="bi bi-file-post"></i>
                    <p>Posts</p>
                </a> </li>
            </ul>
        </nav>
    </div><div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-auto-hide os-scrollbar-handle-interactive os-scrollbar-track-interactive os-scrollbar-cornerless os-scrollbar-unusable os-theme-light os-scrollbar-auto-hide-hidden"><div class="os-scrollbar-track"><div class="os-scrollbar-handle" style="width: 100%;"></div></div></div><div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hide os-scrollbar-handle-interactive os-scrollbar-track-interactive os-scrollbar-visible os-scrollbar-cornerless os-theme-light os-scrollbar-auto-hide-hidden"><div class="os-scrollbar-track"><div class="os-scrollbar-handle" style="height: 48.202%;"></div></div></div></div>
</aside> <!--end::Sidebar--> <!--begin::App Main-->