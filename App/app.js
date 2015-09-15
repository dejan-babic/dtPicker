Ext.onReady(function(){
	var viewport = new Ext.Viewport({
		layout: 'border',
		renderTo: Ext.getBody(),
		items: [{
			region: 'north',
			xtype: 'panel',
			html: 'North (Menus go here.)'
		},{
			region: 'west',
			xtype: 'panel',
			split: 'true',
			width: 200,
			html: 'West (Lists go here)'
		},{
			region: 'center',
			xtype: 'panel',
			items:[{
				xtype: 'button',
				text: 'Users',
				cls: 'btn-big'
			},{
				xtype: 'button',
				text: 'Jobs',
				cls: 'btn-big'
			},{
				xtype: 'button',
				text: 'Settings',
				cls: 'myButton'


			},{
				xtype: 'button',
				text: 'Lucky Guy!',
				cls: 'btn-big'
			}]
		}]
	});
});