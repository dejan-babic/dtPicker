/**
 * Created by mawaheb.seraj on 9/17/2015.
 */
/** The following Override is used to fix an issue where a text field label is not hidden when the text field is.
	For more details, You can refer to:
    https://www.sencha.com/forum/showthread.php?25479-2.0.1-2.1-Field.destroy()-on-Fields-rendered-by-FormLayout-does-not-clean-up.&p=120152&viewfull=1#post120152
**/
Ext.override(Ext.layout.FormLayout, {
	renderItem : function(c, position, target){
		if(c && !c.rendered && c.isFormField && c.inputType != 'hidden'){
			var args = [
				c.id, c.fieldLabel,
				c.labelStyle||this.labelStyle||'',
				this.elementStyle||'',
				typeof c.labelSeparator == 'undefined' ? this.labelSeparator : c.labelSeparator,
				(c.itemCls||this.container.itemCls||'') + (c.hideLabel ? ' x-hide-label' : ''),
				c.clearCls || 'x-form-clear-left'
			];
			if(typeof position == 'number'){
				position = target.dom.childNodes[position] || null;
			}
			if(position){
				c.itemCt = this.fieldTpl.insertBefore(position, args, true);
			}else{
				c.itemCt = this.fieldTpl.append(target, args, true);
			}
			c.actionMode = 'itemCt';
			c.render('x-form-el-'+c.id);
			c.container = c.itemCt;
			c.actionMode = 'container';
		}else {
			Ext.layout.FormLayout.superclass.renderItem.apply(this, arguments);
		}
	},
});
Ext.override(Ext.form.TriggerField, {
	actionMode: 'wrap',
	onShow: Ext.form.TriggerField.superclass.onShow,
	onHide: Ext.form.TriggerField.superclass.onHide
});
Ext.override(Ext.form.Checkbox, {
	actionMode: 'wrap',
	getActionEl: Ext.form.Checkbox.superclass.getActionEl
});
Ext.override(Ext.form.HtmlEditor, {
	actionMode: 'wrap'
});
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
			xtype: 'label',
			text: 'Please select a user from the list'
		},{
			xtype: 'textfield',
			fieldLabel: 'User Name',
			id: 'userField',
			hidden: true
		}],
		buttons: [
			{
				text: 'Update',
				handler: function() {
					Ext.getCmp('userField').setVisible(true)
				}
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
