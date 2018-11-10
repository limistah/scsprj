<ul class="side-nav" id="mobile-menu">

    <li class=" <?= set_active_link('/') ?>"><a href="<?= base_url ?>">Home</a></li>

    <li>

        <a href="javascript:///" class="dropdown-button" href="#!" data-activates="mobdropdown2">

            Executives

            <i class="material-icons right">arrow_drop_down</i>

        </a>

    </li>

    <ul id="mobdropdown2" class="dropdown-content">

        <li>

            <a href="<?= site_url('executive/governor')?>">
                Office of the Governor
            </a>

        </li>

        <li>

            <a href="<?= site_url('executive/deputy-governor')?>">

                Office of the Deputy Governor

            </a>

        </li>
    </ul>

    <li class=" <?= set_active_link('ministries') ?>">

        <a href="<?= site_url('ministries') ?>">

            Ministries

        </a>

    </li>

    <li class=" <?= set_active_link('parastatals') ?>">

        <a href="<?= site_url('parastatals') ?>">

            Parastatals

        </a>

    </li>

<li class=" <?= set_active_link('local-governments') ?>">

                    <a href="<?= site_url('local-governments') ?>">

                        LGAs

                    </a>

                </li>
                <li class=" <?= set_active_link('news') ?>">

                    <a href="<?= site_url('news') ?>">

                        State News

                    </a>

                </li>

    <li class=" <?= set_active_link('cafe') ?>">
        <a href="<?= site_url('cafe') ?>">
            Cafe
        </a>
    </li>

    <li>
        <a class="dropdown-button" href="javascript:///" data-activates="mobdropdown3">
            About Anambra
            <i class="material-icons right">arrow_drop_down</i>
        </a>
    </li>

    <ul id="mobdropdown3" class="dropdown-content">

        <li class=" <?= set_active_link('history') ?>"><a href="<?= site_url('history') ?>">History</a></li>

        <li class=" <?= set_active_link('geography') ?>"><a href="<?= site_url('geography') ?>">Map/LGAs</a></li>

        <li class=" <?= set_active_link('vision-and-mission') ?>"><a href="<?= site_url('vision-and-mission') ?>">Vision/Mission</a></li>

        <li class=" <?= set_active_link('past-governors') ?>"><a href="<?= site_url('past-governors') ?>">Past Governors</a></li>

        <li class=" <?= set_active_link('natural-resources') ?>"><a href="<?= site_url('natural-resources') ?>">Natural Resources</a></li>

        <li class=" <?= set_active_link('oil-and-gas') ?>"><a href="oil-and-gas">Oil &amp; Gas Exploration</a></li>

        <li class=" <?= set_active_link('urbanization-and-regional-planning') ?>"><a href="<?= site_url('urbanization-and-regional-planning') ?>">Urbanization &amp; Regional Planning</a></li>

        <li class=" <?= set_active_link('education') ?>"><a href="<?= site_url('education') ?>">Education</a></li>

        <li class=" <?= set_active_link('politics') ?>"><a href="<?= site_url('politics') ?>">Politics</a></li>

        <li class=" <?= set_active_link('icons') ?>"><a href="<?= site_url('icons') ?>">Icons</a></li>

    </ul>

    <li>

        <a href='javascript:///' class="dropdown-button" data-activates='mobdropdownMedia'>

            Media

            <i class="material-icons right">arrow_drop_down</i>

        </a>

    </li>

        <ul id='mobdropdownMedia' class='dropdown-content'>

        <li class=" <?= set_active_link('media/images') ?>"><a href="<?= site_url('media/images') ?>">Images</a></li>

        <!-- <li class=" <?= set_active_link('media/videos') ?>"><a href="<?= site_url('media/videos') ?>">Videos</a></li> -->

    </ul>

    <li class=" <?= set_active_link('contact') ?>"><a href="<?= site_url('contact') ?>">Contact/Services</a></li>

</ul>

