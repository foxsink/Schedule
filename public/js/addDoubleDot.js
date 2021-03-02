$(function()
{
    $('input#time').on('keyup', function(e) {
        if (e.which && this.value.length === 2 && e.which !== 8) {
            this.value += ':';
        }
    });
});