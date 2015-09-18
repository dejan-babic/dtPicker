/**
 * Created by mawaheb.seraj on 9/17/2015.
 */
Ext.onReady(function(){
	var store = new Ext.data.Store({
		data: [
			[
				1,
				"John Snow"
			],
			[
				2,
				"Aria Stark"
			]
		],
		reader: new Ext.data.ArrayReader({id: 'id'}, ['id', 'name'])
	});

	var usersForm = new Ext.FormPanel({
		title: 'Users Details Form',
		id: usersForm,

		items: [{
			xtype: 'textfield',
			fieldLabel: 'User Name',
			id: 'userField',
			floating: true
		},{
			xtype: 'button',
			text: "One"
		}]
	});

	var grid = new Ext.grid.GridPanel({
		frame: true,
		title: 'Users',
		store: store,
		autoHeight: true,
		sm: new Ext.grid.RowSelectionModel({
			singleSelect: true,
			listeners:{
				rowselect: {
					fn: function(sm, index, record){
						Ext.getCmp('userField').setValue(record.data.name)
					}
				}
			}
		}),
		columns:[
			{header: "#", dataIndex: 'id'},
			{header: "Name", dataIndex: 'name'}
		],
		buttons:[
			{xtype: 'button', text: 'New User'}
		]
	});
	var viewport = new Ext.Viewport({
		layout: 'border',
		renderTo: Ext.getBody(),
		items: [{
			region: 'north',
			id: 'centerRegion',
			xtype: 'panel',
			html: 'North (Menus go here.)'
		},{
			region: 'west',
			xtype: 'panel',
			split: 'true',
			width: 250,
			items:[
				grid
			]
		},{
			region: 'center',
			xtype: 'panel',
			items: usersForm
		}]
	});
});
