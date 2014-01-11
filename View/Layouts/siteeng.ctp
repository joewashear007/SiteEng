<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

 $cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework'); 

?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title> 
		<?php echo Configure::read('SiteEng.Site.Title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
        echo $this->Html->script('http://code.jquery.com/jquery-1.10.2.min.js');
        //echo $this->Html->script("http://code.jquery.com/ui/1.10.3/jquery-ui.min.js");
        //echo $this->Html->script("jquery-hotkeys");
        echo $this->Html->script('bootstrap.min');
        //echo $this->Html->script('//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js');
        echo $this->Html->script('raptor.min');
        echo $this->Html->script('siteeng');
        
        //echo $this->Html->css('cake.generic');
        echo $this->Html->css("example-classes");
        echo $this->Html->css("raptor-front-end");
        //echo $this->Html->css('//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css');
        echo $this->Html->css('bootstrap.min');
        echo $this->Html->css('siteeng');
        echo $this->Html->css('SE.CustomStyles');

        echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
    
	?>
</head>
<body>
	<?php echo $this->element('MainMenu');	?>
	<?php echo $this->fetch('content'); ?>
	<?php echo $this->element('Footer'); ?>
	<?php echo $this->Js->writeBuffer(); ?>
</body>
</html>
