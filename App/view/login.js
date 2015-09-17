/**
 * Created by mawaheb.seraj on 9/14/2015.
 */
Ext.onReady(function(){

    /* This is a method to get the Password field value if exists, else, it returns false, which is used to trigger an alert box*/
	var getPassField = function(){
		var passVal = $('#password').val();
		return passVal == '' ? false:passVal;
	};

	/*Gets pass val from getPassField() and sends it to the backend*/
	var submitForm = function(){
		var request;
		var pass = getPassField();
		if (pass == false){
			alert("Please fill in password");
			return
		}else {
			request = $.ajax({
				crossDomain: true, dataType: 'JSONP', method: 'PUT', data: pass, url: config.url

			});
		}
		request.success(function(response) {
			if (response.success === true ) {
				console.log('Worked, success is set to true');
				loginForm.hide();
				location.href = 'landing-page.html';
			}else{
				console.log('Worked, But success is false.');
				alert(response.msg);
				//TODO change to ext alert style
			}
		});

		request.done(function(data) {
			console.log(data.msg)
		});

		request.fail(function(data) {
			console.log("Oh No, It faild");
		});
	};


    var loginForm = new Ext.FormPanel({
        //url: 'http://www.mocky.io/v2/55f82ebf0c260f5a080a4a56',
        renderTo: document.body,
        frame: true,
        title: 'login form',
        width: 350,
        items: [{
            xtype       : 'textfield',
            fieldLabel  : 'Password',
            id        : 'password'
            //allowBlank  : false
        }],
        buttons: [{
            text        : 'Login',
            name        : 'btnLogin',
	        handler: submitForm
        }]
    })
});