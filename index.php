<?php
defined('_JEXEC') or die;

require_once JPATH_THEMES . '/' . $this->template . '/helper.php';
require_once JPATH_ADMINISTRATOR . '/components/com_rw/helpers/rw.php';
$webmaster = $this->params->get('webmaster_code', null);
$metrika = $this->params->get('yametrika_id', null);

TplRwtmplHelper::loadCss();
TplRwtmplHelper::loadJs();
TplRwtmplHelper::setMetadata();

?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
    <script src="/templates/<?php echo $this->template;?>/js/jquery-3.4.1.min.js" type="text/javascript"></script>
    <jdoc:include type="head"/>
    <link rel="icon" href="/templates/<?php echo $this->template; ?>/images/ico_64.png" type="image/png">
    <?php if ($webmaster !== null): ?>
        <meta name="yandex-verification" content="<?php echo $webmaster;?>" />
    <?php endif;?>
</head>
<body class="<?php echo TplRwtmplHelper::setBodySuffix(); ?>">
<?php //echo tplRwtmplHelper::setAnalytics(0, 'your-analytics-id'); ?>

<div class="container-fluid">
    <header>
        <div class="container-fluid text-center">
            <div class="row">
                <div class="col">
                    <a href="/"><img class="img-fluid" src="/images/logo_site.png" alt="Logo"/></a>
                </div>
            </div>
            <div class="row">
                <div id="nav" class="col">
                    <jdoc:include type="modules" name="menu" style="none"/>
                </div>
            </div>
        </div>
    </header>
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2">
                    <div class="container-fluid">
                        <?php if ($this->countModules('left')) : ?>
                            <jdoc:include type="modules" name="left" style="xhtml"/>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="container-fluid" id="component">
                        <jdoc:include type="message"/>
                        <jdoc:include type="component"/>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="container-fluid">
                        <?php if ($this->countModules('right')) : ?>
                            <jdoc:include type="modules" name="right" style="xhtml"/>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="breads">
            <div class="col">
                <div class="container-fluid">
                    <?php if ($this->countModules('breadcrumbs')) : ?>
                        <jdoc:include type="modules" name="breadcrumbs" style="xhtml"/>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="container-fluid">
                        <?php if ($this->countModules('footer')) : ?>
                            <jdoc:include type="modules" name="footer" style="xhtml"/>
                        <?php endif; ?>
                        <?php if (!RwHelper::isClub()): ?>
                            <?php if ($this->countModules('adv_desktop') && !JFactory::getApplication()->client->mobile) : ?>
                                <jdoc:include type="modules" name="adv_desktop" style="xhtml"/>
                            <?php endif; ?>
                            <?php if ($this->countModules('adv_mobile') && JFactory::getApplication()->client->mobile) : ?>
                                <jdoc:include type="modules" name="adv_mobile" style="xhtml"/>
                            <?php endif; ?>
                        <?php endif;?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <jdoc:include type="modules" name="debug" style="block"/>
                </div>
            </div>
        </div>
    </footer>
</div>
<?php if ($metrika !== null) : ?>
    <!-- Yandex.Metrika counter --> <script type="text/javascript" > (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)}; m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)}) (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym"); ym(<?php echo $metrika;?>, "init", { clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true, trackHash:true }); </script> <noscript><div><img src="https://mc.yandex.ru/watch/<?php echo $metrika;?>" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->
<?php endif; ?>
</body>
</html>
