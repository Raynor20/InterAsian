function openModal(modalId) {
  const myModal = new bootstrap.Modal(document.getElementById(modalId));
  myModal.show();
}


function openEditModal(listing_id) {
  
  
  $.ajax({  
      url:"fetch.php",  
      method:"POST",  
      data:{listing_id:listing_id},  
      dataType:"json",  
      success:function(data){  
        $('#editTitle').val(data.title);
        $('#editLocation').val(data.location);
        $('#exampleModal2').modal('show'); // Show the modal
      }  
 });  

 
 
}
