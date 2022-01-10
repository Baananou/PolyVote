<script src="js/sweetalert.min.js"></script>
<script src="js/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.delete_btn_ajax').click(function(e) {
            e.preventDefault();
            var deleteid = $(this).closest("tr").find(".delete_id_value").val();
            // console.log(deleteid);
            swal({
                    title: "Vous êtes sûr de supprimer cet utilisateur?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            type: "POST",
                            url: "ListeDesComptes.php",
                            data: {
                                "delete_btn_set": 1,
                                "delete_id": deleteid,
                            },
                            success: function(response) {
                                swal("Utilisateur supprimé avec succès !", {
                                    icon: "success",
                                }).then((result) => {
                                    location.reload();
                                });


                            }


                        });
                    }
                });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('.refuse').click(function(e) {
            e.preventDefault();
            var deleteid1 = $(this).closest("tr").find(".delete_id_value1").val();
            // console.log(deleteid);
            swal({
                    title: "Vous êtes sûr de refuser cette candidature?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            type: "POST",
                            url: "notif.php",
                            data: {
                                "delete_btn_set1": 1,
                                "delete_id1": deleteid1,
                            },
                            success: function(response) {
                                swal("Candidature réfusée !", {
                                    icon: "success",
                                }).then((result) => {
                                    location.reload();
                                });


                            }


                        });
                    }
                });
        });
    });
</script>
<!-- <script>
    $(document).ready(function() {
        $('.button').click(function(e) {
            e.preventDefault();
            swal({
                    title: "Vous êtes sûr de choisir cette option?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            type: "POST",
                            url: "vote.php",
                            data: {
                                "poll_button": 1,
                               

                            },
                            success: function(response) {
                                swal("Vote Effectuer avec succés !", {
                                    icon: "success",
                                }).then((result) => {
                                    location.reload();
                                });


                            }


                        });
                    }
                });
        });
    });
</script> -->