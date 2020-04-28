<?php 
    if (isset($_GET['add'])) {
        if ($_GET['add'] == 'success') {
            echo "<script>
            Swal.fire({
                icon: 'success',
                title: '¡Hecho!',
                text: 'Registro con éxito',
                showConfirmButton: true,
                timer: 3000,
            })
            </script>";
        }else{
            echo "<script>
            Swal.fire({
                icon: 'error',
                title: '¡Error!',
                text: 'Hemos tenido un problema al intentar hacer el registro',
                showConfirmButton: true,
                timer: 3000,
            })
            </script>";
        }
    }
    if (isset($_GET['delete'])) {
        if ($_GET['delete'] == 'success') {
            echo "<script>
            Swal.fire({
                icon: 'success',
                title: '¡Hecho!',
                text: 'Se ha eliminado correctamente',
                showConfirmButton: true,
                timer: 3000,
            })
            </script>";
        }else{
            echo "<script>
            Swal.fire({
                icon: 'error',
                title: '¡Error!',
                text: 'Hemos tenido un problema al intentar hacer la eliminación',
                showConfirmButton: true,
                timer: 3000,
            })
            </script>";
        }
    }
    if (isset($_GET['edit'])) {
        if ($_GET['edit'] == 'success') {
            echo "<script>
            Swal.fire({
                icon: 'success',
                title: '¡Hecho!',
                text: 'Edición hecho con éxito',
                showConfirmButton: true,
                timer: 3000,
            })
            </script>";
        }else{
            echo "<script>
            Swal.fire({
                icon: 'error',
                title: '¡Error!',
                text: 'Hemos tenido un problema al intentar hacer la edición',
                showConfirmButton: true,
                timer: 3000,
            })
            </script>";
        }
    }
 ?>