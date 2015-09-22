/**
 * Created by mawaheb.seraj on 9/21/2015.
 */
Ext.onReady(function() {

	var dsRecord = Ext.data.Record.create([
		'id',
		'name'
	]);

	var editJobField = new Ext.form.TextField();

	var grid = new Ext.grid.EditorGridPanel({
		frame: true,
		title: 'Jobs',
		store: config.jobsStore,
		autoHeight: true,
		sm: new Ext.grid.RowSelectionModel({
			singleSelect: true
		}),

		columns:[
			{header: 'ID', dataIndex: 'id'},
			{header: 'Name', dataIndex: 'name', editor: editJobField}
		],
		tbar: [{
			text: 'Add Job',
			handler: function (){
				Ext.Msg.prompt('Add New Job',
					'Please Enter the new job\'s title',
					function(btn, text){
						if (btn =='ok' && text!= '') {
							var gridStore = grid.getStore();
							gridStore.insert(
								gridStore.getCount(),
								new dsRecord({
									name: text
								})
							)
						}
					}
				)
			}
		},{
			text: 'Remove Job',
			handler: function(){
				var	sm = grid.getSelectionModel();
				var sel = sm.getSelected();
				if(sm.hasSelection()){
					Ext.Msg.show({
						title: 'Remove User',
						buttons: Ext.MessageBox.YESNOCANCEL,
						msg: 'Remove' + sel.data.name + '?',
						fn: function(btn){
							if (btn == 'yes'){
								grid.getStore().remove(sel);
							}
						}
					})
				}
			}
		}]

	});

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
			items:[
				grid
			]
		}]
	});

});