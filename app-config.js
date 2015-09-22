var config = config || {};
config.url = "http://www.mocky.io/v2/55f956e3feb82c5c1699c320";

var usersStore = new Ext.data.Store({
	data: [
		[
			1,
			"John Snow"
		],[
			2,
			"Aria Stark"
		],[
			3,
			"Robert Parathyon"
		],[
			4,
			"Rob Stark"
		],[
			5,
			"Bryn Stark"
		]

	],
	reader: new Ext.data.ArrayReader({id: 'id'}, ['id', 'name'])
});

var jobsStore = new Ext.data.Store({
	data: [
		[
			1,
			"Make coffe"
		],
		[
			2,
			"Clean Toilet"
		]
	],
	reader: new Ext.data.ArrayReader({id: 'id'}, ['id', 'name'])
});

config.jobsStore = jobsStore;
config.usersStore = usersStore;