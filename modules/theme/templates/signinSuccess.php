<div class="panel panel-default">
    <div class="panel-heading"><?php echo __('Welcome at %1%!', array('%1%' => sfConfig::get('sf_sfBootstrapPropelAdminTheme_title'))); ?></div>
    <form action="<?php echo $sf_request->getUri(); ?>" class="form-horizontal" role="form" method="post">
        <div class="panel-body">
            <?php if ($sf_user->hasFlash('error')): ?>
                <p class="text-danger form-text">
                    <?php echo $sf_user->getFlash('error'); ?>
                </p>
            <?php endif; ?>

            <?php echo $form->renderHiddenFields(); ?>

            <div class="form-group <?php $form['username']->hasError() and print 'has-error has-feedback'; ?>">
                <?php echo $form['username']->renderLabel(null, array('class' => 'col-lg-3 control-label')); ?>

                <div class="col-lg-9">
                    <?php echo $form['username']->render(array('class' => 'form-control', 'placeholder' => $form['username']->renderLabelName())); ?>

                    <?php if ($form['username']->hasError()): ?>
                        <span class="fa fa-exclamation form-control-feedback"></span>
                    <?php endif; ?>
                </div>

                <?php if ($form['username']->hasError()): ?>
                    <div class="col-lg-9 col-lg-offset-3">
                        <p class="text-danger form-text">
                            <?php echo $form['username']->getError(); ?>
                        </p>
                    </div>
                <?php endif; ?>
            </div>

            <div class="form-group <?php $form['password']->hasError() and print 'has-error has-feedback'; ?>">
                <?php echo $form['password']->renderLabel(null, array('class' => 'col-lg-3 control-label')); ?>

                <div class="col-lg-9">
                    <?php echo $form['password']->render(array('class' => 'form-control', 'placeholder' => $form['password']->renderLabelName())); ?>

                    <?php if ($form['password']->hasError()): ?>
                        <span class="fa fa-exclamation form-control-feedback"></span>
                    <?php endif; ?>
                </div>

                <?php if ($form['password']->hasError()): ?>
                    <div class="col-lg-9 col-lg-offset-3">
                        <p class="text-danger form-text">
                            <?php echo $form['password']->getError(); ?>
                        </p>
                    </div>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <div class="col-lg-9 col-lg-offset-3">
                    <div class="checkbox">
                        <?php echo $form['remember']->render(); ?>
                        <?php echo $form['remember']->renderLabel('Anmeldung merken'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-footer text-right">
            <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i> <?php echo __('Anmelden'); ?></button>
        </div>
    </form>
</div>
