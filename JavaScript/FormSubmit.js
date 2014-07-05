/**
 * Script to prompt the usert that the form has been submited successfully
 * and keep the page unchanged
 * Author: Konstantin Grigorov
 * Last Modified: 01.07.2014
 */
$(document).on('submit', '.resORreq', function(e) {
     $.ajax({
        url: $(this).attr('action'),
        type: $(this).attr('method'),
        data: $(this).serialize(),
        success: function(html) {
        alert('Вие успешно изпратихте съобщение до Misys travel, благодарим Ви.');
        window.location.href = 'http://kolygri.eu/index.php';
        }
    });
     e.preventDefault();
});