$(function(){
    $(document).on('click','#delete',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

  
                  Swal.fire({
                    title: 'Are you sure?',
                    text: "Delete This Data?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                      )
                    }
                  }) 


    });

  });

//confirm 

$(function(){
    $(document).on('click','#confirm',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

  
                  Swal.fire({
                    title: 'Are you sure to Confirm?',
                    text: "Once Confirm Will Not be able to Pending",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Confirm it!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Confirm!',
                        'Confirm Changes.',
                        'success'
                      )
                    }
                  }) 


    });

  });

//processing

$(function(){
    $(document).on('click','#processing',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

  
                  Swal.fire({
                    title: 'Are you sure to Process?',
                    text: "Once Process Will Not be able to Cancel",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Process it!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Process!',
                        'Process Changes.',
                        'success'
                      )
                    }
                  }) 


    });

  });


//picked

$(function(){
    $(document).on('click','#picked',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

  
                  Swal.fire({
                    title: 'Are you sure to Picked?',
                    text: "Once Picked Will Not be able to Cancel",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Picked it!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Picked!',
                        'Picked Changes.',
                        'success'
                      )
                    }
                  }) 


    });

  });

//shipped

$(function(){
    $(document).on('click','#shipped',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

  
                  Swal.fire({
                    title: 'Are you sure to Ship ?',
                    text: "Once Shipped Will Not be able to Cancel",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Ship it!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Shipped!',
                        'Shipping Changes.',
                        'success'
                      )
                    }
                  }) 


    });

  });

//delivered

$(function(){
    $(document).on('click','#delivered',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

  
                  Swal.fire({
                    title: 'Are you sure to Deliver ?',
                    text: "Once Delivered Will Not be able to Cancel",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Deliver it!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Delivered!',
                        'Deliver Changes.',
                        'success'
                      )
                    }
                  }) 


    });

  });


//cancel
$(function(){
    $(document).on('click','#canceled',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

  
                  Swal.fire({
                    title: 'Are you sure to Cancel ?',
                    text: "Once Cancel Will Not be able to Reverse",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Cancel it!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Canceled!',
                        'Canceled Changes.',
                        'success'
                      )
                    }
                  }) 


    });

  });

//download

$(function(){
    $(document).on('click','#download',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

  
                  Swal.fire({
                    title: 'Are you sure to Download ?',
                    text: "Once Download Will Not be able to Reverse",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Download it!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Download!',
                        'Download Changes.',
                        'success'
                      )
                    }
                  }) 


    });

  });