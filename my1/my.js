var form = document.querySelector('form');
form.onsubmit = function ()
{
    var text = form.text;
    text.value = '<p>' + text.value + '</p>';
    text.value = text.value.replace(/\n/g, '</p><p>');
};