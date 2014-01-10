<div id="footer">
	<div id="SiteInfo" itemscope itemtype="http://schema.org/<?php echo Configure::read("SiteEng.Business.Schema");?>"  >
		<span class="SiteInfoItem" itemprop="name" ><?php echo Configure::read("SiteEng.Business.Name");?></span>
		<span class="SiteInfoItem" itemprop="url" >
			<a href="<?php echo Configure::read("SiteEng.Site.URL");?>"><?php echo Configure::read("SiteEng.Site.URL");?></a>
		</span>
		<span itemprop="telephone" class="SiteInfoItem">
			<a href="tel:<?php echo ereg_replace("[^0-9]", "", Configure::read("SiteEng.Business.Phone"));?>" >
				<?php echo Configure::read("SiteEng.Business.Phone");?>
			</a>
		</span>
		<span itemprop="email" class="SiteInfoItem">
			<a href="mailto:<?php echo Configure::read("SiteEng.Business.Email");?>" >
				<?php echo Configure::read("SiteEng.Business.Email");?>
			</a>
		</span>
		<span itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
			<span itemprop="streetAddress" class="SiteInfoItem"><?php echo Configure::read("SiteEng.Business.Address");?></span>
			<span itemprop="addressLocality" class="SiteInfoItem"><?php echo Configure::read("SiteEng.Business.City");?></span>
			<span itemprop="addressRegion" class="SiteInfoItem"><?php echo Configure::read("SiteEng.Business.State");?></span>
			<span itemprop="postalCode" class="SiteInfoItem"><?php echo Configure::read("SiteEng.Business.Zip");?></span>
		</span>
	</div> 
	<div id="TechUsed">
		<span class="TechUsedItem">Built By:</span>
		<span class="TechUsedItem"><?php echo $this->Html->link('<span id="SiteEngLogo">SiteEng</span>' ,'https://github.com/joewashear007/SiteEng', array('target' => '_blank', 'escape'=>false));?></span>
		<span class="TechUsedItem"><?php echo $this->Html->link($this->Html->image('cake.power.gif'),'http://www.cakephp.org/', array('target' => '_blank','escape'=>false));?></span>
		<span class="TechUsedItem"><?php echo $this->Html->link($this->Html->image('raptor-avatar.jpg'),'https://www.raptor-editor.com/', array('target' => '_blank','escape'=>false));?></span>
		<span class="TechUsedItem"><?php echo $this->Html->link('<span id="bootsrapLogo">Bootstrap</span>' ,'http://www.cakephp.org/', array('target' => '_blank','escape'=>false));?></span>
	</div>
			
</div>
