if ( ! RedactorPlugins) var RedactorPlugins = {};

RedactorPlugins.instructions = function() {
	return {
		init: function() {
			var dropdown = {};
			dropdown.nombres = { title: 'Insertar Campo', func: this.instructions.insertSubscriberFirstName };
			// dropdown.apellidos = { title: 'Insertar Variable Apellidos', func: this.instructions.insertSubscriberLastName };
			// dropdown.email = { title: 'Insertar Variable Email', func: this.instructions.insertSubscriberEmail };

			var button = this.button.add('instructions', 'Campos');
			this.button.setAwesome('instructions', 'fa-pencil');
			this.button.addDropdown(button, dropdown);
		},
        testButton: function(buttonName) {
            alert(buttonName);
        },
		insertSubscriberFirstName: function(buttonName) {
			// this.$editor.focus();
			// this.selection.restore();
			// var node = $('<span>{{nombres}}</span>');
			// this.insert.node(node);
			// this.code.sync();
			this.insert.text('{{campo}}');
		},
		insertSubscriberLastName: function(buttonName) {
			this.insert.text('{{apellidos}}');
		},
		insertSubscriberEmail: function(buttonName) {
			this.insert.text('{{email}}');
		}
	};
};
