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

	var dsRecord = Ext.data.Record.create([
		'id',
		'name'
	]);

	var usersForm = new Ext.FormPanel({
		title: 'Users Details Form',
		id: usersForm,

		items: [{
			xtype: 'textfield',
			fieldLabel: 'User Name',
			id: 'userField',
			floating: true
		}],
		buttons: [
			{
				disabled: true,
				text: 'Update'
			},{
				text: 'Delete',
				handler: function(){
					var sm = grid.getSelectionModel();
					var sel = sm.getSelected();
					if(sm.hasSelection()){
						Ext.Msg.show({
							title: "Remove user",
							buttons: Ext.MessageBox.YESNOCANCEL,
							msg: 'Remove ' + sel.data.name + '?',
							fn: function(btn){
								if (btn == 'yes'){
									store.remove(sel);
									usersForm.getForm().reset();
								}
							}
						})
					}
				}
			}
		]
	});

	var addNewUser = function(){
		Ext.Msg.prompt('Add New User',
			'Please Enter the new user\'s Data',
			function(btn, text){
				if (btn =='ok' && text != ""){
					//alert('User name ' + text + 'Has been Entered.')
					grid.getStore().insert(
						// retrieving the count to insert the record at the end of the grid.
						grid.getStore().getCount(),
						new dsRecord({
							name: text
						})
					)
				}
			}
		)
	};

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
		buttons:[{
			text: 'New User',
			handler: addNewUser


		}]
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
