<!DOCTYPE html>
<html lang="en" dir="ltr" style="background-color: white">

<head>
    <meta charset="utf-8">
    <title>Formularios Web</title>
    <link rel="stylesheet" href="formulario_alta/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="formulario_alta/vue-form-wizard.min.css">
    <!-- <link rel="stylesheet" href="https://unpkg.com/vue-form-wizard/dist/vue-form-wizard.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="formulario_alta/menu_flotante.css"> -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/animate.css@3.5.1" rel="stylesheet" type="text/css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <!-- <link rel="stylesheet" href="formulario_alta/vue-multiselect.min.css">
    <link rel="stylesheet" href="formulario_alta/cosas_wizar_uno.css">
    <link rel="stylesheet" href="formulario_alta/cosas_wizar.css"> -->
</head>

<body>
    <div id="app">
        <div>
            <form-wizard @on-complete="onComplete" shape="square" color="#3498db">
                <tab-content title="SOLICITANTE" icon="ti-user">
                    SOLICITANTE
                </tab-content>
                <tab-content title="REPRESENTANTE LEGAL" icon="ti-user">
                    REPRESENTANTE LEGAL
                </tab-content>
                <tab-content title="UBICACIÓN DE LA SOLICITUD" icon="ti-settings">
                    UBICACIÓN DE LA SOLICITUD
                </tab-content>
                <tab-content title="PROPIETARIO" icon="ti-user">
                    PROPIETARIO
                </tab-content>
                <tab-content title="DECLACIÓN JURADA" icon="ti-check">
                    DECLACIÓN JURADA
                </tab-content>
            </form-wizard>
        </div>
    </div>
    <script type="text/javascript" src="formulario_alta/vue.min.js"></script>
    <script type="text/javascript" src="formulario_alta/vue-form-wizard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <!-- <script src="https://unpkg.com/vue-form-wizard/dist/vue-form-wizard.js"></script> -->
    <!-- <script type="text/javascript" src="formulario_alta/vfg.js"></script> -->
    <!-- <script type="text/javascript" src="formulario_alta/vue-multiselect.min.js"></script> -->
    <script>
        Vue.use(VueFormWizard)
        new Vue({
            el: '#app',
            methods: {
                onComplete: function() {
                    //alert('Terminaste!');
                    Swal.fire({
                        position: 'top',
                        icon: 'success',
                        title: 'Se envio con Exito!',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    window.location.reload();
                }
            }
        })
    </script>
</body>

</html>