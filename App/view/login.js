/**
 * Created by mawaheb.seraj on 9/14/2015.
 */
Ext.onReady(function(){
	Ext.Ajax.useDefaultXhrHeader = false;
    var login_form = new Ext.FormPanel({
        url: 'http://www.mocky.io/v2/55f7fee70c260f33030a4a1c',
        renderTo: document.body,
        frame: true,
        title: 'login form',
        width: 350,
        items: [{
            xtype       : 'textfield',
            fieldLabel  : 'Password',
            name        : 'password'
            //allowBlank  : false
        }],
        buttons: [{
            text        : 'Login',
            name        : 'btnLogin',
            handler: function(){
                login_form.getForm().submit({
                    success: function(f,a){
                        Ext.Msg.alert('Success', 'It worked');
                    }
                    //,
                    //failure: function(f,a){
                    //    Ext.Msg.alert('Warning', a.result.errormsg);
                    //}
                });
            }
        },{
            text        : 'Dismiss',
            name        : 'dismiss'
        }]
    })
});