<div class="navbar-fixed">

    <nav class="nav-extended">

        <div class="nav-wrapper">

            <a href="<?= base_url ?>" class="brand-logo">

                <img src="<?= get_image("logo.png") ?>" alt="Anambra State Logo" class="responsive-img" height="63px" width="63px">

            </a>

            <a href="#" data-activates="mobile-menu" class="button-collapse"><i class="material-icons">menu</i></a>

            <ul id="nav-mobile" class="right hide-on-med-and-down">

                <li class=" <?= set_active_link('/') ?>">

                    <a href="<?= base_url ?>">

                        Home

                    </a>

                </li>

                <li>

                    <a href="javascript:///" class="dropdown-button" href="javascript:///" data-activates="dropdown2">

                        Executives

                        <i class="material-icons right">arrow_drop_down</i>

                    </a>

                </li>

                <ul id="dropdown2" class="dropdown-content">

                            <li>

            <a href="<?=site_url('executive/governor')?>">

                Office of the Governor

            </a>

        </li>

        <li>

            <a href="<?= site_url('executive/deputy-governor')?>">

                Office of the Deputy Governor

            </a>

        </li>

        </ul>



                <li class=" <?= set_active_link('ministries') ?>">

                    <a href="<?= site_url('ministries') ?>">

                        Ministries

                    </a>

                </li>

                <li class=" <?= set_active_link('parastatals') ?>">

                    <a href="<?= site_url('parastatals') ?>">

                        Parastatals

                    </a>

                </li>
                <li class=" <?= set_active_link('local-governments') ?>">

                    <a href="<?= site_url('local-governments') ?>">

                        LGAs

                    </a>

                </li>
                <li class=" <?= set_active_link('news') ?>">

                    <a href="<?= site_url('news') ?>">

                        State News

                    </a>

                </li>
                <?php /**
                <li>

                    <a href='javascript:///' class="dropdown-button" data-activates='dropdownNews'>

                        News
                        <i class="material-icons right">arrow_drop_down</i>

                    </a>

                </li>

                 <ul id='dropdownNews' class='dropdown-content'>
                    <li class=" <?= set_active_link('media/images') ?>"><a href="<?= site_url('news') ?>">State</a></li>
                    <li class=" <?= set_active_link('media/speeches') ?>"><a href="<?= site_url('media/speeches') ?>">Ministries</a></li>
                    <li class=" <?= set_active_link('media/projects') ?>"><a href="<?= site_url('media/projects') ?>">LGAs</a></li>
                </ul>

                **/ ?>

                <li class=" <?= set_active_link('cafe') ?>">
                    <a href="<?= site_url('cafe') ?>">
                        Cafe
                    </a>
                </li>

                <li>

                    <a class="dropdown-button" href="javascript:///" data-activates="dropdown3">

                        About Anambra

                        <i class="material-icons right">arrow_drop_down</i>

                    </a>

                </li>

                <ul id="dropdown3" class="dropdown-content">

                    <li class=" <?= set_active_link('history') ?>"><a href="<?= site_url('history') ?>">History</a></li>

                    <li class=" <?= set_active_link('vision-and-mission') ?>"><a href="<?= site_url('vision-and-mission') ?>">Vision/Mission</a></li>
                            <li class=" <?= set_active_link('geography') ?>"><a href="<?= site_url('geography') ?>">Map</a></li>

                    <li class=" <?= set_active_link('past-governors') ?>"><a href="<?= site_url('past-governors') ?>">Past Governors</a></li>

                    <li class=" <?= set_active_link('natural-resources') ?>"><a href="<?= site_url('natural-resources') ?>">Natural Resources</a></li>

                    <li class=" <?= set_active_link('oil-and-gas') ?>"><a href="oil-and-gas">Oil &amp; Gas Exploration</a></li>

                    <li class=" <?= set_active_link('urbanization-and-regional-planning') ?>"><a href="<?= site_url('urbanization-and-regional-planning') ?>">Urbanization &amp; Regional Planning</a></li>

                    <li class=" <?= set_active_link('education') ?>"><a href="<?= site_url('education') ?>">Education</a></li>

                    <li class=" <?= set_active_link('politics') ?>"><a href="<?= site_url('politics') ?>">Politics</a></li>

                    <li class=" <?= set_active_link('icons') ?>"><a href="<?= site_url('icons') ?>">Icons</a></li>

                </ul>

                <li>

                    <a href='javascript:///' class="dropdown-button" data-activates='dropdownMedia'>

                        Media

                        <i class="material-icons right">arrow_drop_down</i>

                    </a>

                </li>

                 <ul id='dropdownMedia' class='dropdown-content'>

                    <li class=" <?= set_active_link('media/images') ?>"><a href="<?= site_url('media/images') ?>">Images</a></li>

                    <li class=" <?= set_active_link('media/speeches') ?>"><a href="<?= site_url('media/speeches') ?>">Speeches</a></li>

                    <li class=" <?= set_active_link('media/projects') ?>"><a href="<?= site_url('media/projects') ?>">Projects</a></li>

                    <li class=""><a href="http://www.anambrablog.ng">Blog</a></li>



                </ul>

                <li class=" <?= set_active_link('contact') ?>"><a href="<?= site_url('contact') ?>">Contact/Services</a></li>

            </ul>

        </div>

    </nav>

</div>

