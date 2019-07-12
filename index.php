<?php
defined('_JEXEC') or die;

require_once JPATH_THEMES . '/' . $this->template . '/helper.php';

TplRwtmplHelper::loadCss();
TplRwtmplHelper::loadJs();
TplRwtmplHelper::setMetadata();

?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<jdoc:include type="head" />
    <link rel="icon" href="/templates/<?php echo $this->template;?>/images/ico_64.png" type="image/png">
</head>
<body class="<?php echo TplRwtmplHelper::setBodySuffix(); ?>">
<?php //echo tplRwtmplHelper::setAnalytics(0, 'your-analytics-id'); ?>

<div class="container-fluid">
    <header>
        <div class="container-fluid text-center">
            <div class="row">
                <div class="col">
                    <img class="img-fluid" src="/images/logo_site.png" alt="Logo" />
                </div>
            </div>
            <div class="row">
                <div id="nav" class="col">
                    <jdoc:include type="modules" name="menu" style="none" />
                </div>
            </div>
        </div>
    </header>
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2">
                    <?php if ($this->countModules('left')) : ?>
                        <jdoc:include type="modules" name="left" style="xhtml" />
                    <?php endif; ?>
                </div>
                <div class="col-lg-8">
                    <jdoc:include type="message" />
                    <jdoc:include type="component" />
                </div>
                <div class="col-lg-2">
                    <?php if ($this->countModules('right')) : ?>
                        <jdoc:include type="modules" name="right" style="xhtml" />
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <?php if ($this->countModules('footer')) : ?>
                        <jdoc:include type="modules" name="footer" style="xhtml" />
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <jdoc:include type="modules" name="debug" style="block" />
                </div>
            </div>
        </div>
    </footer>
</div>
</body>
</html>
