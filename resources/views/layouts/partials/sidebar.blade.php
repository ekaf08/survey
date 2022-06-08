<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="/dashboard">
                        <img src="/assets/images/logo/logo.png" alt="Logo" srcset="">
                        <h5>DTMS</h5>
                    </a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu Dinamis</li>

                @foreach($menu as $men)
                <?php
                    $child = \App\Models\Menu::cek_child($men->id);
                ?>

                <li class="sidebar-item<?=(count($child))? ' has-sub':''?>">
                    <a href="/dashboard" class='sidebar-link'>
                        <i class="{{ $men->menu_icon }}"></i>
                        <span>{{ $men->menu_name }}</span>
                    </a>
                    <?php
                        
                        // dd(count($child));
                        if(count($child)){
                            $anak = \App\Models\Menu::submenu_roles($role,$men->id);;
                            echo '<ul class="submenu">';
                            foreach ($anak as $an) {
                                # code...
                                echo '<li class="submenu-item ">
                                        <a href="'. URL::to($an->menu_links).'">'. $an->menu_name .' </a>
                                    </li>';
                            }
                            echo '</ul>';
                        }
                    ?>
                </li>
                @endforeach




            </ul>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item active">
                    <a href="/dashboard" class='sidebar-link'>
                        <i class="bi bi-clipboard-data"></i>
                        <span>Dashboard</span>
                    </a>
                </li>


                {{-- FORM ENTRI --}}
                <li class="sidebar-item has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-pen"></i>
                        <span>Entri Data</span>
                    </a>
                    <ul class="submenu">
                         <li class="submenu-item ">
                            <a href="/main/data-warga">Data Prelist</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="/main/list-data-rumahtangga/">Data Rumah Tangga</a>
                        </li>
                         <li class="submenu-item ">
                            <a href="/entridata/form-data-individu">Data Individu</a>
                        </li> 

                        <li class="submenu-item ">
                            <a href="/livewire/coba-tambah">Coba Liveware</a>
                        </li> 

                    </ul>
                </li>
                {{-- END FORM ENTRI --}}

                {{-- TABEL DATA --}}
                <li class="sidebar-item has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-clipboard-data"></i>
                        <span>Tabel Data</span>
                    </a>
                    <ul class="submenu">
                        {{-- <li class="submenu-item ">
                            <a href="/main/data-warga">Data Prelist</a>
                        </li> --}}
                        <li class="submenu-item "> 
                            <a href="/main/prelist_survei">Data Survei</a>
                        </li>
                        <li class="submenu-item "> 
                            <a href="/entridata/form_cetak">Cetak BAP</a>
                        </li>
                    </ul>
                </li>

                {{-- END TABEL --}}
                <li class="sidebar-item has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-person-fill"></i>
                        <span>Akun</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="#">Ganti Password</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="#">Ganti Profil</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="/actionlogout">Keluar</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>