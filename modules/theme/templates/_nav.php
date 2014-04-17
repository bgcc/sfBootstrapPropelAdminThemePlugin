<?php if ($sf_user->isAuthenticated()): ?>
    <?php $module = $sf_request->getParameter('module'); ?>
    <?php $action = $sf_request->getParameter('action'); ?>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><?php echo sfConfig::get('sf_sfBootstrapPropelAdminTheme_title'); ?></a>
            </div>

            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="dropdown<?php in_array($module, array('article', 'article_category')) and print ' active'; ?>">
                        <a id="dropdown1" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"><?php echo __('Articles'); ?> <b class="caret"></b></a>

                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdown1">
                            <li role="presentation">
                                <?php echo link_to('Article Categories', '@article_category', array('role' => 'menuitem', 'tabindex' => '-1', )); ?>
                                <?php echo link_to('Articles', '@article', array('role' => 'menuitem', 'tabindex' => '-1', )); ?>
                            </li>
                        </ul>

                    </li>

                    <li><a href="#">Settings</a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li><?php echo link_to('<i class="fa fa-sign-out"></i> ' . __('Logout'), '@sf_guard_signout', 'confirm=' . __('Do you really want to logout?', array(), 'sf_admin')); ?></li>
                </ul>
            </div>
        </div>
    </div>
<?php endif; ?>
