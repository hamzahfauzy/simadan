<!-- Sidebar -->
<div class="sidebar sidebar-style-2">			
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="<?= asset('assets/img/user.jpeg')?>" alt="..." class="avatar-img rounded-circle" style="object-position: top;">
                </div>
                <div class="info">
                    <a href="">
                        <span>
                            <?=auth()->user->name?>
                            <span class="user-level" style="text-transform:capitalize;"><?=get_role(auth()->user->id)->name?></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>
                </div>
            </div>
            <ul class="nav <?=config('theme')['sidebar_color']?>">
                <?= generated_menu(auth()->user->id) ?>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->