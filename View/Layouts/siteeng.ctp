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
        echo $this->Html->script('raptor.min');
        ?>
        <!--
        <script>
        Aloha = window.Aloha || {};
        Aloha.settings = Aloha.settings || {};
        // Restore the global $ and jQuery variables of your project's jQuery
        Aloha.settings.jQuery = window.jQuery.noConflict(true);
        </script>
        -->
        <?php
        // echo $this->html->script('http://cdn.aloha-editor.org/latest/lib/require.js"');
        // echo $this->html->script('http://cdn.aloha-editor.org/latest/lib/vendor/jquery-1.7.2.js');
		// echo $this->html->script("http://cdn.aloha-editor.org/latest/lib/aloha.js", 
                // array("data-aloha-plugins" => "common/ui,
                        // common/format,
                        // common/list,
                        // common/link,
                        // common/highlighteditables"));
                // extra/textcolor, 
                // extra/captioned-image,
                // extra/attributes,
                // extra/draganddropfiles,
                // extra/formatlesspaste, 
                // extra/toc, 
                // extra/headerids, 
                // extra/numerated-headers, 
                // extra/linkbrowser, 
                // extra/imagebrowser, 
                // extra/cite" 
                // ));
        // echo $this->Html->script('/aloha/lib/require');
        // echo $this->Html->script('/aloha/lib/vendor/jquery-1.7.2');
		// echo $this->Html->script("/aloha/lib/aloha", 
                // array("data-aloha-plugins" => "
                // common/ui,
                // common/format,
                // common/table,
                // common/list,
                // common/link,
                // common/highlighteditables,
                // common/undo,
                // common/contenthandler,
                // common/paste,
                // common/characterpicker,
                // common/commands,
                // common/block,
                // common/image,
                // common/abbr,
                // common/horizontalruler" )) ;
        // echo $this->Html->script(
            // array("rangy-core","rangy-applier","rangy-cssclassapplier","rangy-selectionsaverestore","rangy-serializer","rangy-textrange","raptor.mammoth.min")
        // );
        echo $this->Html->script('siteeng');
        
        //echo $this->Html->css('cake.generic');
        //echo $this->Html->css('/aloha/css/aloha');
        //echo $this->Html->css("mammoth.theme.min");
        echo $this->Html->css("example-classes");
        echo $this->Html->css("raptor-front-end");
        echo $this->Html->css('bootstrap.min');
        echo $this->Html->css('siteeng');
        echo $this->Html->css('designanddo');
        
        
        echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
    
	?>
    <script type="text/javascript">
        raptor(function($){
            $('.editable').raptor({
                plugins:{
                    dock:{docked:true},
                    classMenu:{classes:{'Blue background':'cms-blue-bg','Round corners':'cms-round-corners','Indent and center':'cms-indent-center'}},
                    snippetMenu:{snippets:{'Grey Box':'<div class="grey-box"><h1>Grey Box</h1><ul><li>This is a list</li></ul></div>'}}
                }
            });
        });</script>
</head>
<body>


        <?php //echo $this->Session->flash(); ?>

        <?php echo $this->fetch('content'); ?>
		<div id="footer">
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);
			?>
		</div>
	<?php /* echo $this->element('sql_dump'); */ ?> 
	<?php echo $this->Js->writeBuffer(); ?>
</body>
</html>
