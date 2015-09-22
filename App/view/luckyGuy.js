/**
 * Created by mawaheb.seraj on 9/21/2015.
 */
Ext.onReady(function(){
	var tmpStore = new Ext.data.Store({
		reader: new Ext.data.ArrayReader({id: 'id'}, ['id', 'name'])
	});

	var dsRecord = Ext.data.Record.create([
		'id',
		'name'
	]);

	/* this array is used to hold the ids of subsetUsers array, before adding any user to the subset grid, we check to see if
		the user we are adding already is included.
	*/
	var subsetIdsArr = [];
	// Used to add a user from the main users list to the subset users list.
	// TODO [MS]: Check if the user is already in the subset, If so, prevent from adding again.
	var addUsr2Subset = function() {
		var sm = usersGrid.getSelectionModel();
		var sel = sm.getSelected();
		var subsetStore = subsetGrid.getStore();
		if (sm.hasSelection()) {
			if (subsetIdsArr.indexOf(sel.data.id) == -1) {
				subsetStore.insert(subsetStore.getCount(), new dsRecord({
					id: sel.data.id, name: sel.data.name
				}));
				subsetIdsArr.push(sel.data.id);
			} else {
				Ext.Msg.alert('Error', 'The user you are trying to add is already included, please choose another user.')
			}

		} else {
			Ext.Msg.alert('No selection', 'Please select a user from the list');
		}
	};

	var unassignUser = function(){
		var sm = subsetGrid.getSelectionModel();
		var sel = sm.getSelected();
		var  store = subsetGrid.getStore();
		if (sm.hasSelection()){
			Ext.Msg.show({
				title: 'Remove User',
				buttons: Ext.MessageBox.YESNOCANCEL,
				msg: 'Un-assign ' + sel.data.name + 'from the subset?',
				fn: function(btn){
					if (btn == 'yes'){
						store.remove(sel);
					}
				}
			})
		}else{
			Ext.Msg.alert('No selection', 'Please select a user from the list');
		}
	};

	var randomize = function(){
		var jobsSm = jobsGrid.getSelectionModel();
		if (jobsSm.hasSelection()){
			//alert(sm.getSelected().data.name)
			var selectedJob = jobsSm.getSelected().data.name;
			var storeCount = subsetGrid.getStore().getCount();
			var store = subsetGrid.getStore();
			var item = store.getAt(Math.floor(Math.random()* storeCount));
			alert(item.data.name + 'Will be Honored by doing the task: ' + selectedJob)

		}else{
			Ext.Msg.alert('No job selected', 'Please Select a job from the jobs list.')
		}

	};

	var usersGrid = new Ext.grid.GridPanel({
		frame: true,
		title: 'Users',
		store: config.usersStore,
		autoHeight: true,
		columns:    [
			{header: "#", dataIndex: 'id'},
			{header: "Name", dataIndex: 'name'}
		],
		buttons: [{
			text: 'Add to the Subset',
			handler: addUsr2Subset
		}]
	});

	var subsetGrid = new Ext.grid.GridPanel({
		frame: true,
		title: 'users subset',
		autoHeight: true,
		store: tmpStore,
		columns:    [
			{header: "#", dataIndex: 'id'},
			{header: "Name", dataIndex: 'name'}
		],
		buttons:[{
			text: 'Remove from list',
			handler: unassignUser
		}]
	});

	var jobsGrid = new Ext.grid.GridPanel({
		frame: true,
		title: 'users subset',
		autoHeight: true,
		store: config.jobsStore,
		columns:    [
			{header: "#", dataIndex: 'id'},
			{header: "Name", dataIndex: 'name'}
		]
	});

	var viewport = new Ext.Viewport({
		layout: 'border',
		renderTo: Ext.getBody(),
		items:[{
			region: 'west',
			title: 'All users',
			width: 300,
			items: [
				usersGrid
			]
		},{
			region: 'center',
			title: 'Users subset',
			items: [
				subsetGrid
			]
		}, {
			region: 'east',
			title: 'Jobs',
			width: 300,
			items:[
				jobsGrid
			]
		},{
			region: 'south',
			height: 500,
			items:[{
			xtype: 'button',
			text: 'Assign',
			cls: 'btn-randomize',
			handler: randomize
			}]
		}
	]
	})
});