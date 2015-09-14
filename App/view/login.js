/**
 * Created by mawaheb.seraj on 9/14/2015.
 */
Ext.onReady(function(){
    var w = new Ext.Window({
        layout: 'form',
        iconCls: 'key',
        items: [
            {xtype: 'textfield', fieldLabel: 'User Name'},
            {xtype: 'textfield', fieldLabel: 'Password'}
        ],
        buttons: [
            {xtype: 'button', text: 'OK'},
            {xtype: 'button', text: 'Dismiss'}
        ]
    });

    w.show();
});