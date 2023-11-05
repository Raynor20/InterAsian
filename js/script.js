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
        $('#listing_id').val(data.listing_id);
        $('#editTitle').val(data.title);
        $('#editLocation').val(data.location);
        $('#editLandarea').val(data.landarea);
        $('#editFloorarea').val(data.floorarea);
        $('#editBedrooms').val(data.bedrooms);
        $('#editBathrooms').val(data.bathrooms);
        $('#editPrice').val(data.price);
        $('#editDescription').val(data.description);
        $('#exampleModal2').modal('show'); // Show the modal
      }  
 });  

 
 
}
