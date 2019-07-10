<?php
defined('_JEXEC') or die;

require_once JPATH_THEMES . '/' . $this->template . '/helper.php';

tplRwtmplHelper::loadCss();
tplRwtmplHelper::loadJs();
tplRwtmplHelper::setMetadata();

?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<jdoc:include type="head" />
</head>
<body class="<?php echo tplRwtmplHelper::setBodySuffix(); ?>">
<?php //echo tplRwtmplHelper::setAnalytics(0, 'your-analytics-id'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col text-center">
            <img src="/images/logo_site.png" alt="Logo" />
        </div>
    </div>
    <div class="row">
        <div class="col">
            <jdoc:include type="modules" name="menu" />
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <?php if ($this->countModules('left')) : ?>
                <jdoc:include type="modules" name="left" />
            <?php endif; ?>
        </div>
        <div class="col-lg-6">
            <jdoc:include type="message" />
            <jdoc:include type="component" />
        </div>
        <div class="col-lg-3">
            <?php if ($this->countModules('right')) : ?>
                <jdoc:include type="modules" name="right" />
            <?php endif; ?>
        </div>
    </div>
</div>

<a href="#main" class="sr-only sr-only-focusable"><?php echo JText::_('TPL_RWTMPL_SKIP_LINK_LABEL'); ?></a>

<a href="<?php echo $this->baseurl; ?>/">
    <?php if ($this->params->get('sitedescription')) : ?>
        <?php echo '<div class="site-description">' . htmlspecialchars($this->params->get('sitedescription'), ENT_COMPAT, 'UTF-8') . '</div>'; ?>
    <?php endif; ?>
</a>

<rwtmplter>
	<jdoc:include type="modules" name="rwtmplter" style="none" />
	<p>
		&copy; <?php echo date('Y'); ?> <?php echo tplRwtmplHelper::getSitename(); ?>
	</p>
</rwtmplter>
<jdoc:include type="modules" name="debug" style="none" />
</body>
</html>
