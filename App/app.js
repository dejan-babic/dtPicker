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
            html: 'center'
        }]
    });
});