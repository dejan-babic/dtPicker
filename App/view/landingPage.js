/**
 * Created by mawaheb.seraj on 9/16/2015.
 */
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
				cls: 'btn-big',
				handler: function(){
					location.href = 'users-page.html';
				}
			},{
				xtype: 'button',
				text: 'Jobs',
				cls: 'btn-big'
			},{
				xtype: 'button',
				text: 'Settings',
				cls: 'btn-big'
			},{
				xtype: 'button',
				text: 'Lucky Guy!',
				cls: 'btn-big'
			}]
		}]
	});
});