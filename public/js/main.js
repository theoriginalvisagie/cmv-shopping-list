function removeItem(id){
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({  
                type: 'post',  
                url: window.location.origin + "/cmv-shopping-list/public/ajax/getAjax.php", 
                data: {action:'removeItemFromDB', id:id},
                success: function(response) {
                    if(response == "true"){
                        Swal.fire({
                            title: 'Deleted!',
                            text: 'Your item has been removed.',
                            icon: 'success'
                        }).then (function (){
                            location.reload();
                        })
                    }else{
                        Swal.fire({
                            title: 'Error!',
                            text: 'An error occurd. Contact Support',
                            icon: 'warning'
                        })
                    }
                }
            });
        }
      })
}

function setItemAsChecked(id){
    let checked = $(`#checkbox_${id}`).is(':checked')
    $.ajax({  
        type: 'post',  
        url: window.location.origin + "/cmv-shopping-list/public/ajax/getAjax.php", 
        data: {action:'checkItem', id:id, checked:checked},
        success: function(response) {
        }
    });
}