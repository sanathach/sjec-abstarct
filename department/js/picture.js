document.getElementById('rejectForm').addEventListener('submit', function(event) {
    event.preventDefault(); 
    var upload_id = document.getElementById("upload_id").value;
    Swal.fire({
      title: 'Reason For Rejection',
      html: `
        <textarea type="text" id="reason" placeholder="Reason" style="width:100%"></textarea>
      `,
      confirmButtonText: 'Submit',
      background: '#191c24',
      preConfirm: () => {
        const reason = document.getElementById('reason').value;

        if (!reason) {
          Swal.showValidationMessage('Please mention reason for rejection');
          return false;
        }
        return {
          reason: reason
        };
      },
      onOpen: () => {
        Swal.getPopup().style.fontFamily = 'Rubik', 'sans-serif'; // Set the font family
      }
    }).then((result) => {
      if (result.isConfirmed) {
        // Send the data to the PHP script using AJAX
        $.ajax({
          type: 'POST',
          url: 'reason_enter.php',
          data: {
            reason: result.value.reason,
            upload_id : upload_id,
          },
        });
      }
    });
  });