catalogflow = {
    showNotification: function(message, icon, color, from, align) {
        $.notify({
            icon: icon,
            message: message

        }, {
            type: color,
            timer: 8000,
            placement: {
                from: from,
                align: align
            }
        });
    }
}
