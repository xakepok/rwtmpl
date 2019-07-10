<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
$document = JFactory::getDocument();
$modulePath = JURI::base() . 'modules/mod_stmenu/tmpl/';
$document->addStyleSheet($modulePath.'css/menu.css');
$colormenu = $params['colormenu'];
$ulcolormenu = $params['ulcolormenu'];
$ulmenulink = $params['ulmenulink'];
$topmenu = $params['topmenu'];
$bottommenu = $params['bottommenu'];


$id = '';

if ($tagId = $params->get('tag_id', ''))
{
	$id = ' id="' . $tagId . '"';
}

// The menu class is deprecated. Use nav instead
?>
<div class="st-nav-menu-mobile">МЕНЮ</div>
<div class="st-nav-menu-module">
<ul class="st-nav-menu<?php echo $class_sfx; ?>"<?php echo $id; ?>>
<?php foreach ($list as $i => &$item)
{
	$class = 'item-' . $item->id;

	if ($item->id == $default_id)
	{
		$class .= ' default';
	}

	if ($item->id == $active_id || ($item->type === 'alias' && $item->params->get('aliasoptions') == $active_id))
	{
		$class .= ' current';
	}

	if (in_array($item->id, $path))
	{
		$class .= ' active';
	}
	elseif ($item->type === 'alias')
	{
		$aliasToId = $item->params->get('aliasoptions');

		if (count($path) > 0 && $aliasToId == $path[count($path) - 1])
		{
			$class .= ' active';
		}
		elseif (in_array($aliasToId, $path))
		{
			$class .= ' alias-parent-active';
		}
	}

	if ($item->type === 'separator')
	{
		$class .= ' divider';
	}

	if ($item->deeper)
	{
		$class .= ' deeper';
	}

	if ($item->parent)
	{
		$class .= ' parent';
	}

	echo '<li class="' . $class . '">';

	switch ($item->type) :
		case 'separator':
		case 'component':
		case 'heading':
		case 'url':
			require JModuleHelper::getLayoutPath('mod_menu', 'default_' . $item->type);
			break;

		default:
			require JModuleHelper::getLayoutPath('mod_menu', 'default_url');
			break;
	endswitch;

	// The next item is deeper.
	if ($item->deeper)
	{
		echo '<ul class="nav-child unstyled small">';
	}
	// The next item is shallower.
	elseif ($item->shallower)
	{
		echo '</li>';
		echo str_repeat('</ul></li>', $item->level_diff);
	}
	// The next item is on the same level.
	else
	{
		echo '</li>';
	}
}
	?></ul></div>
	<style>
		.st-nav-menu-module	{
			background: <?php echo $colormenu; ?>;
			margin-top: <?php echo $topmenu; ?>px;
			margin-bottom: <?php echo $bottommenu; ?>px
		}
		.st-nav-menu-mobile{
			background-color: <?php echo $colormenu; ?>
				
		}
		.st-nav-menu li ul{
			background: <?php echo $ulcolormenu; ?> 
		}
		.st-nav-menu li a{
			padding: 4px <?php echo $ulmenulink; ?>px
		}
</style>
<script>
	jQuery(function () {
    jQuery('.st-nav-menu-mobile').on('click', function () {
        jQuery('.st-nav-menu-module').slideToggle();

    });
});
</script>
